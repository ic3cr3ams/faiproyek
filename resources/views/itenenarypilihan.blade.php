@extends('MasterHead')
@section('body')

<div class="hero-wrap js-fullheight" style="background-image: url('images/blogpage.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Jadwal Paket</h1>
        </div>
    </div>
    </div>
</div>
@section('body')
@php
$itenary = DB::table('itenerarypaket')->where('idpaket',Session::get('idtour'))->get(array('hari','itenerary'));
$nama  = DB::table('paket_tour')->where('id',Session::get('idtour'))->get('nama_paket');
@endphp
<div class="container">
    @foreach ($nama as $item)
    <h1 style="text-align: center;">Itenary Paket {{$item->nama_paket}}</h1>
    @endforeach
<h5><b>NB : Kegiatan bisa berubah seusai dengan kondisi</b></h5>
<table class="table table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;">Hari Ke -
                </th>
                <th style="text-align: center;">Kegiatan
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($itenary as $item=>$value)
            <tr>
                <td style='text-align: center;''><b>{{$value->hari}}</b></td>
                <td style="text-align: center">{{$value->itenerary}}</td>
            </tr>
        @endforeach
        <form action="balik" method="POST">
            @csrf
            <button style=": 100px" class="btn btn-primary" type="submit">Home</button>
        </form>
        </tbody>
</table>
</div>
@endsection
