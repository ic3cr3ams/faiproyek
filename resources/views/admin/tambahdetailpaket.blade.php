@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right">Tambah Detail Paket {{$paket->nama}}</i></h3>
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
                        <form class="form-horizontal style-form" method="POST" action="/admin/tambahdetailPaket">
                            @csrf                                
                                <input type="hidden" name="idpaket" value={{$idpaket}}>
                                <label class="col-sm-2 col-sm-2 control-label">Hari ke</label>  
                                <div class="form-group ">
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" name="harike" id="" class="form-control" value="{{$harike}}" readonly>
                                        </div>
                                    </div>
                                </div> 

                                <label class="col-sm-2 col-sm-2 control-label">Hotel</label>  
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="hotel" id="hotel" required>
                                            @foreach ($datahotel as $item =>$value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>   

                            <label class="col-sm-2 col-sm-2 control-label">Jenis Kamar</label>  
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="jeniskamar" id="jeniskamar" required>
                                        {{-- <option value="Single Room">Single Room</option>
                                        <option value="Twin Room">Twin Room</option>
                                        <option value="Double Room">Double Room</option>
                                        <option value="Deluxe Room">Deluxe Room</option>
                                        <option value="Superior Room">Superior Room</option> --}}
                                    </select>
                                </div>
                            </div>      
                            

                            <label class="col-sm-2 col-sm-2 control-label">Harga Kamar</label>  
                            <div class="form-group ">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span><input type="number" name="hargakamar" id="hargakamar" min=0 class="form-control" readonly required>
                                    </div>
                                </div>
                            </div>                               
                            <label class="col-sm-2 col-sm-2 control-label">Itinerary </label>  
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <textarea name="itinerary" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>   
                            <label class="col-sm-2 col-sm-2 control-label">Biaya Lain</label>  
                            <div class="form-group ">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span><input type="number" name="biayalain" id="" min=0 class="form-control" required >
                                    </div>
                                </div>
                            </div>         
                            <div style="margin:10px;">
                                <a href="/admin/detailHotel/{{$idpaket}}"><button class="btn btn-danger" type="button">Batal</button></a>
                                <button class="btn btn-success" type="submit">Tambahkan Detail Paket</button>
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
<script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script>
    var hotelselectedid=$('#hotel').val();    
    updatejeniskamar();
    var jeniskamar="";
    console.log(hotelselectedid);
    $('#hotel').on('change',function(){
        hotelselectedid=$('#hotel').val();    
        updatejeniskamar();    
    });
    $('#jeniskamar').on('change',function(){
        jeniskamar=$('#jeniskamar').val();
        updatehargakamar();
    })
    function updatejeniskamar(){
        $.ajax({
            method:'get',
            url:'/admin/ajaxjenishotel/'+hotelselectedid,
            data: {idhotel:hotelselectedid},
            success:function(res){
                var domtoappend="";
                res.forEach(element => {
                    domtoappend+="<option value=\""+element.jenis_kamar+"\">"+element.jenis_kamar+"</option>"
                //    console.log(element.jenis_kamar);
                });
                $('#jeniskamar').html(domtoappend);
                jeniskamar=$('#jeniskamar').val();
                updatehargakamar()
            }
        })	
    }
    function updatehargakamar(){
        console.log(jeniskamar);
        $.ajax({
            method:'get',
            url:'/admin/ajaxhargakamar/',     
            data: {idhotel:hotelselectedid,namajenis:jeniskamar},
            success:function(res){                
                $('#hargakamar').val(res.harga);
            }
        })	
    }
 
 </script>
  @endsection
  
