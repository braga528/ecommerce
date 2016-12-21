@extends('layouts.app')

@section('title', 'Productos Unipesa')

@section('content')


    <div class="row">
        <img src="../public/images/web_banner.png" class="col-xs-12">
    </div>
<h1>Bienvenidos a la tienda</h1>
    <div class="text-center products-container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xs-10 col-sm-6">
                    @include("products.product",["product" => $product])
                </div>

            @endforeach
        </div>


        <div>
            {{$products->links()}}
        </div>
    </div>

@endsection