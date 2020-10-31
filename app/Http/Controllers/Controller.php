<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Model\customer;
use App\Model\dhotel;
use App\Model\dpaket;
use App\Model\hotel;
use App\Model\htrans;
use App\Model\paket_tour;
use App\Model\trains;
use App\Model\pegawai;
use App\Model\dtrans;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
