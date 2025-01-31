<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'image',
        'startdate',
        'enddate',
        'personnel_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'startdate' => 'datetime',
        'enddate' => 'datetime',
        'personnel_id' => 'integer',
    ];


    public function personnel()
    {
        return $this->belongsTo(\App\Models\Personnel::class);
    }
}
