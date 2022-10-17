<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\SoftDeletes;


class CartDetailController extends Controller
{
    // use SoftDeletes;
    
    public function store(Request $request)
    {
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id; 
        $cartDetail->product_id = $request->product_id; 
        $cartDetail->quantity = $request->quantity; 
        $cartDetail->save();

        return back();
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);

        if ($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();

        return back();
    }
}
