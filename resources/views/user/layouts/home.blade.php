@extends('user.layouts.app')

@section('all-categories')

<categories></categories>

@endsection

@section('single-slider')

<section class="hero-slider">
  <div class="single-slider">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-9 offset-lg-3 col-12">
          <div class="text-inner">
            <div class="row">
              <div class="col-lg-7 col-12">
                <div class="hero-text">
                  <h1><span>ULJE DERI NE 50% </span>LAPTOP</h1>
                  <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy
                    maboriosm.</p>
                  <div class="button">
                    <a href="{{ route('shop-grid') }}" class="btn">Bli Tani!</a>
                  </div>
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

@section('single-banner')

<section class="small-banner section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-banner">
          <img src="./images/gray.png" alt="#">
          <div class="content">
            <p>Teknologji</p>
            <h3>Ipad Pro</h3>
            <a href="{{ route('shop-grid') }}">Shiko me shume</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="single-banner">
          <img src="./images/gray.png" alt="#">
          <div class="content">
            <p>Teknologji</p>
            <h3>SAMSUNG S7</h3>
            <a href="{{ route('shop-grid') }}">Shiko me shume</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="single-banner tab-height">
          <img src="./images/gray.png" alt="#">
          <div class="content">
            <p>Teknologji</p>
            <h3>Iphone 11 Pro</h3>
            <a href="{{ route('shop-grid') }}">Shiko me shume</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


@section('product-area')

<div class="product-area section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Produktet Trend</h2>
        </div>
      </div>
    </div>
    <trending-products user="{{ Auth::user() }}"></trending-products>
  </div>
</div>

@endsection


@section('medium-banner')
<!-- No medium banner -->
@endsection

@section('popular-products')

<hot-products user="{{ Auth::user() }}"></hot-products>

@endsection



@section('bottom-section')

<section class="shop-services section home">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-12">
        <div class="single-service">
          <i class="fa fa-rocket"></i>
          <h4>Free shiping</h4>
          <p>Porosi mbi 10,000 ALL</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="single-service">
          <i class="fa fa-sync"></i>
          <h4>Free Return</h4>
          <p>Kthim brenda 30 diteve</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="single-service">
          <i class="fa fa-lock"></i>
          <h4>Sucure Payment</h4>
          <p>100% pagesa te sigurta</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12">
        <div class="single-service">
          <i class="fa fa-tag"></i>
          <h4>Best Price</h4>
          <p>Cmim te garantuar</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection