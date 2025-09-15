<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-screen-md mx-auto px-5">
        <h1 class="text-3xl font-bold text-center mb-8 text-[#ff7947]">Seguimiento de Envíos</h1>
        <p class="text-center text-gray-600 mb-10">
            Ingresa tu número de guía o código de seguimiento para conocer el estado de tu envío.
        </p>

        <!-- Formulario de seguimiento -->
        <form action="<?= base_url('seguimiento/consultar') ?>" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-6">
                <label for="codigo" class="block mb-2 font-semibold text-gray-700">Código de seguimiento:</label>
                <input type="text" id="codigo" name="codigo" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]" 
                       placeholder="Ejemplo: XP123456789">
            </div>
            <div class="text-center">
                <button type="submit" 
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Consultar
                </button>
            </div>
        </form>

        <!-- Resultado de la consulta -->
        <div class="mt-10">
            <?php if(session()->getFlashdata('error')): ?>
                <div class='bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded relative'>
                    <strong class='font-bold'>Error:</strong>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php elseif(isset($pedido)): ?>
                <div class='bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative'>
                    <strong class='font-bold'>¡Envío encontrado!</strong>
                    <p class='mt-2'>Estado: <span class='font-semibold'><?= esc($pedido['estado']) ?></span></p>
                    <p>Ciudad de origen: <?= esc($pedido['ciudad_origen']) ?></p>
                    <p>Ciudad de destino: <?= esc($pedido['ciudad_destino']) ?></p>
                    <p>Peso: <?= esc($pedido['peso']) ?> kg</p>
                    <p>Fecha estimada de entrega: <?= esc($pedido['fecha_entrega']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
