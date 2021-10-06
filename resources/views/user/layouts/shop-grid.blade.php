@extends('user.layouts.app')

@section('breadcrumbs')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="{{ route('home') }}">Kryefaqja<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="{{ route('shop-grid') }}">Produktet</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('main-content')

<section class="product-area shop-sidebar shop section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-12">
        <filters></filters>
      </div>
      <div class="col-lg-9 col-md-8 col-12">
        <!-- <div class="row">
          <div class="col-12">
            <div class="shop-top">
              <div class="shop-shorter">
                <div class="single-shorter">
                  <label>Show :</label>
                  <select>
                    <option selected="selected">09</option>
                    <option>15</option>
                    <option>25</option>
                    <option>30</option>
                  </select>
                </div>
                <div class="single-shorter">
                  <label>Sort By :</label>
                  <select>
                    <option selected="selected">Name</option>
                    <option>Price</option>
                    <option>Size</option>
                  </select>
                </div>
              </div>
              <ul class="view-mode">
                <li class="active"><a href="{{ route('shop-grid') }}"><i class="fa fa-th-large"></i></a></li>
                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
              </ul>
            </div>
          </div>
        </div> -->
        <product-list user="{{ Auth::user() }}"></product-list>
      </div>
    </div>
  </div>
</section>

@endsection