<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main class="max-w-5xl mx-auto px-4 py-8">
  <section class="bg-white rounded-2xl p-6 shadow-lg">
    <h1 class="text-2xl font-bold mb-2 text-center text-orange-600">¿Qué tipo de envío deseas realizar?</h1>
    <p class="text-sm text-gray-500 mb-8 text-center">Elige una de las opciones para iniciar tu registro de envío.</p>

    <form id="formEnvio">
      <input type="hidden" name="opcion" id="inputOpcion" value="">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
        <button type="button" data-op="puerta"
          class="opcion-card aspect-square p-6 bg-white rounded-2xl flex flex-col justify-center items-center text-center border border-gray-200 hover:border-orange-400 hover:shadow-md transition duration-200">
          <div class="h-20 w-20 rounded-xl bg-orange-100 flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 16V6a1 1 0 011-1h11a1 1 0 011 1v10m0 0h5v-5l-3-3h-2v8zm0 0a2 2 0 11-4 0 2 2 0 014 0zM5 18a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
          </div>
          <h3 class="font-semibold text-lg mb-1 text-orange-600">ENVÍO PUERTA A PUERTA</h3>
          <p class="text-sm text-gray-600">Recogemos el paquete en tu domicilio y lo entregamos directamente en el destino.</p>
        </button>

        <button type="button" data-op="local"
          class="opcion-card aspect-square p-6 bg-white rounded-2xl flex flex-col justify-center items-center text-center border border-gray-200 hover:border-orange-400 hover:shadow-md transition duration-200">
          <div class="h-20 w-20 rounded-xl bg-orange-100 flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 7l1-2h16l1 2v13a1 1 0 01-1 1H4a1 1 0 01-1-1V7zm8 4h4m-2-2v4m-6 6h8" />
            </svg>
          </div>
          <h3 class="font-semibold text-lg mb-1 text-orange-600">ENVÍO A LOCAL</h3>
          <p class="text-sm text-gray-600">Lleva tu envío a uno de nuestros puntos autorizados para que llegue más rápido.</p>
        </button>
      </div>

      <div class="flex justify-center gap-4">
        <button type="submit"
          class="px-6 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">CONTINUAR</button>
      </div>
    </form>
  </section>
</main>

<?= $this->include('layouts/footer') ?>

<script>
  const cards = document.querySelectorAll('.opcion-card');
  const inputOpcion = document.getElementById('inputOpcion');
  const formEnvio = document.getElementById('formEnvio');

  cards.forEach(card => {
    card.addEventListener('click', () => {
      cards.forEach(c => c.classList.remove('ring-2', 'ring-orange-500', 'bg-orange-50'));
      card.classList.add('ring-2', 'ring-orange-500', 'bg-orange-50');
      inputOpcion.value = card.dataset.op;
    });
  });

  formEnvio.addEventListener('submit', (e) => {
    e.preventDefault();

    if (inputOpcion.value === "") {
      alert("Por favor selecciona una opción de envío antes de continuar.");
      return;
    }

    if (inputOpcion.value === "puerta") {
      window.location.href = "<?= base_url('enviopuerta') ?>";
    } else if (inputOpcion.value === "local") {
      window.location.href = "<?= base_url('enviolocal') ?>";
    }
  });
</script>
