<?php
session_start();
include "./conexion.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $resultado = $conexion->query("SELECT * FROM usuario WHERE email='$email' AND password='$password' LIMIT 1") or die($conexion->error);
    $datos_usuario = mysqli_fetch_assoc($resultado);

    if ($datos_usuario) {
        $nombre = $datos_usuario['nombre'];
        $id_usuario = $datos_usuario['id'];
        $email = $datos_usuario['email'];
        $imagen_perfil = $datos_usuario['img_perfil'];
        $nivel = $datos_usuario['nivel'];
        $_SESSION['datos_login']= array(
            'nombre'=>$nombre,
            'id_usuario'=>$id_usuario,
            'email'=>$email,
            'imagen'=>$imagen_perfil,
            'nivel'=>$nivel
        );
        header("Location: ../admin/");
    } else {
        header("Location: ../login.php?error=Credenciales incorrectas");
    }
} else {
    header("Location: ../login.php");
}
?>
