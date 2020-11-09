@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Tambah Paket</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                    <form class="form-horizontal style-form" method="POST" action="/admin/editpaket" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$datapaket->id}}">
                        <input type="hidden" name="filegambarold" value="{{$datapaket->gambar}}">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" value="{{$datapaket->nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Durasi Perjalanan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input class="form-control" type="number" min=1 name=durasi value="{{$datapaket->durasi}}" required>
                                    <span class="input-group-addon">Hari</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                            <div class="col-sm-4">
                            <input type="number" class="form-control">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="kota" value="{{$datapaket->kota}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Negara</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="negara" value="{{$datapaket->negara}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-4">
                                <textarea name="deskripsi" class="form-control">{{$datapaket->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Ambil Keuntungan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input class="form-control" type="number" min=0 name=keuntungan value="{{$datapaket->keuntungan}}" required>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Gambar</label>
                            <div class="controls col-md-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <span class="btn btn-theme02 btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="gambar" accept="image/*"/>
                                        </span>
                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                    <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                </div>
                            </div>
                        </div>
                        <div style="padding:30px;margin-left:800px;">
                            <button class="btn btn-success" type="submit">Edit Paket</button>
                        </div>
                    </form>
                    </div>
                </div>
            <!-- col-lg-12-->
            </div>
            <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <!--footer end-->
  </section>
  @push("js")
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('asset/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('asset/admin/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('asset/admin/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!--custom switch-->
  <script src="{{asset('asset/admin/lib/bootstrap-switch.js')}}"></script>
  <!--custom tagsinput-->
  <script src="{{asset('asset/admin/lib/jquery.tagsinput.js')}}"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/admin/lib/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
  <script src="{{asset('asset/admin/lib/form-component.js')}}"></script>
@endpush

  @endsection
