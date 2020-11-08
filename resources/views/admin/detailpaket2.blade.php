@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Paket Tour</h3>
        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>Hari Ke </th>
                                <th>Hotel</th>
                                <th>Harga Kamar</th>
                                {{-- <th>Jenis Kamar</th> --}}
                                <th>Itinerary</th>
                                <th>Biaya Lain</th>
                                <th>Total Biaya</th>
                                <th>Harga Jual<th>
                                <th>Action<th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$datadetailpaket->isEmpty())
                                @foreach ($datadetailpaket as $item=>$value)
                                    <tr>
                                        <td>{{$value->hari}}</td>
                                        <td>
                                            @foreach ($datahotel as $items=>$values)                                               
                                                    @if($value->hotel_id==$values->id){{$values->name}}
                                                    @endif
                                            @endforeach
                                        </td>
                                        <td>{{$value->hargahotel}}</td>
                                        <td>{{$value->itinerary}}</td>
                                        <td>{{$value->biayalain}}</td>                                                                               
                                        <td>{{$value->totalbiaya}}</td>                                                                               
                                        <td>{{$value->hargajual}}</td>                                                                               
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan=9><center><strong>Tidak Ada Data</strong></center></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div style="padding:10px;margin-left:850px;">
                    <a href="/admin/tambahdetailpaket/{{$idpaket}}"><button type="submit" class="btn btn-success">Tambah Detail Paket</button></a>
                </div>
                <!-- /content-panel -->
            </div>
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
