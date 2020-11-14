@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right">Tambah Hotel</i></h3>
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
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                    @if(isset($edit))
                    <form class="form-horizontal style-form" method="POST" action="/admin/editHotel">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" value={{$datahotel->id}}>
                            <label class="col-sm-2 col-sm-2 control-label">Nama Hotel</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" value="{{$datahotel->name}}" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Alamat Hotel</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="alamat" value="{{$datahotel->alamat}}" req>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kota" value="{{$datahotel->kota}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Negara</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="negara" id="negara" required disabled>                                      
                                            <option value="{{$idnegara}}">{{$namanegara}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" name="harga" min=0 step="1000" value="{{$datahotel->harga}}" >    
                                    </div>                                
                                </div>
                            </div>

                            <div style="margin:10px;">
                                <a href="/admin/listHotel"><button class="btn btn-danger" type="button">Batal</button></a>
                                <button class="btn btn-success" type="submit">Edit Hotel</button>                                    
                            </div>
                        </form>
                    @else
                        <form class="form-horizontal style-form" method="POST" action="addHotel">
                            @csrf
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Hotel</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Alamat Hotel</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="alamat" value="{{old('alamat')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="kota" value="{{old('kota')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Negara</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="negara" id="negara" required>
                                    @foreach ($datanegara as $item=>$values)
                                        <option value="{{$values->id}}">{{$values->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="harga" min=0 step="1000" value="{{old('harga')}}" >    
                                </div>                                
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jenis Kamar</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Standard Room</option>
                                    <option>Superior Room</option>
                                    <option>Deluxe Room</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                            <div class="col-sm-4">
                                <input type="Number" class="form-control">
                            </div>
                        </div> --}}
                        <div style="margin:10px;">
                            <a href="/admin/listHotel"><button class="btn btn-danger" type="button">Batal</button></a>
                                <button class="btn btn-success" type="submit">Tambahkan Hotel</button>
                            
                        </div>
                    </form>
                @endif
                        
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
