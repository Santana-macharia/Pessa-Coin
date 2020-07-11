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
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-12">

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">You are about to buy PessaCoin, confirm your order</h4>
                </div>
                <div class="panel-body">
                  <div class="col-md-9">
                   <table class="table table-striped">
                    <tr>
                    <!--   <td colspan="2">
                        <b>{{ $payment->ad_id }}</b>
                      </td> -->
                    </tr>


                  </table>
                  <?php 
                  if ($payment->payment_method == 'mpesa') {
                    $amount = $payment->amount;
                  $amount = $amount * 110;
                  $currency = "KSH";
                  }
                  else{
                     $amount = $payment->amount;
                     $currency = $payment->currency;
                  }
                 
                  ?>
                  @if($payment->payment_method == 'mpesa')
                  <div class="job-edit-pro">
                   <ul style="list-style-type:none;">
                    <li>Step 1: Go to M-Pesa and select the ‘Pay Bill’ Option.</li>
                    <li>Step 2: Enter Mpesa Pay Bill Number 100400 and press “OK”</li>
                    <li>Step 3: Enter the bank account number <strong>9783686630</strong></li>
                    <li>Step 4: Enter amount <strong>{{ $currency.' '.$amount }}</strong> and Press ‘OK’.</li>
                    <li>Step 5: Enter your M-Pesa PIN and Press ‘OK’.</li>
                  </ul> 

                <div class="row">
                   <div class="form-group" style="padding: 10px;">
                    <hr>
                    <label for="inputName" class="col-sm-12 control-label">For payments confirmation contact: <strong>+254 703 622 390</strong> </label>
                     
                  </div>
                </div>


                  <div class="row">
                   <div class="form-group" style="padding: 10px;">
                    <label for="inputName" class="col-sm-12 control-label">Enter Mpesa confirmation code:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control"  id="phone" placeholder="Confirmation code"   required="">
                      <input type="hidden" id="amount" placeholder="amt" value="{{ $amount }}">
                      <input type="hidden" id="account" placeholder="account" value="{{ $payment->local_transaction_id }}">
                    </div>
                    <div class="col-sm-4">
                      <label class="control-label"><p>&nbsp;</p></label>
                      <button id="makePayment" class="btn btn-sm btn-primary">Confirm</button>
                      <button id="makePaymentDisabled" style="display:none;" class="btn btn-sm btn-success" disabled>Processing...
                      </button>
                    </div>
                  </div>
                </div>


                <div id="modal-loader3" style="display: none; text-align: center;">
                  <img src="{{asset('uploads')}}/loader.gif">
                </div>

                <!-- content will be load here -->                          
                <div id="dynamic-content3" style="padding: 10px;"></div><br/>

                @if(count($errors->all()))
                <div class="alert custom-dark-alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  @foreach ($errors->all() as $error)
                  <p><strong><i class="fa fa-times"></i></strong> {{ $error }}</p>
                  @endforeach
                </div>
                @endif
              </div>
              @elseif($payment->payment_method == 'paypal')
              <form action="" method="post"> @csrf
                                    <input type="hidden" name="cmd" value="_xclick" />
                                    <input type="hidden" name="no_note" value="1" />
                                    <input type="hidden" name="lc" value="UK" />
                                    <input type="hidden" name="amount" value="{{$amount}}" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                    <button type="submit" class="btn btn-info"> <i class="fa fa-paypal"></i>PAYPAL</button>
                                </form>
              @endif


            </div>
            <div class="col-md-3">
              <div style="text-align: center;">
                <h3>Total cost</h3>
                <h3><span style="color:green;">{{ $currency.' '.$amount }}</span></h3>
              </div>
            </div>



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

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
 $(document).ready(function(){



  $(document).on('click', '#makePayment', function(e){

    e.preventDefault();

            var phone = document.getElementById('phone').value;   // it will get id of clicked row
            var amount = document.getElementById('amount').value;
            var account = document.getElementById('account').value;

            $('#dynamic-content3').html(''); // leave it blank before ajax call
            $('#modal-loader3').show();      // load ajax loader
            $('#makePayment').hide();
            $('#makePaymentDisabled').show();
            
            $.ajax({
              url: '{{url('confirm')}}',
              type: 'get',
              data: 'phone='+phone+'&amount='+amount+'&account='+account,
              dataType: 'html'
            })
            .done(function(data){
              console.log(data);  
              $('#dynamic-content3').html('');    
              $('#dynamic-content3').html(data); // load response 
              $('#modal-loader3').hide();     // hide ajax loader 
              $('#makePaymentDisabled').hide();
              $('#makePayment').show();
            })
            .fail(function(){
              $('#dynamic-content3').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
              $('#modal-loader3').hide();
              $('#makePaymentDisabled').hide();
              $('#makePayment').show();
            });
            
          });



});

</script>

@endsection