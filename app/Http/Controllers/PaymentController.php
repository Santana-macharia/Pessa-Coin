<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Payment;
use App\Transaction;
use App\Booking;
use App\User;
use App\Find;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use SmoDav\Mpesa\Laravel\Facades\Simulate;
use SmoDav\Mpesa\Laravel\Facades\STK;

class PaymentController extends Controller
{
// get get pending payments
  public function index(){
    $title = trans('app.payments');

    $user = Auth::user();
    if ($user->is_admin()){
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->whereStatus('pending')->orderBy('id', 'desc')->paginate(20);
    }else{
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->whereStatus('pending')->orderBy('id', 'desc')->paginate(20);
    }

    return view('admin.payments', compact('title', 'payments'));
  }
// get get success payments
   public function coinSuccess(){
    $title = trans('app.payments');

    $user = Auth::user();
    if ($user->is_admin()){
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->whereStatus('success')->orderBy('id', 'desc')->paginate(20);
    }
    else{
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->whereStatus('success')->orderBy('id', 'desc')->paginate(20);
    }

    return view('admin.payments', compact('title', 'payments'));
  }

// get get initial payments
   public function coinInitial(){
    $title = trans('app.payments');

    $user = Auth::user();
    if ($user->is_admin()){
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->whereStatus('initial')->orderBy('id', 'desc')->paginate(20);
    }
    else{
      $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'mpesa_code', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->whereStatus('initial')->orderBy('id', 'desc')->paginate(20);
    }

    return view('admin.payments', compact('title', 'payments'));
  }

