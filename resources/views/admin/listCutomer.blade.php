@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>List Customer</h3>
        <div class="row">
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
        <div style="margin-left: 600px;">
          <div class="form-group">
              <div>
                  @php
                      $paket  = DB::table('paket_tour')->get(array('nama','id'));
                  @endphp
                  <form action="pilihpaket" method="POST">
                      @csrf
                    <select class="form-control" name="paket">
                        @foreach ($paket as $item=>$value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-theme">Pilih</button>
                  </form>
                  <br>
              </div>
          </div>
        </div>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Nama Customer</th>
                    <th>Paket</th>
                    <th>Harga Paket</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        @if (Session::get('customer')=='Tidak Ada Data')
                            <h1>{{Session::get('customer')}}</h1>
                        @elseif(!Session::has('customer'))
                            <h1>Silahkan Pilih Paket</h1>
                        @else
                            @foreach (Session::get('customer') as $item =>$value)
                            <tr>
                                <td>{{$value->nama_depan.$value->nama_belakang}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->hargajual}}</td>
                                <td>
                                  <button class="btn btn-warning btn-xs"><a href="detailCustomer">Lihat detail</a></button>
                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Delete</button>
                                </td>
                            </tr>
                            @endforeach

                        @endif
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('asset/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('asset/admin/lib/common-scripts.js')}}"></script>
  <!--script for this page-->



  @endsection