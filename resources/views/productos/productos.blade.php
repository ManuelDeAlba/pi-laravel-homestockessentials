<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="container mx-auto py-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold">{{count($productos) > 1 ? "Productos" : "Producto"}}</h1>
        
        <nav>
            <a class="boton" href='/'>Inicio</a>
            @if (count($productos) <= 1)
                <a class="boton" href='/productos'>Productos</a>
            @endif
            <a class="boton" href='/productos/create'>Crear producto</a>
        </nav>
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($productos as $producto)
                <div class="bg-slate-200 p-4 grid grid-rows-[1fr_max-content] gap-4">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-bold">{{$producto->id}}) {{$producto->nombre}}</h2>
                        <p><b>Precio compra:</b> {{$producto->precio_compra}}</p>
                        <p><b>Precio venta:</b> {{$producto->precio_venta}}</p>
                        <p><b>Cantidad:</b> {{$producto->cantidad}}</p>
                        <p><b>Cantidad:</b> {{$producto->categoria}}</p>
                    </div>
        
                    <div class="flex gap-1">
                        <a class="boton" href="{{ route('productos.edit', $producto) }}">Editar</a>
                        <a href="{{ route('productos.show', $producto) }}" class="boton">Ver</a>
        
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
        
                            <input class="boton boton--rojo" type="submit" value="Borrar">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>