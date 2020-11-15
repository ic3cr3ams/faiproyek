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
                                <th>Nama Paket</th>
                                <th>Durasi</th>
                                <th>Negara</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Action<th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$datapaket->isEmpty())
                                @foreach ($datapaket as $item=>$value)
                                    <tr>
                                        <td>{{$value->nama_paket}}</td>
                                        <td>{{$value->durasi}} Hari</td>
                                        <td>
                                            @foreach ($datanegara as $items)
                                                @if ($value->negara_tujuan==$items->id)
                                                    {{$items->name}}
                                                @endif
                                            @endforeach    
                                        </td>
                                        <td>{{$value->deskripsi}}</td>                                       
                                        <td><img src={{asset('/storage/paketPicture/'.$value->gambar)}} alt="eaa" width="150" height="100" class="img-thumbnail"></td>
                                        <td>Rp. {{number_format($value->hargajual)}}</td>
                                        <td>
                                            {{-- <a href="/admin/editPaket/{{$value->id}}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </button></a> --}}
                                            <a href="/admin/detailpaket/{{$value->id}}"><button class="btn btn-success btn-sm"><i class="fa fa-folder"></i> Details </button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan=5><center><strong>Tidak Ada Data</strong></center></td>
                                </tr>
                            @endif
                        {{-- <tr>
                            <td>
                                <a href="basic_table.html#">Nama Paket</a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dolor</td>
                            <td>12000.00$ </td>
                            <td>
                                <button class="btn btn-warning btn-xs"><a href="lihatdetail">Lihat detail</a></button>
                                <button class="btn btn-info btn-xs"><a href="editPaket"><i class="fa fa-pencil"></i> Edit </a></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <a href="basic_table.html#">
                                Dashio co
                                </a>
                            </td>
                            <td class="hidden-phone">Lorem Ipsum dolor</td>
                            <td>17900.00$ </td>
                            <td>
                                <button class="btn btn-warning btn-xs"><a href="lihatdetail">Lihat detail</a></button>
                                <button class="btn btn-info btn-xs"><a href="editPaket"><i class="fa fa-pencil"></i> Edit </a></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Delete</button>
                            </td>
                        </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div style="padding:10px;margin-left:800px;">
                    <a href="/admin/tambahPaket"><button type="submit" class="btn btn-success">Tambah Paket</button></a>
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
