<x-layout titulo="Productos">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold mb-4">{{count($productos) > 1 ? "Productos" : "Producto"}}</h1>
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($productos as $producto)
                <div class="bg-gray-900 text-white p-4 grid grid-rows-[1fr_max-content] gap-4 rounded-sm">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-bold flex-grow">{{$producto->id}}) {{$producto->nombre}}</h2>
                        <p class="text-gray-400"><b>Precio compra:</b> {{$producto->precio_compra}}</p>
                        <p class="text-gray-400"><b>Precio venta:</b> {{$producto->precio_venta}}</p>
                        <p class="text-gray-400"><b>Cantidad:</b> {{$producto->cantidad}}</p>
                        <p class="text-gray-400"><b>Categoría:</b> {{$producto->categoria->nombre}}</p>
                        <p class="text-gray-400"><b>Creador:</b> {{$producto->user ? $producto->user->name : "Anónimo"}}</p>
                    </div>
        
                    <div class="flex gap-1">
                        <a class="boton" href="{{ route('productos.edit', $producto) }}">Editar</a>

                        @if (count($productos) > 1)
                            <a href="{{ route('productos.show', $producto) }}" class="boton">Ver</a>
                        @endif
        
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
        
                            <input class="boton boton--rojo" type="submit" value="Borrar">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>