<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use DB;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Food::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $id)
   {

        // save image to public folder 
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images' ,$filename, 'public');
        

        $food = new Food;
        $food->seller_id = $id;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->quantity = $request->quantity;
        $food->image_name = $filename;
        $food->save();

        return redirect('/'.$id.'/seller/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('foods')->where('id', $id)->get();
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
        $food = Food::find($id);
        
        $food->name = $request->name;
        $food->price = $request->price;
        $food->quantity = $request->quantity;
        $food->save();
        
        return $food;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return ['success' => true];
    }

    public function getFoodsInfo(){
        $foods = Food::all();
        $foodsArray = [];
        foreach($foods as $food){
            $information = [
                'id' => $food->id,
                'seller_id' => $food->seller_id,
                'name' => $food->name,
                'image' => $food->image_name,
                'price' => $food->price,
                'quantity' => $food->quantity,
                'restaurant_name' => $food->seller->restaurant_name,
                'restaurant_owner' => $food->seller->username,
                'restaurant_address' => $food->seller->address,
            ];
            array_push($foodsArray, $information);
        }

        return $foodsArray;
    }
}
