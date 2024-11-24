<?php
require 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Crear una instancia de la conexión y conectarse a la base de datos
$db = new Conexion();
$conn = $db->conectar();

// Consulta para obtener los productos más vendidos
$sql = "SELECT * FROM productos ORDER BY ventas DESC LIMIT 3";
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
        <li><a href="#portada-inicio">&nbsp;&nbsp;Inicio&nbsp;&nbsp;</a></li>
        <li><a href="#quienes-somos">&nbsp;&nbsp;Quiénes Somos&nbsp;&nbsp;</a></li>
        <li><a href="#nuestros-productos">&nbsp;&nbsp;Nuestros Productos&nbsp;&nbsp;</a></li>
        <li><a href="#caracteristicas">&nbsp;&nbsp;Características&nbsp;&nbsp;</a></li>
        <li><a href="#contactanos">&nbsp;&nbsp;Contáctanos&nbsp;&nbsp;</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Sección de Portada -->
    <section id="portada-inicio">
      <div class="container">
        <h2>Descubre el Sabor Único de<br />Cafeteria Vanel</h2>
        <div>
          <img src="/media/img-cafeteria.jpg" alt="imagen de la cafeteria" />
          <div>
            <p>
              ¡Bienvenidos a VANEL, tu refugio de sabor y calidez! En nuestro acogedor rincón, encontrarás una variedad de deliciosos cafés, té y postres hechos con amor. Nuestro objetivo es brindarte un espacio donde puedas relajarte, conectarte con amigos y familiares, y disfrutar de momentos inolvidables. Explora nuestra carta, descubre nuestras promociones y eventos especiales. ¡Estamos emocionados de tenerte aquí!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Sección de Quiénes Somos -->
    <section id="quienes-somos">
      <div class="containerqs">
        <h2>Sobre Cafeteria Vanel</h2>
        <div>
          <img src="/media/img-cafetera.jpg" alt="Imagen de cafetera" />
          <div>
            <p>
              En el corazón de la ciudad, Vanel, nuestra querida cafetería, ha sido durante años el refugio de los amantes del café. Nuestra historia comenzó hace más de dos décadas, cuando nuestros fundadores, apasionados del buen gusto y la hospitalidad, decidieron crear un espacio donde el café fuera el protagonista. Desde entonces, hemos perfeccionado nuestra selección de granos de alta calidad, provenientes de las mejores regiones productoras del mundo. Nuestros baristas, expertos en el arte del café, preparan cada taza con dedicación y amor, para que puedas disfrutar de una experiencia culinaria única.
            </p>
          </div>
        </div>
      </div>
    </section>

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
              <th>Imagen</th>
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
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No hay productos disponibles</td></tr>";
            }
            $conn->close();
            ?>
          </tbody>
        </table>
        <form action="productos.php" method="GET">
          <button class="boton-comprar" type="submit">Comprar</button>
        </form>
      </div>
    </section>
    <!-- Sección de Características -->
    <section id="caracteristicas">
      <div class="containerc">
        <h2>Características</h2>
        <ul>

          <li><strong>Ambiente acogedor:</strong> Espacio confortable y relajante para disfrutar de un café o reuniones.</li>
          <li><strong>Café de alta calidad:</strong> Selección de granos frescos y tostados artesanalmente.</li>
          <li><strong>Variedad de opciones:</strong> Menú diverso de café, té, chocolates, sandwiches y postres.</li>
          <li><strong>Wi-Fi gratuito:</strong> Conexión rápida y segura para trabajar o estudiar.</li>
          <li><strong>Eventos y actividades:</strong> Organizamos eventos culturales, conciertos y talleres.</li>
          <li><strong>Servicio personalizado:</strong> Atención amable y eficiente de nuestro equipo.</li>
          <li><strong>Ubicación céntrica:</strong> Fácil acceso y estacionamiento.</li>
          <li><strong>Café para llevar:</strong> Opción para llevar tu café favorito.</li>
          <li><strong>Delivery:</strong> Servicio de entrega a domicilio.</li>
          <li><strong>Reservas y eventos:</strong> Posibilidad de reservar para eventos y reuniones.</li>
          <li><strong>Pagos electrónicos:</strong> Aceptamos tarjetas de crédito y débito.</li>
          <li><strong>Ingredientes frescos:</strong> Productos de alta calidad y frescura.</li>
          <li><strong>Higiene y limpieza:</strong> Mantenimiento constante de nuestra cafetería.</li>
          <li><strong>Seguridad:</strong> Medidas de seguridad para garantizar tu comodidad.</li>
        </ul>
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