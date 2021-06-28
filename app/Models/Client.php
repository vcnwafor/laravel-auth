<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'businessname',
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'image',
        'phone',
        'email',
        'address',
        'website',
        'rcno',
        'industry',
        'country',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }
}
