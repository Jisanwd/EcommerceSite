@extends('admin.master')
@section('title')
    Order Detail Page
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Order Basic Information</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            <th>Order Number</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{$order->order_total}}</td>
                        </tr>
                        <tr>
                            <th>Shipping Total</th>
                            <td>{{$order->shipping_total}}</td>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <td>{{$order->tax_total}}</td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td>{{$order->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment'}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>{{$order->delivery_status}}</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$order->customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Customer Mobile</th>
                            <td>{{$order->customer->mobile}}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Order Product Information</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($order->OrderDetail as $OrderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$OrderDetail->product_id}}</td>
                                <td>{{$OrderDetail->product_name}}</td>
                                <td>{{$OrderDetail->product_quantity}}</td>
                                <td>{{$OrderDetail->product_price}}</td>
                                <td>{{$OrderDetail->product_quantity * $OrderDetail->product_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection



