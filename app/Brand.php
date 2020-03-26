<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	//指定表名
    protected $table = 'brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];

}
