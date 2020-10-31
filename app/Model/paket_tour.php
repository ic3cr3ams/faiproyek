<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class paket_tour extends Model
{
    protected $table ='paket_tour';
    protected $primaryKey = 'tour_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
