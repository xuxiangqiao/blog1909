<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //指定表名
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
