<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-4">Cotiza tu Envío</h1>
        <p class="text-center text-gray-700 mb-6">
            Completa el formulario para obtener el costo estimado de tu envío.
        </p>

        <form id="formCotizacion" class="space-y-4">
            <div>
                <label for="origen" class="block mb-1 font-semibold text-gray-700">Ciudad de Origen:</label>
                <input type="text" id="origen" name="origen" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#ff7947] focus:outline-none"
                    placeholder="Ejemplo: Lima">
            </div>

            <div>
                <label for="destino" class="block mb-1 font-semibold text-gray-700">Ciudad de Destino:</label>
                <input type="text" id="destino" name="destino" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#ff7947] focus:outline-none"
                    placeholder="Ejemplo: Arequipa">
            </div>

            <div>
                <label for="peso" class="block mb-1 font-semibold text-gray-700">Peso del paquete (kg):</label>
                <input type="number" id="peso" name="peso" required min="0.1" step="0.1"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#ff7947] focus:outline-none"
                    placeholder="Ejemplo: 2.5">
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-[#ff7947] text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Calcular Cotización
                </button>
            </div>
        </form>

        <div id="resultado" class="mt-6"></div>
    </div>

    <div class="mapa-seccion">
            <h2 class="titulo-secundario">Ubicación en el Mapa</h2>
            <p class="descripcion-seccion">
                Visualiza la ubicación de nuestras oficinas principales o la ruta estimada de tu envío.
            </p>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=16V2IwWpGtj0LNSjEOJ_I-LAaUiW0glQ&ehbc=2E312F" width="100%" height="480"></iframe>
            </div>
        </div>
</main>

<?= $this->include('layouts/footer') ?>