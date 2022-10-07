<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLang extends Model
{
    use HasFactory;

    protected $table = 'country_lang';

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
}
