<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="max-w-3xl mx-auto px-6 py-10">

  <!-- Barra de progreso -->
  <div class="mb-10">
    <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
      <span id="stepLabel">Paso 1 de 5: Fecha del envío</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5">
      <div id="progressBar" class="bg-orange-500 h-2.5 rounded-full w-1/5 transition-all duration-500"></div>
    </div>
  </div>

  <!-- Paso 1 -->
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

  <!-- Paso 2 -->
  <section id="step2" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Datos del recojo</h2>

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
          <select id="provinciaRecojo" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700" disabled>
            <option value="">Provincia</option>
          </select>
          <select id="distritoRecojo" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700" disabled>
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

  <!-- Paso 3 -->
  <section id="step3" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Datos de destino</h2>

    <form id="formDestino" class="space-y-8">
      <div>
        <label for="quienRecibe" class="block text-sm font-semibold text-gray-700 mb-2">¿Quién recibe?</label>
        <input type="text" id="quienRecibe" placeholder="Ej. María López"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700" />
      </div>

      <div>
        <h3 class="text-lg font-semibold text-orange-600 mb-2">Dirección de envío</h3>
        <input type="text" id="direccionEnvio" placeholder="Ej. Jr. Las Flores 456"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 text-gray-700" />

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <select id="departamentoEnvio" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700">
            <option value="">Departamento</option>
          </select>
          <select id="provinciaEnvio" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700" disabled>
            <option value="">Provincia</option>
          </select>
          <select id="distritoEnvio" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700" disabled>
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

  <!-- Paso 4 -->
  <section id="step4" class="hidden bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-orange-600 mb-4 text-center">Detalles del paquete y pago</h2>

    <form id="formPaquete" class="space-y-8 text-center">

      <div>
        <label for="tamanoPaquete" class="block text-sm font-semibold text-gray-700 mb-2 text-left">Tamaño del
          paquete</label>
        <select id="tamanoPaquete" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700">
          <option value="">Seleccione el tamaño</option>
          <option value="Pequeño (0-1kg)">Pequeño (0-1kg)</option>
          <option value="Mediano (1-5kg)">Mediano (1-5kg)</option>
          <option value="Grande (5-20kg)">Grande (5-20kg)</option>

        </select>
      </div>

      <div>
        <p class="text-gray-700 font-semibold mb-2">Precio estimado:</p>
        <p id="precioEstimado" class="text-2xl font-bold text-orange-600">S/ 0.00</p>
      </div>

      <div>
        <label for="metodoPago" class="block text-sm font-semibold text-gray-700 mb-2 text-left">Método de pago</label>
        <select id="metodoPago" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700">
          <option value="">Seleccione un método</option>
          <option value="yape">Yape</option>
          <option value="tarjeta">Tarjeta de crédito/débito</option>
          <option value="efectivo">Efectivo al recoger</option>
        </select>
      </div>

      <div class="flex justify-end gap-4 pt-4">
        <button type="button" id="btnAtras4"
          class="border border-gray-300 text-gray-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition">Atrás</button>
        <button type="button" id="btnPagar"
          class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-lg transition">Pagar</button>
      </div>
    </form>
  </section>

  <!-- Paso 5 -->
  <section id="step5" class="hidden bg-white rounded-2xl shadow-lg p-8 text-center">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">¡Solicitud realizada!</h2>

    <!-- Resumen del envío -->
    <div id="resumen" class="text-left max-w-2xl mx-auto mb-6">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Resumen del envío</h3>
      <p class="text-sm text-gray-600 mb-2"><strong>Fecha de envío:</strong> <span id="resumenFecha">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Quién envía:</strong> <span id="resumenQuienEnvia">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Dirección de recojo:</strong> <span
          id="resumenDireccionRecojo">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Ubigeo recojo:</strong> <span id="resumenUbigeoRecojo">-</span></p>

      <hr class="my-3">

      <p class="text-sm text-gray-600 mb-2"><strong>Quién recibe:</strong> <span id="resumenQuienRecibe">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Dirección de destino:</strong> <span
          id="resumenDireccionEnvio">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Ubigeo destino:</strong> <span id="resumenUbigeoEnvio">-</span></p>

      <hr class="my-3">

      <p class="text-sm text-gray-600 mb-2"><strong>Tamaño paquete:</strong> <span id="resumenTamano">-</span></p>
      <p class="text-sm text-gray-600 mb-2"><strong>Precio estimado:</strong> <span id="resumenPrecio">S/ 0.00</span>
      </p>
      <p class="text-sm text-gray-600 mb-2"><strong>Método de pago:</strong> <span id="resumenMetodo">-</span></p>
    </div>

    <p class="text-gray-600 mb-6">Tu número de seguimiento es:</p>
    <p id="trackingNumber" class="text-3xl font-bold text-orange-600 mb-8"></p>

    <a href="/envio"
      class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">Volver al
      inicio</a>
  </section>

