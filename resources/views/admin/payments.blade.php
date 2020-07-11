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

                        <table class="table table-bordered table-striped" id="jDataTable">
                            <thead>
                                <tr>
                                  
                                    <th>@lang('app.user')</th>
                                    <th>@lang('app.amount')</th>
                                    <th>@lang('app.payment_method')</th>
                                    <th>@lang('app.status')</th>
                                      <th>Mpesa Code</th>
                                    <th>@lang('app.created_at')</th>

            @if($lUser->is_admin())
     <th>@lang('app.actions')</th>
            @endif
                                
                                </tr>
                            </thead>
                            
                            
                            @foreach($payments as $payment)
                                <tr>

                                    <td>{!! '<a href="'.route('user_info', $payment->user->id).'"  target="_blank"> '.$payment->user->name.'</a>' !!}</td>
                                    <td>{!! themeqx_price($payment->amount) !!}</td>
                                    <td>{!! $payment->payment_method !!}</td>
                                    <td>{!! '<a href="'.route('payment_info', $payment->local_transaction_id).'"  target="_blank"> '.$payment->status.'</a>' !!}</td>
                                    <td>{!! $payment->mpesa_code !!}</td>
                                    <td>{!! $payment->created_at_datetime() !!}</td>
                                       @if($lUser->is_admin())

                                       @if($payment->status =='pending')
  
                                     <th>{!! '<a href="'.route('payment-approval', $payment->id).'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i>Approve</a>' !!}
                                    </th>
                                       @endif
            @endif
                                </tr>
                            @endforeach
                            
                        </table>


                        {!! $payments->links() !!}

                    </div>
                </div>


            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->
@endsection