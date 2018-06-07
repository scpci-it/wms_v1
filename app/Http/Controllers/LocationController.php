<?php

namespace App\Http\Controllers;

use App\Location;
use App\Product;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $warehouses = Warehouse::all();
         return view('location.create', compact ('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Location::create($request->all());

        $latest_location_id = Location::latest()->limit(1)->first()->id;

        
        $products = Product::all();
    

        foreach($products as $product)
        {
            
            DB::table('location_product')
                    ->insert([
                            'product_id' => $product->id,
                            'location_id' =>  $latest_location_id,
                            'stocks' => 0,
                    ]);
        }

        return redirect('/locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