  public function myRequests(){
   $title = trans('app.my_requests');

   $user = Auth::user();
   if ($user->is_admin()){
    $payments = Payment::select('id','ad_id', 'user_id', 'amount', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
  }
  else
  {
    $payments = Find::select('id','locality', 'budget', 'property_use', 'status','property_type','bedrooms','bathrooms', 'created_at')->whereUserId($user->id)->orderBy('id', 'desc')->paginate(20);
  }

  return view('admin.my_requests', compact('title', 'payments'));
}

public function myBookings(){
 $title = trans('app.my_bookings');

 $user = Auth::user();
 if ($user->is_admin()){
  $payments = Payment::select('id','ad_id', 'user_id', 'amount', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
}else{
  $payments = Booking::select('id','ad_id', 'user_id', 'amount', 'status','secret_id','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
}

return view('admin.my_bookings', compact('title', 'payments'));
}

public function agentBookings(){
 $title = trans('app.my_bookings');

 $user = Auth::user();
 if ($user->is_admin()){
  $payments = Booking::select('id','ad_id', 'user_id', 'amount', 'status','secret_id','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
}else{
  $payments = Booking::select('id','ad_id', 'user_id', 'amount', 'status','secret_id','local_transaction_id', 'created_at')->whereSupplierId($user->id)->wherePaymentStatus('paid')->orderBy('id', 'desc')->paginate(20);
}

return view('admin.agent_bookings', compact('title', 'payments'));
}


      //procced to payment from pending
public function pendingPayment(Request $request){
  $user_id = User::find(Auth::id());
  $local_transaction_id = $request->local_transaction_id;
  return redirect(route('payment_checkout', $local_transaction_id));
}

//procced to closing booking
public function closeBooking(Request $request){
  $secret_code    = $request->secret_code;
  $booking_id     = $request->booking_id;
     //updated payment
  $payments  = Booking::where('secret_id',$secret_code)->where('id',$booking_id)->first();
  if (!$payments){
   return back()->withInput()->with('error', 'wrong secret code');
 }

 $payments ->status  = 'closed';
 $payments ->save();
 return back()->withInput()->with('success', 'updated successfully');
}

public function callBack(){

  $postData = file_get_contents('php://input');
  error_log("STK Push Result ".$postData);
  $array = json_decode($postData, true);
  $ResultDesc = $array['Body']['stkCallback']['ResultDesc'];
  if($ResultDesc=='The service request is processed successfully.'){

    $TransactionDate = $array['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
    $MpesaReceiptNumber = $array['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
    $Amount = $array['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
    $PhoneNumber = $array['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];

    $data = [
      'TransactionDate'        => $TransactionDate,
      'MpesaReceiptNumber'     => $MpesaReceiptNumber,
      'PhoneNumber'            => $PhoneNumber,
      'Amount'                 => $Amount,
    ];


    $transaction = Transaction::create($data);
    if ($transaction){
  //send sms

    }


  }
}



public function checkoutMpesa(Request $request){

 $local_transaction_id = $request->account;
 $amount = $request->amount;
 $this->validate($request,[
   'phone' => 'required',
 ]);

 $phone = $request->phone;
 $transactionId=$phone;
 $user = User::find(Auth::id());
 $user_id = $user->id;
 $user_phone = $user->phone;

 
 

     //updated payment
    $payments  = Payment::where('local_transaction_id',$local_transaction_id)->first();
    $payments ->status  = 'pending';
    $payments ->mpesa_code  = $transactionId;
    $payments ->save();

  return view('payments.success-mpesa',compact('transactionId','phone', 'local_transaction_id'));

}

public function proceedMpesa(Request $request){
 $transactionId           = $request->transactionId;
 $local_transaction_id    = $request->local_transaction_id; 
 $phone = $request->phone;
 $phone = $phone;

 $user = User::find(Auth::id());
 $user_id = $user->id;


 $user_status = $user->user_status;
 $value =0;

  if (Transaction::where('PhoneNumber', '=', $phone)->where('user_id', '=', $value)->count() > 0) {
             //updated booking
    $bokings  = Booking::where('local_transaction_id',$local_transaction_id)->first();
    $bokings->status          = 'active';
    $bokings->payment_status  = 'paid';
    $bokings->save();

     //updated payment
    $payments  = Payment::where('local_transaction_id',$local_transaction_id)->first();
    $payments ->status  = 'success';
    $payments ->save();

    //update transaction
    $transactions = Transaction::where('PhoneNumber', '=', $phone)->where('user_id', '=', $value)->first();
    $transactions ->user_id  = $user_id;
    $transactions ->save();



  //get service name
    $package_id = $bokings->ad_id;
    $package  = Ad::where('id',$package_id)->first();


        //send email to 
            $name   =$user->name;
            $email  =$user->email;
            $sname  ='Payment Received Successfully';
            $service_id = $bokings->id;
            $amount     = $bokings->amount;
            $updated_at     = $bokings->updated_at;
            $package_name = $package->purpose;
            $data=array(
                'name' =>$name,
                'email'=>$email,
                'sname'=>$sname,
                'service_id'=>$service_id,
                'amount'=>$amount,
                'updated_at'=>$updated_at,
                'package_name'=>$package_name,

            ); 

     Mail::send('emails.alert_client',$data, function($message) use ($data){
     $message->to($data['email']);
     $message->subject($data['sname']);

   });
             //return view('payments.success');
    return redirect(route('my_services'))->with('success', trans('app.payment_received_msg'));
    
     }
  else
  {

    return view('payments.unpaid-mpesa',compact('transactionId', 'local_transaction_id', 'phone'));

  }

}





      //procced to payment from if user autheticated
public function proceedPayment(Request $request){
  $user = Auth::user();
      
          //Insert checkout Logic

                $transaction_id = 'tran_'.time().str_random(6);
                // get unique recharge transaction id
                while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
                    $transaction_id = 'reid'.time().str_random(5);
                }
                $transaction_id = strtoupper($transaction_id);

                $currency = get_option('currency_sign');
                $payments_data = [
                    'ad_id'     => $request->ad_id,
                    'user_id'   => $user->id,
                    'amount'    => $request->ad_price,
                    'payment_method'    => 'mpesa',
                    'status'    => 'initial',
                    'currency'  => $currency,
                    'local_transaction_id'  => $transaction_id
                ];
                $created_payment = Payment::create($payments_data);

                return redirect(route('payment_checkout', $created_payment->local_transaction_id));

       }



      public function paymentApproval($id){
        $title   = trans('app.user_info');
        $payment = Payment::find($id);
        $user_id =  $payment->user_id;
        $amount  =  $payment->amount;
        $ad_id   =  $payment->ad_id;

        //find id for seller
        $ad = Ad::find($ad_id);
        $seller_id = $ad->user_id;
        $seller_email = $ad->seller_email;
        $seller_name = $ad->seller_name;
        $payment_method = $ad->payment_method;




    //main logic
        $admin = User::find($seller_id);
        $user_amount = $admin->crypto_wallet;
      
        $current_rate = get_option('urgent_ads_price');
        $sell_rate = get_option('urgent_ads_price');

        $coin = $amount/$current_rate;
        $user_amount = $user_amount-$coin;
        $amount_funded = $coin*$sell_rate*110;


    //new admin coin
        $admin->crypto_wallet   = $user_amount;
        $admin->save();

      // new user coin
        $user = User::find($user_id);

        $user->crypto_wallet += $coin;
        $user->save();

          if ($user){
               //update ststus
        $payment->status = "success";
        $payment->save();

        $name = $user->name;
        $email = $user->email;

          $ad->status = 2;
          $ad->save();
      





            $sname = $coin.' PessaCoins added to your wallet';
            $data=array(
                'name' =>$name,
                'email'=>$email,
                'sname'=>$sname,
                'amount'=>$coin,

            );


        //send email to buyer
            Mail::send('emails.approval',$data, function($message) use ($data){
              $message->to($data['email']);
              $message->subject($data['sname']);

          });

             $sellersubject = $coin.' PessaCoin deduted from your wallet';
             $data=array(
                'name' =>$seller_name,
                'email'=>$seller_email,
                'sname'=>$sellersubject,
                'amount'=>$coin,
                'payment_method' =>$payment_method,
                'amount_funded'  =>$amount_funded,

            );

            //send email to the seller
            Mail::send('emails.approve_seller',$data, function($message) use ($data){
              $message->to($data['email']);
              $message->subject($data['sname']);

          });



         return redirect(route('dashboard'))->with('success', trans('app.buy_created_msg'));

           

          }

          else{
           return back()->withInput()->with('error', trans('app.error_msg'));
         }

       

 }

       public function checkoutMpesa2(Request $request){
        $local_transaction_id = $request->account;
        $this->validate($request,[
         'phone' => 'required',
       ]);
        $phone = $request->phone;
     $phone = ltrim($phone,'0');///phone remove 0 
        $phone = ltrim($phone,'+');//phone remove +
        if(substr($phone,0,3)!='254'){
            $phone = "254".$phone; ///add 254 in the beginning 
          }else{
            $phone=$phone;
          }

          try{
             //Register callback URLs
            $response = Registrar::register(600000)
            ->onConfirmation('https://payments.smodavproductions.com/checkout.php')
            ->onValidation('https://payments.smodavproductions.com/checkout.php')
            ->submit();

        //Initiate an C2B simulation transaction request.
            $response = Simulate::request(5)
            ->from($phone)
            ->usingReference('f4u239fweu')
            ->setCommand(CUSTOMER_PAYBILL_ONLINE)
            ->push();


     //Initiate an C2B STK Push request
            $response = STK::request(5)
            ->from($phone)
            ->usingReference('f4u239fweu', 'Test Payment')
            ->push();
            $transactionId=$response->CheckoutRequestID;
           //$transactionId="MGR6QGHR8W";
            session()->put('transactionId',$transactionId);
            return view('payments.success-mpesa',compact('transactionId','phone', 'local_transaction_id'));

          }
          catch(\Exception $ex)
          {
            return view('payments.cancel-mpesa');
          }
        }



        public function proceedMpesa2(Request $request){
         $transactionId = $request->transactionId;
         $local_transaction_id         = $request->local_transaction_id; 
         $user = User::find(Auth::id());
         $user_id = $user->id;
         try{
           $response = STK::validate($transactionId);
           $ResultDesc       = $response->ResultDesc;

           if($ResultDesc=='The service request is processed successfully.'){
            //updated booking
            $bokings  = Booking::where('local_transaction_id',$local_transaction_id)->first();
            $bokings->status          = 'active';
            $bokings->payment_status  = 'paid';
            $bokings->save();

                //updated payment
            $payments  = Payment::where('local_transaction_id',$local_transaction_id)->first();
            $payments ->status  = 'success';
            $payments ->save();
             //return view('payments.success');
            return redirect(route('my_bookings'))->with('success', trans('app.payment_received_msg'));
          }
          else
          {

           return back()->withInput()->with('error', 'Sorry you have not made any payments');

         }

       }
       catch(\Exception $ex){
        return back()->withInput()->with('error', 'Sorry we had a technical error while trying to validate your payment. Kindly contact the system admin');
      }

    }


     public function wallet(){
       
        $title = trans('app.wallet');
        $payment_method = 'paypal';

        $user = Auth::user();
        if ($user->is_admin()){
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }else{
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }



        return view('admin.wallet', compact('title', 'payments', 'payment_method'));
    }


//sell
        public function sell(){
       
        $title = trans('app.wallet');
        $payment_method = 'paypal';

        $user = Auth::user();
        if ($user->is_admin()){
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }else{
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }



        return view('admin.sell', compact('title', 'payments', 'payment_method'));
    }


//exchange

    public function exchange(){
       
        $title = trans('app.wallet');
        $payment_method = 'paypal';

        $user = Auth::user();
        if ($user->is_admin()){
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }else{
            $payments = Payment::select('id','ad_id', 'user_id', 'amount','payment_method', 'status','local_transaction_id', 'created_at')->whereUserId($user->id)->with('ad', 'user')->orderBy('id', 'desc')->paginate(20);
        }



        return view('admin.exchange', compact('title', 'payments', 'payment_method'));
    }
   

      public function deposit(Request $request){


         $user = Auth::user();
      
          //Insert checkout Logic

                $transaction_id = 'tran_'.time().str_random(6);
                // get unique recharge transaction id
                while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
                    $transaction_id = 'reid'.time().str_random(5);
                }
                $transaction_id = strtoupper($transaction_id);

                $currency = get_option('currency_sign');
                $payments_data = [
                    'ad_id'     => $request->ad_id,
                    'user_id'   => $user->id,
                    'amount'    => $request->deposit_amount,
                    'payment_method'    => $request->payment_method,
                    'status'    => 'initial',
                    'currency'  => $currency,
                    'local_transaction_id'  => $transaction_id
                ];
                $created_payment = Payment::create($payments_data);

                return redirect(route('payment_checkout', $created_payment->local_transaction_id));
    }

    public function paymentInfo($tran_id){
      $payment = Payment::where('local_transaction_id', $tran_id)->first() ;

      if (!$payment){
        return view('admin.error.error_404');
      }

      $title = trans('app.payment_info');
      return view('admin.payment_info', compact('title', 'payment'));

    }




    public function checkout($transaction_id){
      $user       =  User::find(Auth::id());
      $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
      $title = trans('app.checkout');
      if ($payment){
        return view('admin.checkout', compact('title','payment','user'));
      }
      return view('admin.error.invalid_transaction', compact('title','payment','user'));
    }

    /**
     * @param Request $request
     * @param $transaction_id
     * @return array
     *
     * Used by Stripe
     */

    public function chargePayment(Request $request, $transaction_id){
      $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
      $ad = $payment->ad;

        //Determine which payment method is this
      if ($payment->payment_method == 'paypal') {

            // PayPal settings
        $paypal_action_url = "https://www.paypal.com/cgi-bin/webscr";
        if (get_option('enable_paypal_sandbox') == 1)
          $paypal_action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";

        $paypal_email = get_option('paypal_receiver_email');
        $return_url = route('payment_success_url', $transaction_id);
        $cancel_url = route('payment_checkout', $transaction_id);
        $notify_url = route('paypal_notify_url', $transaction_id);

        $item_name = $payment->ad->title." (".ucfirst($payment->ad->price_plan).") ad posting";

            // Check if paypal request or response
        $querystring = '';

            // Firstly Append paypal account to querystring
        $querystring .= "?business=".urlencode($paypal_email)."&";

            // Append amount& currency (£) to quersytring so it cannot be edited in html
            //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
        $querystring .= "item_name=".urlencode($item_name)."&";
        $querystring .= "amount=".urlencode($payment->amount)."&";
        $querystring .= "currency_code=".urlencode($payment->currency)."&";

        $querystring .= "first_name=".urlencode($ad->user->first_name)."&";
        $querystring .= "last_name=".urlencode($ad->user->last_name)."&";
        $querystring .= "payer_email=".urlencode($ad->user->email)."&";
        $querystring .= "item_number=".urlencode($payment->local_transaction_id)."&";

            //loop for posted values and append to querystring
        foreach(array_except($request->input(), '_token') as $key => $value){
          $value = urlencode(stripslashes($value));
          $querystring .= "$key=$value&";
        }

            // Append paypal return addresses
        $querystring .= "return=".urlencode(stripslashes($return_url))."&";
        $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
        $querystring .= "notify_url=".urlencode($notify_url);

            // Append querystring with custom field
            //$querystring .= "&custom=".USERID;

            // Redirect to paypal IPN
        header('location:'.$paypal_action_url.$querystring);
        exit();

      }elseif ($payment->payment_method == 'stripe'){

        $stripeToken = $request->stripeToken;
        \Stripe\Stripe::setApiKey(get_stripe_key('secret'));
            // Create the charge on Stripe's servers - this will charge the user's card
        try {
          $charge = \Stripe\Charge::create(array(
                    "amount" => ($payment->amount * 100), // amount in cents, again
                    "currency" => $payment->currency,
                    "source" => $stripeToken,
                    "description" => $payment->ad->title." (".ucfirst($payment->ad->price_plan).") ad posting"
                  ));

          if ($charge->status == 'succeeded'){
            $payment->status = 'success';
            $payment->charge_id_or_token = $charge->id;
            $payment->description = $charge->description;
            $payment->payment_created = $charge->created;
            $payment->save();

                    //Set publish ad by helper function
            ad_status_change($ad->id, 1);

            return ['success'=>1, 'msg'=> trans('app.payment_received_msg')];
          }
        } catch(\Stripe\Error\Card $e) {
                // The card has been declined
          $payment->status = 'declined';
          $payment->description = trans('app.payment_declined_msg');
          $payment->save();
          return ['success'=>0, 'msg'=> trans('app.payment_declined_msg')];
        }
      }

      return ['success'=>0, 'msg'=> trans('app.error_msg')];
    }

    /**
     * @param Request $request
     * @param $transaction_id
     * @return mixed
     *
     * Payment success url receive from paypal
     */

    public function paymentSuccess(Request $request, $transaction_id){

        /**
         * Check is this transaction paid via paypal IPN
         */
        $transaction_check = Payment::whereLocalTransactionId($transaction_id)->first();
        if ($transaction_check){
          if($transaction_check->status == 'success'){
            return redirect(route('my_ads'))->with('success', trans('app.payment_received_msg'));
          }elseif ($transaction_check->status == 'declined'){
            return redirect(route('my_ads'))->with('error', trans('app.payment_declined_msg'));
          }
        }

        //Start original logic

        $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
        $ad = $payment->ad;

        $paypal_action_url = "https://www.paypal.com/cgi-bin/webscr";
        if (get_option('enable_paypal_sandbox') == 1)
          $paypal_action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";

        // STEP 1: read POST data
        // Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
        // Instead, read raw POST data from the input stream.
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
          $keyval = explode ('=', $keyval);
          if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
          $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
          if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
          } else {
            $value = urlencode($value);
          }
          $req .= "&$key=$value";
        }

// STEP 2: POST IPN data back to PayPal to validate
        $ch = curl_init($paypal_action_url);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
        if( !($res = curl_exec($ch)) ) {
            // error_log("Got " . curl_error($ch) . " when processing IPN data");
          curl_close($ch);
          exit;
        }
        curl_close($ch);

// STEP 3: Inspect IPN validation result and act accordingly
        if (strcmp ($res, "VERIFIED") == 0) {

            //Payment success, we are ready to live our ads
          $payment->status = 'success';
          $payment->charge_id_or_token = $request->txn_id;
          $payment->description = $request->item_name;
          $payment->payer_email = $request->payer_email;
          $payment->payment_created = strtotime($request->payment_date);
          $payment->save();

            //Set publish ad by helper function
          ad_status_change($ad->id, 1);

          return redirect(route('my_ads'))->with('success', trans('app.payment_received_msg'));

        } else if (strcmp ($res, "INVALID") == 0) {

          $payment->status = 'declined';
          $payment->description = trans('app.payment_declined_msg');
          $payment->save();
          return redirect(route('my_ads'))->with('error', trans('app.payment_declined_msg'));
        }


      }

    /**
     * @param Request $request
     * @param $transaction_id
     * @return mixed
     *
     * Ipn notify, receive from paypal
     */
    public function paypalNotify(Request $request, $transaction_id){
      $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
      $ad = $payment->ad;

      $paypal_action_url = "https://www.paypal.com/cgi-bin/webscr";
      if (get_option('enable_paypal_sandbox') == 1)
        $paypal_action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";

        // STEP 1: read POST data
        // Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
        // Instead, read raw POST data from the input stream.
      $raw_post_data = file_get_contents('php://input');
      $raw_post_array = explode('&', $raw_post_data);
      $myPost = array();
      foreach ($raw_post_array as $keyval) {
        $keyval = explode ('=', $keyval);
        if (count($keyval) == 2)
          $myPost[$keyval[0]] = urldecode($keyval[1]);
      }
    // read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
      $req = 'cmd=_notify-validate';
      if(function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
      }
      foreach ($myPost as $key => $value) {
        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
          $value = urlencode(stripslashes($value));
        } else {
          $value = urlencode($value);
        }
        $req .= "&$key=$value";
      }

    // STEP 2: POST IPN data back to PayPal to validate
      $ch = curl_init($paypal_action_url);
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        // In wamp-like environments that do not come bundled with root authority certificates,
        // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set
        // the directory path of the certificate as shown below:
        // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
      if( !($res = curl_exec($ch)) ) {
            // error_log("Got " . curl_error($ch) . " when processing IPN data");
        curl_close($ch);
        exit;
      }
      curl_close($ch);

    // STEP 3: Inspect IPN validation result and act accordingly
      if (strcmp ($res, "VERIFIED") == 0) {

            //Payment success, we are ready to live our ads
        $payment->status = 'success';
        $payment->charge_id_or_token = $request->txn_id;
        $payment->description = $request->item_name;
        $payment->payer_email = $request->payer_email;
        $payment->payment_created = strtotime($request->payment_date);
        $payment->save();

            //Set publish ad by helper function
        ad_status_change($ad->id, 1);

        return redirect(route('my_ads'))->with('success', trans('app.payment_received_msg'));

      } else if (strcmp ($res, "INVALID") == 0) {

        $payment->status = 'declined';
        $payment->description = trans('app.payment_declined_msg');
        $payment->save();
        return redirect(route('my_ads'))->with('error', trans('app.payment_declined_msg'));
      }

    }


  }
