{!! Form::open(['url' => '/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
	<input type="submit" value="Eliminar" class="btn btn-link red-text no-padding no-margin inline-block no-transform">
{!! Form::close() !!}