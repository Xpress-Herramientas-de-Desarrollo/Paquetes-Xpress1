<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main>
    <!-- Hero / Banner principal -->
    <section class="bg-gradient-to-r from-orange-400 to-red-500 text-white py-20">
        <div class="max-w-screen-xl m-auto px-5 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Envíos Rápidos y Seguros con XPRESS
            </h1>
            <p class="text-lg md:text-xl mb-8">
                Tu solución confiable para envíos nacionales e internacionales.
            </p>
            <a href="#"
                class="bg-white text-red-500 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-100 transition">
                Comienza Ahora
            </a>
        </div>
    </section>

    <!-- Servicios -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-screen-xl m-auto px-5 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-speedometer2 text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Envíos Rápidos</h3>
                <p class="text-gray-600">
                    Entrega en tiempo récord a nivel nacional e internacional.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-shield-check text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Seguridad Garantizada</h3>
                <p class="text-gray-600">
                    Tu paquete está en buenas manos con nuestro sistema de seguimiento.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-wallet2 text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Tarifas Competitivas</h3>
                <p class="text-gray-600">
                    Ofrecemos las mejores tarifas del mercado sin comprometer la calidad.
                </p>
            </div>
        </div>
    </section>

    <!-- Cómo funciona -->
    <section class="py-16">
        <div class="max-w-screen-xl m-auto px-5 text-center">
            <h2 class="text-3xl font-bold mb-8">Cómo Funciona</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <i class="bi bi-box-seam text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Empaca tu paquete</h3>
                    <p class="text-gray-600">Asegúrate de que tu paquete esté bien protegido.</p>
                </div>
                <div>
                    <i class="bi bi-truck text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Recogida o entrega</h3>
                    <p class="text-gray-600">Recogemos tu paquete en tu domicilio o punto de envío.</p>
                </div>
                <div>
                    <i class="bi bi-geo-alt text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Seguimiento en tiempo real</h3>
                    <p class="text-gray-600">Sigue tu envío desde nuestra plataforma en línea.</p>
                </div>
                <div>
                    <i class="bi bi-check-circle text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Entrega segura</h3>
                    <p class="text-gray-600">Tu paquete llega a su destino con total seguridad.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->include('layouts/footer') ?>

