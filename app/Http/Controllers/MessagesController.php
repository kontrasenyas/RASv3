<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;

class MessagesController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$userEmail = $user->email;
    	$products = DB::table('products');
    	$messages = $products
    		->join('bookings', 'products.id', '=', 'bookings.ProductID')
    		->where('EmailAddress', '=', ''. $userEmail . '')
            ->orderBy("bookings.DateCreated", "desc")
            //->orWhere('description', 'LIKE', '%'. $searchterm .'%')
            //->orWhere('brand', 'LIKE', '%'. $searchterm .'%')
            ->get();
        return view('messages')->with('messages', $messages);;
    }
}
