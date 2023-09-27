<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar producto</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="container mx-auto py-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold">Editar producto</h1>

        <form class="flex flex-col gap-2" action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method("PATCH")
            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" type="text" value="{{$producto->nombre}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_compra">Precio de compra:</label>
                <input class="input" id="precio_compra" name="precio_compra" type="number" min="0" value="{{$producto->precio_compra}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_venta">Precio de venta:</label>
                <input class="input" id="precio_venta" name="precio_venta" type="number" min="0" value="{{$producto->precio_venta}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="cantidad">Cantidad:</label>
                <input class="input" id="cantidad" name="cantidad" type="number" min="0" value="{{$producto->cantidad}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="categoria">Categoría:</label>
                {{--! Después las categorías vendrán de la DB --}}
                <select class="input" id="categoria" name="categoria" required>
                    <option value="" @selected($producto->categoria == "")>Todo</option>
                    <option value="cobija" @selected($producto->categoria == "cobija")>Cobija</option>
                    <option value="colcha" @selected($producto->categoria == "colcha")>Colcha</option>
                    <option value="cortina" @selected($producto->categoria == "cortina")>Cortina</option>
                    <option value="edredon" @selected($producto->categoria == "edredon")>Edredón</option>
                    <option value="frazada" @selected($producto->categoria == "frazada")>Frazada</option>
                    <option value="sabana" @selected($producto->categoria == "sabana")>Sábana</option>
                    <option value="almohada" @selected($producto->categoria == "almohada")>Almohada</option>
                    <option value="cojin" @selected($producto->categoria == "cojin")>Cojín</option>
                    <option value="otros" @selected($producto->categoria == "otros")>Otros</option>
                </select>
            </div>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,400px))] justify-center gap-2">
                <input class="boton" type="submit" value="Editar">
                <a class="boton boton--rojo" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>