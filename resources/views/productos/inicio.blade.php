<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>
<body>
    <h1>Productos</h1>
    <div style="width: 90%; max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        @foreach ($productos as $producto)
            <div style="background: #eee; padding: 1em;">
                <h2>{{$producto->nombre}}</h2>
                <p><b>Precio compra:</b> {{$producto->precio_compra}}</p>
                <p><b>Precio venta:</b> {{$producto->precio__venta}}</p>
                <p><b>Cantidad:</b> {{$producto->cantidad}}</p>

                <form action="/productos/{{$producto->id}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Borrar">
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>