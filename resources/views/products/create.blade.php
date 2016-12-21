@extends("layouts.app");

@section("content")
	<div class="container white">
		<h1>Nuevo producto</h1>
		<!--FORMULARIO DE PRODUCTOS-->
    @include('products.form', ['product' => $product , 'url' => '/products', 'method' => 'POST'])
		
	</div>

@endsection