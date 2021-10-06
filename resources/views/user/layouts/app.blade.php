<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='copyright' content=''>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Eshop - Kepler</title>
  <script
    src="https://www.paypal.com/sdk/js?client-id=AWXc5pYLLMM4AGXQKWfHzURQFySm15MFb8uEHhv8bM7Qd_RXAMUKw6s2uY4U5w6ta5lW4LnUrueVbrce">
  </script>

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


</head>

<body class="js">
  <div id="app">
    <!-- Preloader -->
    <!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
    <!-- End Preloader -->

    <header class="header shop">
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
              <div class="top-left">
                <ul class="list-main">
                  <li><i class="fa fa-phone-alt"></i> +355 69 766 8890</li>
                  <li><i class="fa fa-envelope"></i> kepler@eshop.com</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12">
              <div class="right-content">
                <ul class="list-main">
                  <li>
                    @if(auth()->user())
                      <form method="post" action="{{ route('profile') }}">
                        @csrf
                        <i class="fa fa-user"></i> <button type="submit" style="all: unset; cursor: pointer">Profili
                          Im</button>
                      </form>
                  </li>
                  @endif
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
            </div>
          </div>
        </div>
      </div>

      <div class="middle-inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
              <div class="logo">
                <a href="{{ route('home') }}"><img src="images/logo.png" alt="logo"></a>
              </div>
              <div class="search-top">
                <div class="top-search"><a href="#0"><i class="fa fa-search"></i></a></div>
                <div class="search-top">
                  <form class="search-form">
                    <input type="text" placeholder="Search here..." name="search">
                    <button value="search" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>

              </div>

              <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
              <div class="search-bar-top">
                <div class="search-bar">
                  <select>
                    <option selected="selected">Te gjitha</option>
                    <option>watch</option>
                    <option>mobile</option>
                    <option>kid’s item</option>
                  </select>
                  <form>
                    <input name="search" placeholder="Kerko produkte..." type="search">
                    <button class="btnn"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
              <div class="right-bar">
                <div class="sinlge-bar">
                  @if(auth()->user())
                    <a href="{{ route('favorites') }}" class="single-icon"><i class="fa fa-heart-o"
                        aria-hidden="true"></i></a>
                  @endif
                </div>
                <cart checkout-route="{{ route('checkout') }}"
                  login-route="{{ route('show.login') }}" user="{{ Auth::user() }}"></cart>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="header-inner">
        <div class="container">
          <div class="cat-nav-head">
            <div class="row">
              @yield('all-categories')
              <div class="col-lg-9 col-12">
                <div class="menu-area">
                  <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                      <div class="nav-inner">
                        <ul class="nav main-menu menu navbar-nav">
                          <li class="active"><a href="{{ route('home') }}">Kryefaqja</a></li>
                          <li><a href="{{ route('shop-grid') }}">Produktet</a></li>
                          <li><a href="#">Shop<i class="fa fa-angle-down"></i><span class="new">New</span></a>
                            <ul class="dropdown">
                              <li><a href="{{ route('shop-grid') }}">Shop Grid</a></li>
                              <li><a href="{{ route('cart') }}">Shporta</a></li>
                              <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>


    @yield('single-slider')
    @yield('single-banner')
    @yield('product-area')
    @yield('medium-banner')
    @yield('popular-products')
    @yield('bottom-section')
    @yield('breadcrumbs')
    @yield('main-content')

    <section class="shop-newsletter section">
      <div class="container">
        <div class="inner-top">
          <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
              <div class="inner">
                <h4>Newsletter</h4>
                <p> Subscribe per te marre <span>10%</span> ulje ne blerjen e pare!</p>
                <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                  <input name="EMAIL" placeholder="Your email address" required="" type="email">
                  <button class="btn">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <product-modal></product-modal>
    <!-- Modal end -->

    <footer class="footer">
      <div class="footer-top section">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-12">
              <div class="single-footer about">
                <div class="logo">
                  <a href="index.html"><img src="images/logo2.png" alt="#"></a>
                </div>
                <p class="text">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                  graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is.
                </p>
                <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+355 69 766 8890</a></span></p>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <div class="single-footer links">
                <h4>Informacione</h4>
                <ul>
                  <li><a href="#">Rreth nesh</a></li>
                  <li><a href="#">Faq</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Kontakt</a></li>
                  <li><a href="#">Ndihme</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <div class="single-footer links">
                <h4>Sherbimi i Klientit</h4>
                <ul>
                  <li><a href="#">Metodat e Pageses</a></li>
                  <li><a href="#">Kthim-Para</a></li>
                  <li><a href="#">Dorezime</a></li>
                  <li><a href="#">Transporti</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="single-footer social">
                <h4>Kontakti</h4>
                <div class="contact">
                  <ul>
                    <li>Rr. Ismail Qemali</li>
                    <li>Albania, Tirane</li>
                    <li>kepler@eshop.com</li>
                    <li>+355 69 766 8890</li>
                  </ul>
                </div>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright">
        <div class="container">
          <div class="inner">
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="left">
                  <p>Copyright © 2021 Eshop - Kepler - All Rights Reserved.</p>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="right">
                  <img src="images/payments.png" alt="#">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/user/app.js') }}" defer></script>
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
</body>

</html>