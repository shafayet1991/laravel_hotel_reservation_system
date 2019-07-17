<?php

namespace App\Http\Controllers\Common\Reservation;

use App\Events\Reservation\NewReservationEvent;
use App\Helpers\Helper;
use App\Http\Requests\Reservation\ReservationRequest;
use App\Jobs\Reservation\NewReservationJob;
use App\Mail\NewReservationMail;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\ReservationAdult;
use App\Models\Reservation\ReservationChild;
use App\Models\Reservation\ReservationTransfer;
use App\Models\Room\Room;
use App\Services\ReservationService;
use App\Traits\ClientTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class ReservationController extends Controller
{
    use ClientTrait;

    protected $menus = [];
    protected $general = null;
    protected $socials = [];

    public function __construct()
    {
        $this->menus = $this->get_client_menus();
        $this->general = $this->get_general_settings();
        $this->socials = $this->get_social_media_settings();
    }

    public function index(Request $request)
    {
        $search = [
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "adult_count" => $request->adult_count,
            "child_count" => $request->child_count,
            "child_ages" => $request->child_ages
        ];

        $room = Room::with('room_type', 'hotel', 'features', 'possibilities', 'room_type')->where('id', $request->room_id)->firstOrFail();

        $transfers = ReservationTransfer::where('hotel_id', $room->hotel->id)->get();

        return view('client.pages.reservation.index', [
            'room' => $room, 'transfers' => $transfers, 'search' => $search,
            'menus' => $this->menus, 'socials' => $this->socials, 'general' => $this->general
        ]);
    }

    public function save(ReservationRequest $request)
    {
        if ($request->exists('child_name')) {
            $equality = ReservationService::compare_child_ages($request->child_birthday, $request->child_ages, $request->child_count);
            if (is_array($equality)) {
                if (count($equality) > 0) {
                    $values = array_values($equality);
                    for ($i = 0; $i < count($equality); $i++) {
                        if($values[$i] == 'success') {
                            continue;
                        } else {
                            foreach($equality as $key => $eq){
                                if($eq === 'success'){
                                    unset($equality[$key]);
                                    continue;
                                }
                            }
                            Helper::custom_session_flash('info', 'child_ages');
                            return Redirect::back()->withInput()->withErrors($equality);;
                        }
                    }
                }
            }
        }

        $inputs = $request->except('_token', 'adult_name', 'adult_surname', 'adult_gender', 'adult_birthday', 'child_name', 'child_surname', 'child_gender', 'child_birthday', 'reservation_transfer_ids', 'child_ages');
        $inputs['currency'] = session('localize.currency');
        $inputs['order_number'] = Helper::generate_unique_number();

        $reservation = Reservation::create($inputs);
        $reservation->transfers()->sync($request->reservation_transfer_ids);


        if ($request->exists('adult_name')) {
            $count_adult = count($request->adult_name);
            if ($count_adult > 0) {
                for ($i = 0; $i < $count_adult; $i++) {
                    if (Helper::custom_check_empty($request->adult_name[$i]) !== false) {
                        $changed_adult_birthday = $request->exists('adult_birthday')
                            ? Helper::change_date_format($request->adult_birthday[$i], "d.m.Y")
                            : null;
                        $reservation->adults()->create([
                            'reservation_id' => $reservation->id,
                            'adult_name' => $request->adult_name[$i],
                            'adult_surname' => $request->adult_surname[$i],
                            'adult_gender' => $request->adult_gender[$i],
                            'adult_birthday' => $changed_adult_birthday,
                        ]);
                    }
                }
            }
        }

        if ($request->exists('child_name')) {
            $count_child = count($request->child_name);
            if ($count_child > 0) {
                for ($i = 0; $i < $count_child; $i++) {
                    if (Helper::custom_check_empty($request->child_name[$i]) !== false) {
                        $changed_child_birthday = $request->exists('child_birthday') ? Helper::change_date_format($request->child_birthday[$i], "d.m.Y") : null;
                        $reservation->children()->create([
                            'reservation_id' => $reservation->id,
                            'child_name' => $request->child_name[$i],
                            'child_surname' => $request->child_surname[$i],
                            'child_gender' => $request->child_gender[$i],
                            'child_birthday' => $changed_child_birthday,
                        ]);
                    }
                }
            }
        }

        $data = [
            'reservation' => $reservation,
        ];

        Session::put('data', $data);

        return redirect()->action('Common\Reservation\ReservationController@detail');

    }

    public function detail()
    {
        $data = Session::get('data');
        return view('client.pages.reservation.detail', [
            'reservation' => $data['reservation'],
            'menus' => $this->menus, 'socials' => $this->socials, 'general' => $this->general
        ]);
    }

    public function complete($reservation_id)
    {
        $reservation = Reservation::where(['id' => $reservation_id,'is_completed' => 0])->first();
        if(Helper::custom_check_empty($reservation) !== false){
            $reservation->is_completed = 1;
            $reservation->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Rezervasyonunuz başarılı bir şekilde kayıt edilmiştir. Otelden müsaitlik Alındıktan sonra sizinle iletişime geçilecektir.'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Rezervasyonunuz zaten onaylanmıştır'
        ]);
    }

    public function sendEmail($id)
    {
        $reservation = Reservation::with('adults','children')->findOrFail($id);
        $data = [
            'reservation' => $reservation,
            'person_email' => $reservation->person_email
        ];

        event(new NewReservationEvent($data));

        Session::flash('success',$data['person_email'] . ' adresine mail gönderilmiştir.');

        return back();
    }

}
