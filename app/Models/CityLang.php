<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityLang extends Model
{
    use HasFactory;

    protected $table = 'city_lang';

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
