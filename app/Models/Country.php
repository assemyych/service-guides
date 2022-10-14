<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Countries",
 *     description="Countries model",
 *     @OA\Xml(
 *         name="Countries"
 *     )
 * )
 */
class Country extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];

    protected $hidden = [
        'updated_at'
    ];
}
