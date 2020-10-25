<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $table ='hotel';
    protected $primaryKey = 'hotel_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
