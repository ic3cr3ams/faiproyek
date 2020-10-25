<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class htrans extends Model
{
    protected $table ='htrans';
    protected $primaryKey = 'htrans_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
