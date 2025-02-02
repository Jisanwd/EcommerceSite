@extends('website.master')
@section('title')
    Customer Order Page
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">  Customer Order</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li> Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li><a href="{{route('customer.dashboard')}}" class="list-group-item">MY Dashboard</a></li>
                            <li><a href="{{route('customer.order')}}" class="list-group-item">MY Order</a></li>
                            <li><a href="" class="list-group-item">MY Wishlist</a></li>
                            <li><a href="" class="list-group-item">MY Account</a></li>
                            <li><a href="" class="list-group-item">MY Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card card-body">
                       <table>
                           <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Order ID</th>
                                    <th>Order Total</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                </tr>
                           </thead>

                           <tbody>
                           @foreach($orders as $order)
                               <tr>
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$order->id}}</td>
                                   <td>{{$order->order_total}}</td>
                                   <td>{{$order->order_date}}</td>
                                   <td>{{$order->order_status}}</td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection



