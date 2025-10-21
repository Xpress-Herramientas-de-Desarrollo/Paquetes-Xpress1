<header
    class="h-[113px] flex items-center justify-between px-10 max-w-screen-xl m-auto relative max-md:p-4">

    <!-- LOGO más a la izquierda -->
    <div class="flex items-center flex-none">
        <a href="<?= base_url('/') ?>" class="flex items-center gap-3">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-12 object-contain" />
            <span class="text-3xl font-bold text-[#ff7947]" style="font-family: 'Bungee Inline', cursive">
                XPRESS
            </span>
        </a>
    </div>

    <!-- NAV centrado -->
    <nav id="navMenu"
        class="flex flex-nowrap justify-center flex-1 space-x-8 text-center text-sm font-medium max-md:hidden transition-all duration-300">
        <a href="<?= base_url('/') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-house-door text-xl group-hover:text-orange-500"></i>
            <span>Inicio</span>
        </a>
        <a href="<?= base_url('cotizar') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-currency-dollar text-xl group-hover:text-orange-500"></i>
            <span>Cotizar</span>
        </a>
        <a href="<?= base_url('envio') ?>" class="flex flex-col items-center hover:text-orange-500 transition group whitespace-nowrap">
            <i class="bi bi-box-seam text-xl group-hover:text-orange-500"></i>
            <span>Envía tu paquete</span>
        </a>
        <a href="<?= base_url('seguimiento') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-search text-xl group-hover:text-orange-500"></i>
            <span>Seguimiento</span>
        </a>
        <a href="<?= base_url('contacto') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-envelope text-xl group-hover:text-orange-500"></i>
            <span>Contacto</span>
        </a>
    </nav>

    <!-- ICONO DE USUARIO más a la derecha -->
    <div class="flex items-center flex-none gap-4">
        <?php if (session()->get('id_usuario')): ?>
            <!-- Contenedor del usuario con menú centrado -->
            <div class="relative">
                <!-- Botón de usuario -->
                <div id="userButton" class="flex flex-col items-center cursor-pointer">
                    <i class="bi bi-person text-2xl hover:text-orange-500 transition"></i>
                    <span class="text-sm text-gray-700 mt-1 hover:text-orange-500 transition">
                        Hola, <?= esc(session()->get('nombre')) ?>
                    </span>
                </div>

                <!-- Menú centrado debajo -->
                <div id="userMenu"
                    class="hidden absolute left-1/2 transform -translate-x-1/2 mt-3 w-44 bg-white shadow-lg rounded-lg border border-gray-200 z-50 text-center">
                    <div
                        class="absolute -top-2 left-1/2 -translate-x-1/2 w-3 h-3 bg-white transform rotate-45 border-t border-l border-gray-200">
                    </div>
                    <form action="<?= base_url('logout') ?>" method="POST" class="flex justify-center">
                        <button type="submit"
                            class="px-4 py-2 text-gray-700 hover:bg-orange-500 hover:text-white rounded-lg transition w-full text-center">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="flex flex-col items-center group cursor-pointer">
                <i class="bi bi-person text-2xl group-hover:text-orange-500 transition"></i>
                <span class="text-sm mt-1 group-hover:text-orange-500 transition">Iniciar Sesión</span>
            </a>
        <?php endif; ?>

        <!-- Botón menú móvil -->
        <button id="menuToggle" class="md:hidden text-3xl focus:outline-none">
            <i class="bi bi-list"></i>
        </button>
    </div>
</header>

<!-- Menú móvil -->
<div id="mobileMenu" class="hidden bg-gray-900 text-white p-5 space-y-4 md:hidden">
    <a href="<?= base_url('/') ?>" class="block hover:text-[#ff7947] transition">Inicio</a>
    <a href="<?= base_url('cotizar') ?>" class="block hover:text-[#ff7947] transition">Cotizar</a>
    <a href="<?= base_url('envio') ?>" class="block hover:text-[#ff7947] transition">Envía tu paquete</a>
    <a href="<?= base_url('seguimiento') ?>" class="block hover:text-[#ff7947] transition">Seguimiento</a>
    <a href="<?= base_url('contacto') ?>" class="block hover:text-[#ff7947] transition">Contacto</a>

    <?php if (session()->get('id_usuario')): ?>
        <form action="<?= base_url('logout') ?>" method="POST">
            <button type="submit" class="block w-full text-left hover:text-[#ff7947]">Cerrar Sesión</button>
        </form>
    <?php else: ?>
        <a href="<?= base_url('login') ?>" class="block hover:text-[#ff7947] transition">Login</a>
    <?php endif; ?>
</div>

<!-- Script: clic para abrir/cerrar menú -->
<script>
    const userButton = document.getElementById('userButton');
    const userMenu = document.getElementById('userMenu');

    userButton.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!userButton.contains(e.target) && !userMenu.contains(e.target)) {
            userMenu.classList.add('hidden');
        }
    });
</script>
