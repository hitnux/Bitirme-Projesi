<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class SingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('single');
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
        $product = Products::where('product_slug', $request->input('slug'))->first();
        return response()->json(array('product'=> $product), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['allProducts'] = Products::all()->where('product_status', 1);
        $data['product'] = Products::where('product_slug', $slug)->first();
        return view('single', compact('data'));
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
/*
    public function addcookie(Request $request)
    {
        $key = $request->input('key');
        $slug = $request->input('slug');
        $piece = $request->input('piece');
        $value = $request->cookie($key);
        $obj->slug=$slug;
        $obj->piece=$piece;
        return response('Sepet Cookie')->cookie(
            $key, json_encode(), 120
        );
    }
    public function showcookie($key,Request $request)
    {
        $cookie = $request->cookie($key);
        return $cookie;
    }
    */
}
