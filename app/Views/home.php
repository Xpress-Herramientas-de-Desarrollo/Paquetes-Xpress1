<?= $this->include('layouts/head') ?>
<?= $this->include('layouts/header') ?>

<main>
    <section class="bg-gradient-to-r from-orange-400 to-red-500 text-white py-20">
        <div class="max-w-screen-xl m-auto px-5 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Envíos Rápidos y Seguros con XPRESS
            </h1>
            <p class="text-lg md:text-xl mb-8">
                Tu solución confiable para envíos nacionales e internacionales.
            </p>
            <a href="#"
                class="bg-white text-red-500 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-100 transition">
                Comienza Ahora
            </a>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-screen-xl m-auto px-5 relative">
            <div class="overflow-hidden relative rounded-lg shadow-lg">
                <div class="slider flex transition-transform duration-500">
                    <img src="https://images.pexels.com/photos/6169641/pexels-photo-6169641.jpeg" class="w-full flex-shrink-0" alt="Envío 1">
                    <img src="https://images.pexels.com/photos/6407446/pexels-photo-6407446.jpeg" class="w-full flex-shrink-0" alt="Envío 2">
                    <img src="https://images.pexels.com/photos/4440774/pexels-photo-4440774.jpeg" class="w-full flex-shrink-0" alt="Envío 3">
                </div>
                <button id="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white text-red-500 rounded-full p-2 shadow hover:bg-gray-100">&lt;</button>
                <button id="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white text-red-500 rounded-full p-2 shadow hover:bg-gray-100">&gt;</button>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="max-w-screen-xl m-auto px-5 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-speedometer2 text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Envíos Rápidos</h3>
                <p class="text-gray-600">
                    Entrega en tiempo récord a nivel nacional e internacional.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-shield-check text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Seguridad Garantizada</h3>
                <p class="text-gray-600">
                    Tu paquete está en buenas manos con nuestro sistema de seguimiento.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="bi bi-wallet2 text-4xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Tarifas Competitivas</h3>
                <p class="text-gray-600">
                    Ofrecemos las mejores tarifas del mercado sin comprometer la calidad.
                </p>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-screen-xl m-auto px-5 text-center">
            <h2 class="text-3xl font-bold mb-8">Cómo Funciona</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <i class="bi bi-box-seam text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Empaca tu paquete</h3>
                    <p class="text-gray-600">Asegúrate de que tu paquete esté bien protegido.</p>
                </div>
                <div>
                    <i class="bi bi-truck text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Recogida o entrega</h3>
                    <p class="text-gray-600">Recogemos tu paquete en tu domicilio o punto de envío.</p>
                </div>
                <div>
                    <i class="bi bi-geo-alt text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Seguimiento en tiempo real</h3>
                    <p class="text-gray-600">Sigue tu envío desde nuestra plataforma en línea.</p>
                </div>
                <div>
                    <i class="bi bi-check-circle text-4xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold mb-2">Entrega segura</h3>
                    <p class="text-gray-600">Tu paquete llega a su destino con total seguridad.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="max-w-screen-xl m-auto px-5 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="flex justify-center">
                <img src="https://images.pexels.com/photos/4440874/pexels-photo-4440874.jpeg" 
                    alt="Servicio Especial" 
                    class="rounded-lg shadow-lg max-w-sm">
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Servicio Personalizado</h2>
                <p class="text-gray-600 mb-4">
                    Nuestro equipo se asegura de que cada envío reciba la atención que merece. 
                    Nos adaptamos a tus necesidades, ofreciendo un gran servicio de calidad, 
                    seguimiento personalizado y soporte al cliente en todo momento.
                </p>
                <p class="text-gray-600 mb-4">
                    Además, trabajamos con un sistema logístico ágil que garantiza entregas rápidas 
                    y seguras, sin importar el destino. Queremos que tengas la tranquilidad de que 
                    tu paquete llegará siempre en las mejores condiciones.
                </p>
                <p class="text-gray-600">
                    Confía en nosotros para tus envíos importantes: tu satisfacción y la de tus clientes 
                    es nuestra mayor prioridad.
                </p>
            </div>
        </div>
    </section>
    
