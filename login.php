<?php
include("includes/conexion.php");
session_start();

// Procesar login antes de mostrar HTML
$login_error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['id_usuario'])) {
    $usuario_input = trim($_POST['usuario']);
    $contrasena_input = trim($_POST['contrasena']);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $usuario_input]);
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena_input, $user['password'])) {
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['tipo'] = $user['tipo'];

        if ($user['tipo'] === 'cliente' && $user['id_cliente']) {
            // Obtener nombre y apellido desde clientes usando id_cliente
            $stmtCliente = $pdo->prepare("SELECT nombre, apellido FROM clientes WHERE id_cliente = :id_cliente LIMIT 1");
            $stmtCliente->execute(['id_cliente' => $user['id_cliente']]);
            $cliente = $stmtCliente->fetch();
            $_SESSION['nombre'] = $cliente['nombre'];
            $_SESSION['apellido'] = $cliente['apellido'];
        } else {
            $_SESSION['nombre'] = 'Administrador';
            $_SESSION['apellido'] = '';
        }

        header("Location: login.php");
        exit;
    } else {
        $login_error = "Usuario o contraseña incorrectos.";
    }
}
?>

<?php include("includes/head.php"); ?>
<?php include("includes/header.php"); ?>

<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Iniciar Sesión</h1>

        <?php if (isset($_SESSION['id_usuario'])):
            $usuario = htmlspecialchars($_SESSION['username']);
            $nombre = isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : '';
        ?>
            <!-- Cuadro de confirmación -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative mb-6">
                <strong class="font-bold">¡Bienvenid@ <?= $nombre ?>!</strong>
                <p class="mt-2">Has iniciado sesión correctamente.</p>
            </div>

            <!-- Texto del usuario y botón cerrar sesión -->
            <div class="mt-4 text-center">
                <p class="font-semibold text-gray-700 mb-4">Usuario: <?= $usuario ?></p>
                <form action="logout.php" method="POST">
                    <button type="submit"
                            class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition">
                        Cerrar Sesión
                    </button>
                </form>
            </div>

        <?php else: ?>
            <!-- Formulario de login -->
            <?php if ($login_error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded relative mb-4">
                    <strong class="font-bold">Error:</strong> <?= $login_error ?>
                </div>
            <?php endif; ?>

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

            <p class="text-sm text-center text-gray-500 mt-6">
                ¿No tienes una cuenta? <a href="registro.php" class="text-[#ff7947] hover:underline">Regístrate aquí</a>
            </p>
        <?php endif; ?>
    </div>
</main>

<?php include("includes/footer.php"); ?>
