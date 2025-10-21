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
        <label for="direccion" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Sucursal</label>
        <select id="direccion"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
          <option value="">Seleccione un local</option>
        </select>
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
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">¿Quién recibe?</h2>
    <form id="formDestino" class="space-y-6">
      <div>
        <label for="quienRecibe" class="block text-sm font-semibold text-gray-700 mb-2">¿Quién recibe?</label>
        <select id="quienRecibe"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
          <option value="">Seleccione una opción</option>
          <option value="yo">Yo</option>
          <option value="tercero">Un tercero</option>
        </select>
      </div>
      <div id="campoTerceroRecibe" class="hidden">
        <label for="nombreTerceroRecibe" class="block text-sm font-semibold text-gray-700 mb-2">Nombre del tercero</label>
        <input type="text" id="nombreTerceroRecibe" placeholder="Ingrese el nombre del tercero"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" />
      </div>
      <div>
        <label for="localDestino" class="block text-sm font-semibold text-gray-700 mb-2 mt-4">Sucursal de destino</label>
        <select id="localDestino"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
          <option value="">Seleccione un local</option>
        </select>
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

const quienEnvia = document.getElementById('quienEnvia');
const campoTercero = document.getElementById('campoTercero');
const quienRecibe = document.getElementById('quienRecibe');
const campoTerceroRecibe = document.getElementById('campoTerceroRecibe');

document.getElementById('btnContinuar1').addEventListener('click', () => {
  const fecha = document.getElementById('fechaEnvio').value;
  if (!fecha) { alert('Por favor selecciona una fecha.'); return; }
  step1.classList.add('hidden');
  step2.classList.remove('hidden');
  progressBar.style.width = '50%';
  stepLabel.textContent = 'Paso 2 de 4: Datos del envío';
});

document.getElementById('btnAtras2').addEventListener('click', () => {
  step2.classList.add('hidden');
  step1.classList.remove('hidden');
  progressBar.style.width = '25%';
  stepLabel.textContent = 'Paso 1 de 4: Fecha del envío';
});

quienEnvia.addEventListener('change', () => {
  campoTercero.classList.toggle('hidden', quienEnvia.value !== 'tercero');
});

document.getElementById('btnContinuar2').addEventListener('click', () => {
  const quien = quienEnvia.value;
  const direccion = document.getElementById('direccion').value;
  const nombreT = document.getElementById('nombreTercero').value;
  if (!quien || !direccion) { alert('Completa todos los campos.'); return; }
  if (quien === 'tercero' && !nombreT.trim()) { alert('Ingrese el nombre del tercero.'); return; }
  step2.classList.add('hidden');
  step3.classList.remove('hidden');
  progressBar.style.width = '75%';
  stepLabel.textContent = 'Paso 3 de 4: Datos del destinatario';
});

document.getElementById('btnAtras3').addEventListener('click', () => {
  step3.classList.add('hidden');
  step2.classList.remove('hidden');
  progressBar.style.width = '50%';
  stepLabel.textContent = 'Paso 2 de 4: Datos del envío';
});

quienRecibe.addEventListener('change', () => {
  campoTerceroRecibe.classList.toggle('hidden', quienRecibe.value !== 'tercero');
});

document.getElementById('btnContinuar3').addEventListener('click', () => {
  const quien = quienRecibe.value;
  const localDest = document.getElementById('localDestino').value;
  const nombreTRecibe = document.getElementById('nombreTerceroRecibe').value;
  if (!quien || !localDest) { alert('Completa todos los campos.'); return; }
  if (quien === 'tercero' && !nombreTRecibe.trim()) { alert('Ingrese el nombre del tercero.'); return; }

  const num = 'PX-' + Math.floor(Math.random() * 900000 + 100000);
  document.getElementById('trackingNumber').textContent = num;

  step3.classList.add('hidden');
  step4.classList.remove('hidden');
  progressBar.style.width = '100%';
  stepLabel.textContent = 'Paso 4 de 4: Confirmación';
});

let locales = [];
fetch('<?= base_url("assets/json/locales.json") ?>')
  .then(r => r.json())
  .then(data => {
    locales = data;
    const dirSel = document.getElementById('direccion');
    const destSel = document.getElementById('localDestino');
    locales.forEach(loc => {
      const op1 = document.createElement('option'); op1.value = loc.id; op1.textContent = loc.nombre; dirSel.appendChild(op1);
      const op2 = document.createElement('option'); op2.value = loc.id; op2.textContent = loc.nombre; destSel.appendChild(op2);
    });
  })
  .catch(error => console.error("Error al cargar locales:", error));
</script>
