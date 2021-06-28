<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use HasFactory, SoftDeletes;

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeno',
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'image',
        'skills',
        'phone',
        'email',
        'address',
        'designation',
        'country',
        'salary',
        'maritalstatus',
        'employmentstatus',
        'employmenttype',
        'dob',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'salary' => 'decimal:2',
        'dob' => 'datetime',
    ];


    public function certifications()
    {
        return $this->hasMany(\App\Models\Certification::class);
    }

    public function works()
    {
        return $this->hasMany(\App\Models\Work::class);
    }

    public function pteams()
    {
        return $this->hasMany(\App\Models\Pteam::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
