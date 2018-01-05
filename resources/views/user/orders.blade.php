@extends('layouts.default')

@section('title','CityHub:My Orders')

@section('content')
	<div class="padding">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'Orders')" id="defaultOpen">My Orders</button>
		  <button class="tablinks" onclick="openCity(event, 'Services')">My Services</button>
		</div>

		
		<div id="Orders" class="tabcontent container">
			<div class="col-md-10">
				<h3>My Orders</h3>
        		<hr style="width: 100;">
        		@foreach($orders as $order)
                        <div class="panel panel-default">
                            <div class="panel-header">
                                <ul class="list-group">
                                    @foreach($order->cart->items as $item)
                                        <li class="list-group-item">
                                            <span class="badge">Rs {{ $item['price'] }}</span>
                                            {{ $item['item']['product_name'] }} | {{ $item['qty'] }} Units
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <strong>Total Price: Rs {{ $order->cart->totalPrice }}</strong>
                                <strong>Date: {{$order->created_at->format('D d-m-Y')}}</strong>
                                <strong class="pull-right">Status:Order {{$order->status}}</strong>
                                <span>
                                	@if($order->status!="Cancelled" && $order->status!="Delivered")
                                                             <a href="{{ url('cancelOrder',$order->id) }}" class="btn btn-danger btn-sm"

                                       data-tr="tr_{{$order->id}}"

                                       data-toggle="confirmation"

                                       data-btn-ok-label="Yes" data-btn-ok-icon="fa fa-remove"

                                       data-btn-ok-class="btn btn-sm btn-danger"

                                       data-btn-cancel-label="No"

                                       data-btn-cancel-icon="fa fa-chevron-circle-left"

                                       data-btn-cancel-class="btn btn-sm btn-default"

                                       data-title="Are you sure you want to cancel ?"

                                       data-placement="left" data-singleton="true">

                                        Cancel

                                    </a>
                                                
                                @endif
                                </span>
                            </div>
                        </div>
                @endforeach
		    </div>
		</div>
		<div class="col-md-2"></div>
		  
		      
        <!-- services section starts -->
		<div id="Services" class="tabcontent container">
            <div>
                <h3>My Services</h3>
            </div>
		    <div>
                <div>
                    <div class="col-md-3"></div>
                    <div class="row col-md-6">
                        @foreach($services as $service)
                        <div class="col-xs-12 col-md-6 thumbnail">
                            <p>Service:{{$service->service}}</p>
                            <p>Issue:{{$service->answers[0]}}</p>
                            <p>Preffered Date:{{$service->answers[7]}}</p>
                            <p>
                                Status:{{$service->status}}
                                @if($service->status!='Completed')
                                @if($service->status!='Cancelled')
                                <a class="pull-right" href="{{route('cancel.service',['id'=>$service->id])}}">
                                    <button>Cancel</button>
                                </a>
                                @endif
                                @endif
                            </p>
                            <span class="pull-right">Date:{{$service->created_at->format('D d-m-y')}}</span>
                        </div>
                      @endforeach
                    </div>
                    <div class="col-md-3"></div>
                </div>      
            </div>
		</div>
        <!-- services section ends -->
	</div>
@endsection