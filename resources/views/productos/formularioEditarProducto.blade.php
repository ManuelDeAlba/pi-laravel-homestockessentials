<x-layout titulo="Editar producto">
    <div class="container mx-auto p-4 grid gap-2">
        <h1 class="text-2xl text-center font-bold">Editar producto</h1>

        {{-- Cuando hay un error, los inputs se reinician, para eso se usa value="{{ old('name') }}" es el valor con el que se generó el error --}}
        <form class="flex flex-col gap-2" action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="grid grid-cols-[200px,1fr]">
                <label for="nombre">Nombre:</label>
                <input class="input" id="nombre" name="nombre" type="text" value="{{ old('nombre') ?? $producto->nombre}}" required>
                @error('nombre')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_compra">Precio de compra:</label>
                <input class="input" id="precio_compra" name="precio_compra" type="number" min="0" value="{{ old('precio_compra') ?? $producto->precio_compra}}" required>
                @error('precio_compra')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="precio_venta">Precio de venta:</label>
                <input class="input" id="precio_venta" name="precio_venta" type="number" min="0" value="{{ old('precio_venta') ?? $producto->precio_venta}}" required>
                @error('precio_venta')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="cantidad">Cantidad:</label>
                <input class="input" id="cantidad" name="cantidad" type="number" min="0" value="{{ old('cantidad') ?? $producto->cantidad}}" required>
                @error('cantidad')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[200px,1fr]">
                <label for="img">Imagen:</label>
                <input class="input" id="img" name="img" type="file" accept="image/*">
                @error('img')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="grid grid-cols-[200px,1fr]">
                <label for="categoria_id">Categoría:</label>
                <select class="input" id="categoria_id" name="categoria_id">
                    <option value="" @selected((old("categoria_id") ?? $producto->categoria->id) == "")>Todo</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected((old("categoria_id") ?? $producto->categoria->id) == $categoria->id)>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-700 col-span-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,400px))] justify-center gap-2">
                <input class="boton" type="submit" value="Editar">
                <a class="boton boton--rojo" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout>