<?php


namespace App\Services;


use App\Helpers\Helper;
use App\Models\Contract\Contract;
use App\Models\Contract\ContractDay;
use App\Models\Hotel\Hotel;
use App\Models\Room\Room;
use App\Models\Room\RoomPersonDetail;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Input;

class HotelService
{

    public static function roomSearchByParams($adult_count, $child_count, $child_ages, $start_date = null, $end_date = null, $hotel_id = null, $room_id = null,$sorting=null)
    {
        if (!is_null($start_date) && !is_null($end_date))
        {
            $start_date = Helper::custom_date_replace($start_date,"/",".");
            $end_date = Helper::custom_date_replace($end_date,"/",".");
            $start_date = Carbon::createFromFormat('d.m.Y', $start_date);
            $end_date = Carbon::createFromFormat('d.m.Y', $end_date);
            $start_date = Carbon::parse($start_date)->format('Y-m-d');
            $end_date = Carbon::parse($end_date)->format('Y-m-d');
        }
        else
        {
            $start_date = Carbon::now()->format('Y-m-d');
            $end_date = Carbon::now()->addDay(1)->format('Y-m-d');
        }

        if (!is_null($room_id))
        {
            $price = self::getRoomPrice($room_id, $adult_count, $child_count, $start_date, $end_date, $child_ages);
            return ['price' => $price];
        }
        elseif (!is_null($hotel_id))
        {
            $sorting = Input::get('sorting') ;
            return self::getRoomsPrice($hotel_id, $adult_count, $child_count, $start_date, $end_date, $child_ages,$sorting);
        }

        return -1;
    }

    public static function getRoomPrice($room_id, $adult_count, $child_count, $start_date, $end_date, $child_ages)
    {
        $night_count = Helper::custom_night(Helper::custom_check_empty($start_date),Helper::custom_check_empty($end_date));

        $contract_days = ContractDay::where('room_id', $room_id)->where('date', '>=', $start_date)->where('date', '<', $end_date)->where('is_stop', false)->get();

        if ($contract_days->count() != $night_count)
        {
            return 0;
        }

        $room = Room::findOrFail($room_id);

        $person_ranges = self::getPersonRanges($room->hotel->id, $adult_count, $child_count, $child_ages);

        $price = 0;

        foreach ($contract_days as $day)
        {
            $price += self::getPriceByParams($person_ranges, $day);
        }

        return Helper::convertToCurrency($price);
    }

    public static function getRoomsPrice($hotel_id, $adult_count, $child_count, $start_date, $end_date, $child_ages,$sorting=null)
    {
        $person_ranges = self::getPersonRanges($hotel_id, $adult_count, $child_count, $child_ages);

        $night_count = Helper::custom_night(Helper::custom_check_empty($start_date),Helper::custom_check_empty($end_date));

        // Contact'Ä±n pansiyon tipi daha sonra yapÄ±lacak!
        $rooms = Room::with(['files','features','room_type','contracts' => function($q) use($start_date,$end_date){
            $q->where('start_date', '>=', $start_date);
        }])
            ->where('hotel_id', $hotel_id)
            ->where('max_adult_count', '>=', $person_ranges["adult_count"])
            ->where('min_adult_count','<=', $person_ranges["adult_count"])
            ->where('max_baby_count', '>=', $person_ranges["baby_count"])
            ->where('min_baby_count','<=', $person_ranges["baby_count"])
            ->where('max_child_count', '>=', $person_ranges["child_count"])
            ->where('min_child_count','<=', $person_ranges["child_count"])
            ->where('max_young_count', '>=', $person_ranges["young_count"])
            ->where('min_young_count','<=', $person_ranges["young_count"])
            ->where('max_bed_count','>=', ($adult_count+$child_count))
            ->get();

        $list = array();

        foreach ($rooms as $room)
        {

            if($room->max_adult_count == $person_ranges["adult_count"] && ($room->baby_count_limit_with_max_adult < $person_ranges["baby_count"] || $room->child_count_limit_with_max_adult < $person_ranges["child_count"] || $room->young_count_limit_with_max_adult < $person_ranges["young_count"]))
            {
                continue;
            }

            $price = 0;

            $contract_days = ContractDay::where('room_id', $room->id)->where('date', '>=', $start_date)->where('date', '<', $end_date)->where('is_stop', false)->get();

            if ($contract_days->count() != $night_count)
            {
                continue;
            }

            $seperated_days = [];
            foreach ($contract_days as $day)
            {
                $price += self::getPriceByParams($person_ranges, $day);
                $seperated_days[$day->date] = Helper::convertToCurrency(self::getPriceByParams($person_ranges, $day));
            }

            if ($price < 1)
            {
                continue;
            }

            $list[$room->id]["info"] = $room;
            $list[$room->id]["price"] = Helper::convertToCurrency($price);
            $list[$room->id]["hotel_id"] = $hotel_id;
            $list[$room->id]["start_date"] = $start_date;
            $list[$room->id]["end_date"] = $end_date;
            $list[$room->id]["adult_count"] = $adult_count;
            $list[$room->id]["child_count"] = $child_count;
            $list[$room->id]["night"] = $night_count;
            $list[$room->id]["features"] = $room->features;
            $list[$room->id]["contracts"] = $room->contracts;
            $list[$room->id]["child_ages"] = $child_ages;
            $list[$room->id]["seperated_days"] = $seperated_days;

        }

        if($sorting == 'price_asc'){
            uasort($list, function($a, $b) {
                return $a['price'] <=> $b['price'];
            });
        }
        if($sorting == 'price_desc'){
            uasort($list, function($a, $b) {
                return $b['price'] <=>  $a['price'];
            });
        }

        return $list;
    }

