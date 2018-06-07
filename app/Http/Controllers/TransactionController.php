<?php

namespace App\Http\Controllers;

use App\Location;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $movements  = Transaction::with('user')->latest()->paginate(5);

        return view('transaction.index',compact('movements'));
    }

    public function create()
    {

        $locations = Location::all();
        $products = Product::all();

        return view('transaction.create',compact('locations','products'));
    }

    public function internal()
    {

        $to_locations = Location::where('type','=','Physical')->get();
        $from_locations = Location::where('type','=','Physical')->get();
        $products = Product::all();

        return view('transaction.transfer',compact('to_locations','products', 'from_locations'));
    }

    public function issue_in()
    {

        $to_locations = Location::where('type','=','Physical')->get();
        $from_locations = Location::where('type','=','Virtual')->get();
        $products = Product::all();

        return view('transaction.transfer',compact('to_locations','products', 'from_locations'));
    }

    public function issue_out()
    {

        $to_locations = Location::where('type','=','Virtual')->get();
        $from_locations = Location::where('type','=','Physical')->get();
        $products = Product::all();

        return view('transaction.transfer',compact('to_locations','products', 'from_locations'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'quantity' => 'integer|required',
        ]);

        
        Transaction::create([
                            'to'=>$request->to,
                            'from'=>$request->from,
                            'product_id'=>$request->product_id,
                            'quantity'=>$request->quantity,
                            'user_id'=> $user_id,

                            ]);
        Transaction::createLocationProductEntry($request->product_id, $request->from, $request->to);
        Transaction::adjustInventory($request->product_id, $request->from, $request->to, $request->quantity);

        return redirect('/transactions');
    }

}
