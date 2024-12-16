<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QcModel extends Model
{
    protected $table = 'tbl_QC';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id';
}
