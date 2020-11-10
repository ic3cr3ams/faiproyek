<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class airports extends Model
{
    //
    protected $table ='airports';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $keyType = 'varchar';
    public $timestamps = false;

}
