<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class htrans extends Model
{
    protected $table ='htrans';
    protected $primaryKey = 'htrans_id_order';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false;
}
