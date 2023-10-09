<x-layout titulo="Crear producto">
    <div class="container mx-auto p-4 grid gap-2">

        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" --}}        
        <h1 class="text-2xl text-center font-bold">Crear producto</h1>

        <form class="flex flex-col gap-2" action="{{ route('productos.index') }}" method="POST">
            @csrf
            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" required>
                @error('nombre')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_compra">Precio de compra:</label>
                <input class="input" id="precio_compra" name="precio_compra" value="{{ old('precio_compra') }}" type="number" min="0" required>
                @error('precio_compra')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_venta">Precio de venta:</label>
                <input class="input" id="precio_venta" name="precio_venta" value="{{ old('precio_venta') }}" type="number" min="0" required>
                @error('precio_venta')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="categoria">Categoría:</label>
                <select class="input" id="categoria" name="categoria" required>
                    <option value="" @selected(old("categoria") == "")>Todo</option>
                    <option value="cobija" @selected(old("categoria") == "cobija")>Cobija</option>
                    <option value="colcha" @selected(old("categoria") == "colcha")>Colcha</option>
                    <option value="cortina" @selected(old("categoria") == "cortina")>Cortina</option>
                    <option value="edredon" @selected(old("categoria") == "edredon")>Edredón</option>
                    <option value="frazada" @selected(old("categoria") == "frazada")>Frazada</option>
                    <option value="sabana" @selected(old("categoria") == "sabana")>Sábana</option>
                    <option value="almohada" @selected(old("categoria") == "almohada")>Almohada</option>
                    <option value="cojin" @selected(old("categoria") == "cojin")>Cojín</option>
                    <option value="otros" @selected(old("categoria") == "otros")>Otros</option>
                </select>
                @error('categoria')
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