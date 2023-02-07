@php
    $settings = DB::table('setting')
        ->where('id', 1)
        ->first();
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>{{ __('messages.site_name') }}</title>
    <meta property="og:url" content="{{ __('messages.site_name') }}" />
    <meta property="og:title" content="{{ __('messages.site_name') }}" />
    <meta property="og:image" content="{{ asset('public/favicon.png') }}" />
    <meta property="og:image:width" content="250px" />
    <meta property="og:image:height" content="250px" />
    <meta property="og:site_name" content="{{ __('messages.site_name') }}" />
    <meta property="og:description" content="{{ __('messages.metadescweb') }}" />
    <meta property="og:keyword" content="{{ __('messages.metakeyboard') }}" />
    <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @if (__('messages.rtl') == '0')
        <link rel="stylesheet" type="text/css" href="{{ asset('burger/css/style.css?v=1') . '?version=232132' }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('burger/css/rtl.css') . '?version=56565' }}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('burger/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('burger/css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('burger/css/font.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('burger/js/dropdown.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <script type="text/javascript" src="{{ asset('burger/js/jquery.mixitup.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/js/code.js') }}"></script>
    <script type="text/javascript" src="{{ asset('burger/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key={{ Config::get(' mapdetail.key') }}&sensor=false&libraries=places'>
    </script>
    <script src="{{ url('public/js/locationpicker.js') }}"></script>
</head>

