@extends('MasterHead')
@section('body')
    <div class="hero-wrap js-fullheight" style="background-image: url('images/blogpage.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Articles</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog.jpg');">
              </a>
              <div class="text p-4 d-block">
                <span class="tag">Ziarah Zaman Dahulu</span>
                <h3 class="heading mt-3">Mengenal dan Memahami apa itu perjalanan Ziarah dan maknanya</h3>
                <div class="meta mb-3">
                <div><a href="#">5 Oktober 2020</a></div>
                <div><a href="#">Admin</a></div>
                <button type="submit" class="btn btn-info"><a href="single-blog">Read More...</a></button>
                </div>
              </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog2.jpg');">
              </a>
              <div class="text p-4">
                <span class="tag">Peta Penemuan Ladang Gas di Laut Mediterania Timur</span>
                <h3 class="heading mt-3">Tanah Perjanjian yang berlimpah susu dan madunya serta lautnya yang berlimpah gas alam...</h3>
                <div class="meta mb-3">
                <div><a href="#">17 Oktober 2020</a></div>
                <div><a href="#">Admin</a></div>
                <button type="submit" class="btn btn-info"><a href="single-blog2">Read More...</a></button>
                </div>
              </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog3.jpg');">
              </a>
              <div class="text p-4">
                <span class="tag">Keluaran 20:13</span>
                <h3 class="heading mt-3">Kesakralan Pernikahan dalam Perintah Ketujuh Hukum Tuhan</h3>
                <div class="meta mb-3">
                <div><a href="#">21 Oktober 2020</a></div>
                <div><a href="#">Admin</a></div>
                <button type="submit" class="btn btn-info"><a href="single-blog3">Read More...</a></button>
                </div>
              </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog4.jpg');">
              </a>
              <div class="text p-4">
                <span class="tag">Mazmur 119:67, 1Korintus 10:13, Kolose 2:7</span>
                <h3 class="heading mt-3"><a href="#">Bagaikan Pohon Kurma</a></h3>
                <div class="meta mb-3">
                <div><a href="#">10 November 2020</a></div>
                <div><a href="#">Admin</a></div>
                <button type="submit" class="btn btn-info"><a href="single-blog4">Read More...</a></button>
                </div>
              </div>
              </div>
            </div>
            </div>
        </div>
      </div>
    </section>
@endsection
