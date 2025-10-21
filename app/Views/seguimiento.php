<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100">
  <div class="max-w-screen-lg mx-auto px-5">

    <h1 class="text-3xl font-bold text-center mb-8 text-[#ff7947]">Panel de Seguimiento de Envíos</h1>
    <p class="text-center text-gray-600 mb-10">
      Consulta el estado de tus paquetes y revisa el historial de movimientos en tiempo real.
    </p>

    <!-- Mensaje de error -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 text-center" role="alert">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Formulario de búsqueda -->
    <form action="<?= base_url('seguimiento/consultar') ?>" method="POST" class="bg-white p-8 rounded-lg shadow-md mb-10">
      <h2 class="text-2xl font-semibold text-center text-[#ff7947] mb-6">Consultar Envío</h2>
      <div class="mb-6">
        <label for="codigo" class="block mb-2 font-semibold text-gray-700">Código de seguimiento:</label>
        <input type="text" id="codigo" name="codigo" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
          placeholder="Ejemplo: XP-123456">
      </div>
      <div class="text-center">
        <button type="submit"
          class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
          Consultar
        </button>
      </div>
    </form>

    <!-- Resultado de búsqueda -->
    <?php if (isset($pedido)): ?>
      <section class="bg-white p-8 rounded-xl shadow-md mb-10">
        <h2 class="text-2xl font-semibold text-center text-[#ff7947] mb-6">Resultado del Seguimiento</h2>

        <div class="text-center mb-8">
          <p class="text-gray-600">Código de Envío: <strong><?= esc($codigo) ?></strong></p>
          <p class="text-gray-600">Estado actual: 
            <strong class="<?php
              if ($pedido['estado'] == 'Entregado') echo 'text-green-600';
              elseif ($pedido['estado'] == 'En camino') echo 'text-blue-600';
              else echo 'text-gray-600';
            ?>">
              <?= esc($pedido['estado']) ?>
            </strong>
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 mb-6">
          <div>
            <p><strong>Remitente:</strong> <?= esc($pedido['nombre_remitente']) ?></p>
            <p><strong>Origen:</strong> <?= esc($pedido['ciudad_origen']) ?></p>
            <p><strong>Dirección Origen:</strong> <?= esc($pedido['direccion_origen']) ?></p>
            <p><strong>Fecha Pedido:</strong> <?= esc($pedido['fecha_pedido']) ?></p>
          </div>
          <div>
            <p><strong>Destinatario:</strong> <?= esc($pedido['nombre_destinatario']) ?></p>
            <p><strong>Destino:</strong> <?= esc($pedido['ciudad_destino']) ?></p>
            <p><strong>Dirección Destino:</strong> <?= esc($pedido['direccion_destino']) ?></p>
            <p><strong>Fecha Programada:</strong> <?= esc($pedido['fecha_programada']) ?></p>
          </div>
        </div>

        <div class="mt-8">
          <div class="flex justify-between text-sm text-gray-500 mb-2 font-medium">
            <span>Registrado</span>
            <span>En tránsito</span>
            <span>En destino</span>
            <span>Entregado</span>
          </div>
          <div class="relative w-full bg-gray-200 rounded-full h-3">
            <?php
              $porcentaje = 25; // progreso base
              if ($pedido['estado'] == 'En camino') $porcentaje = 50;
              elseif ($pedido['estado'] == 'En destino') $porcentaje = 75;
              elseif ($pedido['estado'] == 'Entregado') $porcentaje = 100;
            ?>
            <div class="absolute top-0 left-0 bg-[#ff7947] h-3 rounded-full transition-all duration-700"
              style="width: <?= $porcentaje ?>%;"></div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  </div>
</main>

<?= $this->include('layouts/footer') ?>
