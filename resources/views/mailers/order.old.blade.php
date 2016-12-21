<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
    <h3>¡HOLA!</h3>
<p>Agradecemos tu preferencia al adquirir tus productos en la tienda en línea de UNIPESA.</p>
<table>
    <thead>
    <tr>
        <th>Producto</th>
        <th>Costo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->pricing}}</td>
        </tr>
    @endforeach

    <tr>
        <td>Total</td>
        <td>{{$order->total}}</td>
    </tr>
    </tbody>
</table>
</body>
</html>