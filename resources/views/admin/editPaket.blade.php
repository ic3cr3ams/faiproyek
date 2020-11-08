@extends('admin/MasterAdmin')
@section('body')
        <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Edit Paket</h3>
            <!--NOTES : nanti di hari apa mau di edit, itu yang di klik -->
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
            </div>
            <!-- /col-md-12 -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i>Detail Paket</h4>
                        <form class="form-horizontal style-form" method="POST" action="addPaket">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-4">
                            <span>Hari Ke- 1</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control">
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Time</label>
                                <div class="col-sm-4">
                                <input type="Time" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Dari</label>
                                <div class="col-sm-4">
                                <input type="Text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                            <div class="col-sm-4">
                                <input type="Text" class="form-control">
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Transportasi</label>
                                <div class="col-sm-4">
                                    <select class="form-control">
                                        <option>Bis</option>
                                        <option>Pesawat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Ini Muncul klo dia pilih Pesawat</label>
                                <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Pilih Pesawat</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Hotel</label>
                                <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Pilihan sesuai yang ada di database</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Catatan</label>
                                <div class="col-sm-4">
                                <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5"></textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger">Batal</button>
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- col-lg-12-->
            </div>
            <div style="padding:30px;margin-left:800px;">
                <button class="btn btn-success" type="submit">Edit Paket</button>
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
