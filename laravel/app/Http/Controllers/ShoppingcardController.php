<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shoppingcard;
use App\Products;

class ShoppingcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        return DB::table('shoppingcards')
        ->where('shoppingcards.IP',$ip)
        ->join('products','products.id','=','shoppingcards.product_id')
        ->select('products.id','products.product_slug AS slug','products.product_title AS title','shoppingcards.piece','products.product_price AS price')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'piece' => 'required'
        ]);
        $ip = $request->ip();
        $product = $request->input('id');
        $piece = $request->input('piece');
        if((int)$piece>0){
            $oldsave = Shoppingcard::where('IP',$ip)->where('product_id', $product)->first();
            if(Products::where('id',(int)$product)->first()!=null){
                if($oldsave!=null){
                    DB::table('shoppingcards')
                    ->where('id', $oldsave->id)
                    ->update(['piece' => ((int)$oldsave->piece + (int)$piece)]);
                    return 'Update';
                }else{
                    $db = DB::table('shoppingcards')->insert(
                        [
                            'IP' => $ip, 
                            'product_id' => (int)$product,
                            'piece' => (int)$piece,
                            'created_at' => date('Y-m-d H:i:s')
                        ]
                    );
                    return ($db==1)?'Added':'Error';
                }
            }else{
                return 'Kayıtlı ürün yok';
            }
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Sales
    public function store(Request $request)
    {
        $ip = $request->ip();
        $cards = Shoppingcard::where('IP',$ip)->get();
        foreach($cards as $card){
            $db = DB::table('orders')->insert(
                [
                    'IP' => $ip, 
                    'product_id' => (int)$card->product_id,
                    'piece' => (int)$card->piece,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
        }
        Shoppingcard::where('IP',$ip)->delete();
        return back();
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
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'piece' => 'required'
        ]);
        $ip = $request->ip();
        $product = $request->input('id');
        $piece = $request->input('piece');
        if((int)$piece>0){
            $oldsave = Shoppingcard::where('IP',$ip)->where('product_id', $product)->first();
            if($oldsave!=null){
                DB::table('shoppingcards')
                ->where('id', $oldsave->id)
                ->update(['piece' => (int)$piece]);
                return 'Update';
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('shoppingcards')->where('product_id',$id)->delete();
    }
}
