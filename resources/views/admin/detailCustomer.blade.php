@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Detail Customer</h3>
        <div class="row">
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Nama Customer</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>No.Paspor</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td>Nama Paket</td>
                    <td class="hidden-phone">Lorem Ipsum dolor</td>
                    <td>12000.00$ </td>
                    <td>12000.00$ </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <div>
            <button class="btn btn-info"><a href="listCutomer">Kembali</a></button>
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
