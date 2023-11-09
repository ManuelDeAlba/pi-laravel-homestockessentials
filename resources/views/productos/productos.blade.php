<x-layout titulo="Productos">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold mb-4">{{count($productos) == 1 ? "Producto" : "Productos"}}</h1>
        @if (session("message"))
            <div class="p-1 bg-red-600 text-white text-center">{{session("message")}}</div>
        @endif
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($productos as $producto)
                <div class="bg-gray-900 text-white p-4 grid grid-rows-[1fr_max-content] gap-4 rounded-sm">
                    <div class="flex flex-col gap-1">
                        <img class="w-full object-cover object-center h-[200px] mb-4" src="{{
                            $producto->img ? (
                                // Si tiene la cadena http pone la imagen tal cual
                                strpos($producto->img, "http") === 0 ? (
                                    $producto->img
                                ) : (
                                    // Si no, es porque la imagen es local
                                    Storage::url($producto->img)
                                )
                            ) : (
                                // Si no existe la imagen pone un placeholder
                                '/assets/placeholder-producto.png'
                            )
                        }}" alt="Imagen del producto">
                        <h2 class="text-lg font-bold">{{$producto->id}}) {{$producto->nombre}}</h2>
                        <p class="text-gray-400"><b>Precio compra:</b> {{$producto->precio_compra}}</p>
                        <p class="text-gray-400"><b>Precio venta:</b> {{$producto->precio_venta}}</p>
                        <p class="text-gray-400"><b>Cantidad:</b> {{$producto->cantidad}}</p>
                        <p class="text-gray-400"><b>Categoría:</b> {{$producto->categoria->nombre}}</p>
                        <p class="text-gray-400"><b>Creador:</b> {{$producto->user ? $producto->user->name : "Anónimo"}}</p>
                    </div>
        
                    <div class="flex flex-wrap gap-1">
                        @if (count($productos) > 1)
                            <a href="{{ route('productos.show', $producto) }}" class="boton grow">Ver</a>
                        @endif

                        @auth
                            @can('comprar', $producto)
                                <a class="boton grow" href="{{ route('compras.createWithProductId', $producto->id) }}">Comprar</a>
                            @endcan

                            {{-- @if (auth()->id() == $producto->user_id) --}}
                            {{-- @endif --}}
                            @can('delete', $producto)
                                <a class="boton grow" href="{{ route('productos.edit', $producto) }}">Editar</a>
                
                                <form class="flex grow" action="{{ route('productos.destroy', $producto) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                
                                    <input class="boton boton--rojo w-full" type="submit" value="Borrar">
                                </form>
                            @endcan

                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>