<x-layout titulo="Home Stock Essentials">
    <div class="container mx-auto px-8 py-4 grid gap-2 text-gray-700 space-y-8">
        <div class="space-y-4">
            <h1 class="text-[clamp(2em,6vw,3em)] font-bold">Home Stock Essentials</h1>
            <h3 class="text-xl font-bold">Compra tus blancos de calidad a un mejor precio</h3>
        </div>

        <div class="flex flex-wrap justify-center gap-5 leading-6">
            <section class="w-[40%] min-w-[200px] flex-grow space-y-2">
                <h3 class="text-xl font-bold">Pedidos</h3>
                <p>Los pedidos que excedan la cantidad disponible se tomarán sobre pedido.</p>
                <p>Preguntar por el plazo de tiempo.</p>
            </section>

            <section class="w-[40%] min-w-[200px] flex-grow space-y-2">
                <h3 class="text-xl font-bold">Apartados</h3>
                <p>Los productos se pueden apartar, teniendo máximo 1 mes para terminar de completar los pagos.</p>
                <p>No aplica para venta de mayoreo.</p>
            </section>

            <section class="w-[40%] min-w-[200px] flex-grow space-y-2">
                <h3 class="text-xl font-bold">Formas de pago</h3>
                <div class="grid grid-cols-[repeat(auto-fit,minmax(150px,1fr))] gap-5">
                    <div class="flex flex-col items-center gap-2 p-5 bg-gray-900 rounded-sm text-white">
                        <h4 class="font-bold text-lg">Efectivo</h4>
                        <img class="w-12 fill-white" src="{{ asset('assets/money.svg') }}" alt="Icono dinero">
                    </div>
                    <div class="flex flex-col items-center gap-2 p-5 bg-gray-900 rounded-sm text-white">
                        <h4 class="font-bold text-lg">Transferencia</h4>
                        <img class="w-12 fill-white" src="{{ asset('assets/transfer.svg') }}" alt="Icono dinero">
                    </div>
                </div>
            </section>
        </div>

        {{-- <a class="mt-4 p-2 bg-gray-700 text-white text-center" href="/productos">Ver productos</a></div> --}}
</x-layout>