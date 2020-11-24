@extends('MasterHead')
@section('body')
@php
    // dd(Session::get('login'));
@endphp
    <div class="hero-wrap js-fullheight" style="background-image: url('images/blogpage.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pesan</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
			<div id="accordion">
				<div class="row">
					<div>
					<div>
						<div class="card">
						<div class="card-header">
								  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4">Data Tamu</a>
						</div>
						<div id="menu4" >
						  <div class="card-body">
                            <form action="/daftarPeserta" method="POST">
                                @csrf
                                <div class="row"></div>
                                    {{-- <h6>Peserta 1</h6> --}}
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="namadepan" placeholder="Nama Depan" name="namadepan">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nama Belakang" name="namabelakang">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="col">
                                    <input type="number" class="form-control" id="notelp" placeholder="No.Telp" name="notelp">
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" id="nopaspor" placeholder="No.Paspor" name="nopaspor">
                                    </div>
                                </div>
							  <br/>
							  <div class="row">
								<div class="col">
									@foreach ($dataTour as $item)
										<input type="hidden" value="{{ $item->id}}" name="id_paket">
                                    @endforeach
                                    @php
                                        foreach ($dataTour as $key => $value) {
                                            $total=($item->hargajual+$item->harga_flight+$item->harga_hotel+$item->biayalain);
                                        }
                                    @endphp
                                    <input type="hidden" name="total" value={{$total}}>
									<button type="submit" class="ml-auto btn btn-success" >Save</button>
								</div>
                                    <div class="col">
                                        <a href="paket"><button type="button" class="ml-auto btn btn-danger" >Cancel</button></a>
                                    </div>
							    </div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            @if (!Session::has('login'))
            <div class="sidebar-box ftco-animate" style="background-color: bisque;">
                <h3>| Percepat Proses ?</h3>
                <div class="block-21 mb-4 d-flex">
                  <div class="text">
                    <div class="meta">
                      <div>Silahkan <a href="login" style="color: blue;">Masuk/Daftar Akun</a> untuk mempercepat pengisian data pemesanan</div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
			  <div class="sidebar-box ftco-animate" style="background-color: rgb(247, 241, 189);">
				<h2>Perincian Harga</h2>
				<div>
				  <div class="text">
					<div class="meta">
						<table class="table">
							@foreach ($dataTour as $item)
							<thead>
							  <tr>
								<th>{{ $item["nama_paket"] }}</th>
								<th>Rp</th>
								<th>{{ number_format($item->hargajual)}}</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td>Harga Tiket Pesawat</td>
								<td>Rp</td>
								<td>{{ number_format($item->harga_flight)}}</td>
							  </tr>
							  <tr>
								<td>Harga Hotel</td>
								<td>Rp</td>
								<td>{{ number_format($item->harga_hotel)}}</td>
                              </tr>
							  <tr>
								<td>Biaya Lain - lain</td>
								<td>Rp</td>
								<td>{{ number_format($item->biayalain)}}</td>
                              </tr>
                              @if (Session::has('listcust'))
                              @php
                                  $data = Session::get('listcust');
                                  $multiply = count($data);
                              @endphp
                              <tr><td>Nama Peserta :</td>
                              @foreach ($data as $items=>$value)
                              <tr>
                                    <td>{{$value['nama']}}</td>
                                </tr>
                                @endforeach
                            </tr>
                              @endif
							</tbody>
							@endforeach
						  </table>
					</div>
					<div class="sidebar-box ftco-animate">
						<h6>Total Harga</h6>
						<div>
						  <div class="text">
							<div class="meta">
                                @if (Session::has('listcust'))
                                    @php
                                    foreach ($dataTour as $key => $value) {
                                        $total=($item->hargajual+$item->harga_flight+$item->harga_hotel+$item->biayalain)*count($data);
                                        // dd($total);
                                    }
                                    @endphp
                                @else
                                    @php
                                    foreach ($dataTour as $key => $value) {
                                        $total=($item->hargajual+$item->harga_flight+$item->harga_hotel+$item->biayalain);
                                        // dd($total);
                                    }
                                    @endphp
                                @endif
                                @foreach ($dataTour as $item)
                                <h2 style="color: red;">Rp {{ number_format($total)}}</h2>
                                @endforeach
                                <form action="checout" method="POST">
                                    @csrf
                                <input type="hidden" name="totalharga" value={{$total}}>
								<button type="submit" class="btn btn-warning" name="lanjut">Selanjutnya</button>
                                </form>
                            </div>
				        </div>
				    </div>
				</div>
			  </div>
            </div>
        </div>
	  </div>
    </section> <!-- .section -->
    @php
        // dd(Session::get('login'))
    @endphp
    @endsection
