<?php
require 'conexion.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = intval($_POST['producto_id']); // Sanitizar el ID del producto

    // Crear una instancia de la conexión
    $db = new Conexion();
    $conn = $db->conectar();

    // Incrementar el valor de ventas en 1
    $sql = "UPDATE productos SET ventas = ventas + 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $producto_id);
        if ($stmt->execute()) {
            // Redirigir después de actualizar
            header("Location: productos.php");
            exit;
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
