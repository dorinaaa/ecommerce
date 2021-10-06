<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-row-gap: 50px;
  grid-template-columns: auto auto auto;
  background-color: #F7941D;
  padding: 10px;
}

.grid-item {
  background-color: grey;
  color: white;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
  margin-bottom: 25px;
}
.div-7 {
  border: 1px solid rgba(0, 0, 0, 0.8); 
  background-color: grey; 
  color: white;
  padding: 20px; 
  font-size: 30px;
  text-align: center; 
  margin-left: 10px; 
  margin-right: 10px"
}
</style>
<title>Tracking Order</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Eshop - User Profile</title>

    <link rel="icon" type="image/png" href="images/favicon.png">
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
            rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/niceselect.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/slicknav.min.css">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/solid.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/light.css') }}">
    <body>

    <header class="header shop">
      <!-- Topbar -->
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
              <!-- Top Left -->
              <div class="top-left">
                <ul class="list-main">
                  <li><i class="fa fa-phone-alt"></i> +355 69 788 9987</li>
                  <li><i class="fa fa-envelope"></i> support@kepler.com</li>
                </ul>
              </div>
              <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
              <!-- Top Right -->
              <div class="right-content">
                <ul class="list-main">
                  <li>
                    <form method="post" action="{{ route('profile')}}"> 
                    @csrf
                    <img src="images/user-icon.jpg" style="width: 25px; height:25px"/> <button type="submit" style="all: unset; cursor: pointer">Profili im</button>
                    </form>
                    </li>
                  <li>
                    @if(auth()->user())
                      <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="all: unset; cursor: pointer">Dil</button>
                      </form>
                      @else
                      <i class="fa fa-sign-in-alt"></i>
                      <a href="{{ route('login') }}">Login</a>
                    @endif
                  </li>
                </ul>
              </div>
              <!-- End Top Right -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Topbar -->
      <div class="middle-inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
             
              <div class="mobile-nav"></div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Inner -->
      <div class="header-inner">
        <div class="container">
          <div class="cat-nav-head">
            <div class="row">
              @yield('all-categories')
              <div class="col-lg-9 col-12">
                <div class="menu-area">
                  <!-- Main Menu -->
                  <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                      <div class="nav-inner">
                        <ul class="nav main-menu menu navbar-nav">
                        <li ><a href="{{ route('home') }}">Kryefaqja</a></li>
                          <li><a href="{{ route('shop-grid') }}">Produktet</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!--/ End Main Menu -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ End Header Inner -->
    </header>
    <br>
    @foreach($order_statuses as $order_status)
    
    <form method="post" action="tracking-order">
    @csrf
<div style="margin-left: 35%">
    <p><b>Statusi qe eshte ne ngjyre lejla eshte statusi qe ka aktualisht porosia.</b> </p>
<p>Kliko Refresh per te pare nese statusi ka ndryshuar!</p>
<br>
    <input type="hidden"  name="selected_order_id" id="selected_order_id" value="{{$order_status->porosi_id}}"/>
      <button type="submit" class="btn" style="color: orange; background-color: #333">Refresh </button>
    </form>
    </div>
    <br>
        <div class="grid-container">
        @if($order_status->id == 1)
        <div class="grid-item" style="background-color: purple">1. Ne pritje</div>
      @else 
        <div class="grid-item" >1. Ne pritje</div>
      @endif
      @if($order_status->id == 2)
        <div class="grid-item" style="background-color: purple">2. E kompletuar </div>
      @else
        <div class="grid-item">2. E kompletuar </div>
      @endif
      @if($order_status->id == 3)
      <div class="grid-item" style="background-color: purple">3. E refuzuar</div>
      @else
      <div class="grid-item">3. E refuzuar</div>
      @endif
      @if($order_status->id == 4)
      <div class="grid-item" style="background-color: purple">4. E faturuar</div>
      @else
      <div class="grid-item">4. E faturuar</div>
@endif
@if($order_status->id == 5)

      <div class="grid-item" style="background-color: purple">5. E paketuar</div>
@else
<div class="grid-item">5. E paketuar</div>
@endif
@if($order_status->id == 6)

      <div class="grid-item" style="background-color: purple">6. E ngarkuar</div>
@else
<div class="grid-item">6. E ngarkuar</div>
@endif

    </div>
    <div style="background-color: #F7941D">
    @if($order_status->id == 7)
    <div class="div-7" style="background-color: purple">7. Ne levizje</div>
    @else
    <div class="div-7">7. Ne levizje</div>
    @endif
    </div>
    @endforeach
</body>
    </html