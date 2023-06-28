<?php
require '..\config/config.php';
require '..\config/database.php';
$db= new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1 AND id_tipo=2");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teclado</title>
    <link rel="stylesheet" href="../Index.html">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header">

        <div class="logo"><img src="../Img/con_name-removebg-preview.png" alt="z3a" class="z3a"></div>
        
        <input type="checkbox" id="toggle">
        <label for="toggle"><img src="../Img/menu.svg" alt="menu"></label>

        <nav class="navigation">
            <ul>
                <li><a href="../Index.php">Inicio</a></li>
                <li><a href="#">Perifericos</a>
                    <ul>
                        <li><a class="Mouse" href="Mouse.php">Mouse </a></li>
                        <li><a class="Teclado" href="Teclado.php">Teclado </a></li>
                        <li><a class="Audifonos" href="Audifonos.php">Audifonos </a></li>
                        <li><a class="Parlantes" href="Parlantes.php">Parlantes Pc </a></li>
                    </ul>
                </li>
                <li><a href="#">Almacenamiento</a>
                    <ul>
                        <li><a class="SSD" href="../Almacenamiento/SSD.php">Disco SSD </a></li>
                        <li><a class="HDD" href="../Almacenamiento/HDD.php">Disco HDD </a></li>
                        <li><a class="NVME" href="../Almacenamiento/NVME.php">NVME </a></li>
                        <li><a class="USB" href="../Almacenamiento/USB.php">Memorias USB </a></li>
                    </ul>
                </li>
                <li><a href="#">Torres</a>
                    <ul>
                        <li><a class="Fuente" href="../Torres/Fuentes.php">Fuente de poder </a></li>
                        <li><a class="Board" href="../Torres/Board.php">Board </a></li>
                        <li><a class="Procesador" href="../Torres/Procesador.php">Procesador </a></li>
                        <li><a class="Ram" href="../Torres/Ram.php">Memoria Ram </a></li>
                        <li><a class="Graficas" href="../Torres/Graficas.php">Tarjetas Graficas </a></li>
                        <li><a class="Refrigeracion" href="../Torres/Refrigeracion.php">Refrigeracion </a></li>
                        <li><a class="Chasis" href="../Torres/Chasis.php">Chasis </a></li>
                    </ul>
                </li>
                <li><a href="../Portatiles.php">Portatiles</a></li>
                <li><a href="../Monitores.php">Monitores</a></li>
                <li><a href="#">Marcas</a>
                    <ul>
                        <li><a href="https://www.logitechg.com/es-roam" target="_blank">Logitech <span>60</span></a></li>
                        <li><a href="https://latam.msi.com/" target="_blank">MSI <span>70</span></a></li>
                        <li><a href="https://www.asrock.com/index.es.asp" target="_blank">ASRock <span>80</span></a></li>
                        <li><a href="https://www.corsair.com/lm/es/" target="_blank">Corsair <span>60</span></a></li>
                        <li><a href="https://www.nvidia.com/es-la/" target="_blank">Nvidia <span>50</span></a></li>
                        <li><a href="https://www.amd.com/es" target="_blank">Amd <span>40</span></a></li>
                        <li><a href="https://www.intel.com/content/www/us/en/homepage.html" target="_blank">Intel </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>



    <div class="container-items">
            <?php foreach ($resultado as $row) { ?>
            

            <div class="item">
                <?php
                
                $id = $row['id'];
                $imagen = "..\Img/productos/" . $id . "/principal.png";

                if(!file_exists($imagen)){
                    $imagen = "..\Img/no-photo.png";
                }
                ?>
                <figure>
                <Img src="<?php echo $imagen; ?>">
                
                   
               
                <div class="info-product"> 
                    <h3 class="card-title"><?php echo $row['nombre']; ?></h3>
                    <p class="card_text"><?php echo number_format ($row['precio'], 3, '.', ','); ?></p>
        
                    <div class="btn-group">
                        <button>
                        <a href="..\details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?> "class="btn btn-primary">Detalles</a>
                    </button>
                    <button>Añadir Al Carrito</button>
                    </figure>
                </div>
                <?php } ?>
            </div>


    <div class="whatsapp">
        <a href="https://wa.me/3148388990" target="_blank">
          <img src="D:\Pagin Web\Img\Whatssap.png" alt="WhatsApp" />
        </a>
      </div>
</body>
</html>