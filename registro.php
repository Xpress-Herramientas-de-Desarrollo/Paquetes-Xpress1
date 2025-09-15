<?php
include("includes/head.php");
include("includes/header.php");
include("includes/conexion.php");
session_start();

// Si se envió POST, procesar registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $usuario = trim($_POST['usuario']);
    $contrasena = password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT);

    try {
        // Verificar si el username o email ya existen
        $stmtUser = $pdo->prepare("SELECT * FROM usuarios WHERE username = :usuario LIMIT 1");
        $stmtUser->execute(['usuario' => $usuario]);
        $existeUser = $stmtUser->fetch();

        $stmtEmail = $pdo->prepare("SELECT * FROM clientes WHERE email = :correo LIMIT 1");
        $stmtEmail->execute(['correo' => $correo]);
        $existeEmail = $stmtEmail->fetch();

        if ($existeUser) {
            $alerta = ['tipo' => 'error', 'mensaje' => 'El usuario ya existe, intenta con otro.'];
        } elseif ($existeEmail) {
            $alerta = ['tipo' => 'error', 'mensaje' => 'El correo ya está registrado.'];
        } else {
            $stmtCliente = $pdo->prepare("INSERT INTO clientes (nombre, apellido, email, telefono, direccion) 
                                          VALUES (:nombre, :apellido, :email, :telefono, :direccion)");
            $stmtCliente->execute([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $correo,
                'telefono' => $telefono,
                'direccion' => $direccion
            ]);
            $id_cliente = $pdo->lastInsertId();

            $stmtUsuario = $pdo->prepare("INSERT INTO usuarios (username, password, tipo, id_cliente) 
                                          VALUES (:usuario, :password, 'cliente', :id_cliente)");
            $stmtUsuario->execute([
                'usuario' => $usuario,
                'password' => $contrasena,
                'id_cliente' => $id_cliente
            ]);

            $alerta = ['tipo' => 'success', 'mensaje' => '¡Registro exitoso! Ahora puedes iniciar sesión.', 'redirect' => 'login.php'];
        }
    } catch (PDOException $e) {
        $alerta = ['tipo' => 'error', 'mensaje' => 'Error al registrar: ' . $e->getMessage()];
    }

    if (isset($alerta)) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    mostrarAlertaRegistro('{$alerta['tipo']}', '{$alerta['mensaje']}'" . (isset($alerta['redirect']) ? ",'{$alerta['redirect']}'" : "") . ");
                });
              </script>";
    }
}
?>

<main class="py-16 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-[#ff7947] mb-6">Regístrate</h1>
        <form action="registro.php" method="POST" class="space-y-6">
            <div> <label for="nombre" class="block mb-2 font-semibold text-gray-700">Nombre:</label> <input type="text"
                    id="nombre" name="nombre" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="Ingresa tu nombre"> </div>
            <div> <label for="apellido" class="block mb-2 font-semibold text-gray-700">Apellido:</label> <input
                    type="text" id="apellido" name="apellido" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="Ingresa tu apellido"> </div>
            <div> <label for="correo" class="block mb-2 font-semibold text-gray-700">Correo:</label> <input type="email"
                    id="correo" name="correo" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="ejemplo@correo.com"> </div>
            <div> <label for="telefono" class="block mb-2 font-semibold text-gray-700">Teléfono:</label> <input
                    type="text" id="telefono" name="telefono" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="987654321"> </div>
            <div> <label for="direccion" class="block mb-2 font-semibold text-gray-700">Dirección:</label> <input
                    type="text" id="direccion" name="direccion" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="Av. Ejemplo 123"> </div>
            <div> <label for="usuario" class="block mb-2 font-semibold text-gray-700">Usuario:</label> <input
                    type="text" id="usuario" name="usuario" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="Crea tu usuario"> </div>
            <div> <label for="contrasena" class="block mb-2 font-semibold text-gray-700">Contraseña:</label> <input
                    type="password" id="contrasena" name="contrasena" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#ff7947]"
                    placeholder="Crea tu contraseña"> </div>
            <div class="text-center"> <button type="submit"
                    class="bg-[#ff7947] text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Registrarte </button> </div>
        </form>
        <p class="text-sm text-center text-gray-500 mt-6"> ¿Ya tienes una cuenta? <a href="login.php"
                class="text-[#ff7947] hover:underline">Inicia Sesión</a> </p>
    </div>
</main>

<?php include("includes/footer.php"); ?>

<script src="js/registro.js"></script>