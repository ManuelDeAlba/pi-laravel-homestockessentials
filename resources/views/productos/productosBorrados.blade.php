<x-layout titulo="Mis productos borrados">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold mb-4">{{count($productos) == 1 ? "Mi producto borrado" : "Mis productos borrados"}}</h1>
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($productos as $producto)
                <div class="bg-gray-900 text-white p-4 grid grid-rows-[1fr_max-content] gap-4 rounded-sm">
                    <div class="flex flex-col gap-1">
                        <img class="w-full object-cover object-center h-[200px] mb-4" src="{{$producto->img ? $producto->img : '/assets/placeholder-producto.png'}}" alt="Imagen del producto">
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

                        {{-- auth? --}}
                        @can('restore', $producto)
                            <form action="{{ route('productos.restore', $producto->id) }}" method="POST">
                                @csrf

                                <input class="boton grow" type="submit" value="Restablecer">
                            </form>
                        @endcan
                    
                        @can('forceDelete', $producto)
                            <form action="{{ route('productos.forceDelete', $producto->id) }}" method="POST">
                                @csrf
                                
                                <input class="boton boton--rojo grow" type="submit" value="Borrar definitivamente">
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>