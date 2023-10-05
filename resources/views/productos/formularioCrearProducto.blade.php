<x-layout titulo="Crear producto">
    <div class="container mx-auto p-4 grid gap-2">

        {{-- Se muestran los errores --}}
        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
        <h1 class="text-2xl text-center font-bold">Crear producto</h1>

        <form class="flex flex-col gap-2" action="{{ route('productos.index') }}" method="POST">
            @csrf
            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" required>
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_compra">Precio de compra:</label>
                <input class="input" id="precio_compra" name="precio_compra" value="{{ old('precio_compra') }}" type="number" min="0" required>
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_venta">Precio de venta:</label>
                <input class="input" id="precio_venta" name="precio_venta" value="{{ old('precio_venta') }}" type="number" min="0" required>
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="categoria">Categoría:</label>
                <select class="input" id="categoria" name="categoria" value="{{ old('categoria') }}" required>
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

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,400px))] justify-center gap-2">
                <input class="boton" type="submit" value="Crear">
                <a class="boton boton--rojo" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout>