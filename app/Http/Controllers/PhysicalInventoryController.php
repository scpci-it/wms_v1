<?php

namespace App\Http\Controllers;

use App\Location;
use App\Location_Product;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhysicalInventoryController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function create($id)
    {
        
        $locations = Location_Product::select('stocks')
                                        ->addSelect('locations.id as location_id')
                                        ->addSelect('locations.name as location_name')
                                        ->addSelect('warehouses.name as warehouse_name')
                                        ->where('product_id','=',$id)
                                        ->where('type', '=', 'Physical')
                                        ->join('locations', 'location_id','=', 'locations.id')
                                        ->join('warehouses','wh_id','=','warehouses.id')
                                        ->get();

        $product = Product::find($id);

        /*

        $locations = Location::where('Type','=','Physical')->get();
        $product = Product::find($id);
        $stocks_per_location = [];

        foreach($locations as $location):


            $temp = DB::table('transactions')
                    ->selectRaw('*, sum(if(transactions.to = ' . $location->id . ' ,quantity,0)) - sum(if(transactions.from = ' . $location->id . ' , quantity,0)) as stock')
                    ->where('product_id', '=', $id)
                    ->whereRaw('(transactions.to = '. $location->id . ' or transactions.from =  ' . $location->id . ')')
                    ->orderByRaw($location->warehouse->id)
                    ->get()
                    ->toArray();

            $stocks_per_location[$location->id] = $temp[0]->stock;
            if(!$stocks_per_location[$location->id])
                $stocks_per_location[$location->id] = 0;

        endforeach;
    */
        return view('physicalinventory.create',compact('product','locations'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $locations = Location::where('Type','=','Physical')->get();


        foreach($locations as $location):

            $adjusted_quantity = ABS($request->current[$location->id] - $request->actual[$location->id]);
            Transaction::createLocationProductEntry($request->product_id, $location->id, 1);

            if($request->current[$location->id] > $request->actual[$location->id])
            {
                
                Transaction::create([
                    'from' => $location->id,
                    'to' => 1,
                    'product_id' => $request->product_id,
                    'quantity' => $adjusted_quantity,
                    'user_id' =>$user_id
                ]);

                Transaction::adjustInventory($request->product_id, $location->id, 1, $adjusted_quantity);
            }
            
            else if ($request->current[$location->id] < $request->actual[$location->id]) 
            {

                Transaction::create([
                    'from' => 1,
                    'to' => $location->id,
                    'product_id' => $request->product_id,
                    'quantity' => $adjusted_quantity,
                    'user_id' => $user_id
                ]);
                Transaction::adjustInventory($request->product_id, 1, $location->id, $adjusted_quantity);   
            }

        endforeach;

        return redirect('/transactions');

    }
}
