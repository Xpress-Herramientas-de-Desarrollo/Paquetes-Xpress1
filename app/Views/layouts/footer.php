<footer class="bg-gray-900 text-white pt-12 pb-6 mt-10">
    <div class="max-w-screen-xl mx-auto px-5 grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Logo y descripción -->
        <div>
            <a href="<?= base_url('/') ?>" class="flex items-center gap-3 mb-4">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-12 object-contain" />
                <span class="text-2xl font-bold text-[#ff7947]" style="font-family: 'Bungee Inline', cursive">
                    XPRESS
                </span>
            </a>
            <p class="text-gray-400 text-sm">
                Envíos rápidos y seguros en todo el país. Confía en nosotros para
                llevar tus paquetes a tiempo.
            </p>
        </div>

        <!-- Enlaces -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-[#ff7947]">Enlaces</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="<?= base_url('/') ?>" class="hover:text-[#ff7947] transition">Inicio</a></li>
                <li><a href="<?= base_url('cotizar') ?>" class="hover:text-[#ff7947] transition">Cotizar</a></li>
                <li><a href="<?= base_url('seguimiento') ?>" class="hover:text-[#ff7947] transition">Seguimiento</a></li>
                <li><a href="<?= base_url('contacto') ?>" class="hover:text-[#ff7947] transition">Contacto</a></li>
            </ul>
        </div>

        <!-- Contáctanos -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-[#ff7947]">Contáctanos</h3>
            <ul class="space-y-2 text-sm">
                <li class="flex items-center gap-2"><i class="bi bi-telephone text-[#ff7947]"></i><span>+51 987 654 321</span></li>
                <li class="flex items-center gap-2"><i class="bi bi-envelope text-[#ff7947]"></i><span>contacto@xpress.com</span></li>
                <li class="flex items-center gap-2"><i class="bi bi-geo-alt text-[#ff7947]"></i><span>Lima, Perú</span></li>
            </ul>
        </div>

        <!-- Redes sociales -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-[#ff7947]">Síguenos</h3>
            <div class="flex gap-4 text-xl">
                <a href="#" class="hover:text-[#ff7947] transition"><i class="bi bi-facebook"></i></a>
                <a href="#" class="hover:text-[#ff7947] transition"><i class="bi bi-instagram"></i></a>
                <a href="#" class="hover:text-[#ff7947] transition"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="hover:text-[#ff7947] transition"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-400">
        © <?= date("Y") ?> XPRESS. Todos los derechos reservados.
    </div>
</footer>

<script src="<?= base_url('assets/js/menu.js') ?>"></script>
</body>
</html>
