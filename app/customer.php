<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table ='follows';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $timestamps = false;
}
