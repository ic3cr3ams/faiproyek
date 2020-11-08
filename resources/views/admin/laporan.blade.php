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
                <br>
                <br>
                <br>
                <div class="col-md-5 col-xs-8" style="margin-left: 550px;">
                  <select class="form-control">
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                  </select>
                </div>
                <div class="row">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th >Nomor Transaksi</th>
                      <th>Nama Customer</th>
                      <th>Nama Paket</th>
                      <th style="width:140px" class="text-right">Harga Paket</th>
                      <th style="width:90px" class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Flat Pack Heritage</td>
                      <td>Maria</td>
                      <td>Paket Tour</td>
                      <td class="text-right">$429.00</td>
                      <td class="text-right">$429.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Flat Pack Heritage</td>
                      <td>Maria</td>
                      <td>Paket Tour</td>
                      <td class="text-right">$429.00</td>
                      <td class="text-right">$429.00</td>
                    </tr>
                    <tr style="background-color: gray;color:black;">
                        <td>Total </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>$12345</td>
                    </tr>
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
