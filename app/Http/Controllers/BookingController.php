<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\UUID;
use App\Booking;
use App\Product;
use App\BookingNotification;
use Session;

class BookingController extends Controller
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
        $booking = new Booking();
        $bookingNotification = new BookingNotification;
        //$ContactName = ltrim($request->input('ContactName'), ' ');
        //$ContactNo = $request->input('ContactNo');

        //$string = str_replace(' ', '', $ContactName);
        //$str = ltrim($ContactNo, '0');

        $validator = Validator::make($request->all(), [
            'ContactName' => 'required',
            'ContactNo' => 'required|max:11|unique:bookings',
        ]);

        if ($validator->fails()) {
            $request['autoOpenModal'] = 'true';
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $ContactNo = $request->ContactNo;
        $code = new UUID($ContactNo . '_');
        //Bookings Table
        $booking->ContactName = $request->input('ContactName');
        $booking->ContactNo = $request->input('ContactNo');
        $booking->Code = $code->uuid;
        $booking->ProductID = $request->product_id;
        $booking->DateCreated = date('Y-m-d H:i:s');
        
        $bookingNotification->Code = $code->uuid;

        $booking->save();
        $bookingNotification->save();

        Session::flash('success', 'You successfully booked this car!');
        return redirect()->action('ProductController@show', ['id' => $booking->ProductID]);
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
        //
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
}
