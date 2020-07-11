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
                 <br>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            @endif

            @include('admin.flash_msg')

            <div class="row">
         <!--     <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-9">
                            <table class="table table-striped">
                                <tr>
                                    <td>
                                        <b>In your wallet:</b>
                                    </td>
                                    <td>
                                        <b>0.0 BTC</b>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Transaction fee:</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <b>0.0 BTC</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>You can send up to</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <b>0.0 BTC</b>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="panel-heading">
                        <a href="" class="btn btn-info">Send Bitcoins Now</a>
                    </div>

                </div>

                <div class="col-xs-4 col-xs-offset-4">
                </div>
                </div>
 -->

        

           <div class="col-xs-12">

            <div class="well well-sm">
                 <form action="{{ route('deposit-amount') }}" method="post"> @csrf
                   <div class="row">
                    <div class="col-sm-12">
                      <fieldset>
                        <h3>Buy PessaCoins</h3><br>
                       

                    <div class="form-group">
                        <label>Deposit Amount (USD)</label>
                         <input type="hidden" name="ad_id" value="1">
                        <input type="number" name="deposit_amount" step="any" id="amount"  class="form-control" min="25" max="10000" required onchange ="calculate(this.form);">
                        <input type="hidden" name="rate" id="rate" class="form-control" disabled="" value="{{ get_option('urgent_ads_price')  }}">
                    </div>
 
                     <div class="form-group">
                           <label>Payment method</label>
                           <select class="form-control select2NoSearch" name="payment_method" id="payment_method"> 
                           <option value="mpesa" >Mpesa</option>                           
                           @if(get_option('enable_paypal') == 1)
                            <option value="paypal" {{ old('payment_method') == 'paypal' ? 'selected':'' }}>@lang('app.paypal')</option>
                            @endif
                            @if(get_option('enable_stripe') == 1)
                            <option value="stripe" {{ old('payment_method') == 'stripe' ? 'selected':'' }}>@lang('app.stripe')</option>
                            @endif
                        </select>
                        {!! $errors->has('payment_method')? '<p class="help-block">'.$errors->first('payment_method').'</p>':'' !!}
                    </div>

                    <div class="form-group">
                      <input type="text" name = display class="form-control" disabled>
                      <input type="hidden" name = total class="form-control">
                      <hr>
                      <button type="submit" class="btn btn-info">Deposit</button> 
                  </div>



              </fieldset>
          </div> 
      </div>
  </form>

</div>
</div>




               

                    </div>

                </div>


</div>
</div>

</div>   <!-- /#page-wrapper -->

</div>   <!-- /#wrapper -->

</div> <!-- /#container -->
@endsection

@section('page-js')


<script type="text/javascript">

  function calculate(f) {
    var amount = document.getElementById('amount').value;
    var rate = document.getElementById('rate').value;

    

    f.total.value=total;
    

     if (amount<=49) {
        var dollar = "PessaTokens "; 
        var total = amount/rate*100 ;
       
       
        
    }

  else{
 var dollar = "PessaCoins ";
 var total = amount/rate;
  }


  f.display.value = dollar.concat(total);

  

   

}
</script>
@endsection

