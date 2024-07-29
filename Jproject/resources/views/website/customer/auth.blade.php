@extends('website.master')
@section('title')
    Customer Login / Registration Page
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"> Customer Login / Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li> Login / Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="account-login section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="register-form">
                                        <div class="title">
                                            <h3 class="text-center text-success">Login-Form</h3>
                                        </div>
                                        <h4 class="text-center text-info">{{Session::get('message')}}</h4>
                                        <form action="{{route('customer.login')}}" method="post">
                                            @csrf
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-email">E-mail Address</label>
                                                    <input class="form-control" type="email" id="reg-email" required name="email">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-pass">Password</label>
                                                    <input class="form-control" type="password" id="reg-pass" required name="password">
                                                </div>
                                            </div>

                                            <div class="button">
                                                <button class="btn" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="register-form">
                                        <div class="title">
                                            <h3 class="text-center text-success">Registration Form</h3>
                                        </div>
                                        <form action="{{route('customer.auth')}}" method="post">
                                            @csrf
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-email">Full Name </label>
                                                    <input class="form-control" type="text" id="reg-email" required name="name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-email">E-mail Address</label>
                                                    <input class="form-control" type="email" id="reg-email" required name="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-pass">Password</label>
                                                    <input class="form-control" type="password" id="reg-pass" required name="password">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reg-pass">Mobile</label>
                                                    <input class="form-control" type="number" id="reg-pass" required name="mobile">
                                                </div>
                                            </div>

                                            <div class="button">
                                                <button class="btn" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


