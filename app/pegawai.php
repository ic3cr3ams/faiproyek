<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table ='pegawai';
    protected $primaryKey = 'pegawai_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;
}
