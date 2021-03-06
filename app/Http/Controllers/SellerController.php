<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Seller;
use DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Seller::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seller = new Seller;

        $seller->restaurant_name = $request->restaurant_name;
        $seller->username = $request->username;
        $seller->address = $request->address;
        $seller->email = $request->email;

        // hash password
        $seller->password = Hash::make($request->password);
        $seller->phone = $request->phone;

        $seller->phone = $request->phone;

        $seller->save();

        return ['id' => $seller->id ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('sellers')->where('id', $id)->get();
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

        $seller = Seller::where('email', '=', $request->email)->first();
        
        // check if not found
        if ( !$seller ) {
            return [ 'success' => false, 'message' => 'Email Not Found' ]; 
        }

        $result = Hash::check($request->password, $seller->password);

        if ( $result ) {
            return [ 'success' => true, 'id' => $seller->id ];
        } else {  // incorrect password
            return [ 'success' => false, 'message' => 'incorrect password' ]; 
        }
    }

    public function getFoods($id){

        $seller = Seller::find($id);
        return $seller->foods;
    }

    
    public function getOrders($id){
        $ordersArray = [];
        $seller = Seller::find($id);
        foreach($seller->foods as $food) {
            foreach($food->orders as $orderCtr){
                $information = [
                    'order_id' => $orderCtr->id,
                    'food_name' => $food->name,
                    'food_price' => $food->price,
                    'food_quantity' => $food->quantity,
                    'completed' => $orderCtr->completed,
                    'customer_name' => $orderCtr->customer->username,
                    'customer_address' => $orderCtr->customer->address,
                    'customer_phone' => $orderCtr->customer->phone
                ];
                array_push($ordersArray, $information);

            }
            
        }
        return $ordersArray;
    }


}
