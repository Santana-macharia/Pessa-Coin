@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('social-meta')
    <meta property="og:title" content="{{ $ad->title }}">
    <meta property="og:description" content="{{ substr(trim(preg_replace('/\s\s+/', ' ',strip_tags($ad->description) )),0,160) }}">
    @if($ad->media_img->first())
        <meta property="og:image" content="{{ media_url($ad->media_img->first(), true) }}">
    @else
        <meta property="og:image" content="{{ asset('uploads/placeholder.png') }}">
    @endif
    <meta property="og:url" content="{{ route('single_ad', $ad->slug) }}">
    <meta name="twitter:card" content="summary_large_image">
    <!--  Non-Essential, But Recommended -->
    <meta name="og:site_name" content="{{ get_option('site_name') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fotorama-4.6.4/fotorama.css') }}">
@endsection

@section('main')

    <div class="modern-single-ad-top-description-wrap">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="modern-single-ad-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">@lang('app.home')</a></li>
                            @if($ad->category)
                                <li><a href="{{ route('market', ['category' => $ad->category->id]) }}">  {{ $ad->category->category_name }} </a> </li>
                            @endif
                            <li>{{ $ad->title }}</li>
                        </ol><!-- breadcrumb -->
                        <h2 class="modern-single-ad-top-title">{{ $ad->title }}</h2>
                    </div>

                    @if($enable_monetize)
                        {!! get_option('monetize_code_below_ad_title') !!}
                    @endif

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="modern-single-ad-top-description">

                    <div class="col-sm-4 col-xs-12">
                       <h2 class="ad-title"><a href="{{ route('single_ad', $ad->slug) }}">{{ $ad->title }}</a>  </h2>
                        <h2 class="modern-single-ad-price">PessaCoin: {!! $ad->price !!}</h2>

                        <h3>@lang('app.general_info')</h3>
                        <p><strong><i class="fa fa-money"></i> @lang('app.price') </strong> USD {{ $ad->price*get_option('premium_ads_price') }} </p>
                        <p><strong><i class="fa fa-map-marker"></i>  @lang('app.location') </strong> {!! $ad->full_address() !!} </p>
                        <p><strong><i class="fa fa-check-circle-o"></i> @lang('app.condition')</strong> {{ $ad->ad_condition }} </p>

                          <ul class="ad-action-list">
                            <li><a href="{{ route('market', ['user_id'=>$ad->user_id]) }}"><i class="fa fa-user"></i> @lang('app.more_ads_by_this_seller')</a></li>
                            <li><a href="javascript:;" id="save_as_favorite" data-slug="{{ $ad->slug }}">
                                    @if( ! $ad->is_my_favorite())
                                        <i class="fa fa-star-o"></i> @lang('app.save_ad_as_favorite')
                                    @else
                                        <i class="fa fa-star"></i> @lang('app.remove_from_favorite')
                                    @endif
                                </a></li>
                            <li><a href="#" data-toggle="modal" data-target="#reportAdModal"><i class="fa fa-ban"></i> @lang('app.report_this_ad')</a></li>
                        </ul>

                        @if($enable_monetize)
                            {!! get_option('monetize_code_below_general_info') !!}
                        @endif

                    </div>


                    <div class="col-sm-4 col-xs-12">
                        <div class="sidebar-widget">

                    <h3>@lang('app.seller_info')</h3>
                    <div class="sidebar-user-info">
                        <div class="row">
                            <div class="col-xs-3">
                                <img src="{{ $ad->user->get_gravatar() }}" class="img-circle img-responsive" />
                            </div>
                            <div class="col-xs-9">
                                <h5>{{ $ad->user->name }}</h5>
                                <p class="text-muted"><i class="fa fa-map-marker"></i> {{ $ad->user->get_address()}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-user-link">
                        <button class="btn btn-block" id="onClickShowPhone">
                            <strong> <span id="ShowPhoneWrap"></span> </strong> <br />
                            <span class="text-muted">@lang('app.click_to_show_phone_number')</span>
                        </button>

                        @if($ad->user->email)
                            <button class="btn btn-block" data-toggle="modal" data-target="#replyByEmail">
                                <i class="fa fa-envelope-o"> @lang('app.reply_by_email')</i>
                            </button>
                        @endif

                      

                    </div>

                </div>

                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <div class="sidebar-widget">

                    <p> Tips:<br><br>
Read the ad, check the price and the terms.
Watch out for fraudsters! Review the trader's feedback and experience, and take extra caution with recently created or modified accounts.
Make sure you are ready to send or receive payment before sending a trade request.</p>
<br>
                 

                    <form action="{{route('order')}}" method="get">
                 <input type="hidden" name="ad_id" value="{{ $ad->id }}">
         <input type="hidden" name="ad_price" value="{{ $ad->price*get_option('premium_ads_price') }}">
           <button type="submit" class="btn btn-info">Buy Now</button>
         </form>
         

                </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>


    




    <div class="modern-post-ad-call-to-cation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>@lang('app.want_something_sell_quickly')</h1>
                    <p>@lang('app.post_your_ad_quicly')</p>
                    <a href="{{route('create_ad')}}" class="btn btn-info btn-lg">@lang('app.post_an_ad')</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reportAdModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('app.report_ad_title')</h4>
                </div>
                <div class="modal-body">

                    <p>@lang('app.report_ad_description')</p>

                    <form>

                        <div class="form-group">
                            <label class="control-label">@lang('app.reason'):</label>
                            <select class="form-control" name="reason">
                                <option value="">@lang('app.select_a_reason')</option>
                                <option value="unavailable">@lang('app.item_sold_unavailable')</option>
                                <option value="fraud">@lang('app.fraud')</option>
                                <option value="duplicate">@lang('app.duplicate')</option>
                                <option value="spam">@lang('app.spam')</option>
                                <option value="wrong_category">@lang('app.wrong_category')</option>
                                <option value="offensive">@lang('app.offensive')</option>
                                <option value="other">@lang('app.other')</option>
                            </select>

                            <div id="reason_info"></div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">@lang('app.email'):</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div id="email_info"></div>

                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">@lang('app.message'):</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                            <div id="message_info"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="button" class="btn btn-primary" id="report_ad">@lang('app.report_ad')</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="replyByEmail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>

                <form action="" id="replyByEmailForm" method="post"> @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="control-label">@lang('app.name'):</label>
                        <input type="text" class="form-control" id="name" name="name" data-validation="required">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">@lang('app.email'):</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="control-label">@lang('app.phone_number'):</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="control-label">@lang('app.message'):</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ad_id" value="{{ $ad->id }}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                    <button type="submit" class="btn btn-primary" id="reply_by_email_btn">@lang('app.send_email')</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="shareEmbedded" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('app.embedded_preview')</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="embedded_width" class="control-label">@lang('app.embedded_width'):</label>
                                <input type="number" class="form-control" id="embedded_width" name="embedded_width" value="300" placeholder="@lang('app.embedded_width')">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="embedded_height" class="control-label">@lang('app.embedded_height'):</label>
                            <input type="number" class="form-control" id="embedded_height" name="embedded_height" value="460" placeholder="@lang('app.embedded_width')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="control-label">@lang('app.embedded_code'):</label>
                        <textarea class="form-control" readonly id="embedded_code">{{'<iframe src="'.route('embedded_ad', $ad->slug).'" style="border:0;width:300px;height:460px;"></iframe>'}}</textarea>
                    </div>

                    <div class="form-group">
                        <iframe src="{{ route('embedded_ad', $ad->slug) }}" style="border:0;width:300px;height:460px;"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('page-js')

    <script src="https://maps.googleapis.com/maps/api/js?key={{get_option('google_map_api_key')}}&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">
        function initMap() {
            var myLatLng = {lat: {{$ad->latitude}}, lng: {{$ad->longitude}} };

            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: myLatLng,
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{$ad->title}}'
            });
            marker.setMap(map);
        }

    </script>

    <script src="{{ asset('assets/plugins/fotorama-4.6.4/fotorama.js') }}"></script>
    <script src="{{ asset('assets/plugins/SocialShare/SocialShare.js') }}"></script>
    <script src="{{ asset('assets/plugins/form-validator/form-validator.min.js') }}"></script>

    <script>
        $('.share').ShareLink({
            title: '{{ $ad->title }}', // title for share message
            text: '{{ substr(trim(preg_replace('/\s\s+/', ' ',strip_tags($ad->description) )),0,160) }}', // text for share message

            @if($ad->media_img->first())
            image: '{{ media_url($ad->media_img->first(), true) }}', // optional image for share message (not for all networks)
            @else
            image: '{{ asset('uploads/placeholder.png') }}', // optional image for share message (not for all networks)
            @endif
            url: '{{ route('single_ad', $ad->slug) }}', // link on shared page
            class_prefix: 's_', // optional class prefix for share elements (buttons or links or everything), default: 's_'
            width: 640, // optional popup initial width
            height: 480 // optional popup initial height
        })
    </script>
    <script>
        $.validate();
    </script>

    <script>
        $(function(){
            $('#onClickShowPhone').click(function(){
                $('#ShowPhoneWrap').html('<i class="fa fa-phone"></i> {{ $ad->seller_phone }}');
            });

            $('#save_as_favorite').click(function(){
                var selector = $(this);
                var slug = selector.data('slug');

                $.ajax({
                    type : 'POST',
                    url : '{{ route('save_ad_as_favorite') }}',
                    data : { slug : slug, action: 'add',  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.status == 1){
                            selector.html(data.msg);
                        }else {
                            if (data.redirect_url){
                                location.href= data.redirect_url;
                            }
                        }
                    }
                });
            });

            $('button#report_ad').click(function(){
                var reason = $('[name="reason"]').val();
                var email = $('[name="email"]').val();
                var message = $('[name="message"]').val();
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                var error = 0;
                if(reason.length < 1){
                    $('#reason_info').html('<p class="text-danger">Reason required</p>');
                    error++;
                }else {
                    $('#reason_info').html('');
                }
                if(email.length < 1){
                    $('#email_info').html('<p class="text-danger">Email required</p>');
                    error++;
                }else {
                    if ( ! regex.test(email)){
                        $('#email_info').html('<p class="text-danger">Valid email required</p>');
                        error++;
                    }else {
                        $('#email_info').html('');
                    }
                }
                if(message.length < 1){
                    $('#message_info').html('<p class="text-danger">Message required</p>');
                    error++;
                }else {
                    $('#message_info').html('');
                }

                if (error < 1){
                    $('#loadingOverlay').show();
                    $.ajax({
                        type : 'POST',
                        url : '{{ route('report_ads_pos') }}',
                        data : { reason : reason, email: email,message:message, slug:'{{ $ad->slug }}',  _token : '{{ csrf_token() }}' },
                        success : function (data) {
                            if (data.status == 1){
                                toastr.success(data.msg, '@lang('app.success')', toastr_options);
                            }else {
                                toastr.error(data.msg, '@lang('app.error')', toastr_options);
                            }
                            $('#reportAdModal').modal('hide');
                            $('#loadingOverlay').hide();
                        }
                    });
                }
            });

            $('#replyByEmailForm').submit(function(e){
                e.preventDefault();
                var reply_email_form_data = $(this).serialize();

                $('#loadingOverlay').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('reply_by_email_post') }}',
                    data : reply_email_form_data,
                    success : function (data) {
                        if (data.status == 1){
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }else {
                            toastr.error(data.msg, '@lang('app.error')', toastr_options);
                        }
                        $('#replyByEmail').modal('hide');
                        $('#loadingOverlay').hide();
                    }
                });
            });

            $(document).on('change past keyup', '#embedded_width', function(){
                var width = $(this).val();
                var height = $('#embedded_height').val();
                $('iframe').css('width', width+'px');

                var iframe_code = '<iframe src="http://localhost/real-estate/source/embedded/2-beds-nice-apertment-in-ny-united-states" style="border:0;width:'+width+'px;height:'+height+'px;"></iframe> ';

                $('#embedded_code').val(iframe_code);
            });
            $(document).on('change past keyup', '#embedded_height', function(){
                var height = $(this).val();
                var width = $('#embedded_width').val();
                $('iframe').css('height', height+'px');

                var iframe_code = '<iframe src="http://localhost/real-estate/source/embedded/2-beds-nice-apertment-in-ny-united-states" style="border:0;width:'+width+'px;height:'+height+'px;"></iframe> ';

                $('#embedded_code').val(iframe_code);
            });

        });
    </script>

@endsection