<?php
session_start();
include("../includes/conexion.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $stmt = $conexion->prepare("SELECT id_usuario, nombre, contrasena, tipo FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nombre, $hash, $tipo);

    if($stmt->num_rows > 0){
        $stmt->fetch();
        if(password_verify($contrasena, $hash)){
            $_SESSION['id_usuario'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['tipo'] = $tipo;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no registrado.";
    }
}
?>
