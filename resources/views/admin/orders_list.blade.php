@extends('layout.app')
@section('content')
<div class="container-fluid">

<!-- start page title -->

<!-- end page title -->

<div class="row">


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                          <h4>Orders List</h4>
                    </ul>

                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                           <table border="1" class="table">

                                <tr>
                                    <th>Order Id</th>
                                    <th>Date</th>
                                    <th>Billing Name</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>${{$order->total}}</td>
                                    <td>
                                        @if($order->status==0)
                                        <span >Cancel</span>
                                        @elseif($order->status==1)
                                        <span >pending</span>
                                        @elseif($order->status==2)
                                        <span>Delivered</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.orderstatus_cancel',$order->id)}}" class="btn btn-danger">Cancel</a>
                                        <a href="{{route('admin.orderstatus_deliver',$order->id)}}" class="btn btn-primary">Deliver</a>

                                    </td>

                                @endforeach
                           </table>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

</div> <!-- container-fluid -->

@endsection
