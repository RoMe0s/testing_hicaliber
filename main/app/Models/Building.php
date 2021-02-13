<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 * @package App\Models
 *
 * @property string $name
 * @property float $price
 * @property int $bedrooms
 * @property int $storeys
 * @property int $garages
 */
class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'storeys',
        'garages',
    ];

    protected $casts = [
        'price' => 'float',
        'bedrooms' => 'integer',
        'storeys' => 'integer',
        'garages' => 'integer',
    ];
}
