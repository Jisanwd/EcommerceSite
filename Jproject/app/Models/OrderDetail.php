<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetail,$orderDetails, $product;
    public static function newOrderDetail($id)
    {
        foreach (Cart::getContent() as $cartProduct)
        {
            self::$orderDetail  = new OrderDetail();
            self::$orderDetail->order_id = $id;
            self::$orderDetail->product_id = $cartProduct->id;
            self::$orderDetail->product_name = $cartProduct->name;
            self::$orderDetail->product_price = $cartProduct->price;
            self::$orderDetail->product_quantity = $cartProduct->quantity;
            self::$orderDetail->save();


            self::$product = Product::find($cartProduct->id);
            self::$product->stock_amount =  self::$product->stock_amount - $cartProduct->quantity;
            self::$product->save();

            Cart::remove($cartProduct->id);

        }
    }
    public static function deleteOrderDetail($id)
    {
        self::$orderDetails = OrderDetail::where('order_id',$id)->get();
        foreach (self::$orderDetails  as $OrderDetail)
        {
            $OrderDetail->delete();
        }
    }
}
