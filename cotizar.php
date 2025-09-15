<?php include("includes/head.php"); ?>
<?php include("includes/header.php"); ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-screen-md mx-auto px-5">
        <h1 class="text-3xl font-bold text-center mb-8 text-[#ff7947]">Cotiza tu Envío</h1>
        <p class="text-center text-gray-600 mb-10">
            Completa el formulario para obtener el costo estimado de tu envío.
        </p>

        <!-- Formulario de cotización -->
        <form action="cotizar.php" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-6">
                <label for="origen" class="block mb-2 font-semibold text-gray-700">Ciudad de Origen:</label>
                <input type="text" id="origen" name="origen" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Ejemplo: Lima">
            </div>

            <div class="mb-6">
                <label for="destino" class="block mb-2 font-semibold text-gray-700">Ciudad de Destino:</label>
                <input type="text" id="destino" name="destino" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Ejemplo: Arequipa">
            </div>

            <div class="mb-6">
                <label for="peso" class="block mb-2 font-semibold text-gray-700">Peso del paquete (kg):</label>
                <input type="number" id="peso" name="peso" required min="0.1" step="0.1"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Ejemplo: 2.5">
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Calcular Cotización
                </button>
            </div>
        </form>

        <!-- Resultado de la cotización -->
        <div class="mt-10">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $origen = trim($_POST['origen']);
                $destino = trim($_POST['destino']);
                $peso = floatval($_POST['peso']);

                // 🔹 Ejemplo de cálculo: tarifa base 10 + (peso * 2.5)
                $tarifa = 10 + ($peso * 2.5);

                echo "
                <div class='bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative'>
                    <strong class='font-bold'>Cotización Generada:</strong>
                    <p class='mt-2'>Origen: <span class='font-semibold'>$origen</span></p>
                    <p>Destino: <span class='font-semibold'>$destino</span></p>
                    <p>Peso: <span class='font-semibold'>{$peso} kg</span></p>
                    <p class='mt-2 text-lg font-bold'>Total estimado: S/. $tarifa</p>
                </div>
                ";
            }
            ?>
        </div>

        <!-- Sección de mapa -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-center mb-6 text-[#ff7947]">Ubicación en el Mapa</h2>
            <p class="text-center text-gray-600 mb-6">
                Visualiza la ubicación de nuestras oficinas principales o la ruta estimada de tu envío.
            </p>
            <div class="w-full h-[400px] rounded-lg overflow-hidden shadow-lg">
                <!-- Google Maps -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.610883448046!2d-77.042793!3d-12.046374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8cd3fbbef8d%3A0x61fcb1abf5a64f5a!2sPlaza%20Mayor%20de%20Lima!5e0!3m2!1ses-419!2spe!4v1694710022223!5m2!1ses-419!2spe"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>
