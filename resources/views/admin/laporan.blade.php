@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>Pray & Go</h1>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h2>Laporan Penjualan</h2>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                  <form action="lihatlaporan" action="post">
                    <div class="col-md-5 col-xs-8" style="margin-left:550px ">
                    Pilih Tanggal Awal Dan Akhir
                    </div>
                    <div class="col-md-5 col-xs-8" style="margin-left: 550px;">
                        <input type="date" class="" name="awal">
                        &nbsp;&nbsp; <b>To</b> &nbsp;&nbsp;
                        <input type="date" class="" name="akhir">
                    </div>
                      <br>
                      <div class="col-md-5 col-xs-8" style="margin-left: 550px;">
                      <button type="submit" class="btn btn-theme">Pilih</button>
                      </div>
                      <br>
                  </form>
                  <br>
                  <br>
                <div class="row">
                    @if (Session::has('jmlhlaporan'))
                <h5 style="margin-left:689px">Jumlah Peserta : {{Session::get('jmlhlaporan')}}</h5>
                    @endif
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Peserta</th>
                      <th>Nama Paket</th>
                      <th class="text-right">Harga Paket</th>
                      <th class="text-right">Harga Hotel</th>
                      <th class="text-right">Harga Pesawat</th>
                      <th class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (!Session::has('laporan'))
                        <h1>Silahkan Pilih Periode Terlebih Dahulu</h1>
                      @else
                        @foreach (Session::get('laporan') as $item => $value)
                            <tr>
                                <td>{{$value->htrans_date}}</td>
                                <td>{{$value->nama_depan.$value->nama_belakang}}</td>
                                <td>{{$value->nama_paket}}</td>
                                <td>Rp. {{number_format($value->hargajual)}}</td>
                                <td>Rp. {{number_format($value->harga_hotel)}}</td>
                                <td>Rp. {{number_format($value->harga_flight)}}</td>
                                @php
                                 $total = $value->hargajual+$value->harga_hotel+$value->harga_flight;
                                @endphp
                                <td>Rp. {{number_format($total)}}</td>
                            </tr>
                        @endforeach
                      @endif
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
  </section>

  <!--script for this page-->
@endsection
