@extends('MasterHead')
@section('body')
    <div class="hero-wrap js-fullheight" style="background-image: url('images/tour.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Paket Tour</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">Find Package</h3>
        			<form action="#">
        				<div class="fields">
		              <div class="form-group">
		                <input type="text" class="form-control" placeholder="Nama Paket">
		              </div>
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="" id="" class="form-control" placeholder="Keyword search">
	                      <option value="">Select Location</option>
	                      <option value="">Lourder</option>
	                      <option value="">Petra</option>
	                      <option value="">Israel</option>
	                      <option value="">Egypt</option>
	                    </select>
	                  </div>
		              </div>
		              <div class="form-group">
		                <input type="text" id="checkin_date" class="form-control" placeholder="Bulan Berangkat">
		              </div>
		              <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
		              </div>
		            </div>
	            </form>
        		</div>
          </div>
          <div class="col-lg-9">
          	<div class="row">
				@foreach ($dataTour as $tour)
          		<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">{{ $tour["nama"] }}</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">Rp.2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>{{ $tour["durasi"] }} Hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> {{ $tour["kota"] }}</span>
		    							<span class="ml-auto" id="{{ $tour["id"] }}"><a href="detailpaket">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
						</div>
						@endforeach
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">

		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Jerussalem Blessing Holyland Petra</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">$2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>10 hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> Petra Jordan</span>
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
						<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">

		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Jerussalem Blessing Holyland Petra</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">$2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>10 hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> Petra Jordan</span>
		    							<span class="ml-auto"><a href="detailpaket">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
						<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">

		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Jerussalem Blessing Holyland Petra</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">$2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>10 hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> Petra Jordan</span>
		    							<span class="ml-auto"><a href="detailpaket">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">

		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Jerussalem Blessing Holyland Petra</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">$2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>10 hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> Petra Jordan</span>
		    							<span class="ml-auto"><a href="detailpaket">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/paket.jpg);">

		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Jerussalem Blessing Holyland Petra</a></h3>
			    						</div>
			    						<div class="two">
			    							<span class="price">$2.575</span>
		    							</div>
		    						</div>
		    						<p>Tanggal Keberangkatan : 10 Mei 2021 - 21 Mei 2021</p>
		    						<p class="days"><span>10 hari</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> Petra Jordan</span>
		    							<span class="ml-auto"><a href="detailpaket">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
@endsection
