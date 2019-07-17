<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Contract\Contract;
use App\Models\Contract\ContractDay;
use App\Models\Reservation\ReservationTransfer;
use App\Models\Room\Room;
use Carbon\Carbon;

class ContractService
{
    public static function copy_contract_for_rooms($contract_id, $room_ids)
    {
        $contract = Contract::findOrFail($contract_id);

        if(is_array($room_ids))
        {
            foreach ($room_ids as $room_id)
            {
                $room = Room::findOrFail($room_id);
                $sdtq['single_factor'] = $room->single_factor;
                $sdtq['double_factor'] = $room->double_factor;
                $sdtq['triple_factor'] = $room->triple_factor;
                $sdtq['quad_factor'] = $room->quad_factor;
                $sdtq['five_factor'] = $room->five_factor;
                $sdtq['six_factor'] = $room->six_factor;
                $factored_sdtq  = Helper::custom_calculate_sdtq_factor_for_pp_price($contract->pp_price,$sdtq);
                $inputs = [
                    "room_id" => $room_id,
                    'start_date' => $contract->start_date,
                    'end_date' => $contract->end_date,
                    'pp_price' => $contract->pp_price,
                    'board_type_id' => $contract->board_type_id,
                    'extra_bed_price' => $contract->extra_bed_price,
                    'single_price' => $factored_sdtq['single_price'],
                    'double_price' => $factored_sdtq['double_price'],
                    'triple_price' => $factored_sdtq['triple_price'],
                    'quad_price' => $factored_sdtq['quad_price'],
                    'five_price' => $factored_sdtq['five_price'],
                    'six_price' => $factored_sdtq['six_price'],
                    'baby_one_price_for_single' => $contract->baby_one_price_for_single,
                    'baby_more_price_for_single' => $contract->baby_more_price_for_single,
                    'child_one_price_for_single' => $contract->child_one_price_for_single,
                    'child_more_price_for_single' => $contract->child_more_price_for_single,
                    'young_one_price_for_single' => $contract->young_one_price_for_single,
                    'young_more_price_for_single' => $contract->young_more_price_for_single,
                    'baby_one_price_for_double' => $contract->baby_one_price_for_double,
                    'baby_more_price_for_double' => $contract->baby_more_price_for_double,
                    'child_one_price_for_double' => $contract->child_one_price_for_double,
                    'child_more_price_for_double' => $contract->child_more_price_for_double,
                    'young_one_price_for_double' => $contract->young_one_price_for_double,
                    'young_more_price_for_double' => $contract->young_more_price_for_double,
                    'baby_one_price_for_triple' => $contract->baby_one_price_for_triple,
                    'baby_more_price_for_triple' => $contract->baby_more_price_for_triple,
                    'child_one_price_for_triple' => $contract->child_one_price_for_triple,
                    'child_more_price_for_triple' => $contract->child_more_price_for_triple,
                    'young_one_price_for_triple' => $contract->young_one_price_for_triple,
                    'young_more_price_for_triple' => $contract->young_more_price_for_triple,
                    'baby_one_price_for_quad' => $contract->baby_one_price_for_quad,
                    'baby_more_price_for_quad' => $contract->baby_more_price_for_quad,
                    'child_one_price_for_quad' => $contract->child_one_price_for_quad,
                    'child_more_price_for_quad' => $contract->child_more_price_for_quad,
                    'young_one_price_for_quad' => $contract->young_one_price_for_quad,
                    'young_more_price_for_quad' => $contract->young_more_price_for_quad,
                    'baby_one_price_for_five' => $contract->baby_one_price_for_five,
                    'baby_more_price_for_five' => $contract->baby_more_price_for_five,
                    'child_one_price_for_five' => $contract->child_one_price_for_five,
                    'child_more_price_for_five' => $contract->child_more_price_for_five,
                    'young_one_price_for_five' => $contract->young_one_price_for_five,
                    'young_more_price_for_five' => $contract->young_more_price_for_five,
                    'baby_one_price_for_six' => $contract->baby_one_price_for_six,
                    'baby_more_price_for_six' => $contract->baby_more_price_for_six,
                    'child_one_price_for_six' => $contract->child_one_price_for_six,
                    'child_more_price_for_six' => $contract->child_more_price_for_six,
                    'young_one_price_for_six' => $contract->young_one_price_for_six,
                    'young_more_price_for_six' => $contract->young_more_price_for_six,
                ];

                Contract::create($inputs);

                self::reSaveContractDays($room_id);
            }
        }
    }

    public static function reSaveContractDays($room_id)
    {
        $contracts = Contract::where('room_id', $room_id)->get();
        ContractDay::where('room_id', $room_id)->delete();

        $i=null;
        $start=null;
        $end=null;

        foreach ($contracts as $contract)
        {
            $start = Carbon::parse($contract->start_date);
            $end = Carbon::parse($contract->end_date);

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
        }
    }
}