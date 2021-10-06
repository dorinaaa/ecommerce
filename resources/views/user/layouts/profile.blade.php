<!DOCTYPE html>

<head>
  <title>Profili</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='copyright' content=''>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Eshop | Kepler - Profili</title>

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

  <script type="text/javascript">
    function getOrderColor(var color) {
      return 'background-color:'.color;
    }
  </script>


</head>

<body class="js">
  <!-- Header -->
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
                  <form method="post" action="{{ route('profile') }}">
                    @csrf
                    <i class="fa fa-user"></i> <button type="submit" style="all: unset; cursor: pointer">Profili
                      im</button>
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
                    <a href="{{ route('login') }}">Hyr / Regjistrohu</a>
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
                        <li><a href="{{ route('home') }}">Kryefaqja</a></li>
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
  <div class="app-title">
    <div>
      <a href="#" onClick="onUserProfileDataClicked()">
        <h4 style="text-align: center"> <i class="fa fa-user"></i>
          Te dhenat e mia </h4>
      </a>

      <div style="display: none; text-align: center;" id="user_data">
        <br>
        <div>
          <label>Emri: <b>{{ Auth::user()->first_name }}</b></label><br>
        </div>
        <div>
          <label>Mbiemri:<b> {{ Auth::user()->last_name }}</b><label><br>
        </div>
        <div>
          <label>Email:<b> {{ Auth::user()->email }}</b><label><br>
        </div>
        <div>
          <label>Numri i telefonit: <b>{{ Auth::user()->phone }}</b><label><br>
        </div>
        <div>
        </div>
      </div>
      <br>
      <hr style="height: 2px; background-color: orange;">
      <br>
      <p style="text-align: center; font-size: 20px"><b>Historiku i porosive</b></p><br>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #333; color: white">
                    <th> Produkti </th>
                    <th> Kategoria </th>
                    <th> Data e porosise </th>
                    <th> Adresa </th>
                    <th> Sasia </th>
                    <th> Cmimi total </th>
                    <th> Veprimet </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                    <form method="post" action="tracking-order">
                      @csrf
                      <tr>
                        <td class="text-center">
                          {{ $order->produkt }}
                        </td>
                        <td class="text-center">
                          {{ $order->kategori }}
                        </td>
                        <td class="text-center">
                          {{ $order->porosi_date }}
                        </td>
                        <td class="text-center">
                          {{ $order->street.", ".$order->city.", ".$order->state }}
                        </td>
                        <td class="text-center">
                          {{ $order->sasi }}
                        </td>
                        <td class="text-center">
                          {{ $order->cmim_total }}
                        </td>
                        <td class="text-center">
                          <input type="hidden" name="selected_order_id" id="selected_order_id"
                            value={{ $order->porosi_id }} />
                          <button class="btn" href="{{ route('tracking-order') }}"
                            style="color: orange; background-color: #333">Gjurmo porosine</a>
                        </td>
                      </tr>
                    </form>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/jquery-migrate-3.0.0.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/colors.js"></script>
      <script src="js/slicknav.min.js"></script>
      <script src="js/owl-carousel.js"></script>
      <script src="js/magnific-popup.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/finalcountdown.min.js"></script>
      <script src="js/nicesellect.js"></script>
      <script src="js/flex-slider.js"></script>
      <script src="js/scrollup.js"></script>
      <script src="js/onepage-nav.min.js"></script>
      <script src="js/easing.js"></script>
      <script src="js/active.js"></script>
      <script src="https://kit.fontawesome.com/1ba5dfffd1.js" crossorigin="anonymous"></script>
      <script type="text/javascript"
        src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
      <script type="text/javascript">
        $('#sampleTable').DataTable();
      </script>


      <script>
        function onUserProfileDataClicked() {

          if (document.getElementById("user_data").style.display == "none") {

            document.getElementById("user_data").style.display = "block";
          } else {
            document.getElementById("user_data").style.display = "none";
          }
        }
      </script>

</body>

</html>