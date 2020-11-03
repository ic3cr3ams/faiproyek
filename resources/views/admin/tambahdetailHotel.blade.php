@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right">Tambah Kamar Hotel</i></h3>
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
                        <form class="form-horizontal style-form" method="POST" action="/admin/tambahdetailHotel">
                            @csrf
                            
                                <input type="hidden" name="id" value={{$id}}>
                            <label class="col-sm-2 col-sm-2 control-label">Jenis Kamar</label>  
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="jeniskamar">
                                        <option value="Single Room">Single Room</option>
                                        <option value="Twin Room">Twin Room</option>
                                        <option value="Double Room">Double Room</option>
                                        <option value="Deluxe Room">Deluxe Room</option>
                                        <option value="Superior Room">Superior Room</option>
                                    </select>
                                </div>
                            </div>      
                            <label class="col-sm-2 col-sm-2 control-label">Kapasitas Kamar</label>  
                            <div class="form-group ">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="number" name="kapasitas" id="" min=0 max=5 class="form-control" required><span class="input-group-addon">Orang</span>
                                    </div>
                                </div>
                            </div> 

                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>  
                            <div class="form-group ">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span><input type="number" name="harga" id="" min=0 class="form-control" required>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group" style="transform: translateX(20px);">
                                <div class="col-sm-4">
                                    <div class="form-check ">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="breakfast">
                                        <label class="form-check-label" for="exampleCheck1">Include Breakfast</label>
                                    </div>                                                            
                                </div>
                            </div>
                            
                            <label class="col-sm-2 col-sm-2 control-label">Keterangan </label>  
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <textarea name="keterangan" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>    
                            
                          
                            <div style="margin:10px;">
                                <a href="/admin/detailHotel/{{$id}}"><button class="btn btn-danger" type="button">Batal</button></a>
                                <button class="btn btn-success" type="submit">Tambahkan Kamar Hotel</button>
                                
                            </div>
                        </form>                       
                    {{-- @if(isset($edit))
                        <form class="form-horizontal style-form" method="POST" action="/admin/editHotel">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" value={{$datahotel->id}}>
                            <label class="col-sm-2 col-sm-2 control-label">Jenis Kamar</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="jeniskamar">
                                    <option value="Single Room">Single Room</option>
                                    <option value="Twin Room">Twin Room</option>
                                    <option value="Double Room">Double Room</option>
                                    <option value="Deluxe Room">Deluxe Room</option>
                                    <option value="Superior Room">Superior Room</option>
                                </select>
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
                                    <input type="text" class="form-control" name="kota" value="{{$datahotel->kota}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Negara</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="negara" value="{{$datahotel->negara}}" disabled>
                                </div>
                            </div>
                            <div style="margin:10px;">
                                <a href="listHotel"><button class="btn btn-danger" type="button">Batal</button></a>
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
                                    <input type="text" class="form-control" name="negara" value="{{old('negara')}}">
                                </div>
                            </div>
                            <div style="margin:10px;">
                                <a href="listHotel"><button class="btn btn-danger" type="button">Batal</button></a>
                                    <button class="btn btn-success" type="submit">Tambahkan Hotel</button>
                                
                            </div>
                        </form>
                    @endif --}}
                        
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
