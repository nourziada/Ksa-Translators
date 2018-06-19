@extends('layouts.website')
@section('content')

<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css" media="all">

<style type="text/css">
    .toaccount{
        background: #fbfbfb;
        border: 1px solid #d6d4d4;
        overflow: hidden;
        border: none;
        width: 100%;
        text-align: right;
    }
</style>

<section class="cart-table-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping-cart-table">
                        <form action="#" method="POST">
                            <div class="table-responsive">
                                <table class="main-table">
                                    <thead>
                                    <tr class="tr1">
                                        <th class="th1" style="width: 40%;">{{trans('main.project_title')}}</th>
                                        <th class="th2" style="width: 20%;">{{trans('main.Delivery_time')}}</th>
                                        <th class="th3" style="width: 20%;">{{trans('main.project_status')}}</th>
                                        <th class="th4" style="width: 20%;">{{trans('main.Project_Budget')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="tr3">
                                        <td class="td1">
                                            <h5>{{$project->title}}</h5>
                                        </td>
                                        <td class="td2">
                                            <h5>{{$project->recivied_date}}</h5>
                                            
                                        </td>
                                        <td class="td3"><span>{{trans('main.Waiting_for_payment')}}</span>
                                        </td>
                                        <td class="td11">
                                            <p>{{$project->price}} SAR</p>
                                        </td>
                                       
                                    </tr>

                                    <tr class="tr4">
                                        <td rowspan="2" colspan="1" class="td15">
                                        </td>
                                        <td colspan="2" class="td16">{{trans('main.total_price')}}</td>
                                        <td class="td17">{{$project->price}} SAR</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End cart table section-->
    <section class="payment-confirm-section">
        <div class="container">
            <div class="row">

  
                <div class="col-12">
                    <div class="payment-confirm">
                        <button class="toaccount"  data-toggle="modal" data-target="#toAccount">
                            <div class="confirm-left">
                                <i class="fa fa-university" aria-hidden="true"></i>
                            </div>
                            <div class="confirm-middle">
                                {{trans('main.Convert_on_account')}}
                            </div>
                            <div class="confirm-right"><i class="fa fa-angle-left"></i>
                            </div>
                        </button>
                    </div>
                </div>
            
                <div class="col-12" style="margin-bottom: 30px;">
                    <div class="payment-confirm">
                        <a href="{{ route('make.payment') }}" onclick="event.preventDefault(); document.getElementById('makepaymnet-form').submit();">
                            <div class="confirm-left">
                                <i class="fa fa-paypal" aria-hidden="true"></i>
                            </div>
                            <div class="confirm-middle">
                                {{trans('main.Make_payment_now')}} PayPal - Visa - Master Card
                            </div>
                            <div class="confirm-right"><i class="fa fa-angle-left"></i>
                            </div>
                        </a>

                    <form id="makepaymnet-form" action="{{ route('make.payment') }}" method="POST" style="display: none;">
                    	<input type="hidden" name="project_id" value="{{$project->id}}">
                                {{ csrf_field() }}
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<div id="toAccount" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modl-c">
            <form action="{{route('make.payment.account')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <div class="modal-header" style="background: #0760ad;">
                    <button type="button" class="close close-butn" data-dismiss="modal" aria-hidden="true" style="display: none;">&times;</button>
                    <h4 class="modal-title" style="color: #fff;font-size: 22px;">{{trans('main.Convert_on_account')}} </h4>
                </div>
                <div class="modal-body" id="group-content">
                    <h4 class="modal-title" style="font-size: 18px;">{{trans('main.covert_payment_text')}}</h4>

                    <input style="margin-top: 15px;" type="text" name="full_name" class="form-control" placeholder="{{trans('main.full_name')}}" required>
                    <input style="margin-top: 15px;" type="text" name="from_bank" class="form-control" placeholder="{{trans('main.from_bank')}}" required>
                    <input style="margin-top: 15px;" type="text" name="to_bank" class="form-control" placeholder="{{trans('main.to_bank')}}" required>
                    <input value="{{date('Y-m-d')}}" style="margin-top: 15px;" type="date" name="transaction_date" class="form-control" placeholder="{{trans('main.transaction_date')}}" required>
                    <input value="{{date('m:s')}}" style="margin-top: 15px;" type="time" name="transaction_time" class="form-control" placeholder="{{trans('main.transaction_time')}}" required>
                </div>
                
                <div class="modal-footer mf">
                    <button style="background: #0760ad !important;" type="submit" class="btn btn-info">Ok</button >
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        </div>
     </div>




@stop

