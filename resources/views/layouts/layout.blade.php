<!DOCTYPE html>
<!-- saved from url=(0066)http://preview.hasthemes.com/haltico-v3/haltico/shop-3-column.html -->
<html class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"
    lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('extra-meta')
    <title>Boite Pizza</title>
    @yield('extra-script')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Plugins -->

    <link rel="stylesheet" href="{{ asset('res/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('res/font-awesome.min.css') }}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('res/res/style.css') }}">
    @yield('extra-css')
</head>

<body>

    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <header class="header">

            <!--// Header Top Area -->

            <!-- Header Middle Area -->
            <div class="header-middle bg-theme">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                            <a href="#" class="header-logo">

                                <img src="{{ asset('res/res/logo-white.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="col-lg-6 col-12 order-3 order-lg-2">
                            <form action="#" class="header-searchbox">

                                <div class="nice-select select-searchcategory"><span class="current">All Products</span>
                                </div>
                                <input type="text" placeholder="Enter your search key ...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                            <div class="header-icons">
                                <div class="header-account">
                                    <button class="header-accountbox-trigger"><span class="fa fa-user"></span> My Account <i class="fa fa-angle-down"></i></button>
                                        <!-- Guest -->
                                    @guest
                                    <ul class="header-accountbox dropdown-list">
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    </ul>
                                    @else
                                    <!-- Fammille -->
                                    <ul class="header-accountbox dropdown-list">
                                        <li>
                                            <a href="{{route('products.index')}}">{{ Auth::user()->name }} </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                    @endguest


                                </div>
                                <div class="header-cart">
                                    <a class="header-carticon" href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i><span class="count">{{ Cart::count() }}</span></a>
                                    <!-- Minicart -->
                                    <!-- Minicart -->
                                    <div class="header-minicart minicart">
                                        <div class="minicart-header">
                                        @if(Cart::count()>0)

                                        @foreach(Cart::content() as $product)
                                            <div class="minicart-product">
                                                <div class="minicart-productimage">
                                                    <a href="{{ route('products.show', $product->model->Nom ) }}">
                                                        <img src="{{ $product->model->imgPath }}" alt="product image">
                                                    </a>
                                                    <span class="minicart-productquantity">1x</span>
                                                </div>
                                                <div class="minicart-productcontent">
                                                    <h6><a href="{{ route('products.show', $product->model->Nom ) }}">{{ $product->model->Nom }}</a></h6>
                                                    <span class="minicart-productprice">{{ $product->model->getNewrix() }}</span>
                                                </div>
                                                <button class="minicart-productclose"><i class="ion ion-ios-close-circle"></i></button>
                                            </div>
                                            @endforeach
                                            @else
                                            <p>Vide</p>
                                            @endif
                                        </div>
                                        <ul class="minicart-pricing">
                                            <li>Subtotal <span>{{ getPrice(Cart::subtotal()) }}</span></li>
                                            <li>Taxes <span>{{ getPrice(Cart::tax()) }}</span></li>
                                            <li>Total <span>{{ getPrice(Cart::total()) }}</span></li>
                                        </ul>
                                        <div class="minicart-footer">
                                            <a href="{{ route('cart.index') }}" class="ho-button ho-button-fullwidth">
                                                <span>Cart</span>
                                            </a>
                                            <a href="/viderpanier" style="background-color: red; color:white;" class="ho-button ho-button-dark ho-button-fullwidth">
                                                <span>Vider Panier</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--// Minicart -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Header Middle Area -->

            <!-- Header Bottom Area -->
            <div class="header-bottom bg-theme">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-10 d-none d-lg-block">
                            <!-- Navigation -->
                            <nav class="ho-navigation" style="display: block;">
                                <ul>
                                    <li class="active">
                                        <a href="{{ route('products.index') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('formules.index') }}">Formules <span class="fa fa-angle-down"></span></a>
                                        <ul class="hodropdown">
                                        @foreach(App\Formule::all() as $Formules)
                                            <li><a href="{{ route('formules.show', $Formules->nomFormule ) }}">{{ $Formules->nomFormule }}</a></li>
                                        @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('products.index') }}">Products <span class="fa fa-angle-down"></span></a>
                                        <ul class="megamenu">
                                            @foreach(App\Categorie::all() as $Categorie)
                                            <li><a href="{{ route('products.index', ['categorie' => $Categorie->NomCategorie]) }}">Categorie : {{$Categorie->NomCategorie}}</a>
                                                @foreach($Categorie->products as $item)
                                                 <ul>
                                                    <li><a href="{{ route('products.show', $item->Nom ) }}">{{$item->Nom}}</a></li>
                                                </ul>
                                                @endforeach
                                             </li>
                                            @endforeach

                                        </ul>
                                    </li>


                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#"> Contact</a>
                                    </li>
                                </ul>
                            </nav>
                            <!--// Navigation -->

                        </div>
                        <div class="col-lg-2">
                            <div class="header-contactinfo">
                                <i class="fa fa-phone-square"></i>
                                <span>Call Us Now:</span>
                                <b>+0123456789</b>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="mobile-menu clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Header Bottom Area -->

        </header>
        <!--// Header -->
        <!-- Page Conttent -->
        <main class="page-content">
            @yield('content')
        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <footer class="footer text-center badge-dark " style="display: flex;">
            <div class=" container ">
                <p style="margin-top: 15px;">Copyright @ Master-ISI 2020</p>
            </div>

        </footer>


    </div>
    <!--// Wrapper -->
    <script src="bootstrap/jquery-1.12.4.min.js "></script>
    <script src="bootstrap/js/bootstrap.min.js "></script>
    <script src="bootstrap/js/bootstrap.js "></script>


    <!-- Js Files -->
    <script src="{{ asset('res/res/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('res/res/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('res/res/popper.min.js') }}"></script>
    <script src="{{ asset('res/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('res/res/plugins.js') }}"></script>
    <script src="{{ asset('res/res/main.js') }}"></script>
    <a id="scrollUp " href="home#top " style="position: fixed; z-index: 2147483647; display: none; "><i  class="fa fa-angle-double-up ">  <span  class="fa fa-user"></span></i></a>
    @yield('extra-js')

</body>

</html>
