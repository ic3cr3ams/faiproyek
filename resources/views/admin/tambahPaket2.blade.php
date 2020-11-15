@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Tambah Paket</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                    <form class="form-horizontal style-form" method="POST" action="addPaket" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Asal Negara</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="asalnegara" id="asalnegara" required>
                                    @foreach ($datanegara as $item=>$values)
                                        <option value="{{$values->id}}">{{$values->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tujuan Negara</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="tujuannegara" id="tujuannegara" required>
                                    @foreach ($datanegara as $item=>$values)
                                        <option value="{{$values->id}}">{{$values->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label col-md-2">Tanggal Tour</label>
                            <div class="col-md-4">
                            <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control dpd1" name="from">
                                <span class="input-group-addon">To</span>
                                <input type="text" class="form-control dpd2" name="to">
                            </div>
                            <span class="help-block">Select date range</span>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Durasi Perjalanan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input class="form-control" type="number" min=1 name=durasi id=durasi required value=1>
                                    <div class="input-group-append"><span class="input-group-text">Hari</span></div>                                    
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
                            <label class="col-sm-2 col-sm-2 control-label">Pilih Penerbangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="flight" id="flight" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row ml-2">
                            <div class="form-group col-3">
                                <label class="">Asal Bandara</label>
                                <input type="text" class="form-control" name="asalbandara" id=asalbandara readonly >
                            </div>
                            <div class="form-group col-3">
                                <label class="">Tujuan Bandara</label>
                                <input type="text" class="form-control" name="tujuanbandara" id=tujuanbandara readonly>
                            </div>
                            <div class="form-group col-2">
                                <label class="col-sm-2 col-sm-2 control-label">Durasi</label>                                
                                <div class="input-group">
                                    <input type="text" class="form-control" name="durasiflight" id="durasiflight" readonly>
                                    <div class="input-group-append"><span class="input-group-text">Jam</span></div>
                                </div>                               
                            </div>
                            <div class="form-group col-3">
                                <label class="col-sm-2 col-sm-2 control-label">Harga</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                    <input type="text" class="form-control" name="hargaflight" id="hargaflight" readonly>
                                    
                                </div>                               
                            </div>
                        </div>
                        <div class="form-row ml-2">
                            <div class="form-group col-6">
                                <label >Pilih Hotel</label>
                                <select class="form-control" name="hotel" id="hotel" required>
                                    
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label class="col-sm-2 col-sm-2 control-label">Harga</label>                                
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                    <input type="text" class="form-control" name="hargahotel" id="hargahotel" readonly required>                                    
                                </div>                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Biaya Lain Lain</label>  
                            <div class="col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                    <input type="number" class="form-control" name="biayalain" id="biayalain" min=0 step=1000 required>                                    
                                </div>                               
                            </div>                                                          
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Deskripsi Paket</label>
                            <div class="col-sm-4">
                                <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Ambil Keuntungan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input class="form-control" type="number" min=0 name=keuntungan value="" required>
                                    <div class="input-group-append"><span class="input-group-text">%</span></div>
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
                                        <input type="file" class="default" name="gambar" accept="image/*" required/>
                                        </span>
                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                    <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                </div>
                            </div>
                        </div> 
                        <div id=itenerary>

                        </div>
                        <div style="padding:30px;margin-left:800px;">
                            <button class="btn btn-success" type="submit">Tambahkan Paket</button>
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
    <script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        var durasi=$('#durasi').val();
        var domtoappend="";       
        for (let i = 0; i < durasi; i++) {
            var domtoappend=domtoappend+`<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Itenerary hari ke ${i+1} </label>
                        <div class="col-sm-4">
                            <textarea name="itenerary${i+1}" class="form-control"></textarea>
                        </div>
                    </div>`;          
            
        }
        $('#itenerary').html(domtoappend);
        $('#durasi').on('change',function(){
            var durasi=$('#durasi').val();
            console.log(durasi);            
            for (let i = 0; i < durasi; i++) {
                var domtoappend=domtoappend+`<div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Itenerary hari ke ${i+1} </label>
                            <div class="col-sm-4">
                                <textarea name="itenerary${i+1}" class="form-control" required></textarea>
                            </div>
                        </div>`;          
                
            }
            $('#itenerary').html(domtoappend);
        });
    
        var negaraasalid=$('#asalnegara').val();
        var negaratujuanid=$('#tujuannegara').val();
        updatehotel();
        updatepenerbangan();
        var domflight="";
        $('#tujuannegara').on('change',function(){
            negaratujuanid=$('#tujuannegara').val();
            updatepenerbangan();
            updatehotel();
 
        });
        $('#asalnegara').on('change',function(){
            negaraasalid=$('#asalnegara').val();
            updatepenerbangan();
        });
        function updatepenerbangan(){                        
            $.ajax({
                method:'get',
                url:'/admin/ajaxpenerbangan/'+negaraasalid+'/'+negaratujuanid,
                // data: {idnegaraasal:negaraasalid,idnegaratujuan:negaratujuanid},
                success:function(res){                    
                    domflight="";
                    var x=typeof res;
                    if(x!="string"){
                        res.forEach(element => {
                            domflight+="<option value=\""+element.id+"\">" +element.nama_maskapai+ "["+element.kode_bandara_asal+"] - ["+element.kode_bandara_tujuan+"]</option>";
                        });
                        $('#flight').html(domflight);
                    }
                    else{
                        domflight+="<option value=none><strong>Tidak ada Data</strong></option>";
                        $('#flight').html(domflight);
                    }
                    updatedataflight();
                }                
            });
        }
        $('#flight').on('change',function(){
            updatedataflight();
        });
        function updatedataflight(){
            if($('#flight').val()!="none")
            $.ajax({
                method:'get',
                url:'/admin/ajaxdataflight/'+$('#flight').val(),
                success:function(res){                                                           
                   res.forEach(element => {
                       $('#asalbandara').val(element.bandara_asal);
                       $('#tujuanbandara').val(element.bandara_tujuan);
                       $('#durasiflight').val(element.durasi);
                       $('#hargaflight').val(element.harga);
                   });
                }                
            });
        }
        var domhotel="";
        function updatehotel(){                        
            $.ajax({
                method:'get',
                url:'/admin/ajaxhotel/'+negaratujuanid,
                data: {hotel:'hotel'},
                success:function(res){                    
                    domhotel="";
                    var x=typeof res;
                    if(x!="string"){
                        res.forEach(element => {
                            domhotel+="<option value=\""+element.id+"\">"+element.name+"</option>";
                        });
                        $('#hotel').html(domhotel);
                        updatedatahotel();
                    }
                    else{
                        domhotel+="<option value=none><strong>Tidak ada Data</strong></option>";
                        $('#hotel').html(domhotel);
                    }
                    // updatedatahotel();
                }                
            });
        }
        function updatedatahotel(){
            if($('#hotel').val()!="none")
            $.ajax({
                method:'get',
                url:'/admin/ajaxdatahotel/'+$('#hotel').val(),
                success:function(res){                                                           
                   res.forEach(element => {
                       $('#hargahotel').val(element.harga);
                   });
                }                
            });
        }
        $('#hotel').on('change',function(){
            updatedatahotel();
        });

    </script>


  @endsection
