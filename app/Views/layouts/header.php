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
        <button id="menuToggle" class="md:hidden text-2xl focus:outline-none hover:text-orange-500 transition-colors duration-200">
            <i class="bi bi-list"></i>
        </button>
    </div>
</header>

<!-- Menú móvil -->
<div id="mobileMenu" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 md:hidden">
    <div class="fixed top-0 right-0 h-full w-80 bg-white shadow-xl transform transition-transform duration-300 ease-in-out">
        <!-- Header del menú móvil -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-8 object-contain" />
                <span class="text-xl font-bold text-[#ff7947]" style="font-family: 'Bungee Inline', cursive">
                    XPRESS
                </span>
            </div>
            <button id="closeMenu" class="text-gray-500 hover:text-gray-700 text-2xl focus:outline-none">
                <i class="bi bi-x"></i>
            </button>
        </div>

        <!-- Contenido del menú -->
        <div class="p-6 space-y-6">
            <!-- Enlaces de navegación -->
            <div class="space-y-4">
                <a href="<?= base_url('/') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                    <i class="bi bi-house-door text-xl"></i>
                    <span class="text-lg font-medium">Inicio</span>
                </a>
                <a href="<?= base_url('cotizar') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                    <i class="bi bi-currency-dollar text-xl"></i>
                    <span class="text-lg font-medium">Cotizar</span>
                </a>
                <a href="<?= base_url('envio') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                    <i class="bi bi-box-seam text-xl"></i>
                    <span class="text-lg font-medium">Envía tu paquete</span>
                </a>
                <a href="<?= base_url('seguimiento') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                    <i class="bi bi-search text-xl"></i>
                    <span class="text-lg font-medium">Seguimiento</span>
                </a>
                <a href="<?= base_url('contacto') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                    <i class="bi bi-envelope text-xl"></i>
                    <span class="text-lg font-medium">Contacto</span>
                </a>
            </div>

            <!-- Separador -->
            <div class="border-t border-gray-200"></div>

            <!-- Sección de usuario -->
            <div class="space-y-4">
                <?php if (session()->get('id_usuario')): ?>
                    <div class="flex items-center gap-3 text-gray-700 py-2">
                        <i class="bi bi-person-circle text-2xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Bienvenido</p>
                            <p class="font-medium"><?= esc(session()->get('nombre')) ?></p>
                        </div>
                    </div>
                    <form action="<?= base_url('logout') ?>" method="POST">
                        <button type="submit" class="flex items-center gap-3 w-full text-left text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                            <i class="bi bi-box-arrow-right text-xl"></i>
                            <span class="text-lg font-medium">Cerrar Sesión</span>
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="flex items-center gap-3 text-gray-700 hover:text-[#ff7947] transition-colors duration-200 py-2">
                        <i class="bi bi-person text-xl"></i>
                        <span class="text-lg font-medium">Iniciar Sesión</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Script: clic para abrir/cerrar menús -->
<script>
    // Menú de usuario (desktop)
    const userButton = document.getElementById('userButton');
    const userMenu = document.getElementById('userMenu');

    if (userButton && userMenu) {
        userButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!userButton.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
    } 

    // Menú móvil hamburguesa
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    if (menuToggle && mobileMenu) {
        // Abrir menú móvil
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevenir scroll del body
        });

        // Cerrar menú móvil
        const closeMobileMenu = () => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = ''; // Restaurar scroll del body
        };

        if (closeMenu) {
            closeMenu.addEventListener('click', closeMobileMenu);
        }

        // Cerrar al hacer clic en el overlay
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMobileMenu();
            }
        });

        // Cerrar con tecla Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        });
    }
</script>
