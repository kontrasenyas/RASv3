<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\CarType;
use Image;
use Auth;
use DB;
use Session;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $product = Product::all();        
        if (Auth::check()) {
            return view('products.index')->with('product', $product);
        }
        else {
                return view('products.error');
        }
        // if ($id == null) {
        //     return Product::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        
        if (Auth::check()) {
            return view('products.create')->with('user', $user);
        }
        //if ($user != '') {
               // return view('products.create')->with('user', $user);
        //}
        else {
            return view('products.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function store(Request $request)
    {
        $this->validate($request, [
                'Title' => 'required|max:255|min:6',
                'Capacity' => 'required',                
                'Price' => 'required',
                'Photo1' => 'image|required',
                'CarType' => 'required|max:255|min:0',
            ]);

        $product = new Product;
        $user = $request->user();

        $product->Title = ltrim($request->input('Title'), ' ');
        $product->Capacity = ltrim($request->input('Capacity'), '0');
        $product->Brand = ltrim($request->input('Brand'), ' ');
        $product->EmailAddress = $user->email;
        $product->Province = $user->Province;
        $product->Details = $request->input('Details');
        $product->DateCreated = date('Y-m-d H:i:s');
        $product->ProductType = $request->input('CarType');

        if ($request->hasFile('Photo1')) {
            $photo1 = $request->file('Photo1');

            $filename = time() . '.' . $photo1->getClientOriginalExtension();
            Image::make($photo1)->resize(300, 300)->save(public_path('/uploads/productPhoto/' . $filename ));            
            $product->Photo1 = $filename;
        }
        // else {
        //     $message =  "<script type='text/javascript'>alert('Error');</script>";
           
        //     return $message;
        // }
        //return $product;
        $product->save();

        Session::flash('success', 'Your car was successfully posted!');
        /*
        $inputs = $request->all();
        $product = Product::Create($inputs);
        */
        //return 'Product record successfully created with id ' . $product->id;
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product =  Product::find($id);
        $user = new User();
        if (Auth::check()) {
            $user = Auth::user();
        }
        //return view('products.show')->with('product', $product);
        return view('products.show', compact(['product', $product, 'user', $user]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $user = $request->user();
        
        if (Auth::check()) {
            return view('products.edit', compact('product', $product));
        }
        else {
                return view('products.error');
        }
        //return view('product.edit')->with('product', $product);
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
        $this->validate($request, [
                'Title' => 'required|max:255|min:6',
                'Capacity' => 'required',
                'Brand' => 'required',
                'Price' => 'required',
                'Photo1' => 'image',
            ]);

        $product = Product::find($id);

        $product->Title = $request->input('Title');
        $product->Capacity = $request->input('Capacity');
        $product->Brand = $request->input('Details');
        $product->Price = $request->input('Capacity');
        $product->Details = $request->input('Details');

        if ($request->hasFile('Photo1')) {
            $photo1 = $request->file('Photo1');

            $filename = time() . '.' . $photo1->getClientOriginalExtension();
            Image::make($photo1)->resize(300, 300)->save(public_path('/uploads/productPhoto/' . $filename ));            
            $product->Photo1 = $filename;
        }

        $product->save();
        Session::flash('success', 'You successfully updated this car!');
        //return "Sucess updating product #" . $product->id;
        return redirect()->route('product.show', compact('id', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        Session::flash('success', 'You successfully deleted this car!');
        //return "Product record successfully deleted #" . $id;
        return redirect()->route('product.index');
    }
}
