<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use Uuids;

    protected $guarded = ['created_at', 'updated_at'];
    public $incrementing = false;
    protected $casts = ['id' => 'string'];
    protected $keyType = 'string';
}
