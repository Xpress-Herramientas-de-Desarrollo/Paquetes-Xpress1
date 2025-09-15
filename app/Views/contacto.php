<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Contáctanos</h1>

        <form id="formContacto" class="space-y-6">
            <div>
                <label for="nombre" class="block mb-2 font-semibold text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Tu nombre">
            </div>
            <div>
                <label for="correo" class="block mb-2 font-semibold text-gray-700">Correo:</label>
                <input type="email" id="correo" name="correo" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="ejemplo@correo.com">
            </div>
            <div>
                <label for="mensaje" class="block mb-2 font-semibold text-gray-700">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="6" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                          placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <div class="text-center">
                <button type="submit"
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Enviar Mensaje
                </button>
            </div>
        </form>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
