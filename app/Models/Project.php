<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
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
        'startdate',
        'completiondate',
        'client_id',
        'approvedamount',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'startdate' => 'datetime',
        'completiondate' => 'datetime',
        'client_id' => 'integer',
        'approvedamount' => 'decimal:2',
    ];


    public function pservices()
    {
        return $this->hasMany(\App\Models\Pservice::class);
    }

    public function pteams()
    {
        return $this->hasMany(\App\Models\Pteam::class);
    }

    public function reports()
    {
        return $this->hasMany(\App\Models\Report::class);
    }

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }
}
