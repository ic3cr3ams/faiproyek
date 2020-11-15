@extends('admin/MasterAdmin')
@section('body')
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Paket Tour</h3>
        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <h4 class=ml-2>Detail Paket</h2>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>Hotel</th>
                                <th>Harga Hotel</th>
                                {{-- <th>Jenis Kamar</th> --}}
                                <th>Flight</th>
                                <th>Harga Flight</th>
                                <th>Biaya Lain</th>
                                <th>Ambil Keuntungan</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapaket as $item)
                               <tr>
                                    @foreach ($datahotel as $items)
                                        @if($item->hotel==$items->id)
                                            <td>{{$items->name}}</td>
                                            <td>{{$items->harga}}</td>
                                        @endif
                                    @endforeach    
                                    @foreach ($dataflight as $items)
                                        @if($item->flight==$items->id)
                                            @foreach ($datamaskapai as $itemss)
                                                @if($items->maskapai==$itemss->id)
                                                    <td>{{$itemss->nama."[".$items->kode_bandara_asal."]-[".$items->kode_bandara_tujuan."]"}}</td>
                                                @endif
                                            @endforeach
                                            
                                            <td>{{$items->harga}}</td>
                                        @endif
                                    @endforeach    
                                    <td>Rp.{{number_format($item->biayalain)}}</td>
                                    <td>{{$item->keuntungan}}%</td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table><br><br><br>  
                    <h4 class=ml-2>Itenerary</h2>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>Hari Ke</th>
                                <th>Itenerary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataitenerary as $item)
                                <tr>
                                    <td>{{$item->hari}}</td>
                                    <td>{{$item->itenerary}}</td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>

                </div>     
                         
                <!-- /content-panel -->
            </div>
        </div>
        <!-- /row -->
    </section>
</section>

  <!--script for this page-->



  @endsection
