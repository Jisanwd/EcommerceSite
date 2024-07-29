<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;
use function Termwind\ValueObjects\format;

class AdminOrderController extends Controller
{
    private $order;
    public function index()
    {
        return view('admin.order.index',[
            'orders'=> Order::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.order.detail',['order' => Order::find($id)]);
    }
    public function invoice($id)
    {
        return view('admin.order.invoice', ['order' => Order::find($id)]);
    }
    public function printOrder($id)
    {
        $pdf = PDF::loadView('admin.order.print',['order' => Order::find($id)]);
        return $pdf->stream('invoice-no-'.$id.'.pdf');

    }
    public function edit($id)
    {
        return view('admin.order.edit', ['order' => Order::find($id)]);
    }
    public function update(Request $request, $id)
    {
       $this->order = Order::find($id);
       if ($request->order_status == 'pending')
       {
           $this->order->save();
       }
       elseif ($request->order_status == 'complete')
       {
           $this->order->order_status = 'complete';
           $this->order->delivery_address = $request->delivery_address;
           $this->order->delivery_status = 'complete';
           $this->order->delivery_date = date('Y-m-d');
           $this->order->delivery_timestamp = strtotime(date('Y-m-d'));
           $this->order->payment_date = date('Y-m-d');
           $this->order->payment_status = 'complete';
           $this->order->payment_timestamp = strtotime(date('Y-m-d'));
           $this->order->save();
       }
       elseif ($request->order_status == 'processing')
       {
           $this->order->order_status = 'processing';
           $this->order->delivery_address = $request->delivery_address;
           $this->order->delivery_status = 'processing';
           $this->order->payment_status = 'processing';
           $this->order->save();
       }
       elseif ($request->order_status == 'cancel')
       {
           $this->order->order_status = 'cancel';
           $this->order->delivery_status = 'cancel';
           $this->order->payment_status = 'cancel';
           $this->order->save();
       }
       return redirect('admin/order-manage')->with('message','Order Info Update Successfully');
    }
    public function delete($id)
    {
        Order::deleteOrder($id);
        OrderDetail::deleteOrderDetail($id);
        return redirect('admin/order-manage')->with('message','Order Info Delete Successfully');
    }
}
