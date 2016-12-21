@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Bienvenido Sergio, en este momento te encuentras en el panel de administración...
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src=" img/shopping-cart-flat-vector-illustration-707951.jpg" alt="...">
                        <div class="caption">
                            <h3>Productos</h3>
                            <p>Panel para agregar productos...</p>
                            <p><a href="products" class="btn btn-primary" role="button">Ingresar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="views/img/49223249-ATM-terminal-and-credit-card-cash-bank-service-Vector-flat-illustration-Stock-Vector.jpg" alt="...">
                        <div class="caption">
                            <h3>Ventas</h3>
                            <p>Panel para medir ventas...</p>
                            <p><a href="orders" class="btn btn-primary" role="button">Ingresar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="views/img/canstock18813224.jpg" alt="...">
                        <div class="caption">
                            <h3>Registro de vendedor</h3>
                            <p>Panel para agregar a un vendedor</p>
                            <p><a href="register" class="btn btn-primary" role="button">Ingresar</a> </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
