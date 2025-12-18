<!DOCTYPE html>
<html lang="en">

<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="user/styles/bootstrap4/bootstrap.min.css">
    <link href="user/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="user/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="user/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="user/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="user/styles/responsive.css">   
    <link rel="stylesheet" type="text/css" href="user/styles/product.css">   

    <style>
        .modal-content {
            background: none;
            border: none;
        }

        #form_l {
            border: 2px solid rgb(78, 77, 77);
            padding: 20px 45px;
            border-radius: 30px 0 30px 0;
            width: 400px;
            background: #ffffff;
        }

        #input_f::placeholder {
            font-variant: small-caps;
            font-weight: 500;
        }

        #h2 {
            font-variant: small-caps;
            font-weight: bold;


        }

        #button_1 {
            display: flex;
            justify-content: space-between
        }

        #button_1 a {
            text-decoration: none;
            text-transform: capitalize;
            font-size: 16px;
            font-weight: 500;
            color: black;
        }

        #button_1 a:hover {
            text-decoration: underline;
        }

        #input_f {
            border: 2px solid rgb(207, 207, 207);
            border-radius: 10px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- Currency / Language / My Account -->

                                    <li class="currency">
                                        <a href="#">
                                            usd
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="currency_selection">
                                            <li><a href="#">cad</a></li>
                                            <li><a href="#">aud</a></li>
                                            <li><a href="#">eur</a></li>
                                            <li><a href="#">gbp</a></li>
                                        </ul>
                                    </li>
                                    <li class="language">
                                        <a href="#">
                                            English
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="language_selection">
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Italian</a></li>
                                            <li><a href="#">German</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </li>
                                    <li class="account">
                                        <a href="#">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign
                                                    In</a></li>
                                            <li><a href="#"><i class="fa fa-user-plus"
                                                        aria-hidden="true"></i>Register</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">colo<span>shop</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="{{route('home')}}">home</a></li>
                                    <li><a href="{{ route('shop') }}">shop</a></li>
                                    <li><a href="#">category</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li><a href="#">blog</a></li>
                                    <li><a href="{{ route('contact') }}">contact</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#my_modal"
                                            role="button" data-bs-dismiss="modal"><i class="fa fa-user"
                                                aria-hidden="true"></i></a></li>
                                    <li class="checkout">
                                        <a href="{{route('cartshow')}}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">{{$number}}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>




        {{-- <---Modal---> --}}

        <div class="modal fade" id="my_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('R_Data') }}" method="post" id="form_l" class="m-4">
                        @csrf
                        <h2 id="h2" class="text-center">Register form</h2>

                        <input id="input_f" type="text" placeholder="Enter Your Name" name="name"
                            class="form-control mt-3 " value="{{ old('name') }}">
                        @error('name')
                            <p style="font-variant: small-caps; color:red; font-weight:500">{{ $message }}</p>
                        @enderror
                        <input id="input_f" type="email" placeholder="Enter Your Email" name="email"
                            class="form-control mt-3" value="{{ old('email') }}">
                        @error('email')
                            <p style="font-variant: small-caps; color:red ; font-weight:500">{{ $message }}</p>
                        @enderror
                        <input id="input_f" type="password" placeholder="Enter Your Password" name="password"
                            class="form-control mt-3" value="{{ old('password') }}">
                        @error('password')
                            <p style="font-variant: small-caps; color:red; font-weight:500">{{ $message }}</p>
                        @enderror
                        <div id="button_1">
                            <a href="" class=" btn mt-4" data-bs-toggle="modal" data-bs-target="#my_modal_2"
                                role="button" data-bs-dismiss="modal">I hava Already Exist</a>
                            <button class="btn btn-warning mt-4 rounded-3"
                                style="font-variant: small-caps; font-weight:bold;">submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="my_modal_2" tabindex="-1" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('l_Data') }}" method="post" id="form_l">
                        @csrf

                        <h2 id="h2" class="text-center">Login form</h2>


                        <input id="input_f" type="email" placeholder="Enter Your Email" name="email"
                            class="form-control mt-3" value="{{ old('email') }}">
                        @error('email')
                            <p style="font-variant: small-caps; color:red; font-weight:500">{{ $message }}</p>
                        @enderror
                        <input id="input_f"type="password" placeholder="Enter Your Password" name="password"
                            class="form-control mt-3" value="{{ old('password') }}">
                        @error('password')
                            <p style="font-variant: small-caps; color:red; font-weight:500">{{ $message }}</p>
                        @enderror
                        <div id="button_1" class="text-center">

                            <button class="btn btn-warning mt-4 "
                                style="font-variant: small-caps; font-weight:bold;">login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{-- <---MOdal end ---> --}}

        @yield('navbar')

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="post">
                            <div
                                class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                <input id="newsletter_email" type="email" placeholder="Your email"
                                    required="required" data-error="Valid email is required.">
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                    value="Submit">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                            <ul class="footer_nav">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div
                            class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_nav_container">
                            <div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o"
                                    aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a
                                    href="https://themewagon.com">ThemeWagon</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="user/js/jquery-3.2.1.min.js"></script>
    <script src="user/styles/bootstrap4/popper.js"></script>
    <script src="user/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="user/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="user/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="user/plugins/easing/easing.js"></script>
    <script src="user/js/custom.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @if (session('openLoginModal'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let loginModal = new bootstrap.Modal(
                    document.getElementById('my_modal_2')
                );
                loginModal.show();
            });
        </script>
    @endif

</body>

</html>
