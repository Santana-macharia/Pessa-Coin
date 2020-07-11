@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">

        <div id="wrapper">

            @include('admin.sidebar_menu')

            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-md-10 col-xs-12">

                        <form action="" id="adsPostForm" class="form-horizontal" method="post" enctype="multipart/form-data"> @csrf

                   

                        <div style="display: none;" class="form-group {{ $errors->has('ad_title')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.ad_title')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ad_title" value="{{ old('ad_title') ? old('ad_title') : $ad->title }}" name="ad_title" placeholder="@lang('app.ad_title')">
                                {!! $errors->has('ad_title')? '<p class="help-block">'.$errors->first('ad_title').'</p>':'' !!}
                                <p class="text-info"> @lang('app.great_title_info')</p>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('ad_description')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.ad_description')</label>
                            <div class="col-sm-8">
                                <textarea name="ad_description" class="form-control" rows="8">{{ old('ad_description')?  old('ad_description') : $ad->description }}</textarea>
                                {!! $errors->has('ad_description')? '<p class="help-block">'.$errors->first('ad_description').'</p>':'' !!}
                                <p class="text-info"> @lang('app.ad_description_info_text')</p>
                            </div>
                        </div>




                      

                        <div class="form-group  {{ $errors->has('price')? 'has-error':'' }}">
                            <label for="price" class="col-md-4 control-label">PessaCoin</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" placeholder="@lang('app.ex_price')" class="form-control" id="amount" onchange ="calculate(this.form);" name="price" id="price"value="{{ old('price')? old('price') : $ad->price }}">
                                     <input type="hidden" name="rate" id="rate" class="form-control" disabled="" value="{{ get_option('urgent_ads_price')  }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                  <input type="text" name = display class="form-control" disabled>
                      <input type="hidden" name = total class="form-control">
                                     
                                    </label>
                                </div>
                            </div>

                        
                        </div>


                    

               

                      
<div style="display: none;">
                     

                        <div class="form-group {{ $errors->has('seller_name')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_name" value="{{ old('seller_name')? old('seller_name') : $ad->seller_name }}" name="seller_name" placeholder="@lang('app.seller_name')">
                                {!! $errors->has('seller_name')? '<p class="help-block">'.$errors->first('seller_name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('seller_email')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_email')</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="seller_email" value="{{ old('seller_email')? old('seller_email') : $ad->seller_email }}" name="seller_email" placeholder="@lang('app.seller_email')">
                                {!! $errors->has('seller_email')? '<p class="help-block">'.$errors->first('seller_email').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('seller_phone')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_phone')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_phone" value="{{ old('seller_phone') ? old('seller_phone') : $ad->seller_phone }}" name="seller_phone" placeholder="@lang('app.seller_phone')">
                                {!! $errors->has('seller_phone')? '<p class="help-block">'.$errors->first('seller_phone').'</p>':'' !!}
                            </div>
                        </div>

                        </div>

                     



                        <hr />

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">@lang('app.edit_ad')</button>
                            </div>
                        </div>
                        </form>

                    </div>

                </div>

            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->

@endsection

@section('page-js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_option('google_map_api_key')}}&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        function initAutocomplete() {

            var myLatLng = {lat: {{ $ad->latitude ? $ad->latitude : get_option('default_latitude') }}, lng: {{ $ad->longitude ? $ad->longitude : get_option('default_longitude') }} };

            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: myLatLng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            //Click event for getting lat lng
            google.maps.event.addListener(map, 'click', function (e) {
                $('input#latitude').val(e.latLng.lat());
                $('input#longitude').val(e.latLng.lng());
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{$ad->title}}'
            });
            marker.setMap(map);

            var markers = [];
            // [START region_getplaces]
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
            // [END region_getplaces]
        }

    </script>


    <script>

        function generate_option_from_json(jsonData, fromLoad){

            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('');
                    $('#brand_select').select2();
                }
                $('#brand_loader').hide('slow');
            }else if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('');
                    $('#state_select').select2();
                }
                $('#state_loader').hide('slow');

            }else if(fromLoad === 'state_to_city'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> @lang('app.select_city') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].city_name +' </option>';
                    }
                    $('#city_select').html(option);
                    $('#city_select').select2();
                }else {
                    $('#city_select').html('');
                    $('#city_select').select2();
                }
                $('#city_loader').hide('slow');

            }

        }


        $(document).ready(function(){
            $('[name="category"]').change(function(){
                var category_id = $(this).val();
                $('#brand_loader').show();

                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_brand_by_category') }}',
                    data : { category_id : category_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'category_to_brand');
                    }
                });
            });


            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#state_loader').show();
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
                $('#city_loader').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state_id : state_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });

            $("#images").change(function() {
                var fd = new FormData(document.querySelector("form#adsPostForm"));
                //$('#loadingOverlay').show();
                $('.progress').show();
                $.ajax({
                    url : '{{ route('upload_ads_image') }}',
                    type: "POST",
                    data: fd,

                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                //console.log(percentComplete);

                                var progress_bar = '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '+percentComplete+'%">'+percentComplete+'% </div>';

                                if (percentComplete === 100) {
                                    $('.progress').hide();
                                }
                            }
                        }, false);

                        return xhr;
                    },

                    cache: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success : function (data) {
                        //$('#loadingOverlay').hide('slow');
                        if (data.success == 1){
                            $('#uploaded-ads-image-wrap').load('{{ route('append_media_image') }}');
                        } else{
                            toastr.error(data.msg, '<?php echo trans('app.error') ?>', toastr_options);
                        }
                    }
                });
            });


            $('body').on('click', '.imgDeleteBtn', function(){
                //Get confirm from user
                if ( ! confirm('{{ trans('app.are_you_sure') }}')){
                    return '';
                }

                var current_selector = $(this);
                var img_id = $(this).closest('.img-action-wrap').attr('id');
                $.ajax({
                    url : '{{ route('delete_media') }}',
                    type: "POST",
                    data: { media_id : img_id, _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.success == 1){
                            current_selector.closest('.creating-ads-img-wrap').hide('slow');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
                });
            });
            $('body').on('click', '.imgFeatureBtn', function(){
                var img_id = $(this).closest('.img-action-wrap').attr('id');
                var current_selector = $(this);

                $.ajax({
                    url : '{{ route('feature_media_creating_ads') }}',
                    type: "POST",
                    data: { media_id : img_id, _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.success == 1){
                            $('.imgFeatureBtn').html('<i class="fa fa-star-o"></i>');
                            current_selector.html('<i class="fa fa-star"></i>');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
                });
            });

        });
    </script>


    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', '<?php echo trans('app.success') ?>', toastr_options);
        @endif
    </script>


<script type="text/javascript">

  function calculate(f) {
    var amount = document.getElementById('amount').value;
    var rate = document.getElementById('rate').value;

    var total=amount/rate;
    f.total.value=total;
    var dollar = "Ksh ";

    f.display.value = dollar.concat(total);

}
</script>
@endsection