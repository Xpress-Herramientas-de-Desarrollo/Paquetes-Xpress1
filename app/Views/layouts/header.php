<header
    class="h-[113px] flex flex-row items-center pt-10 pb-5 px-5 max-w-screen-xl m-auto max-md:justify-between max-md:min-h-[50px] max-md:p-4 relative">

    <div class="flex-1">
        <a href="<?= base_url('/') ?>" class="flex items-center gap-3">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-12 object-contain" />
            <span class="text-3xl font-bold text-[#ff7947]" style="font-family: 'Bungee Inline', cursive">
                XPRESS
            </span>
        </a>
    </div>

    <nav id="navMenu"
        class="flex flex-1 justify-around text-center text-sm font-medium max-md:hidden transition-all duration-300">
        <a href="<?= base_url('/') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-house-door text-xl group-hover:text-orange-500"></i>
            <span>Inicio</span>
        </a>
        <a href="<?= base_url('cotizar') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-currency-dollar text-xl group-hover:text-orange-500"></i>
            <span>Cotizar</span>
        </a>
        <a href="<?= base_url('seguimiento') ?>"
            class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-search text-xl group-hover:text-orange-500"></i>
            <span>Seguimiento</span>
        </a>
        <a href="<?= base_url('contacto') ?>" class="flex flex-col items-center hover:text-orange-500 transition group">
            <i class="bi bi-envelope text-xl group-hover:text-orange-500"></i>
            <span>Contacto</span>
        </a>
    </nav>

    <div class="flex flex-1 justify-end items-center gap-4 max-md:gap-3">
        <?php if (session()->get('id_usuario')): ?>
            <!-- Usuario con menú desplegable -->
            <div class="relative">
                <div id="userButton" class="flex flex-col items-center cursor-pointer group">
                    <i class="bi bi-person text-2xl group-hover:text-orange-500 transition"></i>
                    <span class="text-sm text-gray-700 mt-1 group-hover:text-orange-500 transition">
                        Hola, <?= esc(session()->get('nombre')) ?>
                    </span>
                </div>

                <div id="userMenu"
                    class="hidden absolute left-1/2 -translate-x-1/2 mt-2 w-44 bg-white shadow-lg rounded-lg border border-gray-200 z-50">
                    <div
                        class="absolute -top-2 left-1/2 -translate-x-1/2 w-3 h-3 bg-white transform rotate-45 border-t border-l border-gray-200">
                    </div>

                    <form action="<?= base_url('logout') ?>" method="POST">
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-orange-500 hover:text-white rounded-lg transition">
                            Cerrar Sesión
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

        <button id="menuToggle" class="md:hidden text-3xl focus:outline-none">
            <i class="bi bi-list"></i>
        </button>
    </div>
</header>

<div id="mobileMenu" class="hidden bg-gray-900 text-white p-5 space-y-4 md:hidden">
    <a href="<?= base_url('/') ?>" class="block hover:text-[#ff7947] transition">Inicio</a>
    <a href="<?= base_url('cotizar') ?>" class="block hover:text-[#ff7947] transition">Cotizar</a>
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