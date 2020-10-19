@extends('MasterHead')
@section('body')

    <div class="hero-wrap js-fullheight" style="background-image: url('images/blogpage.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Checkout</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Pilih Metode Pembayaran</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                    <div class="form-group">
                        <p>No Transaksi : tr0013456789</p>
                        <label>Pilih metode pembayaran</label>
                        <select class="form-control" style="width: 470px;">
                            <option value="1">Transfer Back BCA</option>
                            <option value="2">Transfer Back BRI</option>
                            <option value="3">Transfer Bank Mandiri</option>
                        </select>
                        <br/>
                        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Pilih</button>
                        <div id="demo" class="collapse">
                            Transfer Bank BCA
                            <hr>
                            Virtual Account : 
                            <br/>
                            80777081212771999
                            <br/>
                            <ul>
                                <li>Periksa kembali data pembayaran Anda sebelum melanjutkan transaski.</li>
                                <li>Anda akan mendapatkan kode pembayaran BCA Virtual Account yang akan digunakan untuk membayar transaksi ini di berbagai channel pembayaran BCA</li>
                            </ul>
                        </div>
                    </div>
                </div>
  
  
                <div class="form-group">

                  <div class="collapse" id="ship_different_address">
                    <div class="py-2">
  
                      <div class="form-group">
                        <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                        <select id="c_diff_country" class="form-control">
                          <option value="1">Select a country</option>    
                          <option value="2">bangladesh</option>    
                          <option value="3">Algeria</option>    
                          <option value="4">Afghanistan</option>    
                          <option value="5">Ghana</option>    
                          <option value="6">Albania</option>    
                          <option value="7">Bahrain</option>    
                          <option value="8">Colombia</option>    
                          <option value="9">Dominican Republic</option>    
                        </select>
                      </div>
  
  
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_diff_companyname" class="text-black">Company Name </label>
                          <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
                        </div>
                      </div>
  
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                      </div>
  
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                        </div>
                      </div>
  
                      <div class="form-group row mb-5">
                        <div class="col-md-6">
                          <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
  
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Upload Bukti Pembayaran</h2>
                  <div class="p-3 p-lg-5 border">
                    <div class="input-group w-75">
                        <button class="btn btn-info">Upload Foto</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section> <!-- .section -->
    @endsection
