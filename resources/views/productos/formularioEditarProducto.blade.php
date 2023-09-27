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

        {{-- Se muestran los errores --}}
        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" es el valor con el que se generó el error --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <form class="flex flex-col gap-2" action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method("PATCH")
            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" type="text" value="{{ old('nombre') ?? $producto->nombre}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_compra">Precio de compra:</label>
                <input class="input" id="precio_compra" name="precio_compra" type="number" min="0" value="{{ old('precio_compra') ?? $producto->precio_compra}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_venta">Precio de venta:</label>
                <input class="input" id="precio_venta" name="precio_venta" type="number" min="0" value="{{ old('precio_venta') ?? $producto->precio_venta}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="cantidad">Cantidad:</label>
                <input class="input" id="cantidad" name="cantidad" type="number" min="0" value="{{ old('cantidad') ?? $producto->cantidad}}" required>
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="categoria">Categoría:</label>
                {{--! Después las categorías vendrán de la DB --}}
                <select class="input" id="categoria" name="categoria" required>
                    <option value="" @selected((old("categoria") ?? $producto->categoria) == "")>Todo</option>
                    <option value="cobija" @selected((old("categoria") ?? $producto->categoria) == "cobija")>Cobija</option>
                    <option value="colcha" @selected((old("categoria") ?? $producto->categoria) == "colcha")>Colcha</option>
                    <option value="cortina" @selected((old("categoria") ?? $producto->categoria) == "cortina")>Cortina</option>
                    <option value="edredon" @selected((old("categoria") ?? $producto->categoria) == "edredon")>Edredón</option>
                    <option value="frazada" @selected((old("categoria") ?? $producto->categoria) == "frazada")>Frazada</option>
                    <option value="sabana" @selected((old("categoria") ?? $producto->categoria) == "sabana")>Sábana</option>
                    <option value="almohada" @selected((old("categoria") ?? $producto->categoria) == "almohada")>Almohada</option>
                    <option value="cojin" @selected((old("categoria") ?? $producto->categoria) == "cojin")>Cojín</option>
                    <option value="otros" @selected((old("categoria") ?? $producto->categoria) == "otros")>Otros</option>
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