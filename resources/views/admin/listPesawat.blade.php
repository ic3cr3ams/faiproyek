@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>List Pesawat</h3>
            <div class="row">
            <!-- /col-md-12 -->
            </div>
            <!-- row -->
            <div class="row mt">               
                <div class="col-md-12">
                    @include('alert')
                    <div class="content-panel">
                        {{-- <table class="table table-striped table-advance table-hover"> --}}
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Nama Maskapai</th>
                                    <th>Dari</th>
                                    <th>Tujuan</th>
                                    <th>Harga</th>
                                    <th>Durasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$dataflight->isEmpty())
                                    @foreach ($dataflight as $item)
                                    <tr>
                                        @foreach ($datamaskapai as $items)
                                            @if ($item->maskapai==$items->id)
                                                <td>{{$items->nama}}</td>
                                            @endif    
                                        @endforeach
                                        <td>{{$item->asal}},{{$item->bandara_asal}}</td>
                                        <td>{{$item->tujuan}},{{$item->bandara_tujuan}}</td>
                                        <td>Rp {{number_format($item->harga)}}</td>
                                        <td>{{$item->durasi}} Jam</td>
                                        <td><button class="btn btn-danger btn-sm btnkemodal" id={{$item->id}} data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o "></i> Delete</button></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"><center><strong>Tidak Ada data</strong></center></td>
                                    </tr>
                                @endif                                
                            </tbody>
                        </table>
                    </div>
                    <div style="padding:10px;margin-left:900px;">
                        <a href="/admin/tambahPesawat"><button type="submit" class="btn btn-success">Tambah Pesawat</button></a>
                    </div>
                    <!-- /content-panel -->
                </div>
            <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Flight</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Hapus Flight ?</p>
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
    <script src="{{ asset('asset/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/lib/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        $(document).on("click", ".btnkemodal", function () {
            var idflight = $(this).attr('id');
            console.log(idflight);
            // $(".modal-body #idhotel").html(hotelid);
            $(".modal-footer #btndeletehotel").wrap("<a href='/admin/deletePesawat/"+idflight+"'></a>")
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>


  @endsection
