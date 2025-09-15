<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>
<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Iniciar Sesión</h1>

        <?php if (session()->get('id_usuario')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative mb-6">
                <strong class="font-bold">¡Bienvenid@ <?= esc(session()->get('nombre')) ?>!</strong>
                <p class="mt-2">Has iniciado sesión correctamente.</p>
            </div>

            <div class="mt-4 text-center">
                <p class="font-semibold text-gray-700 mb-4">Usuario: <?= esc(session()->get('username')) ?></p>
                <form action="<?= base_url('logout') ?>" method="POST">
                    <button type="submit"
                        class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition">
                        Cerrar Sesión
                    </button>
                </form>
            </div>

        <?php else: ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded relative mb-4">
                    <strong class="font-bold">Error:</strong> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/autenticar') ?>" method="POST" class="space-y-6">
                <div>
                    <label for="usuario" class="block mb-2 font-semibold text-gray-700">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                        placeholder="Ingresa tu usuario">
                </div>
                <div>
                    <label for="contrasena" class="block mb-2 font-semibold text-gray-700">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                        placeholder="Ingresa tu contraseña">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                        Ingresar
                    </button>
                </div>
            </form>

            <p class="text-sm text-center text-gray-500 mt-6">
                ¿No tienes una cuenta? <a href="<?= base_url('registro') ?>"
                    class="text-[#ff7947] hover:underline">Regístrate aquí</a>
            </p>
        <?php endif; ?>
    </div>
</main>


<?= $this->include('layouts/footer') ?>