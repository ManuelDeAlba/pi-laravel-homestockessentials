<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Stock Essentials</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="container mx-auto py-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold">Inicio</h1>
        
        <nav>
            <a class="boton mb-1" href='/productos'>Productos</a>
            <a class="boton mb-1" href='/productos/create'>Crear producto</a>
            <a class="boton mb-1" href='/productos/1/edit'>Editar producto 1</a>
        </nav>
    </main>
</body>
</html>