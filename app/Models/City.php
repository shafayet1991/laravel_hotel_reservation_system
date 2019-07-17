<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function hotels()
    {
        return $this->hasMany(Hotel::class,'id','city_id');
    }


    public static function set_table($columns,$array)
    {
        if (Helper::custom_check_empty($columns) !== false && Helper::custom_check_empty($array) !== false) {
            if(count($columns) > 0 && count($array) > 0){
                foreach($array as $arr){
                    DB::table('cities')->insert([
                        [
                            $columns[0] => $arr[0],
                            $columns[1] => $arr[1],
                            $columns[2] => $arr[2],
                        ]
                    ]);
                }
            }
            return false;
        }
        return false;
    }

}
