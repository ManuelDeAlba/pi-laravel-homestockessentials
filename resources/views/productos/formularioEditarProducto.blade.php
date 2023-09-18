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
    <form action="/productos/{{$id}}" method="POST">
        @csrf
        @method("PUT")
        <div>
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" type="text" required>
        </div>

        <div>
            <label for="precio_compra">Precio de compra:</label>
            <input id="precio_compra" name="precio_compra" type="number" min="0" required>
        </div>

        <div>
            <label for="precio_venta">Precio de venta:</label>
            <input id="precio_venta" name="precio_venta" type="number" min="0" required>
        </div>

        <div>
            <label for="cantidad">Cantidad:</label>
            <input id="cantidad" name="cantidad" type="number" min="0" required>
        </div>

        <div>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="" selected="">Todo</option>
                <option value="cobija">Cobija</option>
                <option value="colcha">Colcha</option>
                <option value="cortina">Cortina</option>
                <option value="edredon">Edredón</option>
                <option value="frazada">Frazada</option>
                <option value="sabana">Sábana</option>
                <option value="almohada">Almohada</option>
                <option value="cojin">Cojín</option>
                <option value="otros">Otros</option>
            </select>
        </div>

        <input type="submit" value="Editar">
    </form>
</body>
</html>