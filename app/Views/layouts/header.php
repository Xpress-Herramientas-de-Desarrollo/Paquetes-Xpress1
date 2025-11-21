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

        <!-- Botón menú móvil mejorado -->
        <button id="menuToggle" class="md:hidden relative z-50 p-2 focus:outline-none group">
            <div class="w-6 h-5 flex flex-col justify-between">
                <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300 group-hover:bg-[#ff7947] menu-line-1"></span>
                <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300 group-hover:bg-[#ff7947] menu-line-2"></span>
                <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300 group-hover:bg-[#ff7947] menu-line-3"></span>
            </div>
        </button>
    </div>
</header>

<!-- Overlay con blur effect -->
<div id="mobileMenuOverlay" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-40 md:hidden opacity-0 invisible transition-opacity duration-300 ease-in-out"></div>

<!-- Menú móvil lateral moderno -->
<div id="mobileMenu" class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white shadow-2xl z-50 md:hidden transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
    <!-- Header del menú móvil con gradiente -->
    <div class="flex items-center justify-between p-6 bg-gradient-to-r from-[#ff7947] to-orange-600 text-white sticky top-0 z-10 shadow-md">
        <div class="flex items-center gap-3">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-8 object-contain brightness-0 invert" />
            <span class="text-xl font-bold" style="font-family: 'Bungee Inline', cursive">
                XPRESS
            </span>
        </div>
        <button id="closeMenu" class="p-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-200 focus:outline-none transform hover:rotate-90">
            <i class="bi bi-x-lg text-2xl"></i>
        </button>
    </div>

    <!-- Contenido del menú con animaciones -->
    <div class="p-6 space-y-6">
        <!-- Enlaces de navegación con efectos hover mejorados -->
        <div class="space-y-2">
            <a href="<?= base_url('/') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                    <i class="bi bi-house-door text-lg group-hover:text-white transition-colors duration-300"></i>
                </div>
                <span class="text-lg font-medium flex-1">Inicio</span>
                <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
            </a>
            
            <a href="<?= base_url('cotizar') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                    <i class="bi bi-currency-dollar text-lg group-hover:text-white transition-colors duration-300"></i>
                </div>
                <span class="text-lg font-medium flex-1">Cotizar</span>
                <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
            </a>
            
            <a href="<?= base_url('envio') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                    <i class="bi bi-box-seam text-lg group-hover:text-white transition-colors duration-300"></i>
                </div>
                <span class="text-lg font-medium flex-1">Envía tu paquete</span>
                <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
            </a>
            
            <a href="<?= base_url('seguimiento') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                    <i class="bi bi-search text-lg group-hover:text-white transition-colors duration-300"></i>
                </div>
                <span class="text-lg font-medium flex-1">Seguimiento</span>
                <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
            </a>
            
            <a href="<?= base_url('contacto') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                    <i class="bi bi-envelope text-lg group-hover:text-white transition-colors duration-300"></i>
                </div>
                <span class="text-lg font-medium flex-1">Contacto</span>
                <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
            </a>
        </div>

        <!-- Separador decorativo -->
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Cuenta</span>
            </div>
        </div>

        <!-- Sección de usuario mejorada -->
        <div class="space-y-3">
            <?php if (session()->get('id_usuario')): ?>
                <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg border border-orange-200">
                    <div class="w-12 h-12 rounded-full bg-[#ff7947] flex items-center justify-center text-white">
                        <i class="bi bi-person-fill text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500 font-medium">Bienvenido</p>
                        <p class="text-base font-semibold text-gray-800"><?= esc(session()->get('nombre')) ?></p>
                    </div>
                </div>
                
                <form action="<?= base_url('logout') ?>" method="POST">
                    <button type="submit" class="menu-item w-full flex items-center gap-4 text-gray-700 hover:text-red-600 transition-all duration-300 py-3 px-4 rounded-lg hover:bg-red-50 group">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center group-hover:bg-red-600 transition-all duration-300">
                            <i class="bi bi-box-arrow-right text-lg group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <span class="text-lg font-medium flex-1 text-left">Cerrar Sesión</span>
                        <i class="bi bi-chevron-right text-gray-400 group-hover:text-red-600 transition-colors duration-300"></i>
                    </button>
                </form>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="menu-item flex items-center gap-4 text-gray-700 hover:text-[#ff7947] transition-all duration-300 py-3 px-4 rounded-lg hover:bg-orange-50 group">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center group-hover:bg-[#ff7947] transition-all duration-300">
                        <i class="bi bi-person text-lg group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <span class="text-lg font-medium flex-1">Iniciar Sesión</span>
                    <i class="bi bi-chevron-right text-gray-400 group-hover:text-[#ff7947] transition-colors duration-300"></i>
                </a>
            <?php endif; ?>
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

    // Menú móvil hamburguesa mejorado
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const closeMenu = document.getElementById('closeMenu');
    const menuItems = document.querySelectorAll('.menu-item');

    let isMenuOpen = false;

    const openMobileMenu = () => {
        if (!mobileMenu || !mobileMenuOverlay) return;
        
        isMenuOpen = true;
        mobileMenuOverlay.classList.remove('opacity-0', 'invisible');
        mobileMenuOverlay.classList.add('opacity-100', 'visible');
        mobileMenu.classList.remove('translate-x-full');
        mobileMenu.classList.add('translate-x-0');
        document.body.style.overflow = 'hidden';
        
        // Animar icono hamburguesa
        const lines = menuToggle.querySelectorAll('span');
        if (lines.length === 3) {
            lines[0].style.transform = 'rotate(45deg) translateY(8px)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'rotate(-45deg) translateY(-8px)';
        }
        
        // Animar items del menú con delay
        menuItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, 100 + (index * 50));
        });
    };

    const closeMobileMenu = () => {
        if (!mobileMenu || !mobileMenuOverlay) return;
        
        isMenuOpen = false;
        mobileMenuOverlay.classList.remove('opacity-100', 'visible');
        mobileMenuOverlay.classList.add('opacity-0', 'invisible');
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = '';
        
        // Restaurar icono hamburguesa
        const lines = menuToggle.querySelectorAll('span');
        if (lines.length === 3) {
            lines[0].style.transform = '';
            lines[1].style.opacity = '1';
            lines[2].style.transform = '';
        }
        
        // Resetear animaciones de items
        menuItems.forEach(item => {
            item.style.opacity = '';
            item.style.transform = '';
        });
    };

    if (menuToggle && mobileMenu && mobileMenuOverlay) {
        // Abrir menú móvil
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            if (!isMenuOpen) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        });

        // Cerrar menú móvil
        if (closeMenu) {
            closeMenu.addEventListener('click', closeMobileMenu);
        }

        // Cerrar al hacer clic en el overlay
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // Cerrar con tecla Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMobileMenu();
            }
        });

        // Cerrar al hacer clic en un enlace del menú (opcional, para mejor UX)
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                setTimeout(closeMobileMenu, 200); // Pequeño delay para mejor UX
            });
        });
    }
</script>
