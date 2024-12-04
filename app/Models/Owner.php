<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use HasFactory, HasApiTokens, softDeletes;

    //make sure the password is hidden while returning the request
    protected $hidden = ['password'];

    //make sure the password is being hashed and the id data type is string
    protected $casts =[
        'password' => 'hashed',
        'id' => 'string'
    ];

    //make sure the data cannot auto added by user
    protected $guarded = ['created_at', 'updated_at'];

    //refuse increment
    public $incrementing = false;

    //make sure the primary key data type is string
    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Uuid::uuid4();
        });
    }
}