<section class="py-16 bg-white">
  <div class="max-w-screen-xl m-auto px-5 text-center relative">
    <h2 class="text-3xl font-bold mb-12">Lo que dicen nuestros clientes</h2>

    <div class="overflow-hidden relative rounded-lg shadow-lg max-w-3xl m-auto">
      <div class="slider-testimonios flex transition-transform duration-500">
        
        <div class="w-full flex-shrink-0 p-8 bg-gray-50">
          <div class="flex justify-center mb-4">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" 
                 alt="Cliente 1" 
                 class="w-16 h-16 rounded-full shadow">
          </div>
          <p class="text-gray-600 italic mb-4">
            “Excelente servicio, mi paquete llegó antes de lo esperado y en perfectas condiciones.”
          </p>
          <h3 class="font-semibold text-red-500">Carlos Gutiérrez</h3>
          <span class="text-sm text-gray-500">Cliente frecuente</span>
        </div>

        <div class="w-full flex-shrink-0 p-8 bg-gray-50">
          <div class="flex justify-center mb-4">
            <img src="https://randomuser.me/api/portraits/women/45.jpg" 
                 alt="Cliente 2" 
                 class="w-16 h-16 rounded-full shadow">
          </div>
          <p class="text-gray-600 italic mb-4">
            “Muy fácil de usar la plataforma y el seguimiento en tiempo real me dio mucha confianza.”
          </p>
          <h3 class="font-semibold text-red-500">María López</h3>
          <span class="text-sm text-gray-500">Empresaria</span>
        </div>

        <div class="w-full flex-shrink-0 p-8 bg-gray-50">
          <div class="flex justify-center mb-4">
            <img src="https://randomuser.me/api/portraits/men/76.jpg" 
                 alt="Cliente 3" 
                 class="w-16 h-16 rounded-full shadow">
          </div>
          <p class="text-gray-600 italic mb-4">
            “El mejor servicio de envíos que he probado, además con tarifas muy competitivas.”
          </p>
          <h3 class="font-semibold text-red-500">Luis Fernández</h3>
          <span class="text-sm text-gray-500">Tienda Online</span>
        </div>
      </div>

      <button id="prevTest" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white text-red-500 rounded-full p-2 shadow hover:bg-gray-100">&lt;</button>
      <button id="nextTest" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white text-red-500 rounded-full p-2 shadow hover:bg-gray-100">&gt;</button>
    </div>
  </div>
</section>

<section class="py-16 bg-gray-50">
  <div class="max-w-screen-xl m-auto px-5 text-center">
    <h2 class="text-3xl font-bold mb-6 text-red-500">Confían en Nosotros</h2>
    <p class="text-gray-600 mb-12">Más de 3,000 clientes y microempresas confían en nuestro servicio de envíos.</p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-700">
      <div class="p-6 bg-orange-100 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2 text-orange-600">Empresa Embutidos</h3>
        <p class="text-sm text-orange-500">Cliente corporativo desde 2020</p>
      </div>
      <div class="p-6 bg-orange-100 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2 text-orange-600">Empresa Pastelería Kekitos</h3>
        <p class="text-sm text-orange-500">Envíos superior a 200 mensuales</p>
      </div>
      <div class="p-6 bg-orange-100 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2 text-orange-600">Empresa Helados</h3>
        <p class="text-sm text-orange-500">Envíos a nivel nacional</p>
      </div>
      <div class="p-6 bg-orange-100 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2 text-orange-600">Empresa Vestidos</h3>
        <p class="text-sm text-orange-500">Más de 100 paquetes entregados</p>
      </div>
    </div>
  </div>
</section>


<script>
  const sliderTest = document.querySelector('.slider-testimonios');
  const slidesTest = sliderTest.children;
  const totalSlidesTest = slidesTest.length;
  let indexTest = 0;

  document.getElementById('nextTest').addEventListener('click', () => {
    indexTest = (indexTest + 1) % totalSlidesTest;
    sliderTest.style.transform = `translateX(-${indexTest * 100}%)`;
  });

  document.getElementById('prevTest').addEventListener('click', () => {
    indexTest = (indexTest - 1 + totalSlidesTest) % totalSlidesTest;
    sliderTest.style.transform = `translateX(-${indexTest * 100}%)`;
  });

  setInterval(() => {
    indexTest = (indexTest + 1) % totalSlidesTest;
    sliderTest.style.transform = `translateX(-${indexTest * 100}%)`;
  }, 5000);
</script>



</main>

<?= $this->include('layouts/footer') ?>

<script>
    const slider = document.querySelector('.slider');
    const slides = slider.children;
    const totalSlides = slides.length;
    let index = 0;

    document.getElementById('next').addEventListener('click', () => {
        index = (index + 1) % totalSlides;
        slider.style.transform = `translateX(-${index * 100}%)`;
    });

    document.getElementById('prev').addEventListener('click', () => {
        index = (index - 1 + totalSlides) % totalSlides;
        slider.style.transform = `translateX(-${index * 100}%)`;
    });
</script>
