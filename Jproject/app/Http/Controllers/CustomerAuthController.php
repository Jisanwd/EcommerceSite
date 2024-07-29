<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;
   public function dashboard()
   {
       return view('website.customer.index');
   }
   public function logout()
   {
       Session::forget('customer_id');
       Session::forget('customer_name');

       return redirect('/');
   }
   public function singIn(Request $request)
   {
       $this->customer = Customer::where('email', $request->email)->first();
       if ($this->customer)
       {
           if (password_verify($request->password, $this->customer->password))
           {
               Session::put('customer_id', $this->customer->id);
               Session::put('customer_name', $this->customer->name);

               return redirect('customer/dashboard');
           }
           else
           {
               return back()->with('message', 'Sorry Your Password Is Invalid.');
           }
       }
       else
       {
           return back()->with('message', 'Sorry Your Email Address Is Invalid.');
       }
   }
   public function auth()
   {
       return view('website.customer.auth');
   }
   public function newCustomer(Request $request)
   {

       $this->validate($request,[

           'name' => 'required',
           'email' => 'required | unique:customers,email',
           'password' => 'required',
           'mobile' => 'required',
       ]);

       $this->customer = Customer::newCustomer($request);
       Session::put('customer_id', $this->customer->id);
       Session::put('customer_name', $this->customer->name);

       return redirect('customer/dashboard');
   }
}
