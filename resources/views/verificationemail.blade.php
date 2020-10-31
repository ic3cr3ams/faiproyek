@extends('MasterHead')
@section('body')
<style>
    #card {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: fit-content;
        margin: 6rem auto 8.1rem auto;
        width: 529px;

    }
    #card-content {
      padding: 12px 44px;
    }
    #card-title {
      font-family: "Raleway Thin", sans-serif;
      letter-spacing: 4px;
      padding-bottom: 23px;
      padding-top: 13px;
      text-align: center;
    }
    .underline-title {
      background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
      height: 2px;
      margin: -1.1rem auto 0 auto;
      width: 200px;
    }
    a {
    text-decoration: none;
    }
    label {
        font-family: "Raleway", sans-serif;
        font-size: 11pt;
    }
    #forgot-pass {
        color: #2dbd6e;
        font-family: "Raleway", sans-serif;
        font-size: 10pt;
        margin-top: 3px;
        text-align: right;
    }
    .form {
        align-items: left;
        display: flex;
        flex-direction: column;
    }
    .form-border {
        background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
        height: 1px;
        width: 100%;
    }
    .form-content {
        background: #fbfbfb;
        border: none;
        outline: none;
        padding-top: 14px;
    }
    #signup {
    color: #2dbd6e;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 16px;
    text-align: center;
    }
    #submit-btn {
        background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
        border: none;
        border-radius: 21px;
        box-shadow: 0px 1px 8px #24c64f;
        cursor: pointer;
        color: white;
        font-family: "Raleway SemiBold", sans-serif;
        height: 42.3px;
        margin: 0 auto;
        margin-top: 50px;
        transition: 0.25s;
        width: 153px;
    }
    #submit-btn:hover {
        box-shadow: 0px 1px 18px #24c64f;
    }
</style>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/login.jpg');">
        <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Home</a></span> <span>Login</span></p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Register</h1>
                    </div>
              </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div id="card">
            <div id="card-content">
                <div id="card-title">
                    <h2>Verification</h2>
                    <div class="underline-title"></div>
                </div>
                <center><p>Input Verification Code For Email <strong>{{$email}}</strong></p></center>
                @include('alert')
                <form method="post" class="form" action="verifcode">
                    @csrf
                <label for="vercode" style="padding-top:13px">Verification Code</label>
                <input id="vercode" class="form-content" type="text" name="vercode" autocomplete="on" value="{{old('vercode')}}" required  >
                <div class="form-border"></div>
                                
                <input id="submit-btn" type="submit" name="submit" value="Submit"><br>
                <div class="row justify-content-center">Didn't receive a verification code? <a href="resendregcode">&nbsp;Resend Code</a></div>
                
                </form>
              </div>
        </div>
    </section> <!-- .section -->
@endsection
