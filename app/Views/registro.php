<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>
<?php 
$session = session();
$alerta = $session->getFlashdata('alerta') ?? null;
if($alerta):
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    mostrarAlertaRegistro('<?= $alerta['tipo'] ?>', '<?= $alerta['mensaje'] ?>'<?= isset($alerta['redirect']) ? ",'{$alerta['redirect']}'" : "" ?>);
});
</script>
<?php endif; ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Regístrate</h1>
        <form action="<?= base_url('registro/crear') ?>" method="POST" class="space-y-6">
            <div>
                <label for="nombre" class="block mb-2 font-semibold text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Ingresa tu nombre">
            </div>
            <div>
                <label for="apellido" class="block mb-2 font-semibold text-gray-700">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Ingresa tu apellido">
            </div>
            <div>
                <label for="correo" class="block mb-2 font-semibold text-gray-700">Correo:</label>
                <input type="email" id="correo" name="correo" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="ejemplo@correo.com">
            </div>
            <div>
                <label for="telefono" class="block mb-2 font-semibold text-gray-700">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="987654321">
            </div>
            <div>
                <label for="direccion" class="block mb-2 font-semibold text-gray-700">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Av. Ejemplo 123">
            </div>
            <div>
                <label for="usuario" class="block mb-2 font-semibold text-gray-700">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Crea tu usuario">
            </div>
            <div>
                <label for="contrasena" class="block mb-2 font-semibold text-gray-700">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                       placeholder="Crea tu contraseña">
            </div>
            <div class="text-center">
                <button type="submit"
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Registrarte
                </button>
            </div>
        </form>
        <p class="text-sm text-center text-gray-500 mt-6">
            ¿Ya tienes una cuenta? <a href="<?= base_url('login') ?>" class="text-[#ff7947] hover:underline">Inicia Sesión</a>
        </p>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
