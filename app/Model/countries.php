<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    //
    protected $table ='countries';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
