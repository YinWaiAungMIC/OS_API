<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{

    public function __construct($value='')
  {
    $this->middleware('auth:api')->except('index');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return response()->json([
            "status"=>"ok",
            "totalResults"=>count($items),
            "items"=>ItemResource::collection($items)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= $request->validate([
        'codeno' => 'required|string',
        'name' => 'required|string',
        'photo' => 'required|mimes:jpeg,bmp,png',
        'price' => 'required|integer',
        'discount' => 'required|integer',
        'description' => 'required|string',
        'brand' => 'required',
        'subcategory' => 'required',
]);
       

      


        //File Upload
         $imageName = time().'.'.$request->photo->extension();  
   
        $request->photo->move(public_path('backendtemplate/itemimg'), $imageName);
          $myfile='backendtemplate/itemimg/'.$imageName;


        //Store Data
          $item=new Item;
          $item->codeno=$request->codeno;
          $item->name=$request->name;
          $item->photo=$myfile;
          $item->price=$request->price;
          $item->discount=$request->discount;
          $item->description=$request->description;
          $item->brand_id=$request->brand;
          $item->subcategory_id=$request->subcategory;

          $item->save();
          return new ItemResource($item);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
