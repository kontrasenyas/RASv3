<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use App\Product;
use App\BookingNotification;
use App\Booking;
use App\Http\Controllers\ProductController;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $BookingNotification = new BookingNotification;

        $BookingNotification->Code = $request->input('product_code');

        //$BookingNotification->save();

        return $BookingNotification;
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
        $user = Auth::user();
        
        //return $Code;        

        $Booking = new Booking;

        $Booking = Booking::find($id);

        $Booking->isReadOwner = '1';
        $Booking->save();
        $id = $request->input('product_id');
      
        return redirect()->route('product.show', ['id' => $id]);
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
    public function isRead($id)
    {
        $product = Product::find($id);
        return $product;
    }
}
