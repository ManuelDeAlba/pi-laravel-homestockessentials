<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>
    <form action="/productos/{{$producto->id}}" method="POST">
        @csrf
        @method("PUT")
        <div>
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" type="text" value="{{$producto->nombre}}" required>
        </div>

        <div>
            <label for="precio_compra">Precio de compra:</label>
            <input id="precio_compra" name="precio_compra" type="number" min="0" value="{{$producto->precio_compra}}" required>
        </div>

        <div>
            <label for="precio_venta">Precio de venta:</label>
            <input id="precio_venta" name="precio_venta" type="number" min="0" value="{{$producto->precio_venta}}" required>
        </div>

        <div>
            <label for="cantidad">Cantidad:</label>
            <input id="cantidad" name="cantidad" type="number" min="0" value="{{$producto->cantidad}}" required>
        </div>

        <div>
            <label for="categoria">Categoría:</label>
            {{--! Después las categorías vendrán de la DB --}}
            <select id="categoria" name="categoria" required>
                <option value="" {{$producto->categoria == "" ? "selected" : ""}}>Todo</option>
                <option value="cobija" {{$producto->categoria == "cobija" ? "selected" : ""}}>Cobija</option>
                <option value="colcha" {{$producto->categoria == "colcha" ? "selected" : ""}}>Colcha</option>
                <option value="cortina" {{$producto->categoria == "cortina" ? "selected" : ""}}>Cortina</option>
                <option value="edredon" {{$producto->categoria == "edredon" ? "selected" : ""}}>Edredón</option>
                <option value="frazada" {{$producto->categoria == "frazada" ? "selected" : ""}}>Frazada</option>
                <option value="sabana" {{$producto->categoria == "sabana" ? "selected" : ""}}>Sábana</option>
                <option value="almohada" {{$producto->categoria == "almohada" ? "selected" : ""}}>Almohada</option>
                <option value="cojin" {{$producto->categoria == "cojin" ? "selected" : ""}}>Cojín</option>
                <option value="otros" {{$producto->categoria == "otros" ? "selected" : ""}}>Otros</option>
            </select>
        </div>

        <input type="submit" value="Editar">
    </form>
</body>
</html>