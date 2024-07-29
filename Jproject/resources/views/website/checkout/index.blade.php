@extends('website.master')
@section('title')
    CheckOut Page
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Please Fill Your Order CheckOut Information </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <form action="{{route('new-order')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            @if(!Session::get('customer_id'))
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" placeholder="First Name" name="name">
                                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address <span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <input type="email" placeholder="Email Address" id="email" name="email">
                                                        <span class="text-danger" id="EmailError">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number <span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <input type="number" placeholder="Phone Number" name="mobile">
                                                        <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address <span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" placeholder="Delivery Address" style="height: 100px"></textarea>
                                                        <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Select Your Payment Method</label>
                                                    <div class="">
                                                        <label style="margin: 20px"> <input type="radio" checked name="payment_method" value="1">Cass On Delivery</label>
                                                        <label> <input type="radio" name="payment_method" value="2">  Online Payment</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>I agree with all terms & Condition </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="submit" class="btn" id="confirmOrderBtn">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">

                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Your Order Summery</h5>
                            <div class="sub-total-price">
                                @php($sum = 0)
                                @foreach(Cart::getContent() as $cartProduct)
                                <div class="total-price">
                                    <p class="value">{{$cartProduct->name}}</p>
                                    <p class="price"> {{$cartProduct->price * $cartProduct->quantity}}</p>
                                </div>
                                @php($sum = $sum + ($cartProduct->price * $cartProduct->quantity))
                                @endforeach

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Cart Total:</p>
                                    <p class="price">{{$sum}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Total:</p>
                                    <p class="price">{{$tax= $sum * 0.15}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Total:</p>
                                    <p class="price">{{$shipping= 500}}</p>
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Total Payable:</p>
                                        <p class="price">{{$total_payable = $sum+$tax+$shipping}}</p>
                                    </div>
                                   <?php
                                    Session::put('order_total', $total_payable);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $shipping);
                                   ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
