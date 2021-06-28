<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
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
        'completion',
        'project_id',
        'actiondate',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'actiondate' => 'datetime',
        'user_id' => 'integer',
    ];


    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
