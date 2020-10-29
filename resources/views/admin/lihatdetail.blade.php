@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Detail Paket</h3>
          <div class="col-md-12 mt">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Hari Ke-</th>
                    <th>Tanggal</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>Transportasi</th>
                    <th>Catatan</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div style="padding: 10px;">
                <button type="submit" class="btn btn-info"><a href="paket"><i class=" fa fa-arrow-circle-left"></i> Kembali</a></button>
            </div>
          </div>
          <!-- /col-md-12 -->
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
