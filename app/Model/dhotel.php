<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class dhotel extends Model
{
    protected $table ='dhotel';
    protected $primaryKey = 'dhotel_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
