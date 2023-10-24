<x-layout titulo="Comprar">
    <div class="container mx-auto p-4 grid gap-2">

        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" --}}        
        <h1 class="text-2xl text-center font-bold">Comprar {{$producto->nombre}}</h1>

        <form class="flex flex-col gap-2" action="{{ route('compras.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-[200px,1fr]">
                <label for="cantidad">Cantidad:</label>
                <input class="input" id="cantidad" name="cantidad" min="0" value="{{ old('cantidad') }}" type="number" required>
                @error('cantidad')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Este input es para mandar la id del producto --}}
            <input type="hidden" name="producto_id" value="{{$producto->id}}">

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,400px))] justify-center gap-2">
                <input class="boton" type="submit" value="Comprar">
                <a class="boton boton--rojo" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout>