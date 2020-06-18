@extends('layouts.app')

@section('content')
<div style="display:flex;height:calc(100vh - 62.8px);">
<div style="display:flex;align-items:center;background: url({{$data['product']->product_image}});background-size:100% 100%;height:100%;flex:1;">
</div>
    <div class="product">
        <div class="product__body">
            <h1 style="font-size:3rem;font-weight:bold;">{{$data['product']->product_title}}</h1>
            <h2 style="font-size:2rem;color:#22C65B;font-weight:bold;">{{$data['product']->product_price}} ₺</h2>
            <Addcard id="{{$data['product']->id}}"></Addcard>
            <div class="product__content">
                <b-tabs type="is-boxed">
                    <b-tab-item label="Detay">
                        {{$data['product']->product_content}}
                    </b-tab-item>
                    <b-tab-item label="AR"></b-tab-item>
                </b-tabs>
            </div>
    </div>
</div>
</div>
@endsection

<style>
    .product{
        background: #f5f5f5;  
        color: #282F35;
    }
    .product__body{
        padding: 1rem 1rem;
        min-width: 30vw;
        background: #F5F5F5;
    }
    .product__content{
        border-radius: 5px;
        margin: 2rem 0;
        text-align: left;
    }
    .tab-content{
        background: white;
        border-bottom: solid 1px #dcdcdc;
        border-left: solid 1px #dcdcdc;
        border-right: solid 1px #dcdcdc;
    }
</style>