<body>
    @include('cookieConsent::index')
    @include('user.cssclass')
    <div id="overlaychk">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <div class="login-re-modal">
        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="login-modal-head">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div id="forgotbody">
                            <span id="for_success_msg">{{ __('messages.forgot_email_success') }}</span>
                            <span id="for_error_msg">{{ __('messages.forgot_error') }}</span>
                            <form class="for">
                                <label>{{ __('messages.forgot_text') }}<span>*</span></label>
                                <input type="text" required name="phone_for" id="modal-text"
                                    placeholder="{{ __('messages.forgot_placeholder') }}">
                            </form>
                            <div class="for-1">
                                <div class="modal-login-button">
                                    <button type="button" onclick="forgotaccount()">
                                        <h6>{{ __('messages.forgot_pwd') }}</h6>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-forgot">
                                <a href="javascript:loginmodel()">{{ __('messages.login') }}</a>
                            </div>
                        </div>
                        <div class="login-modal" id="loginmodel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#tab1" id="logintab" class="nav-link active"
                                        data-toggle="tab">{{ __('messages.login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab2" id="regtab" class="nav-link"
                                        data-toggle="tab">{{ __('messages.register') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane show active">
                                    <span id="login_error_msg">{{ __('messages.login_error') }}</span>
                                    <form>
                                        {{ csrf_field() }}
                                        <label>{{ __('messages.phone_no') }} <span>*</span></label>
                                        <input type="text" required name="phone" id="modal-text"
                                            placeholder="{{ __('messages.phone_no') }}"
                                            value="{{ isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '' }}">
                                        <label>{{ __('messages.password') }}<span>*</span></label>
                                        <input type="password" required name="password" id="modal-text"
                                            placeholder="{{ __('messages.password') }}"
                                            value="{{ isset($_COOKIE['password']) ? $_COOKIE['password'] : '' }}">
                                    </form>
                                    <div class="modal-re">
                                        <input type="checkbox" name="rem_me" value="1" <?php echo isset($_COOKIE['rem_me']) ? 'checked' : ''; ?>>
                                        <p>{{ __('messages.rem_me') }}</p>
                                    </div>
                                    <span class="modal-forgot">
                                        <a href="javascript:forgotmodel()">{{ __('messages.forgot_u') }}</a>
                                    </span>
                                    <div class="modal-login-button">
                                        <button type="button" onclick="loginaccount()">
                                            <h6>{{ __('messages.login') }}</h6>
                                        </button>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">
                                    <span id="reg_success_msg">{{ __('messages.register_suceess') }}</span>
                                    <span id="reg_error_msg">{{ __('messages.reg_error') }}</span>
                                    <form action="{{ url('userregister') }}" method="post">
                                        {{ csrf_field() }}
                                        <label>{{ __('messages.name') }} <span>*</span></label>
                                        <input type="text" required name="name" id="modal-text"
                                            placeholder="{{ __('messages.name') }}">
                                        <label class="for_button_value">
                                            {{ __('messages.email') }}
                                            <span class="requiredfield">*</span>
                                        </label>
                                        <input type="text" required name="email" id="modal-text"
                                            placeholder="{{ __('messages.email') }}">
                                        <label>{{ __('messages.phone_no') }} <span>*</span></label>
                                        <input type="text" required name="phone_reg" id="modal-text"
                                            placeholder="{{ __('messages.phone_no') }}">
                                        <label>{{ __('messages.password') }}<span>*</span></label>
                                        <input type="password" required name="password_reg" id="modal-text"
                                            placeholder="{{ __('messages.password') }}">
                                        <label>{{ __('messages.confirm_pwd') }}<span>*</span></label>
                                        <input type="password" required name="con_password_reg" id="modal-text"
                                            placeholder="{{ __('messages.confirm_pwd') }}"
                                            onchange="checkdata(this.value)">
                                        <div class="modal-rg-content">
                                            <p>{{ __('messages.reg_fixed') }}</p>
                                        </div>
                                        <div class="modal-login-button">
                                            <button type="button" onclick="registeruser()">
                                                <h6>{{ __('messages.register') }}</h6>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-1">
                <?php $cartCollection = Cart::getContent();
               if($cartCollection->count()==0){

                     echo '
                     <div class="empty-box">
                     <div class="modal-header cart-h">
                      <button type="button" class="close" data-dismiss="modal">
                      <img src="'.asset("burger/images/close.png").'">
                      </button>
                      </div>
                      <div class="container">
                      <div class="cart-modal-empty col-md-8">
                      <img src="'.asset("burger/images/empty-cart.png").'">
                      <h1>'.__("messages.nocart").'</h1>
                        </div>
                         </div>
                         </div>';
                        }
               else{
                ?>
                <div class="modal-content">
                    <div class="modal-header cart-h">
                        <button type="button" class="close" data-dismiss="modal">
                            <img src="{{ asset('burger/images/close.png') }}">
                        </button>
                    </div>
                    <div class="container">
                        <div class="cart-modal col-md-8">
                            <div class="modal-body main-modal ">
                                <?php $cartCollection = Cart::getContent();
                                $i = 0; ?>
                                @foreach ($cartCollection as $item)
                                    <div class="portfolio por-1 col-md-12 row">
                                        <div class="por-img">
                                            <div class="b-img">
                                                @foreach ($allmenu as $ai)
                                                    @if ($item->name == $ai->menu_name)
                                                        <img src="{{ asset('public/upload/images/menu_item_icon/' . $ai->menu_image) }}"
                                                            width="85px">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="b-text">
                                            <div class="box-spa">
                                                <h1>{{ $item->name }}</h1>
                                                <h2>
                                                    @foreach ($item->attributes[0] as $cartinter)
                                                        @foreach ($menu_interdient as $me)
                                                            @if ($cartinter == $me->id)
                                                                <span>{{ $me->item_name }},</span>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </h2>
                                                <p>{{ $item->quantity }} <img
                                                        src="{{ asset('burger/images/cross.png') }}">
                                                    {{ Session::get('usercurrency') . number_format($item->price, 2, '.', '') }}
                                                </p>
                                            </div>
                                            <span class="price">
                                                <?php $totalamount = (float) $item->quantity * (float) $item->price; ?>
                                                <a href="{{ url('deletecartitem/' . $item->id) }}"><i
                                                        class="fab fa-trash-o" aria-hidden="true"></i></a>
                                                <h1>{{ Session::get('usercurrency') }}{{ number_format($totalamount, 2, '.', '') }}
                                                </h1>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="total">
                                <h1>{{ __('messages.subtotal') }}:</h1>
                                <?php $cartCollection = Cart::getContent();
                                $totalamountarr = [];
                                foreach ($cartCollection as $car) {
                                    $totalamount = '';
                                    $totalamount = (float) $car->quantity * (float) $car->price;
                                    $totalamountarr[] = round($totalamount, 2);
                                }

                                ?>
                                <span>{{ Session::get('usercurrency') . number_format(Cart::getTotal(), 2, '.', '') }}
                                </span>
                            </div>
                            <?php if(Session::get("orderstatus")==1){ ?>
                            <div class="viewcart">
                                <h1>
                                    <a href="{{ url('cartdetails') }}" class="viewcarta">
                                        {{ __('messages.view_cart') }}
                                    </a>
                                </h1>
                            </div>
                            <?php }?>
                            <?php if(Session::get("orderstatus")==0){ ?>
                            <div class="last-box">
                                <div class="Delivery">
                                    <img src="{{ asset('burger/images/delivery.png') }}" style="width:50px">
                                </div>
                                <div class="last-text">
                                    <h1>{{ __('messages.offline_order') }}</h1>
                                    <p>{{ __('messages.off_time') }}</p>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>

        <!-- ============================ Header start ================================= -->
        <div class="header_section pt-3 pb-3">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ Session::get('logo') }}" width="200" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('aboutus') }}">{{ __('messages.aboutus') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('contactus') }}">{{ __('messages.contact') }}</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto header_right_nav">
                            <div class="login">
                                <?php if(empty(Session::get('login_user'))){?>
                                <a href="#" data-toggle="modal" data-target="#myModal1">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <?php }else{?>
                                <a href="{{ url('myaccount') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <?php }?>
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <span id="totalcart">
                                            <?php $cartCollection = Cart::getContent();
                                            $carttotal = 0;
                                            if ($cartCollection->count() != 0) {
                                                $carttotal = $cartCollection->count();
                                                echo '<div class="cric">' . $cartCollection->count() . '</div>';
                                            }
                                            ?>
                                        </span>
                                        <input type="hidden" id="carttotal" value="{{ $carttotal }}">
                                    </i>
                                </a>
                                <span class="mr-2">|</span>
                                @if ($settings->facebook_id)
                                    <a href={{ $settings->facebook_id }}" target="_blank"><i class="fab fa-facebook"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->twitter_id)
                                    <a href="{{ $settings->twitter_id }}" target="_blank"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->linkedin_id)
                                    <a href="{{ $settings->linkedin_id }}" target="_blank"><i
                                            class="fab fa-linkedin" aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->whatsapp)
                                    <a href="{{ $settings->whatsapp }}" target="_blank"><i class="fab fa-whatsapp"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->instragram_id)
                                    <a href="{{ $settings->instragram_id }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                @if ($settings->tiktok_id)
                                    <a href="{{ $settings->tiktok_id }}" target="_blank"><i
                                            class="fa-brands fa-tiktok"></i></a>
                                @endif
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ============================ Header end ================================= -->



        <!-- ============================ Category start ================================= -->
        <!--
        <div class="category_section mt-4 mb-5">
            <div class="container">
                <div class="heading mb-5 text-center">
                    <h1>{{ __('Categories') }}</h1>
                </div>
                <div class="category_wrapper">
                    <div class="category_carousel owl-carousel text-center">
                        {{-- category item --}}
                        @foreach ($category as $ca)
<div class="item category_item">
                            <div class="category_img">
                                <a href="#">
                                    <?php $img = asset('public/upload/images/menu_cat_icon/') . '/' . $ca->cat_icon; ?>
                                    <img src="{{ asset($img) }}" alt="{{ $ca->cat_name }}">
                                </a>
                            </div>
                            <div class="category_name">
                                <h3><a href="#">{{ $ca->cat_name }}</a></h3>
                            </div>
                            <div class="category_btn">
                                <a href="#">Shop <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
@endforeach
                    </div>
                </div>
            </div>
        </div>
         -->
        <!-- ============================ Category end ================================= -->
        <!--
        <div class="main-pizza-sb-2 mt-5 category_wrapper" style="margin-top:72px !important;">
            <div class="container">
                <div class="carousel">
                    <?php $i = 0; ?>
                    @foreach ($category as $ca)
<div class="box" id="box{{ $i }}" onclick="changecategory('{{ $ca->id }}','{{ $i }}')">
                        <button class="pizza-category-menu">
                            <?php $img = asset('public/upload/images/menu_cat_icon/') . '/' . $ca->cat_icon; ?>
                            @if (isset($itemdetails->category) && $itemdetails->category == $ca->id)
<div class="pizza-content-box slick-slide active" id="catdiv{{ $i }}">
@else
<div class="pizza-content-box" id="catdiv{{ $i }}">
@endif
                                    <div class="pizza-content-imgb">
                                        <img src="{{ asset($img) }}" alt="img">
                                    </div>
                                    <div class="pizza-content-textb">
                                        @if (isset($itemdetails->category) && $itemdetails->category == $ca->id)
<h3 id="cat1{{ $i }}" class="slick-slide active">{{ $ca->cat_name }}</h3>
@else
<h3 id="cat1{{ $i }}">{{ $ca->cat_name }}</h3>
@endif

                                    </div>
                                </div>
                        </button>
                    </div>
                    <?php $i++; ?>
@endforeach
                </div>
            </div>
        </div>
 -->

        {{-- <input type="hidden" id="totalcategory" value="{{$i}}"> --}}

        {{-- <div class="container">
            <div class="portfolist_sb_b" id="category_div">

            </div>
        </div> --}}

        <div id="main_content">
            @yield('content')
        </div>
        <div class="footer-section">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 about mt-4">
                            <img src="{{ Session::get('logo') }}">
                            <p>{{ __('messages.footer_text') }}</p>
                            <div class="footer-social">
                                @if ($settings->facebook_id)
                                    <a href={{ $settings->facebook_id }}" target="_blank"><i class="fab fa-facebook"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->twitter_id)
                                    <a href="{{ $settings->twitter_id }}" target="_blank"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->linkedin_id)
                                    <a href="{{ $settings->linkedin_id }}" target="_blank"><i
                                            class="fab fa-linkedin" aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->whatsapp)
                                    <a href="{{ $settings->whatsapp }}" target="_blank"><i class="fab fa-whatsapp"
                                            aria-hidden="true"></i></a>
                                @endif
                                @if ($settings->instragram_id)
                                    <a href="{{ $settings->instragram_id }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                @if ($settings->tiktok_id)
                                    <a href="{{ $settings->tiktok_id }}" target="_blank"><i
                                            class="fa-brands fa-tiktok"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 info">
                            <div class="fo-text">
                                <h1>{{ __('messages.information') }}</h1>
                            </div>
                            <ul>
                                <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                                <li><a href="{{ url('aboutus') }}">{{ __('messages.aboutus') }}</a></li>
                                <li><a href="{{ url('shop') }}">{{ __('messages.service') }}</a></li>
                                <li><a href="{{ url('contactus') }}">{{ __('messages.contact') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 info">
                            <div class="fo-text">
                                <h1>{{ __('messages.myaccount') }}</h1>
                            </div>
                            <ul>
                                @if (empty(Session::get('login_user')))
                                    <li><a href="#" data-toggle="modal"
                                            data-target="#myModal1">{{ __('messages.myorder') }}</a></li>
                                @endif
                                @if (!empty(Session::get('login_user')))
                                    <li><a href="{{ url('myaccount') }}">{{ __('messages.myorder') }}</a></li>
                                @endif
                                @if (count($cartCollection) != 0)
                                    <li><a href="{{ url('cartdetails') }}">{{ __('messages.checkout') }}</a></li>
                                @endif
                                @if (count($cartCollection) == 0)
                                    <li><a href="#" data-toggle="modal"
                                            data-target="#myModal">{{ __('messages.checkout') }}</a></li>
                                @endif
                                <li><a href="#" data-toggle="modal"
                                        data-target="#myModal">{{ __('messages.cart') }}</a>
                                </li>
                                <li><a href="{{ url('termofuse') }}">{{ __('messages.terms') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 info">
                            <div class="fo-text">
                                <h1>{{ __('messages.contact_us') }}</h1>
                            </div>
                            <div class="f-location">
                                <div class="media position-relative">
                                    <i class="fa fa-location-dot"></i>
                                    <div class="media-body">
                                        <p> {{ Session::get('address') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="f-location">
                                <div class="media position-relative">
                                    <i class="fa fa-phone"></i>
                                    <div class="media-body">
                                        <p> {{ Session::get('phone') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="f-location">
                                <div class="media position-relative">
                                    <i class="fa fa-envelope"></i>
                                    <div class="media-body">
                                        <p> {{ Session::get('email') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>{{ __('messages.copyright') }} © {{ Session::get('current_year') }}
                                    {{ __('messages.site_name') }}. {{ __('messages.f1') }}.</h1>
                            </div>
                            <div class="col-md-6 v-box">
                                <div class="v-img">
                                    <a><img src="{{ asset('burger/images/v-1.png') }}"></a>
                                </div>
                                <div class="v-img">
                                    <a><img src="{{ asset('burger/images/v-2.png') }}"></a>
                                </div>
                                <div class="v-img">
                                    <a><img src="{{ asset('burger/images/v-3.png') }}"></a>
                                </div>
                                <div class="v-img">
                                    <a><img src="{{ asset('burger/images/v-4.png') }}"></a>
                                </div>
                                <div class="v-img">
                                    <a><img src="{{ asset('burger/images/v-5.png') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="currency" value='{{ Session::get(' usercurrency') }}' />
        <input type="hidden" id="addcart" value='{{ __(' messages.addcart') }}' />
        <input type="hidden" id="path_site" value="{{ url('/') }}" />
        <input type="hidden" id="forgot_error" value="{{ __('messages.forgot_error') }}" />
        <input type="hidden" id="reg_error" value="{{ __('messages.reg_error') }}" />
        <input type="hidden" id="pwdmatch" value="{{ __('messages.pwdmatch') }}" />
        <input type="hidden" id="login_error" value="{{ __('messages.login_error') }}" />
        <input type="hidden" id="required_field" value="{{ __('messages.required_field') }}" />
        <input type="hidden" id="login_error" value="{{ __('messages.login_error') }}" />
        <input type="hidden" id="forgot_error_2" value="{{ __('messages.forgot_error_2') }}">
        <input type="hidden" id="lat_env" value="{{ Config::get('mapdetail.lat') }}">
        <input type="hidden" id="long_env" value="{{ Config::get('mapdetail.long') }}">
</body>
<div class="modal modal-2" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header logout">
                <h4 class="modal-title">{{ __('messages.register') }}</h4>
                <p>{{ Session::get('user_phone') }}</p>
                <h1>{{ __('messages.logout_msg') }}</h1>
                <div class="logout-but">
                    <button type="button" class="btn btn-danger"
                        data-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="button" class="btn-1" data-dismiss="modal" onclick="logout()"><i
                            class="fa fa-sign-out" aria-hidden="true"></i>{{ __('messages.logout') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="is_rtl" value="{{ __('messages.rtl') }}" />
<script type="text/javascript" src="{{ URL::to('public/js/code.js') }}?v=2132132"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type="text/javascript" src="{{ URL::to('public/demo/button.js') . '?version=1' }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ URL::to('public/demo/script.js') . '?version=133' }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    // Category carousel
    $('.category_carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        loop: true,
        items: 5,
        margin: 15,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
</script>
<script>
    //rateYo star icon
    $(function() {
        $("#rateYo").rateYo({
            starWidth: '30px',
            fullStar: true,
            mormalFill: 'yellow',
            ratedFill: 'orange',
            rating: 3,
            onSet: function(rating, rateYoInstance) {
                $('#rating').val(rating);
            }
        });
    });
    // onclick go to review form
    $("#clickReview").click(function() {
        $('html, body').animate({
            scrollTop: $("#review_form").offset().top
        }, 1000);
    });
</script>

<script>
    function countChars(obj) {
        var maxLength = 250;
        var strLength = obj.value.length;

        if (strLength > maxLength) {
            document.getElementById("charNum").innerHTML = '<span style="color: red;">' + strLength + ' out of ' +
                maxLength + ' characters</span>';
        } else {
            document.getElementById("charNum").innerHTML = '<span style="color: green;">' + strLength + ' out of ' +
                maxLength + ' characters</span>';
        }

    }
</script>

</html>