</main>

<?= $this->include('layouts/footer') ?>

<script>
  const steps = [step1, step2, step3, step4, step5];
  const progressBar = document.getElementById('progressBar');
  const stepLabel = document.getElementById('stepLabel');

  const quienEnvia = document.getElementById('quienEnvia');
  const nombreTerceroContainer = document.getElementById('nombreTerceroContainer');
  quienEnvia.addEventListener('change', () => {
    nombreTerceroContainer.classList.toggle('hidden', quienEnvia.value !== 'tercero');
  });


  //precio de los paquete
  const tamanoSel = document.getElementById('tamanoPaquete');
  tamanoSel.addEventListener('change', () => {
    const tamano = tamanoSel.value;

    if (!tamano) {
      document.getElementById('precioEstimado').textContent = 'S/ 0.00';
      return;
    }

    fetch('<?= base_url("tarifa/precio") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({ tamano_paquete: tamano })
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById('precioEstimado').textContent = `S/ ${parseFloat(data.costo_base).toFixed(2)}`;
        } else {
          alert(data.error || 'No se pudo obtener el precio.');
          document.getElementById('precioEstimado').textContent = 'S/ 0.00';
        }
      })
      .catch(err => {
        console.error(err);
        alert('Error al obtener el precio desde el servidor.');
        document.getElementById('precioEstimado').textContent = 'S/ 0.00';
      });
  });


  // Función para cambiar pasos
  function cambiarPaso(nuevo) {
    steps.forEach((s, i) => s.classList.toggle('hidden', i !== nuevo));
    progressBar.style.width = ((nuevo + 1) * 20) + '%';
    const labels = ['Fecha del envío', 'Datos del recojo', 'Datos de destino', 'Pago y detalles', 'Confirmación'];
    stepLabel.textContent = `Paso ${nuevo + 1} de 5: ${labels[nuevo]}`;
  }

  // Botones paso a paso
  document.getElementById('btnContinuar1').onclick = () => {
    const fecha = document.getElementById('fechaEnvio').value;
    if (!fecha) return alert('Seleccione una fecha de envío.');
    cambiarPaso(1);
  };

  document.getElementById('btnAtras2').onclick = () => cambiarPaso(0);
  document.getElementById('btnContinuar2').onclick = () => {
    const nombreT = document.getElementById('nombreTercero').value.trim();
    const direccion = document.getElementById('direccionRecojo').value.trim();
    const dep = document.getElementById('departamentoRecojo').value;
    const prov = document.getElementById('provinciaRecojo').value;
    const dist = document.getElementById('distritoRecojo').value;

    if (!quienEnvia.value) return alert('Seleccione quién envía.');
    if (quienEnvia.value === 'tercero' && !nombreT) return alert('Ingrese el nombre del tercero.');
    if (!direccion) return alert('Ingrese la dirección de recojo.');
    if (!dep || !prov || !dist) return alert('Seleccione departamento, provincia y distrito del recojo.');

    cambiarPaso(2);
  };

  document.getElementById('btnAtras3').onclick = () => cambiarPaso(1);
  document.getElementById('btnContinuar3').onclick = () => {
    const quienRecibe = document.getElementById('quienRecibe').value.trim();
    const direccionEnvio = document.getElementById('direccionEnvio').value.trim();
    const dep = document.getElementById('departamentoEnvio').value;
    const prov = document.getElementById('provinciaEnvio').value;
    const dist = document.getElementById('distritoEnvio').value;

    if (!quienRecibe) return alert('Ingrese quién recibe.');
    if (!direccionEnvio) return alert('Ingrese la dirección de destino.');
    if (!dep || !prov || !dist) return alert('Seleccione departamento, provincia y distrito del destino.');

    cambiarPaso(3);
  };

  document.getElementById('btnAtras4').onclick = () => cambiarPaso(2);

  document.getElementById('btnPagar').onclick = () => {
    const tamano = tamanoSel.value;
    const metodo = document.getElementById('metodoPago').value;
    const fechaEnvio = document.getElementById('fechaEnvio').value;

    if (!tamano) return alert('Seleccione el tamaño del paquete.');
    if (!metodo) return alert('Seleccione el método de pago.');
    if (!fechaEnvio) return alert('Seleccione la fecha de envío.');

    // Obtener nombres de ubigeo
    const depRecojoText = document.getElementById('departamentoRecojo').selectedOptions[0]?.text || '';
    const provRecojoText = document.getElementById('provinciaRecojo').selectedOptions[0]?.text || '';
    const distRecojoText = document.getElementById('distritoRecojo').selectedOptions[0]?.text || '';

    const depEnvioText = document.getElementById('departamentoEnvio').selectedOptions[0]?.text || '';
    const provEnvioText = document.getElementById('provinciaEnvio').selectedOptions[0]?.text || '';
    const distEnvioText = document.getElementById('distritoEnvio').selectedOptions[0]?.text || '';

    // Determinar quién envía
    const nombreEnvia = quienEnvia.value === 'yo' ? '<?= session()->get("nombre") ?>' : document.getElementById('nombreTercero').value;

    const datos = {
      fecha_envio: fechaEnvio,
      tipo_envio: 'enviopuerta',
      tamano_paquete: tamano,
      metodo_pago: metodo,
      nombre_remitente: nombreEnvia,
      direccion_origen: document.getElementById('direccionRecojo').value,
      ciudad_origen: depRecojoText,
      nombre_destinatario: document.getElementById('quienRecibe').value,
      direccion_destino: document.getElementById('direccionEnvio').value,
      ciudad_destino: depEnvioText
    };

    fetch('<?= base_url("envio/guardar") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify(datos)
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById('resumenFecha').textContent = fechaEnvio;
          document.getElementById('resumenQuienEnvia').textContent = nombreEnvia;
          document.getElementById('resumenDireccionRecojo').textContent = document.getElementById('direccionRecojo').value;
          document.getElementById('resumenUbigeoRecojo').textContent = `${depRecojoText}${provRecojoText ? ', ' + provRecojoText : ''}${distRecojoText ? ', ' + distRecojoText : ''}`;

          document.getElementById('resumenQuienRecibe').textContent = document.getElementById('quienRecibe').value;
          document.getElementById('resumenDireccionEnvio').textContent = document.getElementById('direccionEnvio').value;
          document.getElementById('resumenUbigeoEnvio').textContent = `${depEnvioText}${provEnvioText ? ', ' + provEnvioText : ''}${distEnvioText ? ', ' + distEnvioText : ''}`;

          document.getElementById('resumenTamano').textContent = tamano;
          document.getElementById('resumenPrecio').textContent = `S/ ${parseFloat(data.costo_total).toFixed(2)}`;
          document.getElementById('resumenMetodo').textContent = metodo;

          document.getElementById('trackingNumber').textContent = data.tracking;

          cambiarPaso(4);
        } else {
          alert(data.error || 'Ocurrió un error al registrar el pedido.');
        }
      })
      .catch(err => {
        console.error(err);
        alert('Error al comunicarse con el servidor.');
      });
  };

  // Cargar ubigeo
  let departamentos = [], provincias = {}, distritos = {};
  Promise.all([
    fetch('<?= base_url("assets/json/departamentos.json") ?>').then(r => r.json()),
    fetch('<?= base_url("assets/json/provincias.json") ?>').then(r => r.json()),
    fetch('<?= base_url("assets/json/distritos.json") ?>').then(r => r.json())
  ])
    .then(([deps, provs, dists]) => {
      departamentos = deps; provincias = provs; distritos = dists;
      cargarDepartamentos('Recojo');
      cargarDepartamentos('Envio');
    });

  function cargarDepartamentos(tipo) {
    const sel = document.getElementById(`departamento${tipo}`);
    sel.innerHTML = '<option value="">Departamento</option>';
    departamentos.forEach(dep => {
      const o = document.createElement('option');
      o.value = dep.id_ubigeo; o.textContent = dep.nombre_ubigeo;
      sel.appendChild(o);
    });
    sel.onchange = () => cargarProvincias(tipo, sel.value);
  }

  function cargarProvincias(tipo, idDep) {
    const provSel = document.getElementById(`provincia${tipo}`);
    const distSel = document.getElementById(`distrito${tipo}`);
    provSel.innerHTML = '<option value="">Provincia</option>';
    distSel.innerHTML = '<option value="">Distrito</option>';
    provSel.disabled = distSel.disabled = true;
    if (!idDep || !provincias[idDep]) return;
    provincias[idDep].forEach(p => {
      const o = document.createElement('option');
      o.value = p.id_ubigeo; o.textContent = p.nombre_ubigeo;
      provSel.appendChild(o);
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
      const o = document.createElement('option');
      o.value = d.id_ubigeo; o.textContent = d.nombre_ubigeo;
      distSel.appendChild(o);
    });
    distSel.disabled = false;
  }
</script>