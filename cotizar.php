<?php include("includes/head.php"); ?>
<?php include("includes/header.php"); ?>

<main class="seccion-principal">
    <div class="contenedor">
        <h1 class="titulo-principal">Cotiza tu Envío</h1>
        <p class="descripcion-seccion">
            Completa el formulario para obtener el costo estimado de tu envío.
        </p>

        <form action="cotizar.php" method="POST" class="formulario">
            <div class="campo">
                <label for="origen">Ciudad de Origen:</label>
                <input type="text" id="origen" name="origen" required placeholder="Ejemplo: Lima">
            </div>

            <div class="campo">
                <label for="destino">Ciudad de Destino:</label>
                <input type="text" id="destino" name="destino" required placeholder="Ejemplo: Arequipa">
            </div>

            <div class="campo">
                <label for="peso">Peso del paquete (kg):</label>
                <input type="number" id="peso" name="peso" required min="0.1" step="0.1" placeholder="Ejemplo: 2.5">
            </div>

            <div class="acciones">
                <button type="submit" class="btn-primario">Calcular Cotización</button>
            </div>
        </form>

        <div class="resultado">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $origen = trim($_POST['origen']);
                $destino = trim($_POST['destino']);
                $peso = floatval($_POST['peso']);

                $tarifa = 10 + ($peso * 2.5);

                echo "
                <div class='alerta-exito'>
                    <strong>Cotización Generada:</strong>
                    <p>Origen: <span>$origen</span></p>
                    <p>Destino: <span>$destino</span></p>
                    <p>Peso: <span>{$peso} kg</span></p>
                    <p class='precio-final'>Total estimado: S/. $tarifa</p>
                </div>
                ";
            }
            ?>
        </div>
    </div>

        <div class="mapa-seccion">
            <h2 class="titulo-secundario">Ubicación en el Mapa</h2>
            <p class="descripcion-seccion">
                Visualiza la ubicación de nuestras oficinas principales o la ruta estimada de tu envío.
            </p>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=16V2IwWpGtj0LNSjEOJ_I-LAaUiW0glQ&ehbc=2E312F" width="100%" height="480"></iframe>
            </div>
        </div>
</main>

<?php include("includes/footer.php"); ?>
