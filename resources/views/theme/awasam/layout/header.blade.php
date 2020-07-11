<!DOCTYPE html>
<html lang="en">
<head>
  <link id="favicon" rel="icon" type="image/png" href="cached-static/img/favicon.33c6e1ef2984.ico">
  <link id="favicon-blink" rel="" type="image/png" href="cached-static/img/favicon-blink.35e8ec839d52.ico">
  <link rel="apple-touch-icon" href="cached-static/img/touch-icon-57.e1027353ae6e.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="cached-static/img/touch-icon-72.99173ef1adbe.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="cached-static/img/touch-icon-114.f8bf6fba2cd2.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="cached-static/img/touch-icon-144.28f60a5711cc.png" />
<!--[if lt IE 9]>
<script>
var OLD_IE = true;
</script>
<![endif]-->

<link href="{{ asset('assets/awasam/cached-static/bootstrap/css/bootstrap.min.5c7070ef655a.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/awasam/cached-static/font-awesome-4-5-0/css/font-awesome.min.dcc433f0f2ff.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/awasam/cached-static/style.b34452ec05be.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/awasam/cached-static/quickform.96d6bb50f184.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/awasam/cached-static/bootstrap-extensions.ac6fa260a89d.css') }}" />
<title>


{{ get_option('site_title') }}: Fastest and easiest way to buy and sell bitcoins
</title>
<meta name="keywords" content="buy bitcoins cash dollar euro pound local dealer bank transfer sell" />
<meta name="google-site-verification" content="FPTA6d-lkSoY5UbNNOlBSLnoKNSMi0tLZIkTWtethDk" />
<meta name="description" content="Get bitcoins. Fast, easy and safe. Near you." />
<meta name="viewport" content="width=device-width" />
<meta name="theme-color" content="#f58220">

<script src="{{ asset('assets/awasam/cached-static/thirdparty/jquery-1.12.4.min.4f252523d4af.js') }}"></script>
</head>
<body class="server-prod session-anonymous">
<div class="header-nav-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 ">
                <div class="topContactInfo">
                    <ul class="nav nav-pills">
                        @if(get_option('site_phone_number'))
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
                        @endif
                    </ul>
                </div>

            </div>
            <div class="col-md-8 col-sm-12">
                @if(Auth::check())

                    <div class="topContactInfo">
                        <ul class="nav nav-pills navbar-right">
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
                             <li>
                                <a href="{{ route('wallet') }}">
                                    <i class="fa fa-money"></i>
                                    Wallet({{ $logged_user->crypto_wallet }})</a>
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

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
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
                 <li><a href="{{ route('buy') }}"> @lang('app.buy_bitcoins')</a></li>
                  <li><a href="{{ route('sell') }}">  @lang('app.sell_bitcoins')</a></li>
                <?php
                $header_menu_pages = \App\Post::whereStatus('1')->where('show_in_header_menu', 1)->get();
                ?>
                @if($header_menu_pages->count() > 0)
                    @foreach($header_menu_pages as $page)
                        <li><a href="{{ route('single_page', $page->slug) }}">{{ $page->title }} </a></li>
                    @endforeach
                @endif

                @if( ! Auth::check())
                    <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i>  {{ trans('app.login') }}  </a>  </li>
                    <li><a href="{{ route('user.create') }}"> <i class="fa fa-save"></i>  {{ trans('app.register') }}</a></li>
                @endif

                <li><a href="{{ route('create_ad') }}"> <i class="fa fa-tag"></i> @lang('app.post_an_ad')</a></li>
                @if(get_option('show_blog_in_header'))
                    <li><a href="{{ route('blog') }}"> <i class="fa fa-rss"></i> @lang('app.blog')</a></li>
                @endif
                <li><a href="{{ route('contact_us_page') }}"> <i class="fa fa-mail-forward"></i>@lang('app.contact_us')</a></li>

                @if(get_option('enable_language_switcher') == 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Language <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('switch_language', 'en') }}">English</a></li>
                            @foreach(get_languages() as $lang)
                                <li><a href="{{ route('switch_language', $lang->language_code) }}">{{ $lang->language_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>


        </div><!--/.navbar-collapse -->
    </div>
</nav>