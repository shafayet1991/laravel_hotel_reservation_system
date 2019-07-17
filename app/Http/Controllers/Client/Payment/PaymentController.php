<?php

namespace App\Http\Controllers\Client\Payment;

use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Hotel\Hotel;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\ReservationPaymentReport;
use App\Models\Reservation\ReservationTransfer;
use App\Models\Room\Room;
use App\Services\HotelService;
use App\Services\ReservationService;
use App\Traits\ClientTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
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

    public function detail()
    {
        return view("client.pages.payment.detail",['menus' => $this->menus,'socials' => $this->socials,'general' => $this->general]);
    }

    public function extra(Request $request)
    {
        $search = [
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "adult_count" => $request->adult_count,
            "child_count" => $request->child_count,
            "child_ages" => $request->child_ages
        ];

        $room = Room::with('room_type','hotel','features','possibilities','room_type')->where('id',$request->room_id)->firstOrFail();

        $transfers = ReservationTransfer::where('hotel_id',$room->hotel->id)->get();

//        \Session::forget("reservation");

        return view('client.pages.payment.extra',[
            'room' => $room,'transfers' => $transfers,'search' => $search,
            'menus' => $this->menus,'socials' => $this->socials,'general' => $this->general
        ]);
    }

    public function extra_store(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

        $inputs = $request->except('_token','reservation_transfer_ids');

        $inputs['reservation_transfer_ids'] = isset($reservation_transfer_ids) && !empty($reservation_transfer_ids) ? implode(',',$request->reservation_transfer_ids) : '';

        $reservation = Reservation::create($inputs);

        Session::put("reservation",$reservation);

        return redirect(route("hotel.payment.personal",[$room->id,$request->start_date,$request->end_date,$request->adult_count,$request->child_count,$reservation->id]));
    }

    public function personal(Request $request)
    {
        $search = [
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "adult_count" => $request->adult_count,
            "child_count" => $request->child_count
        ];

        $countries = Country::all();

        $room = Room::findOrFail($request->room_id);

        $reservation = Reservation::where(['room_id' => $request->room_id,'id' => $request->reservation_id])->first();

        return view('client.pages.payment.personal',[
            'menus' => $this->menus,'search' => $search,'room_id' => $request->room_id,'reservation_id' => $reservation->id,'room' => $room,
            'socials' => $this->socials,'general' => $this->general,
            'countries' => $countries,
        ]);
    }

    public function personal_update(Request $request)
    {
        $inputs = $request->except("_token","reservation_id");
        $reservation = Reservation::where(['room_id' => $request->room_id,'id' => $request->reservation_id])->first();
        $reservation->update($inputs);
        $reservation->save();
        $room = Room::where('id',$request->room_id)->first();
        return redirect(route("hotel.payment.card",[$room->id,$request->start_date,$request->end_date,$request->adult_count,$request->child_count,$reservation->id]));
    }

    public function card(Request $request)
    {
        $search = [
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "adult_count" => $request->adult_count,
            "child_count" => $request->child_count
        ];
        $room = Room::where('id',$request->room_id)->first();
        $reservation = Reservation::where(['room_id' => $request->room_id,'id' => $request->reservation_id])->first();
        return view('client.pages.payment.card',[
            'menus' => $this->menus,'search' => $search,'room_id' => $room->id,'reservation_id' => $reservation->id,'room' => $room,'reservation' => $reservation,
            'socials' => $this->socials,'general' => $this->general
            ]);
    }

    public function card_update(Request $request)
    {
        $reservation = Reservation::where(['room_id' => $request->room_id,'id' => $request->reservation_id])->first();
        $data = ['reservation' => $reservation];
//        Mail::send('mails/reservation', $data, function ($message) {
//            $message->to('abc@gmail.com', 'Ümit UZ')->subject
//            ('Yeni Rezervasyon');
//            $message->from('xyz@gmail.com', 'Ümit UZ');
//        });
        if(!empty($reservation->reservation_transfer_ids) && $reservation->reservation_transfer_ids != ""){
            $transfers = ReservationService::reservation_transfers($reservation->reservation_transfer_ids);
        }else{
            $transfers = [];
        }
        \Session::flash('success','Rezervasyon başarıyla oluşturuldu');
        return view('client.pages.payment.reservation_done',[
            'menus' => $this->menus,'reservation' => $reservation,'transfers' => $transfers,
            'socials' => $this->socials,'general' => $this->general
        ]);
    }

    public function reservation_payment_report(Request $request)
    {
        $date = Carbon::createFromFormat('d/m/Y', $request->date);

        $result = ReservationPaymentReport::create([
            'reservation_id' => $request->reservation_id,
            'full_name' => $request->full_name,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $date->format('Y-m-d'),

        ]);

        return response()->json($result);
    }
}
