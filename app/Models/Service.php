<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function subservices()
    {
        return $this->hasMany(\App\Models\Sheet::class)->where(['type' =>'Sub-Service']);
    }

    public function sheets()
    {
        return $this->hasMany(\App\Models\Sheet::class)->where(['type' =>'Sheet']);
    }

    public function procedures()
    {
        return $this->hasMany(\App\Models\Sheet::class)->where(['type' =>'Procedure']);
    }
}
