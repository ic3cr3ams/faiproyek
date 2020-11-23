<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table ='customer';
    protected $primaryKey = 'customer_id';
    public $incrementing = true;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
