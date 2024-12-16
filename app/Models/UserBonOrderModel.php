<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBonOrderModel extends Model
{
    protected $table = 'tbl_user_bonorder';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;
}
