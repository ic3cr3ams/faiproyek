<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $table ='hotel';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
