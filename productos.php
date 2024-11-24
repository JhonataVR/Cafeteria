<?php
require 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Crear una instancia de la conexión y conectarse a la base de datos
$db = new Conexion();
$conn = $db->conectar();

// Consulta para obtener todos los productos ordenados por ventas
$sql = "SELECT * FROM productos ORDER BY ventas DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cafeteria Vanel</title>
  <link rel="stylesheet" href="/public/css/styles.css" />
</head>

<body>
  <header>
    <h1>Cafeteria Vanel</h1>
    <nav>
      <ul id="nav-list">
        <li><a href="index.php">&nbsp;&nbsp;Inicio&nbsp;&nbsp;</a></li>
        <li><a href="#nuestros-productos">&nbsp;&nbsp;Nuestros Productos&nbsp;&nbsp;</a></li>
        <li><a href="#contactanos">&nbsp;&nbsp;Contáctanos&nbsp;&nbsp;</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Sección de Productos -->
    <section id="nuestros-productos">
      <div id="container-productos">
        <h2>Nuestros Productos</h2>
        <table>
          <thead>
            <tr>
              <th class="nombre">Nombre</th>
              <th class="precio">Precio</th>
              <th class="descripcion">Descripción</th>
              <th class="imagen">Imagen</th>
              <th>Acción</th> <!-- Nueva columna -->
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='nombre'>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td class='precio'>$" . number_format($row['precio'], 2) . "</td>";
                echo "<td class='descripcion'>" . htmlspecialchars($row['descripcion']) . "</td>";
                echo "<td class='imagen'><img class='productos' src='" . htmlspecialchars($row['imagen_url']) . "' alt='" . htmlspecialchars($row['nombre']) . "'></td>";
                echo "<td>";
                echo "<form action='incrementar-ventas.php' method='POST'>";
                echo "<input type='hidden' name='producto_id' value='" . htmlspecialchars($row['id']) . "'>";
                echo "<button class='boton-comprar' type='submit'>Comprar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No hay productos disponibles</td></tr>";
            }
            $conn->close();
            ?>
          </tbody>
        </table>

      </div>
    </section>

    <!-- Sección de Contáctanos -->
    <section id="contactanos">
      <div class="containercon">
        <h2>Contáctanos</h2>
        <div>
          <ul>
            <li>
              <strong>Información de contacto:</strong>
              <ul>
                <li>Dirección: Calle Principal 123, Barrio Comercial, Ciudad, País</li>
                <li>Teléfono: 555-1234</li>
                <li>Correo electrónico: <a href="mailto:info@vanel.cafe">info@vanel.cafe</a></li>
                <li>Horario de atención: Lunes a sábado de 8am a 8pm, domingos de 9am a 7pm</li>
              </ul>
            </li>
            <li>
              <strong>Redes sociales:</strong>
              <ul>
                <li><a href="#">Facebook: @vanelcafe</a></li>
                <li><a href="#">Instagram: @vanelcafe</a></li>
                <li><a href="#">Twitter: @vanelcafe</a></li>
              </ul>
            </li>
            <li>
              <strong>Formulario de contacto:</strong>
              <ul>
                <li><label for="nombre">NOMBRE:</label> <input type="text" id="nombre" /></li>
                <li><label for="email">CORREO ELECTRÓNICO:</label> <input type="email" id="email" /></li>
                <li><label for="telefono">TELÉFONO:</label> <input type="tel" id="telefono" /></li>
                <li><label for="mensaje">MENSAJE:</label> <textarea id="mensaje"></textarea></li>
                <li><button class="boton">Enviar</button></li>
              </ul>
            </li>
            <li>
              <strong>Suscríbete a nuestro boletín:</strong>
              <ul>
                <li>Recibe noticias, promociones y ofertas exclusivas en tu correo electrónico.</li>
                <li><input type="email" placeholder="Correo electrónico" /></li>
                <li><button>Suscribirse</button></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div id="div-footer">
      <p>&copy; 2024 Cafeteria Vanel. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

</html>