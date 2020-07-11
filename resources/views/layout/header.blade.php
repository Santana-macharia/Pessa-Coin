<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@section('title') {{ get_option('site_title') }} @show</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('social-meta')
        <meta property="og:title" content="{{ get_option('site_title') }}">
        <meta property="og:description" content="{{ get_option('meta_description') }}">
        <meta property="og:url" content="{{ route('home') }}">
        <meta name="twitter:card" content="summary_large_image">
        <!--  Non-Essential, But Recommended -->
        <meta name="og:site_name" content="{{ get_option('site_name') }}">
    @show

<!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-theme.min.css') }}">
    <!-- Font awesome 4.4.0 -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- load page specific css -->

    <!-- main select2.css -->
    <link href="{{ asset('assets/select2-3.5.3/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/select2-3.5.3/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/nprogress/nprogress.css') }}">

    <!-- Conditional page load script -->
    @if(request()->segment(1) === 'dashboard')
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/metisMenu/dist/metisMenu.min.css') }}">
    @endif

<!-- main style.css -->

    <?php $default_style = get_option('default_style'); ?>
    @if($default_style == 'default')
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset("assets/css/style-{$default_style}.css") }}">
    @endif

    @yield('page-css')

    @if(get_option('additional_css'))
        <style type="text/css">
            {{ get_option('additional_css') }}
        </style>
    @endif

    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
 @if(Auth::check())
<div class="header-nav-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 ">
                <div class="topContactInfo">
                    <ul class="nav nav-pills">
                       <!--  @if(get_option('site_phone_number'))
                            <li>
                                <a href="callto://+{{get_option('site_phone_number')}}">
                                    <i class="fa fa-phone"></i>
                                    +{{ get_option('site_phone_number') }}
                                </a>
                            </li>
                        @endif

                        @if(get_option('site_email_address'))
                            <li>
                                <a href="mailto:{{ get_option('site_email_address') }}">
                                    <i class="fa fa-envelope"></i>
                                    {{ get_option('site_email_address') }}
                                </a>
                            </li>
                        @endif -->
                         <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa fa-user"></i>
                                    @lang('app.hi'), {{ $logged_user->name }} </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard </a>
                            </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-8 col-sm-12">
                @if(Auth::check())

                    <div class="topContactInfo">
                        <ul class="nav nav-pills navbar-right">
                           
                              <li>
                                <a href="{{ route('buy') }}">
                                    <i class="fa fa-money"></i>
                                    <?php 
                                    $pessacoins = $logged_user->crypto_wallet;
                                    $pessacoins_int = (int) ( $pessacoins );
                                    $pessatokens = $pessacoins - $pessacoins_int;
                                    $pessatokens = $pessatokens*100;


                                    ?>
                                    PessaCoins ({{ $pessacoins_int }}) PessaTokens ({{ $pessatokens }})</a>
                            </li>
                              <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-dashboard"></i>
                                    Earnings ({{$logged_user->earnings}} Pessacoins)  </a>
                            </li>


                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    @lang('app.logout')
                                </a>
                            </li>
                        </ul>
                    </div>

                @else
                    <form action="{{route('login')}}" class="navbar-form navbar-right" method="post"> @csrf

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email address">
                        </div>
                        <div class="form-group">
                            <input  type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success">@lang('app.sign_in')</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

</div>

  @else
   @endif

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                @if(get_option('logo_settings') == 'show_site_name')
                    {{ get_option('site_name') }}
                @else
                    @if(logo_url())
                        <img src="{{ logo_url() }}">
                    @else
                        {{ get_option('site_name') }}
                    @endif
                @endif

            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{ route('buy') }}"> BUY PESSACOINS</a></li>
              <!--  <li><a href="{{ route('sell') }}">  SELL PESSACOINS</a></li>
               <li><a href="{{ route('market') }}">  COIN MARKET</a></li> -->
               <li><a href="{{ route('exchange') }}">  EXCHANGE EARNING</a></li>
              

              

             
              

          

    @if(Auth::check())
   

    @else
    <div class="pull-right" style="padding: 10px;">
                   <a href="{{route('login')}}" class="btn btn-info">LOG IN</a>
                    <a href="{{ route('user.create') }}" class="btn btn-warning">SIGN UP</a>
                </div>

    @endif
            </ul>


        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "Nasdaq 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "BTC/USD"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "ETH/USD"
    }
  ],
  "colorTheme": "dark",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
