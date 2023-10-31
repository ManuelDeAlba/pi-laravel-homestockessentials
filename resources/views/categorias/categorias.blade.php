<x-layout titulo="Categorías">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold mb-4">{{count($categorias) == 1 ? "Categoría" : "Categorías"}}</h1>
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($categorias as $indice => $categoria)
                <div class="bg-gray-900 text-white p-4 grid grid-rows-[1fr_max-content] gap-4 rounded-sm">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-bold flex-grow">{{$indice + 1}}) {{$categoria->nombre}}</h2>
                        <p class="text-gray-400"><b>ID:</b> {{$categoria->id}}</p>
                        <p class="text-gray-400"><b>Productos:</b> {{count($categoria->productos)}}</p>
                    </div>
        
                    <div class="flex gap-1">
                        <a class="boton" href="{{ route('categorias.edit', $categoria) }}">Editar</a>

                        @if (count($categorias) > 1)
                            <a href="{{ route('categorias.show', $categoria) }}" class="boton">Ver</a>
                        @endif
        
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                            @csrf
                            @method('DELETE')
        
                            <input class="boton boton--rojo" type="submit" value="Borrar">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="space-y-4">
            @if (count($categorias) == 1)
                <h3 class="text-gray-800 font-bold">Productos relacionados:</h3>
                @foreach ($categorias[0]->productos as $indice => $producto)
                    <div class="grid grid-cols-[50%,max-content] gap-4">
                        <span class="text-gray-800"><b>{{$indice + 1}})</b> {{$producto->nombre}}</span>
                        <a class="boton self-start" href="{{route('productos.show', $producto)}}">Ver</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>