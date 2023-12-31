<x-layout titulo="Compras">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold mb-4">{{count($compras) == 1 ? "Mi compra" : "Mis compras"}}</h1>
        
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] gap-5">
            @foreach ($compras as $compra)
                <div class="bg-gray-900 text-white p-4 grid grid-rows-[1fr_max-content] gap-4 rounded-sm">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-bold flex-grow">{{$compra->id}}) {{$compra->nombre}}</h2>
                        <p class="text-gray-400"><b>Cantidad:</b> {{$compra->cantidad}}</p>
                        <p class="text-gray-400"><b>Precio:</b> ${{$compra->cantidad * $compra->precio_venta}}</p>
                        @if (count($compras) > 1)
                            <a class="boton self-start" href="/compras/{{$compra->compra_id}}">Ver</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>