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
                      $paket  = DB::table('paket_tour')->get(array('nama_paket','id'));
                  @endphp
                  <form action="pilihpaket" method="POST">
                      @csrf
                    <select class="form-control" name="paket">
                        @foreach ($paket as $item=>$value)
                            <option value="{{$value->id}}">{{$value->nama_paket}}</option>
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
                    <th>Email Customer</th>
                    <th>No Paspor</th>
                    <th>No Telefon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        @if (!Session::get('customer'))
                            @php
                                $data = db::table('customer')->join('htrans','htrans_customer_id','customer_id')->orderBy('htrans_status','asc')->get();
                                // dd($data);
                            @endphp
                            @foreach ($data as $item=>$value)
                            <tr>
                                <td>{{$value->nama_depan.$value->nama_belakang}}</td>
                                <td>{{$value->customer_email}}</td>
                                <td>{{$value->no_paspor}}</td>
                                <td>{{$value->customer_phone}}</td>
                                <td>
                                  <form action="detailcustomer" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    @if ($value->htrans_status==2)
                                      <button class="btn btn-success btn-xs"><i class="fa fa-history" style="font-size:15px;"> History Pemesanan</i></button>
                                    @elseif($value->htrans_status==1)
                                      <button class="btn btn-warning btn-xs"><i class="fa fa-history" style="font-size:15px;"> History Pemesanan</i></button>
                                    @elseif($value->htrans_status==0)
                                        <button class="btn btn-warning btn-xs"><i class="fa fa-ban" style="font-size:15px;"> History Pemesanan</i></button>
                                    @endif
                                  </form>
                                  <form action="deletecustomer" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"style="font-size:15px;"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach (Session::get('customer') as $item =>$value)
                            <tr>
                                <td>{{$value->nama_depan.$value->nama_belakang}}</td>
                                <td>{{$value->customer_email}}</td>
                                <td>{{$value->no_paspor}}</td>
                                <td>{{$value->customer_phone}}</td>
                                <td>
                                    <form action="detailcustomer" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$value->customer_id}}" name="id">
                                        @if ($value->htrans_status==2)
                                          <button class="btn btn-success btn-xs"><i class="fa fa-history" style="font-size:15px;"> History Pemesanan</i></button>
                                        @elseif($value->htrans_status==1)
                                          <button class="btn btn-warning btn-xs"><i class="fa fa-history" style="font-size:15px;"> History Pemesanan</i></button>
                                        @elseif($value->htrans_status==0)
                                          <button class="btn btn-warning btn-xs"><i class="fa fa-ban" style="font-size:15px;"> History Pemesanan</i></button>
                                        @endif
                                      </form>
                                    <form action="deletecustomer" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$value->customer_id}}" name="id">
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" style="font-size:15px;"> Delete</i></button>
                                    {{-- <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i> Delete</button> --}}
                                    </form>
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
