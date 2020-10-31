<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class dpaket extends Model
{
    protected $table ='dpaket';
    protected $primaryKey = 'dpaket_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
