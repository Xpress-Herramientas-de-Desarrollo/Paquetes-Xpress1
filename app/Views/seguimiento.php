<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100">
  <div class="max-w-screen-lg mx-auto px-5">

    <h1 class="text-3xl font-bold text-center mb-8 text-[#ff7947]">
      Panel de seguimiento de envíos
      <?php if ($esAdmin): ?>ADMIN<?php endif; ?>
    </h1>
    <p class="text-center text-gray-600 mb-10">
      <?php if ($esAdmin): ?>
        Gestión y monitoreo de todos los envíos registrados.
      <?php else: ?>
        Consulta el estado de tus paquetes y revisa el historial de movimientos.
      <?php endif; ?>
    </p>

    <?php if ($esAdmin): ?>
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Total Envíos</p>
          <h2 class="text-2xl font-bold text-[#ff7947]"><?= esc($total ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Solicitado</p>
          <h2 class="text-2xl font-bold text-blue-500"><?= esc($Solicitado ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Preparándose</p>
          <h2 class="text-2xl font-bold text-blue-500"><?= esc($Preparándose ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">En agencia</p>
          <h2 class="text-2xl font-bold text-blue-500"><?= esc($En_agencia ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">En camino</p>
          <h2 class="text-2xl font-bold text-blue-500"><?= esc($En_camino ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Entregado</p>
          <h2 class="text-2xl font-bold text-green-500"><?= esc($Entregado ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Cancelado</p>
          <h2 class="text-2xl font-bold text-gray-500"><?= esc($Cancelado ?? 0) ?></h2>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6 text-center">
          <p class="text-gray-500 text-sm">Retrasado</p>
          <h2 class="text-2xl font-bold text-red-500"><?= esc($Retrasado ?? 0) ?></h2>
        </div>
      </section>
    <?php endif; ?>

    <?php if (!$esAdmin): ?>
  <!-- Formulario de Consulta -->
  <form action="<?= base_url('seguimiento/consultar') ?>" method="POST"
    class="bg-white p-8 rounded-xl shadow-lg mb-10 max-w-xl mx-auto border border-gray-200">
    <h2 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Consultar Envío</h2>
    <div class="mb-6">
      <label for="codigo" class="block mb-2 font-medium text-gray-700">Código de seguimiento:</label>
      <input type="text" id="codigo" name="codigo" required
        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#ff7947] focus:border-[#ff7947] transition"
        placeholder="Ejemplo: XP-123456" value="<?= isset($codigo) ? esc($codigo) : '' ?>">
    </div>
    <div class="text-center">
      <button type="submit"
        class="bg-[#ff7947] hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow transition">
        Consultar
      </button>
    </div>
  </form>

  <!-- Detalles del Pedido -->
  <?php if (isset($pedido)): ?>
    <section class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto border border-gray-200">
      <h2 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Detalles del Envío</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6 text-[#ff7947]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 10h2l.4 2M7 13h10l1-5H6.4M7 13l-1 5h12l1-5M7 13l-1-5m0 0L4 6H2"></path>
          </svg>
          <p><span class="font-semibold">Código:</span> <?= esc($pedido['codigo_tracking']) ?></p>
        </div>

        <div class="flex items-center gap-3">
          <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2l4-4m1 4v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h6"></path>
          </svg>
          <p><span class="font-semibold">Estado:</span> <?= esc($pedido['estado']) ?></p>
        </div>

        <div class="flex items-center gap-3">
          <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 4h6m2 0a2 2 0 0 1 2 2v6m0 0H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
          </svg>
          <p><span class="font-semibold">Origen:</span> <?= esc($pedido['direccion_origen']) ?></p>
        </div>

        <div class="flex items-center gap-3">
          <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 11c0 1.657-1.343 3-3 3S6 12.657 6 11s1.343-3 3-3s3 1.343 3 3zm0 0c0 1.657 1.343 3 3 3s3-1.343 3-3s-1.343-3-3-3s-3 1.343-3 3z"></path>
          </svg>
          <p><span class="font-semibold">Destino:</span> <?= esc($pedido['direccion_destino']) ?></p>
        </div>
      </div>

      <!-- Steps de seguimiento -->
      <div class="mt-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Progreso del Envío</h3>
        
        <?php
        // Definir los pasos en orden
        $pasos = ['Solicitado', 'Preparándose', 'En agencia', 'En camino', 'Entregado', 'Cancelado'];
        $estadoActual = $pedido['estado'];
        $indiceActual = array_search($estadoActual, $pasos);
        ?>
        
        <div class="relative">
          <!-- Línea de progreso -->
          <div class="absolute top-6 left-0 right-0 h-0.5 bg-gray-200"></div>
          <div class="absolute top-6 left-0 h-0.5 bg-orange-500 transition-all duration-500" 
               style="width: <?= $indiceActual !== false ? (($indiceActual + 1) / count($pasos)) * 100 : 0 ?>%"></div>
          
          <!-- Steps -->
          <div class="flex justify-between items-start">
            <?php foreach ($pasos as $index => $paso): ?>
              <?php
              $esCompletado = $index <= $indiceActual;
              $esActual = $paso === $estadoActual;
              $esCancelado = $estadoActual === 'Cancelado' && $paso === 'Cancelado';
              
              $claseIcono = $esCompletado ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-400';
              $claseTexto = $esCompletado ? 'text-gray-800 font-semibold' : 'text-gray-400';
              
              if ($esCancelado) {
                $claseIcono = 'bg-red-500 text-white';
                $claseTexto = 'text-red-600 font-semibold';
              }
              ?>
              
              <div class="flex flex-col items-center relative z-10">
                <!-- Icono del paso -->
                <div class="w-12 h-12 rounded-full flex items-center justify-center <?= $claseIcono ?> transition-all duration-300 shadow-lg">
                  <?php if ($paso === 'Solicitado'): ?>
                    <i class="bi bi-clipboard-check text-lg"></i>
                  <?php elseif ($paso === 'Preparándose'): ?>
                    <i class="bi bi-gear text-lg"></i>
                  <?php elseif ($paso === 'En agencia'): ?>
                    <i class="bi bi-building text-lg"></i>
                  <?php elseif ($paso === 'En camino'): ?>
                    <i class="bi bi-truck text-lg"></i>
                  <?php elseif ($paso === 'Entregado'): ?>
                    <i class="bi bi-check-circle text-lg"></i>
                  <?php elseif ($paso === 'Cancelado'): ?>
                    <i class="bi bi-x-circle text-lg"></i>
                  <?php endif; ?>
                </div>
                
                <!-- Texto del paso -->
                <div class="mt-3 text-center">
                  <p class="text-sm <?= $claseTexto ?> transition-colors duration-300">
                    <?= $paso ?>
                  </p>
                  
                  <!-- Indicador de estado actual -->
                  <?php if ($esActual && !$esCancelado): ?>
                    <div class="mt-1">
                      <span class="inline-block w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                    </div>
                  <?php elseif ($esCancelado): ?>
                    <div class="mt-1">
                      <span class="inline-block w-2 h-2 bg-red-500 rounded-full"></span>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        
        <!-- Información del estado actual -->
        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center">
              <?php if ($estadoActual === 'Solicitado'): ?>
                <i class="bi bi-clipboard-check text-white text-sm"></i>
              <?php elseif ($estadoActual === 'Preparándose'): ?>
                <i class="bi bi-gear text-white text-sm"></i>
              <?php elseif ($estadoActual === 'En agencia'): ?>
                <i class="bi bi-building text-white text-sm"></i>
              <?php elseif ($estadoActual === 'En camino'): ?>
                <i class="bi bi-truck text-white text-sm"></i>
              <?php elseif ($estadoActual === 'Entregado'): ?>
                <i class="bi bi-check-circle text-white text-sm"></i>
              <?php elseif ($estadoActual === 'Cancelado'): ?>
                <i class="bi bi-x-circle text-white text-sm"></i>
              <?php endif; ?>
            </div>
            <div>
              <p class="font-semibold text-gray-800">Estado actual: <?= $estadoActual ?></p>
              <p class="text-sm text-gray-600">
                <?php
                $mensajesEstado = [
                  'Solicitado' => 'Tu envío ha sido registrado y está siendo procesado.',
                  'Preparándose' => 'Estamos preparando tu paquete para el envío.',
                  'En agencia' => 'Tu paquete está en nuestras instalaciones listo para salir.',
                  'En camino' => 'Tu paquete está en tránsito hacia su destino.',
                  'Entregado' => '¡Tu paquete ha sido entregado exitosamente!',
                  'Cancelado' => 'Este envío ha sido cancelado.'
                ];
                echo $mensajesEstado[$estadoActual] ?? 'Estado no definido.';
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?> 


    <?php if ($esAdmin && isset($pedidos) && count($pedidos) > 0): ?>
      <section class="bg-white p-6 rounded-xl shadow-md mb-10">
        <h2 class="text-xl font-semibold text-[#ff7947] mb-4">Todos los Pedidos</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-[#ff7947]/10 text-[#ff7947] font-semibold">
              <tr>
                <th class="py-3 px-4">Código</th>
                <th class="py-3 px-4">Origen</th>
                <th class="py-3 px-4">Destino</th>
                <th class="py-3 px-4">Estado</th>
                <th class="py-3 px-4">Fecha</th>
                <th class="py-3 px-4">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pedidos as $p): ?>
                <tr class="border-t hover:bg-gray-50">
                  <td class="py-3 px-4"><?= esc($p['codigo_tracking']) ?></td>
                  <td class="py-3 px-4"><?= esc($p['direccion_origen']) ?></td>
                  <td class="py-3 px-4"><?= esc($p['direccion_destino']) ?></td>
                  <td class="py-3 px-4 font-semibold">
                    <form class="estado-form" data-id="<?= $p['id_pedido'] ?>">
                      <select name="estado" class="border rounded px-2 py-1 text-sm">
                        <?php
                        $estados = ['Solicitado', 'Preparándose', 'En agencia', 'En camino', 'Entregado', 'Cancelado', 'Retrasado'];
                        foreach ($estados as $estado): ?>
                          <option value="<?= $estado ?>" <?= $estado == $p['estado'] ? 'selected' : '' ?>><?= $estado ?></option>
                        <?php endforeach; ?>
                      </select>
                      <button type="submit"
                        class="ml-2 bg-[#ff7947] text-white px-3 py-1 rounded hover:bg-orange-600 transition text-sm">Actualizar</button>
                    </form>
                  </td>
                  <td class="py-3 px-4"><?= esc(date('d/m/Y', strtotime($p['fecha_pedido']))) ?></td>
                  <td class="py-3 px-4">
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
    <?php endif; ?>

  </div>
</main>

<?= $this->include('layouts/footer') ?>

<script>
  document.querySelectorAll('.estado-form').forEach(form => {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const id = this.dataset.id;
      const estado = this.querySelector('select[name="estado"]').value;

      fetch(`<?= base_url('seguimiento/cambiarEstado') ?>/${id}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `estado=${estado}`
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            Swal.fire({
              icon: 'success',
              title: 'Estado actualizado',
              showConfirmButton: false,
              timer: 1200
            });
            setTimeout(() => location.reload(), 1300);
          } else {
            Swal.fire('Error', data.message, 'error');
          }
        });
    });
  });
</script>