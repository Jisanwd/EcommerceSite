@extends('admin.master')
@section('title')
    Manage Order Page
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Order Information</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Order Id</th>
                            <th>Customer Info</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Order Total</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment'}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-info btn-sm" title="Order Detail">
                                        <i class="fa fa-box-open"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-primary btn-sm" title="Order Invoice">
                                        <i class="fa fa-file-invoice"></i>
                                    </a>
                                    <a href="{{route('admin.print-invoice', ['id' => $order->id])}}" class="btn btn-warning btn-sm" title="Print Invoice" target="_blank">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="{{route('admin.order-edit', ['id' => $order->id])}}" class="btn btn-success btn-sm {{$order->order_status == 'complete' ? 'disabled' : ''}}" title="Order Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.order-delete', ['id' => $order->id])}}" class="btn btn-danger btn-sm {{$order->order_status == 'complete' || $order->order_status == 'pending' || $order->order_status == 'processing' ? 'disabled' : ''}}" title="Order Delete" onclick="return confirm('Are You Sure To Delete This..')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


