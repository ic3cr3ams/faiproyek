<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table ='users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
