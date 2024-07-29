@extends('admin.master')
@section('title')
    Manage Order Page
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Order Edit Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('admin.order-update', ['id' => $order->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Number</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="horizontal-firstname-input" value="{{$order->id}}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-3 col-form-label">Order Status</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="order_status">
                                   <option value="pending" {{$order->order_status == 'pending' ? 'Selected' :''}}>Pending</option>
                                   <option value="processing" {{$order->order_status == 'processing' ? 'Selected' :''}}>Processing</option>
                                   <option value="cancel" {{$order->order_status == 'cancel' ? 'Selected' :''}}>Cancel</option>
                                   <option value="complete" {{$order->order_status == 'complete' ? 'Selected' :''}}>Complete</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Delivery Address</label>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Order Total</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="horizontal-password-input" name="order_total" value="{{$order->order_total}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Payment Amount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="horizontal-password-input" name="payment_amount" value="{{$order->order_total}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Order Status</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection



