<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table ='chat';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
