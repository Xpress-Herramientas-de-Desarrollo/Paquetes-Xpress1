<?php
// includes/header.php
session_start(); // Asegúrate de que la sesión esté iniciada
?>
<header
    class="h-[113px] flex flex-row items-center pt-10 pb-5 px-5 max-w-screen-xl m-auto max-md:justify-between max-md:min-h-[50px] max-md:p-4 relative">

    <div class="flex-1">
        <a href="index.php" class="flex items-center gap-3">
            <img src="assets/img/logo.png" alt="Logo" class="h-12 object-contain" />
            <span class="text-3xl font-bold text-[#ff7947]" style="font-family: 'Bungee Inline', cursive">
                XPRESS
            </span>
        </a>
    </div>

    <nav id="navMenu"
        class="flex flex-1 justify-around text-center text-sm font-medium max-md:hidden transition-all duration-300">
        <a href="index.php" class="flex flex-col items-center hover:text-orange-500 transition">
            <i class="bi bi-house-door text-xl"></i>
            <span>Inicio</span>
        </a>
        <a href="cotizar.php" class="flex flex-col items-center hover:text-orange-500 transition">
            <i class="bi bi-currency-dollar text-xl"></i>
            <span>Cotizar</span>
        </a>
        <a href="seguimiento.php" class="flex flex-col items-center hover:text-orange-500 transition">
            <i class="bi bi-search text-xl"></i>
            <span>Seguimiento</span>
        </a>
        <a href="contacto.php" class="flex flex-col items-center hover:text-orange-500 transition">
            <i class="bi bi-envelope text-xl"></i>
            <span>Contacto</span>
        </a>
    </nav>

    <div class="flex flex-1 justify-end items-center gap-6 max-md:gap-5">
        <div class="flex flex-col items-center">
            <a href="login.php" class="hover:text-orange-500 transition">
                <i class="bi bi-person text-2xl"></i>
            </a>
            <?php if (isset($_SESSION['username'])): ?>
                <span class="text-sm text-gray-700 mt-1">
                    Bienvenid@, <?= htmlspecialchars($_SESSION['nombre'] ?? $_SESSION['username']) ?>
                </span>
            <?php endif; ?>
        </div>

        <button id="menuToggle" class="md:hidden text-3xl focus:outline-none">
            <i class="bi bi-list"></i>
        </button>
    </div>
</header>

<div id="mobileMenu" class="hidden bg-gray-900 text-white p-5 space-y-4 md:hidden">
    <a href="index.php" class="block hover:text-[#ff7947] transition">Inicio</a>
    <a href="cotizar.php" class="block hover:text-[#ff7947] transition">Cotizar</a>
    <a href="seguimiento.php" class="block hover:text-[#ff7947] transition">Seguimiento</a>
    <a href="contacto.php" class="block hover:text-[#ff7947] transition">Contacto</a>
    <?php if (isset($_SESSION['username'])): ?>
        <form action="logout.php" method="POST">
            <button type="submit" class="block text-left hover:text-[#ff7947] w-full">Cerrar Sesión</button>
        </form>
    <?php else: ?>
        <a href="login.php" class="block hover:text-[#ff7947] transition">Login</a>
    <?php endif; ?>
</div>