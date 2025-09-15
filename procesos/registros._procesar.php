<?php
include("../includes/conexion.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Verificar que el correo no exista
    $check = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE correo = ?");
    $check->bind_param("s", $correo);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){
        echo "El correo ya está registrado.";
    } else {
        $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, correo, telefono, direccion, contrasena) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $nombre, $correo, $telefono, $direccion, $contrasena);
        if($stmt->execute()){
            header("Location: ../login.php");
            exit();
        } else {
            echo "Error al registrar usuario.";
        }
    }
}
?>
