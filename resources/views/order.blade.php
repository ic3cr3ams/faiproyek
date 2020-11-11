@extends('MasterHead')
@section('body')

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
								  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4">Data Tamu<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						</div>
						<div id="menu4" class="collapse">
						  <div class="card-body">
								  <form action="daftarPeserta" method="POST">
									  @csrf
									  <div class="row"></div>
										  <h6>Peserta 1</h6>
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
									  <div class="row"></div>
										  <h6>Peserta 2</h6>
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
									  <div class="row"></div>
									  <h6>Peserta 3</h6>
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
								  <div class="row"></div>
								  <h6>Peserta 4</h6>
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
			  <div class="sidebar-box ftco-animate" style="background-color: rgb(247, 241, 189);">
				<h2>Perincian Harga</h2>
				<div>
				  <div class="text">
					<div class="meta">
						<table class="table">
							<thead>
							  <tr>
								<th>Jerusalem Blessing Holyland Petra</th>
								<th>USD</th>
								<th>$2.625</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td>Airport Tax & Fuel</td>
								<td>USD</td>
								<td>$0.00</td>
							  </tr>
							  <tr>
								<td>Singgle Supplement</td>
								<td>USD</td>
								<td>$250</td>
							  </tr>
							  <tr>
								<td>Travel Asurance</td>
								<td>USD</td>
								<td>$50</td>
							  </tr>
							</tbody>
						  </table>
					</div>
					<div class="sidebar-box ftco-animate">
						<h6>Total Harga</h6>
						<div>
						  <div class="text">
							<div class="meta">
								<h2 style="color: red;">USD 2.925</h2>
								<button type="submit" class="btn btn-warning" name="lanjut"><a href="checout">Selanjutnya ></a></button>
							</div>
				  </div>
				</div>
				</div>
			  </div>
            </div>
        </div>
      </div>
    </section> <!-- .section -->
    @endsection
