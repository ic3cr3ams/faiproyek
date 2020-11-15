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
                    <div class="col-md-3 col-xs-8">
                      <label>Bulan : </label>
                        <select class="form-control" name="bulan">
                          <option >-</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                      </div>
                      <br>
                      <div class="col-md-3 col-xs-8">
                        <label>Tahun :</label>
                        <select class="form-control" name="tahun">
                            <option >-</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <br>
                        {{-- EDIT BUTTON DISINI --}}
                        <button type="submit" class="btn btn-theme">Pilih</button>
                      </div>
                      <br>
                  </form>
                  <br>
                  <br>
                <div class="row">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th >Nomor Transaksi</th>
                      <th>Jumlah Peserta</th>
                      <th>Nama Paket</th>
                      <th style="width:140px" class="text-right">Harga Paket</th>
                      <th style="width:90px" class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (!Session::has('laporan'))
                        <h1>Silahkan Pilih Periode Terlebih Dahulu</h1>
                      @else

                      @endif
                      {{-- @foreach ($collection as $item)
                      <tr>
                        <td>1</td>
                        <td>Flat Pack Heritage</td>
                        <td>Maria</td>
                        <td>Paket Tour</td>
                        <td class="text-right">$429.00</td>
                        <td class="text-right">$429.00</td>
                      </tr>
                      @endforeach --}}
                    {{-- <tr>
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
                    </tr> --}}
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
