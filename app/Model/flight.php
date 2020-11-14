<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    //
    protected $table ='flight';
    protected $primaryKey ='id';
    public $incrementing = true;
    public $timestamps = false;
}
