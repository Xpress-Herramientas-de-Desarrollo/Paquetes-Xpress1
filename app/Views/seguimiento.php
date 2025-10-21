<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="py-16 bg-gray-100">
  <div class="max-w-screen-lg mx-auto px-5">

    <h1 class="text-3xl font-bold text-center mb-8 text-[#ff7947]">Panel de Seguimiento de Envíos</h1>
    <p class="text-center text-gray-600 mb-10">
      Consulta el estado de tus paquetes y revisa el historial de movimientos en tiempo real.
    </p>

    <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <p class="text-gray-500 text-sm">Total Envíos</p>
        <h2 class="text-2xl font-bold text-[#ff7947]">245</h2>
      </div>
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <p class="text-gray-500 text-sm">En Tránsito</p>
        <h2 class="text-2xl font-bold text-blue-500">73</h2>
      </div>
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <p class="text-gray-500 text-sm">Entregados</p>
        <h2 class="text-2xl font-bold text-green-500">160</h2>
      </div>
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <p class="text-gray-500 text-sm">Retrasados</p>
        <h2 class="text-2xl font-bold text-red-500">12</h2>
      </div>
    </section>

    <form action="<?= base_url('seguimiento/consultar') ?>" method="POST" class="bg-white p-8 rounded-lg shadow-md mb-10">
      <h2 class="text-2xl font-semibold text-center text-[#ff7947] mb-6">Consultar Envío</h2>
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

    <section class="bg-white p-6 rounded-xl shadow-md mb-10">
      <h2 class="text-xl font-semibold text-[#ff7947] mb-4">Envíos recientes</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-600">
          <thead class="bg-[#ff7947]/10 text-[#ff7947] font-semibold">
            <tr>
              <th class="py-3 px-4">Código</th>
              <th class="py-3 px-4">Origen</th>
              <th class="py-3 px-4">Destino</th>
              <th class="py-3 px-4">Estado</th>
              <th class="py-3 px-4">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t hover:bg-gray-50">
              <td class="py-3 px-4">XP987654321</td>
              <td class="py-3 px-4">Lima</td>
              <td class="py-3 px-4">Cusco</td>
              <td class="py-3 px-4 text-blue-600 font-semibold">En tránsito</td>
              <td class="py-3 px-4">18/10/2025</td>
            </tr>
            <tr class="border-t hover:bg-gray-50">
              <td class="py-3 px-4">XP123456789</td>
              <td class="py-3 px-4">Arequipa</td>
              <td class="py-3 px-4">Piura</td>
              <td class="py-3 px-4 text-green-600 font-semibold">Entregado</td>
              <td class="py-3 px-4">17/10/2025</td>
            </tr>
            <tr class="border-t hover:bg-gray-50">
              <td class="py-3 px-4">XP567891234</td>
              <td class="py-3 px-4">Trujillo</td>
              <td class="py-3 px-4">Lima</td>
              <td class="py-3 px-4 text-red-500 font-semibold">Retrasado</td>
              <td class="py-3 px-4">16/10/2025</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="bg-white p-8 rounded-xl shadow-md mb-10">
      <h2 class="text-2xl font-semibold text-center text-[#ff7947] mb-6">Seguimiento Visual del Paquete</h2>

      <div class="text-center mb-8">
        <p class="text-gray-600">Código de Envío: <strong>XP987654321</strong></p>
        <p class="text-gray-600">Estado actual: <strong class="text-[#ff7947]">En tránsito</strong></p>
      </div>

      <div class="mb-8">
        <div class="flex justify-between text-sm text-gray-500 mb-2 font-medium">
          <span>Registrado</span>
          <span>En tránsito</span>
          <span>En destino</span>
          <span>Entregado</span>
        </div>
        <div class="relative w-full bg-gray-200 rounded-full h-3">
          <div class="absolute top-0 left-0 bg-[#ff7947] h-3 rounded-full transition-all duration-700" style="width: 50%;"></div>
        </div>
      </div>

      <div class="text-gray-700 text-center space-y-2 mb-6">
        <p>Origen: <strong>Lima</strong></p>
        <p>Destino: <strong>Cusco</strong></p>
        <p>Peso: <strong>2.5 kg</strong></p>
        <p>Entrega estimada: <strong>21/10/2025</strong></p>
      </div>

      <h3 class="text-xl font-semibold text-[#ff7947] mb-4 text-center">Historial de Movimientos</h3>
      <ul class="relative border-l-2 border-[#ff7947]/30 ml-6">
        <li class="mb-6 ml-4">
          <div class="absolute w-3 h-3 bg-[#ff7947] rounded-full -left-[7px]"></div>
          <time class="text-sm text-gray-500">19/10/2025 08:45</time>
          <p class="font-medium text-gray-700">Paquete en centro de distribución de destino.</p>
        </li>
        <li class="mb-6 ml-4">
          <div class="absolute w-3 h-3 bg-[#ff7947] rounded-full -left-[7px]"></div>
          <time class="text-sm text-gray-500">18/10/2025 14:10</time>
          <p class="font-medium text-gray-700">Paquete en tránsito hacia destino.</p>
        </li>
        <li class="mb-6 ml-4">
          <div class="absolute w-3 h-3 bg-[#ff7947] rounded-full -left-[7px]"></div>
          <time class="text-sm text-gray-500">17/10/2025 09:30</time>
          <p class="font-medium text-gray-700">Paquete registrado en oficina Lima.</p>
        </li>
      </ul>
    </section>

  </div>
</main>

<?= $this->include('layouts/footer') ?>
