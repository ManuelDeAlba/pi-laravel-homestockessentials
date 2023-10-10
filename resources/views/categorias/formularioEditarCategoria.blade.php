<x-layout titulo="Editar categoría">
    <div class="container mx-auto p-4 grid gap-2">

        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" --}}        
        <h1 class="text-2xl text-center font-bold">Editar categoría</h1>

        <form class="flex flex-col gap-2" action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method("PATCH")

            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" value="{{ old('nombre') ?? $categoria->nombre }}" type="text" required>
                @error('nombre')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,400px))] justify-center gap-2">
                <input class="boton" type="submit" value="Crear">
                <a class="boton boton--rojo" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout>