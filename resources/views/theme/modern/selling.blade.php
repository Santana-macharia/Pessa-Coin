@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')
  <div class="modern-top-intoduce-section">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="modern-top-hom-cat-section">

                        <div class="modern-home-search-bar-wrap">
                            <div class="search-wrapper">
                                <h3> @lang('app.sell_bitcoins_online')</h3>

                               

                              

                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="row">

                    <div class="col-sm-12">

                        <?php
                        $allAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'all'])));
                        $personalAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'personal'])));
                        $businessAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'business'])));

                        ?>

                        <div class="listingTopFilterBar">
                            <span class="totalFoundListingTop">@lang('app.total') <strong>{{ $ads->total() }}</strong> @lang('app.ads_founds') </span>

                            <ul class="listingViewIcon pull-right">
                                <li class="dropdown shortByListingLi">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">@lang('app.short_by') <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'price_high_to_low']) }}">@lang('app.price_high_to_low')</a></li>
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'price_low_to_high']) }}">@lang('app.price_low_to_high')</a></li>
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'latest']) }}">@lang('app.latest')</a></li>
                                    </ul>
                                </li>
                             
                            </ul>
                        </div>
                    </div>
                </div>

                @if($enable_monetize)
                    <div class="row">
                        <div class="col-sm-12">
                            {!! get_option('monetize_code_listing_above_premium_ads') !!}
                        </div>
                    </div>
                @endif

                <div class="ad-box-wrap">
                    @if( ! request('user_id'))
                        @if($premium_ads)
                            @if($premium_ads->count() > 0)
                                <div class="ad-box-premium-wrap">
                                    <h3>@lang('app.premium_ads')</h3>
                                   

                                <div class="ad-box-list-view">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-responsive">
                                                @foreach($premium_ads as $ad)
                                                    {{-- */ session('grid_list_view') == 'list'? $ad->increase_impression() :'none' /*--}}
                                                    <tr class="ad-{{ $ad->price_plan }}">
                                                        
                                                        <td>
                                                            <h5><a href="{{ route('single_ad', $ad->slug) }}" >{{ $ad->title }}</a> </h5>
                                                            <p class="text-muted">
                                                                @if($ad->city)
                                                                    <i class="fa fa-map-marker"></i> <a class="location text-muted" href="{{ route('listing', ['city'=>$ad->city->id]) }}"> {{ $ad->city->city_name }} </a>,
                                                                @endif
                                                                <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <h5>{{ themeqx_price_ng($ad) }}</h5>
                                                            @if($ad->price_plan == 'premium')
                                                                <div class="ribbon-green-bar">{{ ucfirst($ad->price_plan) }}</div>
                                                            @endif
                                                            @if($ad->mark_ad_urgent == '1')
                                                                <div class="ribbon-red-bar">@lang('app.urgent')</div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif

                    @if($enable_monetize)
                        <div class="row">
                            <div class="col-sm-12">
                                {!! get_option('monetize_code_listing_above_regular_ads') !!}
                            </div>
                        </div>
                    @endif

                    @if($ads->total() > 0)

                  

                            <h3>Sell bitcoins online</h3>

                     

                        <div class="ad-box-list-view" style="display: {{ session('grid_list_view') == 'list'? 'block':'none' }};">
                            <div class="row">
                                <div class="col-sm-12">
                                        <table class="table table-bordered table-striped" id="jDataTable">
                            <thead>
                                <tr>
                                    <th>Seller</th>
                                    <th>Payment method</th>
                                    <th>Price / BTC</th>
                                    <th>Location</th>
                                    
                                </tr>
                            </thead>
                            
                            
                           @foreach($ads as $ad)
                                <tr>
                                    <td><h5><a href="{{ route('single_ad', $ad->slug) }}" >{{ $ad->title }}</a> </h5></td>
                                    <td> <p class="listViewItemFooter"><span>{{ ucfirst($ad->type) }} </span></p></td>
                                    <td><h5>{{ themeqx_price_ng($ad) }} </h5></td>
                                    <td>{{ $ad->city->city_name }}</td>
                                    <td> <a href="{{ route('single_ad', $ad->slug) }}" class="btn btn-info">Sell</a></td>
                                </tr>
                            @endforeach
                            
                        </table>


                                
                 
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-warning">
                            <h2><i class="fa fa-info-circle"></i> @lang('app.search_not_found') </h2>
                        </div>
                    @endif

                    @if($enable_monetize)
                        <div class="row">
                            <div class="col-sm-12">
                                {!! get_option('monetize_code_listing_below_regular_ads') !!}
                            </div>
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        {{ $ads->appends(request()->input())->links() }}
                    </div>
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

@endsection


@section('page-js')
    <script>
        $(document).ready(function() {
            $('#shortBySelect').change(function () {
                var form_input = $('#listingFilterForm').serialize();
                location.href = '{{ route('listing') }}?' + form_input + '&shortBy=' + $(this).val();
            });
        });
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_sub_category'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_sub_category') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].category_name +' </option>';
                    }
                    $('#sub_category_select').html(option);
                    $('#sub_category_select').select2();
                }else {
                    $('#sub_category_select').html('<option value="">@lang('app.select_a_sub_category')</option>');
                    $('#sub_category_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('<option value="">@lang('app.select_a_brand')</option>');
                    $('#brand_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('<option value="" selected> @lang('app.select_state') </option>');
                    $('#state_select').select2();
                }
                $('#loaderListingIcon').hide('slow');

            }else if(fromLoad === 'state_to_city'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_city') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].city_name +' </option>';
                    }
                    $('#city_select').html(option);
                    $('#city_select').select2();
                }else {
                    $('#city_select').html('<option value="" selected> @lang('app.select_city') </option>');
                    $('#city_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(function(){

            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_state_by_country') }}',
                    data : { country_id : country_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'country_to_state');
                    }
                });
            });
            $('[name="state"]').change(function(){
                var state_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state_id : state_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });
        });
        $(function(){
            $('#showGridView').click(function(){
                $('.ad-box-grid-view').show();
                $('.ad-box-list-view').hide();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'grid',  _token : '{{ csrf_token() }}' },
                });
            });
            $('#showListView').click(function(){
                $('.ad-box-grid-view').hide();
                $('.ad-box-list-view').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'list',  _token : '{{ csrf_token() }}' },
                });
            });
        });
    </script>

    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', '<?php echo trans('app.success') ?>', toastr_options);
        @endif
    </script>
@endsection