@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>List Customer</h3>
        <div class="row">
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Tanggal Pemesanan</th>
                    <th>Nama Customer</th>
                    <th>Pilihan Paket Tour</th>
                    <th>Pemilihan Bank</th>
                    <th>Total Harga</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (Session::get('History') as $item =>$value)
                    <tr>
                        <td>{{$value->htrans_date}}</td>
                        <td>{{$value->nama_depan.$value->nama_belakang}}</td>
                        <td>{{$value->nama_paket}}</td>
                        <td>{{$value->bank}}</td>
                        <td>{{$value->htrans_total}}</td>
                        <td>
                        <button onclick="myFunction()" class="btn btn-primary">Show</button></td>
                        @if ($value->htrans_status==1)
                            <td style="background-color:yellow">Pending</td>
                            <td>
                                <form action="accept" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    <input type="hidden" value="{{$value->htrans_id_order}}" name="order">
                                    <button type="submit" class="btn btn-succes btn-xs"><i class="fa fa-check-circle"> Accept</i></button>
                                    </form>
                                <form action="deny" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    <input type="hidden" value="{{$value->htrans_id_order}}" name="order">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-ban"> Deny</i></button>
                                {{-- <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i> Delete</button> --}}
                                </form>
                            </td>
                        @elseif($value->htrans_status==0)
                            <td style="background-color:red">Denied</td>
                            <td>
                                <form action="accept" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    <input type="hidden" value="{{$value->htrans_id_order}}" name="order">
                                    <button type="submit" class="btn btn-succes btn-xs"><i class="fa fa-check-circle"> Accept</i></button>
                                    </form>
                                <form action="deny" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$value->customer_id}}" name="id">
                                    <input type="hidden" value="{{$value->htrans_id_order}}" name="order">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-ban"> Deny</i></button>
                                {{-- <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i> Delete</button> --}}
                                </form>
                            </td>
                        @elseif($value->htrans_status==2)
                            <td style="background-color:green">Done</td>
                        @endif
                        <div id="myDIV" style="display: none">
                            <img src="{{ asset("storage/BuktiTransfer/{$value->foto}")}}" alt="" srcset="">
                        </div>
                        <script>
                            function myFunction() {
                              var x = document.getElementById("myDIV");
                              if (x.style.display === "none") {
                                x.style.display = "block";
                              } else {
                                x.style.display = "none";
                              }
                            }
                        </script>
                    </tr>
                    @endforeach
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
