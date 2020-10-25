<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dtrans extends Model
{
    protected $table ='dtrans';
    protected $primaryKey = 'dtrans_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
