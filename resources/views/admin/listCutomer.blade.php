@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>List Customer</h3>
        <div class="row">
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
        <div style="margin-left: 600px;">
          <div class="form-group">
              <div>
                  <div class="input-group">
                      <input type="text" name="kapasitas"class="form-control" required><span class="input-group-addon">Search</span>
                  </div>
              </div>
          </div> 
        </div>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Nama Customer</th>
                    <th>Paket</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    </td>
                    <td class="hidden-phone">Lorem Ipsum dolor</td>
                    <td>
                    </td>
                    <td>12000.00$ </td>
                    <td style="background-color: rgb(255, 136, 136);color:black;">Pending</td>
                    <td>
                      <button class="btn btn-warning btn-xs"><a href="detailCustomer">Lihat detail</a></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
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
