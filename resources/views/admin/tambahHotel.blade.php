@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Tambah Hotel</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST" action="addPaket">
                @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Hotel</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat Hotel</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Kamar</label>
                    <div class="col-sm-4">
                        <select class="form-control">
                            <option>Standard Room</option>
                            <option>Superior Room</option>
                            <option>Deluxe Room</option>
                          </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                    <div class="col-sm-4">
                      <input type="Number" class="form-control">
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <div style="margin:10px;">
        <button class="btn btn-danger" type="submit">Batal</button>
          <button class="btn btn-success" type="submit">Tambahkan Hotel</button>
        </div>
          </div>
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
