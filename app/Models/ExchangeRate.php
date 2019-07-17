<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $guarded = ['id'];

    public function getDateAttribute($value = null)
    {
        return empty($value) ? null : date("d.m.Y", strtotime($value));
    }

    public function setDateAttribute($value = null)
    {
        $this->attributes['date'] = empty($value) ? null : date("Y-m-d", strtotime($value));
    }
}
