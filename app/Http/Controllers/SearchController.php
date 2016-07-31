<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\CarType;
use App\Province;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$product = Product::all();        
        //return view('search.index')->with('product', $product);

        $term = $request->get('term');
        $CarType = $request->get('CarType');
        $Location = $request->get('Location');
        $Capacity = $request->get('Capacity');
        //$CarType = CarType::orderBy('CarType')->pluck('CarType', 'CarType');

        if($Capacity){
            $products = DB::table('products');            
            $results = $products->where('Title', 'LIKE', '%'. $term .'%')
            ->where('ProductType', 'LIKE', '%'. $CarType . '%')
            ->where('Province', 'LIKE', '%'. $Location . '%')
            ->where('Capacity', '=',  $Capacity)
            ->orderBy("DateCreated", "desc")
            //->orWhere('description', 'LIKE', '%'. $searchterm .'%')
            //->orWhere('brand', 'LIKE', '%'. $searchterm .'%')
            ->get();
            //return $results;
            return view('search.index')->with('results', $results);
        }
        elseif ($term || $CarType || $Location){
            $products = DB::table('products');            
            $results = $products->where('Title', 'LIKE', '%'. $term .'%')
            ->where('ProductType', 'LIKE', '%'. $CarType . '%')
            ->where('Province', 'LIKE', '%'. $Location . '%')
            //->orWhere('Capacity', '=',  $Capacity)
            ->orderBy("DateCreated", "desc")
            //->orWhere('description', 'LIKE', '%'. $searchterm .'%')
            //->orWhere('brand', 'LIKE', '%'. $searchterm .'%')
            ->get();
            //return $results;
            return view('search.index')->with('results', $results);
        }
        // elseif ($CarType) {
        //     $products = DB::table('products');            
        //     $results = $products->where('ProductType', '=', $CarType)
        //     ->orderBy("DateCreated", "desc")
        //     //->orWhere('description', 'LIKE', '%'. $searchterm .'%')
        //     //->orWhere('brand', 'LIKE', '%'. $searchterm .'%')
        //     ->get();
        //     return view('search.index')->with('results', $results);
        // }
        else{
            $results = Product::all();        
            return view('search.index')->with('results', $results);
        }
    }
    public function autocomplete(Request $request){
            //$term = $request->get('Location');
        //if ($request->ajax()) {
            //if (($term = $request->get('Location'))) {
                
            //}
            // $provinces = DB::table('provinces')->where('ProvinceName', 'LIKE', '%'. $term .'%')
            // ->orderBy('ProvinceName', 'desc')
            // ->get();
            
            // $results = [];
            // foreach ($provinces as $province) {
            //     $results[] = ['id' => $province->id, 'value' => $province->ProvinceName];
            // }
            // return response()->json($results);
        //}       
        if ($request->ajax()) {
            $term = Input::get('term');
        
            $results = array();  
        
            $queries = DB::table('provinces')
                ->where('ProvinceName', 'LIKE', '%'.$term.'%')
                ->take(5)->get();
        
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->ProvinceName ];
            }
            return Response::json($results);
        }
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
