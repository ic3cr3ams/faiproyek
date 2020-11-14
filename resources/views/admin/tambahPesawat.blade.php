@extends('admin/MasterAdmin')
@section('body')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Tambah Pesawat</h3>     
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>           
            @endif      
            <div class="row mt">
                <form class="form-horizontal style-form" method="POST" action="/admin/addPesawat">
                    @csrf
                    <div class="col-lg-12">
                        <div class="form-panel">
                                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Maskapai</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="maskapai" id="maksapai" required>
                                        @foreach ($datamaskapai as $item=>$values)
                                            <option value="{{$values->id}}">{{$values->nama}}</option>
                                        @endforeach
                                    </select>
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
                                <label class="col-sm-2 col-sm-2 control-label">Bandara Asal :</label>
                                <div class="col-sm-4">
                                    <select class="form-control"  name="asalbandara" id="asalbandara" required>
                                        
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
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Bandara Tujuan :</label>
                                <div class="col-sm-4">
                                    <select class="form-control"  name="tujuanbandara" id="tujuanbandara" required>
                                        
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam Keberangkatan</label>
                                <div class="col-sm-4">
                                <input type="Time" class="form-control">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="Number" class="form-control" name='harga' min=0 step="1000" value="{{old("harga")}}">
                                    </div>
                                    
                                </div>
                            </div>                       
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Durasi</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="Number" class="form-control" name='durasi' min=1 value="{{old("durasi")}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Jam
                                        </div>
                                    </div>
                                
                                </div>
                            </div>                       
                        </div>
                    </div>
                    <div style="margin-left:800px;">
                        <a href="/admin/listPesawat"><button class="btn btn-danger" type="button">Batal</button></a>
                        <button class="btn btn-success" type="submit">Tambahkan Pesawat</button>
                    </div>
                </form>
            </div>
            {{-- <div style="margin:10px;">
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Transit?</button>
                <div id="demo" class="collapse">
                    <form>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tempat Transit</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Juanda</option>
                                    <option>Soekarno-Hatta</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Lama Transit</label>
                            <div class="col-sm-4">
                            <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Waktu Berangkat</label>
                            <div class="col-sm-4">
                            <input type="time" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </section>
    </section>
    <script src="{{asset('asset/admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        var negaraasalid=$('#asalnegara').val();
        updatenegaraasal();
        $('#asalnegara').on('change',function(){
            negaraasalid=$('#asalnegara').val();
            console.log(negaraasalid);
            updatenegaraasal();
 
        });
        function updatenegaraasal(){
            $.ajax({
                method:'get',
                url:'/admin/ajaxnegaraasal/'+negaraasalid,
                data: {idnegara:negaraasalid},
                success:function(res){
                    var domtoappend="";
                res.forEach(element => {
                    console.log('tst');
                    domtoappend+="<option value=\""+element.code+"\">"+element.name+"</option>";
                });
                $('#asalbandara').html(domtoappend);
                }
            });
        }
        var negaratujuanid=$('#tujuannegara').val();
        updatenegaratujuan();
        $('#tujuannegara').on('change',function(){
            negaratujuanid=$('#tujuannegara').val();
            console.log(negaratujuanid);
            updatenegaratujuan();
 
        });
        function updatenegaratujuan(){
            $.ajax({
                method:'get',
                url:'/admin/ajaxnegaratujuan/'+negaratujuanid,
                data: {idnegara:negaratujuanid},
                success:function(res){
                    var domtoappend="";
                    res.forEach(element => {
                        console.log('tst');
                        domtoappend+="<option value=\""+element.code+"\">"+element.name+"</option>";
                    });
                    $('#tujuanbandara').html(domtoappend);
                }
            });
        }
    </script>
@endsection
