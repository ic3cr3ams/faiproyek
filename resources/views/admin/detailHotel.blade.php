@extends('admin/MasterAdmin')
@section('body')

<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{{$datahotel->name}}</h3>
        <div class="row">
          <!-- /col-md-12 -->
        </div>
        @include('alert')
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>Jenis Kamar</th>
                        <th>Kapasitas</th>
                        <th>Harga</th>
                        <th>Breakfast</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($dataHotel))
                            @foreach ($dataHotel as $item => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->alamat}}</td>
                                    <td>{{$value->kota}}</td>
                                    <td>{{$value->negara}}</td>
                                    <td>
                                        <a href="editHotel/{{$value->id}}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </button></a>
                                        <a href="detailHotel/{{$value->id}}"><button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Details </button></a>
                                        <a href="deleteHotel/{{$value->id}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i> Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan=6><center><strong>Tidak Ada Data</strong></center></td></tr>
                        @endif
                        {{-- <tr>
                            <td>
                            <a href="advanced_table">Nama Paket</a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dolor</td>
                            <td>12000.00$ </td>
                            <td>12000.00$ </td>
                            <td>
                            <button class="btn btn-info btn-xs"><a href="editHotel"><i class="fa fa-pencil"></i> Edit </a></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Delete</button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
                </div>
                <div style="padding:10px;margin-left:900px;">
                    <a href="tambahHotel"><button type="submit" class="btn btn-success">Tambah Hotel</button></a>
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
