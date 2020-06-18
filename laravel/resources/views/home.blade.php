@extends('layouts.app')

@section('content')
<div style="background:#131313;text-align:center;padding:5rem;font-size:1.5rem;">
    <b style="font-size:4.5rem;"><span style="font-family: 'Audiowide', cursive;">Arporium</span> A Serisi</b> <br>Tüm cihazlarda aynı işletim sistemi
</div>
<div style="display:flex;flex-wrap:wrap;width:100%;">
@foreach ($data['allProducts'] as $prd)
    <div class="banner" style="background: url({{$prd->product_image}});">
        <div class="mask"></div>
        <a href="{{route('urun.show',['urun' => $prd->product_slug])}}">
            <div class="container" style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;">
                <h1 style="color:white;font-size:3rem;">{{$prd->product_title}}</h1>
                <p style="color:white;">{{$prd->product_content}}</p>
            </div>
        </a>
    </div>
@endforeach
</div>
@endsection


<style>
    .banner{
        padding: 2rem;
        height: 50vh;
        width: 50%;
        background-size:cover;
        position: relative;
    }
    .mask{
        height: 50vh;
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        background: rgb(0,0,0,0.3)
    }
    
</style>
