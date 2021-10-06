@extends('user.layouts.app')

@section('breadcrumbs')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="{{ route('home') }}">Kryefaqja<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="{{ route('cart') }}">Shporta</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('main-content')

<cart-view home-route="{{ route('home') }}" checkout-route="{{ route('checkout') }}"
  login-route="{{ route('show.login') }}" user="{{ Auth::user() }}">
</cart-view>

@endsection