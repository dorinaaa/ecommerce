@extends('user.layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('breadcrumbs')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="{{ route('home') }}">Kryefaqja<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('main-content')

<checkout user="{{ Auth::user() }}" login-route="{{ route('show.login') }}"></checkout>

@endsection
