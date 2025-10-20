<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="max-w-3xl mx-auto px-6 py-10">

  <div class="mb-10">
    <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
      <span id="stepLabel">Paso 1 de 4: Fecha del envío</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5">
      <div id="progressBar" class="bg-orange-500 h-2.5 rounded-full w-1/4 transition-all duration-500"></div>
    </div>
  </div>

  <section id="step1" class="bg-white rounded-2xl shadow-lg p-8 text-center">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">Selecciona la fecha de envío</h2>
    <p class="text-sm text-gray-600 mb-6">Elige el día en que deseas que recojamos tu paquete en tu domicilio.</p>

    <div class="flex justify-center mb-8">
      <input type="date" id="fechaEnvio"
        class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 text-gray-700" />
    </div>

    <button id="btnContinuar1"
      class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Continuar</button>
  </section>

  <section id="step2" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Datos del recojo</h2>
    <p class="text-sm text-gray-600 mb-6 text-center">Completa la información para programar el recojo del paquete.</p>

    <form id="formRecojo" class="space-y-8">
      <div>
        <label for="quienEnvia" class="block text-sm font-semibold text-gray-700 mb-2">¿Quién envía?</label>
        <select id="quienEnvia"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
          <option value="">Seleccione una opción</option>
          <option value="yo">Yo</option>
          <option value="tercero">Un tercero</option>
        </select>
      </div>

      <div id="nombreTerceroContainer" class="hidden">
        <label for="nombreTercero" class="block text-sm font-semibold text-gray-700 mb-2">Nombre del tercero</label>
        <input type="text" id="nombreTercero" placeholder="Ej. Juan Pérez"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />
      </div>

      <div>
        <h3 class="text-lg font-semibold text-orange-600 mb-2">Dirección de recojo</h3>
        <input type="text" id="direccionRecojo" placeholder="Ej. Av. Los Olivos 123"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <select id="departamentoRecojo"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
            <option value="">Departamento</option>
          </select>
          <select id="provinciaRecojo"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" disabled>
            <option value="">Provincia</option>
          </select>
          <select id="distritoRecojo"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" disabled>
            <option value="">Distrito</option>
          </select>
        </div>
      </div>

      <div class="flex justify-end gap-4 pt-4">
        <button type="button" id="btnAtras2"
          class="border border-gray-300 text-gray-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition">Atrás</button>
        <button type="button" id="btnContinuar2"
          class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Continuar</button>
      </div>
    </form>
  </section>

  <section id="step3" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Datos de destino</h2>

    <form id="formDestino" class="space-y-8">
      <div>
        <label for="quienRecibe" class="block text-sm font-semibold text-gray-700 mb-2">¿Quién recibe?</label>
        <input type="text" id="quienRecibe" placeholder="Ej. María López"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />
      </div>

      <div>
        <h3 class="text-lg font-semibold text-orange-600 mb-2">Dirección de envío</h3>
        <input type="text" id="direccionEnvio" placeholder="Ej. Jr. Las Flores 456"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <select id="departamentoEnvio"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
            <option value="">Departamento</option>
          </select>
          <select id="provinciaEnvio"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" disabled>
            <option value="">Provincia</option>
          </select>
          <select id="distritoEnvio"
            class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" disabled>
            <option value="">Distrito</option>
          </select>
        </div>
      </div>

      <div class="flex justify-end gap-4 pt-4">
        <button type="button" id="btnAtras3"
          class="border border-gray-300 text-gray-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition">Atrás</button>
        <button type="button" id="btnContinuar3"
          class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Continuar</button>
      </div>
    </form>
  </section>

  <section id="step4" class="hidden bg-white rounded-2xl shadow-lg p-8 text-center">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">¡Solicitud realizada!</h2>
    <p class="text-gray-600 mb-6">Tu número de seguimiento es:</p>
    <p id="trackingNumber" class="text-3xl font-bold text-orange-600 mb-8"></p>

    <a href="/envio"
      class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Volver al inicio</a>
  </section>

</main>

<?= $this->include('layouts/footer') ?>

