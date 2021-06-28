<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pteam extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'personnel_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'personnel_id' => 'integer',
    ];


    public function tsheets()
    {
        return $this->hasMany(\App\Models\Tsheet::class);
    }

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    public function personnel()
    {
        return $this->belongsTo(\App\Models\Personnel::class);
    }
}
