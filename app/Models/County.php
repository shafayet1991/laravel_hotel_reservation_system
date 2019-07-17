<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class County extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function set_table($columns,$array)
    {
        if (Helper::custom_check_empty($columns) !== false && Helper::custom_check_empty($array) !== false) {
            if(count($columns) > 0 && count($array) > 0){
                foreach($array as $arr){
                    DB::table('counties')->insert([
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
