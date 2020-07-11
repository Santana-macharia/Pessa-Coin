<div class="clearfix"></div>
<hr>
<footer class="container">
  <div class="row footer-block">
 
    <div class="col-md-3" id="col-about">
     <h4>About Us</h4>
                        <p>{{ get_option('footer_about_us') }}</p>
                        <p>{!! get_option('footer_about_us_read_more_text') !!}</p>
    </div>
    <div class="col-md-3" id="col-support">
      <h4>@lang('app.contact_us')</h4>
                        <address>
                            <strong>{{ get_text_tpl(get_option('footer_company_name')) }}</strong>
                            @if(get_option('footer_address'))
                                <br />
                                <i class="fa fa-map-marker"></i>
                                {!! get_option('footer_address') !!}
                            @endif
                            @if(get_option('site_phone_number'))
                                <br><i class="fa fa-phone"></i>
                                <abbr title="Phone">{!! get_option('site_phone_number') !!}</abbr>
                            @endif
                        </address>

                        @if(get_option('site_email_address'))
                            <address>
                                <strong>@lang('app.email')</strong>
                                <br> <i class="fa fa-envelope-o"></i>
                                <a href="mailto:{{ get_option('site_email_address') }}"> {{ get_option('site_email_address') }} </a>
                            </address>
                        @endif
    </div>
    <div class="col-md-3" id="col-services">
      <h4>Quick Link</h4>
                        <ul class="footer-menu">
                            <?php
                            $show_in_footer_menu = \App\Post::whereStatus('1')->where('show_in_footer_menu', 1)->get();
                            ?>
                            @if($show_in_footer_menu->count() > 0)
                                @foreach($show_in_footer_menu as $page)
                                    <li><a href="{{ route('single_page', $page->slug) }}">{{ $page->title }} </a></li>
                                @endforeach
                            @endif

                            @if(get_option('show_blog_in_footer'))
                                <li><a href="{{ route('blog') }}">@lang('app.blog')</a></li>
                            @endif
                            <li><a href="{{ route('contact_us_page') }}">@lang('app.contact_us')</a></li>
                        </ul>
    </div>
    <div class="col-md-3">
          <ul class="nav nav-list">
            <li class="nav-header">FOLLOW US</li>

                               @if(get_option('facebook_url'))
                                    <li><a href="{{ get_option('facebook_url') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                @endif

                                @if(get_option('twitter_url'))
                                    <li><a href="{{ get_option('twitter_url') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if(get_option('linked_in_url'))
                                    <li><a href="{{ get_option('linked_in_url') }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                @endif
                                @if(get_option('dribble_url'))
                                    <li><a href="{{ get_option('dribble_url') }}" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                @endif
                                @if(get_option('google_plus_url'))
                                    <li><a href="{{ get_option('google_plus_url') }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                @endif
                                @if(get_option('youtube_url'))
                                    <li><a href="{{ get_option('youtube_url') }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                @endif

          </ul>
    </div>

        <div class="footer-bottom">
         <div class="clearfix"></div>
<hr>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="pull-left">{!! get_text_tpl(get_option('footer_left_text')) !!}</p>
                    <p class="pull-right"> {!! get_text_tpl(get_option('footer_right_text')) !!} </p>
                </div>
            </div>
        </div>
    </div>
  </div>
</footer>
<form id="login-modal"
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="register-form-label"
      aria-hidden="true"
      action="index.html"
      method="POST">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button id="login-popup-close" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="register-form-label">Log in to LocalBitcoins.com</h3>
    </div>
    <div class="modal-body">
        <input type='hidden' name='csrfmiddlewaretoken' value='CEJ1j68HxFqy6Zvo7ULIdYsR1Dra2U7VqFCaisBWjB45QDE5w0pgoZnUMVuYMhpc' />
        <input type="hidden" name="next" value="" />
        <p><b>Trouble logging in?</b></p>
        <ul>
        <li>If you have forgotten your username, try <b>logging in with your email</b>.</li>
        <li>Forgotten password? <a href="index.html">Reset your password</a></li>
        </ul>
    </div>
    <div class="modal-footer">
        <button id="login-button" class="btn btn-success" type="submit">Log In</button>
        <button id="login-popup-cancel" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    </div>
    </div>
</form>
<script src="{{ asset('assets/awasam/cached-static/bootstrap/js/bootstrap.min.5869c96cc8f1.js') }}"></script>
<script>
    window.exchange = {
        fullPath: "/",
        serverUrl: "/",
        webNotificationsEnabled: false
    };
</script>
<!-- AJAX Recaptcha for registration lightbox -->
<script type="text/javascript" src="https://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<audio id="notification-tone" preload="none" class="display-none">
    <source src="{{ asset('assets/awasam/cached-static/notifications/tone.ff3720da7908.ogg') }}" type="audio/ogg">
    <source src="{{ asset('assets/awasam/cached-static/notifications/tone-40k.a43490007221.mp3') }}" type="audio/mpeg">
</audio>
<script src="{{ asset('assets/awasam/cached-static/notifications/notifications.83752371db74.js') }}"></script>
<script src="{{ asset('assets/awasam/cached-static/main.d3207c315f6b.js') }}"></script>
<script src="{{ asset('assets/awasam/cached-static/quickform.0f6e9901c111.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/awasam/maps/api/js_libraries_places_key_aizasyaa2761qzhngbq041o01avkikgg5ugwpju_language_en.js') }}"></script>
</body>
</html>
