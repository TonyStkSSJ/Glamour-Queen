<?php
include "./conexion.php";

function check_fields() {
    $required_fields = ['nombre', 'descripcion', 'precio', 'inventario', 'categoria', 'talla', 'color', 'imagen'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) && $field !== 'imagen') {
            return "El campo $field no está configurado.";
        }
    }
    if (!isset($_FILES['imagen'])) {
        return "El campo imagen no está configurado.";
    }
    return true;
}

$check = check_fields();
if ($check !== true) {
    header("Location: ../admin/productos.php?error=$check");
    exit();
}

$carpeta = "../images/";
$nombre = $_FILES['imagen']['name'];
$temp = explode('.', $nombre);
$extension = end($temp);
$nombreFinal = time() . '.' . $extension;

if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreFinal)) {
        $nombreProducto = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $inventario = $_POST['inventario'];
        $categoria = $_POST['categoria'];
        $talla = $_POST['talla'];
        $color = $_POST['color'];

        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, inventario, id_categoria, talla, color) VALUES ('$nombreProducto', '$descripcion', '$precio', '$nombreFinal', '$inventario', '$categoria', '$talla', '$color')";

        if ($conexion->query($sql)) {
            header("Location: ../admin/productos.php?success=Producto agregado correctamente");
            exit();
        } else {
            header("Location: ../admin/productos.php?error=Error en la base de datos: " . $conexion->error);
            exit();
        }
    } else {
        header("Location: ../admin/productos.php?error=No se pudo subir la imagen");
        exit();
    }
} else {
    header("Location: ../admin/productos.php?error=Favor de subir una imagen válida");
    exit();
}
?>
