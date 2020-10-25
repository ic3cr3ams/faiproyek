<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trains extends Model
{
    protected $table ='trains';
    protected $primaryKey = 'trains_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