<script>
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const step3 = document.getElementById('step3');
  const step4 = document.getElementById('step4');
  const progressBar = document.getElementById('progressBar');
  const stepLabel = document.getElementById('stepLabel');

  document.getElementById('btnContinuar1').addEventListener('click', () => {
    if (!document.getElementById('fechaEnvio').value)
      return alert('Por favor selecciona una fecha.');
    step1.classList.add('hidden');
    step2.classList.remove('hidden');
    progressBar.style.width = '50%';
    stepLabel.textContent = 'Paso 2 de 4: Datos del recojo';
  });

  document.getElementById('btnAtras2').addEventListener('click', () => {
    step2.classList.add('hidden');
    step1.classList.remove('hidden');
    progressBar.style.width = '25%';
    stepLabel.textContent = 'Paso 1 de 4: Fecha del envío';
  });

  document.getElementById('btnContinuar2').addEventListener('click', () => {
    const quien = document.getElementById('quienEnvia').value;
    const direccion = document.getElementById('direccionRecojo').value;
    if (!quien || !direccion.trim()) return alert('Completa los datos de recojo.');
    step2.classList.add('hidden');
    step3.classList.remove('hidden');
    progressBar.style.width = '75%';
    stepLabel.textContent = 'Paso 3 de 4: Datos de destino';
  });

  document.getElementById('btnAtras3').addEventListener('click', () => {
    step3.classList.add('hidden');
    step2.classList.remove('hidden');
    progressBar.style.width = '50%';
    stepLabel.textContent = 'Paso 2 de 4: Datos del recojo';
  });

  document.getElementById('btnContinuar3').addEventListener('click', () => {
    const quienRecibe = document.getElementById('quienRecibe').value;
    const direccionEnvio = document.getElementById('direccionEnvio').value;
    if (!quienRecibe.trim() || !direccionEnvio.trim())
      return alert('Completa los datos de destino.');

    const num = 'PX-' + Math.floor(Math.random() * 900000 + 100000);
    document.getElementById('trackingNumber').textContent = num;

    step3.classList.add('hidden');
    step4.classList.remove('hidden');
    progressBar.style.width = '100%';
    stepLabel.textContent = 'Paso 4 de 4: Confirmación';
  });

  const quienEnvia = document.getElementById('quienEnvia');
  const nombreTerceroContainer = document.getElementById('nombreTerceroContainer');
  quienEnvia.addEventListener('change', () => {
    if (quienEnvia.value === 'tercero') nombreTerceroContainer.classList.remove('hidden');
    else nombreTerceroContainer.classList.add('hidden');
  });

let departamentos = [], provincias = {}, distritos = {};

Promise.all([
  fetch('<?= base_url("assets/json/departamentos.json") ?>').then(r => r.json()),
  fetch('<?= base_url("assets/json/provincias.json") ?>').then(r => r.json()),
  fetch('<?= base_url("assets/json/distritos.json") ?>').then(r => r.json())
])
.then(([deps, provs, dists]) => {
  departamentos = deps;
  provincias = provs;
  distritos = dists;

  cargarDepartamentos('Recojo');
  cargarDepartamentos('Envio');
})
.catch(error => {
  console.error('Error al cargar los JSON:', error);
  alert('No se pudieron cargar los datos de ubicación.');
});

function cargarDepartamentos(tipo) {
  const sel = document.getElementById(`departamento${tipo}`);
  sel.innerHTML = '<option value="">Departamento</option>';

  departamentos.forEach(dep => {
    const option = document.createElement('option');
    option.value = dep.id_ubigeo;
    option.textContent = dep.nombre_ubigeo;
    sel.appendChild(option);
  });

  sel.addEventListener('change', () => {
    cargarProvincias(tipo, sel.value);
  });
}

function cargarProvincias(tipo, idDep) {
  const provSel = document.getElementById(`provincia${tipo}`);
  const distSel = document.getElementById(`distrito${tipo}`);

  provSel.innerHTML = '<option value="">Provincia</option>';
  distSel.innerHTML = '<option value="">Distrito</option>';
  provSel.disabled = distSel.disabled = true;

  if (!idDep || !provincias[idDep]) return;

  provincias[idDep].forEach(p => {
    const option = document.createElement('option');
    option.value = p.id_ubigeo; 
    option.textContent = p.nombre_ubigeo;
    provSel.appendChild(option);
  });

  provSel.disabled = false;
  provSel.onchange = () => cargarDistritos(tipo, provSel.value);
}

function cargarDistritos(tipo, idProv) {
  const distSel = document.getElementById(`distrito${tipo}`);
  distSel.innerHTML = '<option value="">Distrito</option>';
  distSel.disabled = true;

  if (!idProv || !distritos[idProv]) return;

  distritos[idProv].forEach(d => {
    const option = document.createElement('option');
    option.value = d.id_ubigeo;
    option.textContent = d.nombre_ubigeo;
    distSel.appendChild(option);
  });

  distSel.disabled = false;
}

</script>
