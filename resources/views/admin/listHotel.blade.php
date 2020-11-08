@extends('admin/MasterAdmin')
@section('body')

<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>List Hotel</h3>
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
                        <th>Nama Hotel</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Negara</th>
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
                                        <a href="/admin/editHotel/{{$value->id}}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </button></a>
                                        <a href="/admin/detailHotel/{{$value->id}}"><button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Details </button></a>
                                        {{-- <a href="deleteHotel/{{$value->id}}"> --}}
                                            <button class="btn btn-danger btn-sm btnkemodal" id={{$value->id}} namahotel="{{$value->name}}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o "></i> Delete</button>
                                        {{-- </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan=5><center><strong> Ada Data</strong></center></td></tr>
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
      <!-- Button trigger modal -->
        {{-- <button type="button" class="test btn btn-primary" data-toggle="modal" data-target="#exampleModal" id=3 namahotel="Tuestingg">
            Launch demo modal
        </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Hotel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id=namahotel>Yakin Hapus Hotel </p>
          {{-- <p id="idhotel"></p> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="btndeletehotel">Delete</button>
        </div>
      </div>
    </div>
  </div>
    </section>
    
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
  <!-- js placed at the end of the document so the pages load faster -->
  {{-- @push('js')
  <script src="{{asset('asset/admin/lib/jquery/jquery.js')}}"></script>
  <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('asset/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('asset/admin/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  @endpush --}}

    @endsection
    @push('js')
        <script>
            $(document).on("click", ".btnkemodal", function () {
                var hotelId = $(this).attr('id');
                var namahotel= $(this).attr('namahotel');
                console.log(namahotel);
                $(".modal-body #namahotel").append($(this).attr("namahotel")+ " ?")
                console.log(hotelId);
                // $(".modal-body #idhotel").html(hotelid);
                $(".modal-footer #btndeletehotel").wrap("<a href='/admin/deleteHotel/"+hotelId+"'></a>")
                // As pointed out in comments, 
                // it is unnecessary to have to manually call the modal.
                // $('#addBookDialog').modal('show');
            });
        </script>
    @endpush
