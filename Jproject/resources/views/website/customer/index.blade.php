@extends('website.master')
@section('title')
    MY Dashboard
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">  MY Dashboard</h1>
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
                            <li><a href="" class="list-group-item">MY Dashboard</a></li>
                            <li><a href="{{route('customer.order')}}" class="list-group-item">MY Order</a></li>
                            <li><a href="" class="list-group-item">MY Wishlist</a></li>
                            <li><a href="" class="list-group-item">MY Account</a></li>
                            <li><a href="" class="list-group-item">MY Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card card-body">
                        <h2 class="text-center text-info py-5">MY Dashboard</h2>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


