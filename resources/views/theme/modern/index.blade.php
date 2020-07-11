@extends('layout.main')

@section('main')
    <div class="modern-top-intoduce-section">
<br><br><br><br><br><br>
        <div class="container">
            <div class="row">
               
                   <div class="col-md-12">
                     <div class="modern-top-hom-cat-section">

                        <div class="modern-home-search-bar-wrap">
                            <div class="search-wrapper">
                                <h3>  @lang('app.find_your_property')</h3>

                            
                                <a href="{{ route('buy') }}" class="btn btn-info btn-lg"><i class="fa fa-search-plus"></i> Get started</a>

                             
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                 </div>

            


            </div>
        </div>
        <br><br><br><br><br>
    </div>

   

@endsection

@section('page-js')
    <script>
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if(fromLoad === 'country_to_state'){
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
            }
        }

        $(document).ready(function(){
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
        });
    </script>
@endsection