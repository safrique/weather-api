<?php

namespace App\Models;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'city',
        'country',
        'latitude',
        'longitude',
    ];

    /**
     * @return array
     * @throws BindingResolutionException
     */
    public static function getFillable()
    : array
    {
        return app()->make(City::class)->fillable;
    }
}
