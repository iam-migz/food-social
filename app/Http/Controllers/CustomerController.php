<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
       
        $customer->username = $request->username;
        $customer->address = $request->address;
        $customer->email = $request->email;

        // hash password
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;

        $customer->save();
        
        return ['id' => $customer->id ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request){

        $customer = Customer::where('email', '=', $request->email)->first();
        
        // check if not found
        if ( !$customer ) {
            return [ 'success' => false, 'message' => 'Email Not Found' ]; 
        }

        $result = Hash::check($request->password, $customer->password);

        if ( $result ) {
            return [ 'success' => true, 'id' => $customer->id ];
        } else {  // incorrect password
            return [ 'success' => false, 'message' => 'incorrect password' ]; 
        }
    }

    public function getOrders($id){

        $ordersArray = [];
        $customer = Customer::find($id);

        $orders = $customer->orders->where('completed', '=', 0);

        foreach($orders as $order) {
            $information = [
                'order_id' => $order->id,
                'order_completed' => $order->completed,

                'food_name' => $order->food->name,
                'food_price' => $order->food->price,

                'restaurant_name' => $order->food->seller->restaurant_name,
                'restaurant_phone' => $order->food->seller->phone,
                'restaurant_address' => $order->food->seller->address
            ];
            array_push($ordersArray, $information);
            
        }
        return $ordersArray;
    }

}
