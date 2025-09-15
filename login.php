<?php include("includes/head.php"); ?>
<?php include("includes/header.php"); ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Iniciar Sesión</h1>
        <p class="text-center text-gray-600 mb-8">
            Accede con tu cuenta para gestionar o rastrear tus envíos.
        </p>

        <!-- Formulario de login -->
        <form action="login.php" method="POST" class="space-y-6">
            <div>
                <label for="usuario" class="block mb-2 font-semibold text-gray-700">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]" 
                       placeholder="Ingresa tu usuario">
            </div>
            <div>
                <label for="contrasena" class="block mb-2 font-semibold text-gray-700">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]" 
                       placeholder="Ingresa tu contraseña">
            </div>
            <div class="text-center">
                <button type="submit"
                        class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Ingresar
                </button>
            </div>
        </form>

        <!-- Resultado del login -->
        <div class="mt-6">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = trim($_POST['usuario']);
                $contrasena = trim($_POST['contrasena']);

                // 🔹 Aquí deberías conectar con la base de datos (tabla usuarios)
                // Simulación de usuarios
                $usuarios_demo = [
                    "cliente" => "1234",
                    "admin"   => "admin123"
                ];

                if (array_key_exists($usuario, $usuarios_demo) && $usuarios_demo[$usuario] === $contrasena) {
                    echo "
                    <div class='bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative'>
                        <strong class='font-bold'>¡Bienvenido $usuario!</strong>
                        <p class='mt-2'>Has iniciado sesión correctamente.</p>
                    </div>
                    ";
                    // Aquí podrías redirigir a otra página:
                    // header("Location: panel.php");
                } else {
                    echo "
                    <div class='bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded relative'>
                        <strong class='font-bold'>Error:</strong>
                        <span> Usuario o contraseña incorrectos.</span>
                    </div>
                    ";
                }
            }
            ?>
        </div>

        <p class="text-sm text-center text-gray-500 mt-6">
            ¿No tienes una cuenta? <a href="registro.php" class="text-[#ff7947] hover:underline">Regístrate aquí</a>
        </p>
    </div>
</main>

<?php include("includes/footer.php"); ?>