    public static function getPersonRanges($hotel_id, $adult_count, $child_count, $child_ages)
    {
        $baby_age_count = 0;
        $child_age_count = 0;
        $young_age_count = 0;

        $hotel = Hotel::findOrFail($hotel_id);

        for ($i=0 ; $i < $child_count ; $i++)
        {
            if ($child_ages[$i] > 0 && $child_ages[$i] < $hotel->baby_age_limit)
            {
                $baby_age_count++;
            }
            elseif ($child_ages[$i] > $hotel->baby_age_limit && $child_ages[$i] < $hotel->child_age_limit)
            {
                $child_age_count++;
            }
            elseif ($hotel->young_age_limit > 0 && $child_ages[$i] > $hotel->child_age_limit && $child_ages[$i] < $hotel->young_age_limit)
            {
                $young_age_count++;
            }
            else
            {
                $adult_count++;
            }
        }

        return [
            'adult_count' => $adult_count,
            'baby_count' => $baby_age_count,
            'child_count' => $child_age_count,
            'young_count' => $young_age_count,
        ];
    }

    public static function getPriceByParams($person_ranges, $day)
    {
        $price = 0;

        if ($person_ranges["adult_count"] == 1)
        {
            $price += $day->contract->single_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_single;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_single * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_single;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_single * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_single;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_single * ( $person_ranges["young_count"] - 1 );
                }
            }
        }
        elseif ($person_ranges["adult_count"] == 2)
        {
            $price += $day->contract->double_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_double;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_double * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_double;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_double * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_double;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_double * ( $person_ranges["young_count"] - 1 );
                }
            }
        }
        elseif ($person_ranges["adult_count"] == 3)
        {
            $price += $day->contract->triple_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_triple;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_triple * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_triple;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_triple * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_triple;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_triple * ( $person_ranges["young_count"] - 1 );
                }
            }
        }
        elseif ($person_ranges["adult_count"] == 4)
        {
            $price += $day->contract->quad_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_quad;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_quad * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_quad;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_quad * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_quad;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_quad * ( $person_ranges["young_count"] - 1 );
                }
            }
        }
        elseif ($person_ranges["adult_count"] == 5)
        {
            $price += $day->contract->five_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_five;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_five * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_five;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_five * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_five;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_five * ( $person_ranges["young_count"] - 1 );
                }
            }
        }
        elseif ($person_ranges["adult_count"] == 6)
        {
            $price += $day->contract->six_price;

            if ($person_ranges["baby_count"])
            {
                $price += $day->contract->baby_one_price_for_six;

                if ($person_ranges["baby_count"] > 1)
                {
                    $price += $day->contract->baby_more_price_for_six * ( $person_ranges["baby_count"] - 1 );
                }
            }

            if ($person_ranges["child_count"])
            {
                $price += $day->contract->child_one_price_for_six;

                if ($person_ranges["child_count"] > 1)
                {
                    $price += $day->contract->child_more_price_for_six * ( $person_ranges["child_count"] - 1 );
                }
            }

            if ($person_ranges["young_count"])
            {
                $price += $day->contract->young_one_price_for_six;

                if ($person_ranges["young_count"] > 1)
                {
                    $price += $day->contract->young_more_price_for_six * ( $person_ranges["young_count"] - 1 );
                }
            }
        }

        return $price;
    }
}