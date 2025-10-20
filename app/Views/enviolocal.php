<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="max-w-3xl mx-auto px-6 py-10">

  <div class="mb-10">
    <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
      <span id="stepLabel">Paso 1 de 3: Fecha del envío</span>
      <span id="progressPercent">33%</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5">
      <div id="progressBar" class="bg-orange-500 h-2.5 rounded-full w-1/3 transition-all duration-500"></div>
    </div>
  </div>

  <section id="step1" class="bg-white rounded-2xl shadow-lg p-8 text-center">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">Selecciona la fecha del envío</h2>
    <p class="text-sm text-gray-600 mb-6">Elige el día en que entregarás tu paquete en una de nuestras sucursales.</p>

    <div class="flex justify-center mb-8">
      <input type="date" id="fechaEnvio"
        class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 text-gray-700" />
    </div>

    <button id="btnContinuar1"
      class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Continuar</button>
  </section>

  <section id="step2" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Detalles del envío local</h2>
    <p class="text-sm text-gray-600 mb-6 text-center">Completa la información para registrar tu envío en sucursal.</p>

    <form id="formDatos" class="space-y-6">
      <div>
        <label for="quienEnvia" class="block text-sm font-semibold text-gray-700 mb-2">¿Quién envía?</label>
        <select id="quienEnvia"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
          <option value="">Seleccione una opción</option>
          <option value="yo">Yo</option>
          <option value="tercero">Un tercero</option>
        </select>
      </div>

      <div id="campoTercero" class="hidden">
        <label for="nombreTercero" class="block text-sm font-semibold text-gray-700 mb-2">Nombre del tercero</label>
        <input type="text" id="nombreTercero" placeholder="Ingrese el nombre del tercero"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />
      </div>

      <div>
        <label for="direccion" class="block text-sm font-semibold text-gray-700 mb-2">Dirección del local</label>
        <input type="text" id="direccion" placeholder="Ej. Sucursal Olva - San Isidro"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />
      </div>

      <div class="flex justify-end gap-4 pt-4">
        <button type="button" id="btnAtras2"
          class="border border-gray-300 text-gray-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition">Atrás</button>
        <button type="button" id="btnContinuar2"
          class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Continuar</button>
      </div>
    </form>
  </section>

  <section id="step3" class="hidden bg-white rounded-2xl shadow-lg p-8 text-center">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">¡Paquete agregado exitosamente!</h2>
    <p class="text-gray-600 mb-8">Tu envío local ha sido registrado correctamente.</p>

    <div class="flex justify-center mb-8">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M16.707 5.293a1 1 0 010 1.414l-7.388 7.388a1 1 0 01-1.414 0L3.293 9.475a1 1 0 011.414-1.414l4.121 4.121 6.68-6.68a1 1 0 011.414 0z"
          clip-rule="evenodd" />
      </svg>
    </div>

    <a href="/envio"
      class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Volver al inicio</a>
  </section>

</main>

<?= $this->include('layouts/footer') ?>

<script>
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const step3 = document.getElementById('step3');
  const progressBar = document.getElementById('progressBar');
  const progressPercent = document.getElementById('progressPercent');
  const stepLabel = document.getElementById('stepLabel');
  const quienEnvia = document.getElementById('quienEnvia');
  const campoTercero = document.getElementById('campoTercero');

  document.getElementById('btnContinuar1').addEventListener('click', () => {
    const fecha = document.getElementById('fechaEnvio').value;
    if (!fecha) {
      alert('Por favor selecciona una fecha de envío.');
      return;
    }
    step1.classList.add('hidden');
    step2.classList.remove('hidden');
    progressBar.style.width = '66%';
    progressPercent.textContent = '66%';
    stepLabel.textContent = 'Paso 2 de 3: Detalles del envío';
  });

  document.getElementById('btnAtras2').addEventListener('click', () => {
    step2.classList.add('hidden');
    step1.classList.remove('hidden');
    progressBar.style.width = '33%';
    progressPercent.textContent = '33%';
    stepLabel.textContent = 'Paso 1 de 3: Fecha del envío';
  });

  quienEnvia.addEventListener('change', () => {
    if (quienEnvia.value === 'tercero') {
      campoTercero.classList.remove('hidden');
    } else {
      campoTercero.classList.add('hidden');
    }
  });

  document.getElementById('btnContinuar2').addEventListener('click', () => {
    const quien = quienEnvia.value;
    const direccion = document.getElementById('direccion').value;
    const nombreTercero = document.getElementById('nombreTercero').value;

    if (!quien || !direccion.trim()) {
      alert('Completa todos los campos para continuar.');
      return;
    }

    if (quien === 'tercero' && !nombreTercero.trim()) {
      alert('Por favor, ingresa el nombre del tercero.');
      return;
    }

    step2.classList.add('hidden');
    step3.classList.remove('hidden');
    progressBar.style.width = '100%';
    progressPercent.textContent = '100%';
    stepLabel.textContent = 'Paso 3 de 3: Confirmación';
  });
</script>
