@extends('MasterHead')
@section('body')
    <div class="hero-wrap js-fullheight" style="background-image: url('images/about1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-md-6 ftco-animate img about-image" style="background-image: url(images/about2.jpg);">
	    		</div>
	    		<div class="col-md-6 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">About Us</a>

		              <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

		              <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">

		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
		              	<div>
			                <h2 class="mb-4">Pack & Go Travel</h2>
			              	<p>Pack & Go adalah pelopos ziarah wisata rohani yang sudah berdiri sejak September 2019 dan tetap konsisten hingga sekarang.Kami hadir secara profesional untuk memenuhi kebutuhan wisata rohani bagi Anda dan keluarga. Harga yang terjangkau serta mengumumkan service yang memuaskan.</p>
			                <p>Penawaran paket wisata rohani terbaru dengan memberikan potongan harga menarik. Perjalanan nyaman Anda akan selali ditemani Tour Leader berpengalaman dan Romo Pembimbing Rohani</p>
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
		                <div>
			                <h2 class="mb-4">mission</h2>
			              	<p>Menjadi tempat terbaik dalam penyedia jasa Holyland Tour.</p>
							<p>Selalu mengutamakan kepuasan pelanggan dengan cara memberikan pelayanan terbaik dan selalu mengupdate program tour yang kami punya.</p>
							<p>Menjadi perusahaan Tour & Travel yang paling menguntungkan, dengan cara mencapai keuntungan yang adil dan wajar untuk memastikan kesejahteraan perusahaan dan untuk menawarkan manfaat jangka panjang kepada pelanggan kami, karyawan kami dan juga kepada para pemegang saham</p>
			         	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
		                <div>
			                <h2 class="mb-4">Goals</h2>
			              	<p>Pack & Go memuaskan kerinduan Anda akan Allah</p>
				            </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
@endsection
