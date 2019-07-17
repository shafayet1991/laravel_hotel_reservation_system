<?php

namespace App\Http\Controllers\Admin\Contract;


use App\Helpers\Helper;
use App\Models\Contact;
use App\Models\Contract\ContractDay;
use App\Models\Contract\Contract;
use App\Models\Room\Room;
use App\Services\ContractService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function store(Request $request)
    {
        $contract = Contract::create($request->all());

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        for($i = $start;$i <= $end;$i->addDay())
        {
            ContractDay::updateOrCreate(
                [
                    'date' => $i->format('Y-m-d'),
                    'room_id' => $contract->room_id,
                ],
                [
                    'contract_id' => $contract->id
                ]
            );
        }

        Helper::custom_session_flash("success","store");
        return redirect()->back();
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);

        return response()->json($contract);
    }

    public function update(Request $request, $id)
    {
        Contract::findOrFail($id)->update($request->all());

        ContractService::reSaveContractDays($request->room_id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        $room_id = $contract->room_id;

        $contract->delete();

        ContractService::reSaveContractDays($room_id);

        Helper::custom_session_flash("success","destroy");

        return redirect()->back();
    }

    public function copy(Request $request)
    {
        $contract = Contract::findOrFail($request->contract_id);

        if(ContractService::copy_contract_for_rooms($contract->id,$request->room_id) !== false)
        {
            Helper::custom_session_flash("success","copy");
        }
        else
        {
            Helper::custom_session_flash("error","copy");
        }

        return redirect()->back();
    }

    public function calc(Request $request,$room_id)
    {
        $room = Room::findOrFail($room_id);
        $pp_price = $request['pp_price'];

        $prices = [];
        $prices['single'] = $pp_price * $room->single_factor;
        $prices['double'] = $pp_price * $room->double_factor;
        $prices['triple'] = $pp_price * $room->triple_factor;
        $prices['quad'] = $pp_price * $room->quad_factor;
        $prices['five'] = $pp_price * $room->five_factor;
        $prices['six'] = $pp_price * $room->six_factor;

        return $prices;
    }

    public function store_stop(Request $request)
    {
        $start = Carbon::parse($request->start_date);
        $end = is_null($request->end_date) ? Carbon::parse($request->start_date)->addDay() : Carbon::parse($request->end_date);

        for($i = $start;$i<=$end;$i->addDay())
        {
            ContractDay::updateOrCreate(
                [
                    'date' => $i->format('Y-m-d'),
                    'room_id' => $request->room_id,
                ],
                [
                    'is_stop' => true
                ]
            );
        }

        return redirect()->back();
    }

    public function update_stop($id)
    {
        $contract_day = ContractDay::findOrFail($id);
        $contract_day->is_stop = false;
        $contract_day->save();

        return redirect()->back();
    }
}
