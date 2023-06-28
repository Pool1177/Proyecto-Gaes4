<?php
require 'config/config.php';
require 'config/database.php';
$db= new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galactic Gamer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    
</head>
<body>
    <header class="header">

        <div class="logo"><img src="D:\Pagin Web\Img\con_name-removebg-preview.png" alt="z3a" class="z3a"></div>
        
        <input type="checkbox" id="toggle">
        <label for="toggle"><img src="Img/menu.svg" alt="menu"></label>

        <nav class="navigation">
            
            <ul >
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#">Perifericos</a>
                    <ul>
                        <li><a class="Mouse" href="Perifericos/Mouse.php">Mouse <span>6</span></a></li>
                        <li><a class="Teclado" href="Perifericos/Teclado.php">Teclado <span>15</span></a></li>
                        <li><a class="Audifonos" href="Perifericos/Audifonos.php">Audifonos <span>10</span></a></li>
                        <li><a class="Parlantes" href="Perifericos/Parlantes.php">Parlantes Pc <span>5</span></a></li>
                    </ul>
                </li>
                <li><a href="#">Almacenamiento</a>
                    <ul>
                        <li><a class="SSD" href="Almacenamiento/SSD.php">Disco SSD <span>12</span></a></li>
                        <li><a class="HDD" href="Almacenamiento/HDD.php">Disco HDD <span>10</span></a></li>
                        <li><a class="NVME" href="Almacenamiento/NVME.php">NVME <span>13</span></a></li>
                        <li><a class="USB" href="Almacenamiento/USB.php">Memorias USB <span>8</span></a></li>
                    </ul>
                </li>
                <li><a href="#">Torres</a>
                    <ul>
                        <li><a class="Fuente" href="Torres/Fuentes.php">Fuente de poder <span>15</span></a></li>
                        <li><a class="Board" href="Torres/Board.php">Board <span>10</span></a></li>
                        <li><a class="Procesador" href="Torres/Procesador.php">Procesador <span>5</span></a></li>
                        <li><a class="Ram" href="Torres/Ram.php">Memoria Ram <span>20</span></a></li>
                        <li><a class="Graficas" href="Torres/Graficas.php">Tarjetas Graficas <span>50</span></a></li>
                        <li><a class="Refrigeracion" href="Torres/Refrigeracion.php">Refrigeracion <span>30</span></a></li>
                        <li><a class="Chasis" href="Torres/Chasis.php">Chasis <span>40</span></a></li>
                    </ul>
                </li>
                <li><a href="Portatiles.php">Portatiles</a></li>
                <li><a href="Monitores.php">Monitores</a></li>
                <li><a href="#">Marcas</a>
                    <ul class="">
                        <li><a href="https://www.logitechg.com/es-roam" target="_blank">Logitech <span>60</span></a></li>
                        <li><a href="https://latam.msi.com/" target="_blank">MSI <span>70</span></a></li>
                        <li><a href="https://www.asrock.com/index.es.asp" target="_blank">ASRock <span>80</span></a></li>
                        <li><a href="https://www.corsair.com/lm/es/" target="_blank">Corsair <span>60</span></a></li>
                        <li><a href="https://www.nvidia.com/es-la/" target="_blank">Nvidia <span>50</span></a></li>
                        <li><a href="https://www.amd.com/es" target="_blank">Amd <span>40</span></a></li>
                        <li><a href="https://www.intel.com/content/www/us/en/homepage.html" target="_blank">Intel </a></li>
                    </ul>
                </li>
                <li><a href="Login.html"><img class="usuario" src="Img/usuario.svg" alt="usuario"></a></li>
            </ul>
        </nav>
    </header>

    <div class="hero"></div>

    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
            <a href="#"><img class="img1"  src="Img/Ofertas/Img1.png" alt="img"></a>
            <a href="#"><img class="img2" src="Img/Ofertas/Img2.png" alt="img"></a>
            <a href="#"><img class="img3" src="Img/Ofertas/Img3.png" alt="img"></a>
            <a href="#"><img class="img4" src="Img/Ofertas/img4.jpg" alt="img"></a>
            <a href="#"><img class="img5" src="Img/Ofertas/img5.jpeg" alt="img"></a>
            <a href="#"><img class="img6" src="Img/Ofertas/img6.jpg" alt="img"></a>
            <a href="#"><img class="img7" src="Img/Ofertas/img7.jpg" alt="img"></a>
        </div>
        <i id="rigt" class="fa-solid fa-angle-right"></i>
    </div>

    <H2 class="destacados-2">Destacados</H2>
    <div class="destacados"> 
        
        <div class="container-items">
            <?php foreach ($resultado as $row) { ?>
            

            <div class="item">
                <?php
                $id = $row['id'];
                $imagen = "Img/productos/" . $id . "/principal.png";

                if(!file_exists($imagen)){
                    $imagen = "Img/no-photo.png";
                }
                ?>
                <figure>
                <Img src="<?php echo $imagen; ?>">
    
                <div class="info-product"> 
                    <h3 class="card-title"><?php echo $row['nombre']; ?></h3>
                    <p class="card_text"><?php echo number_format ($row['precio'], 3, '.', ','); ?></p>
                    <div class="btn-group">
                        <button>
                        <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?> "class="btn btn-primary">Detalles</a>
                    </button>
                    <button>Añadir Al Carrito</button>
                    </figure>
                </div>
                
                <?php } ?>
            </div>

    <div class="whatsapp">
        
        <a href="https://wa.me/3148388990" target="_blank"> <h5 class="whts">Escribenos</h5>
          <img src="D:\Pagin Web\Img\Whatssap.png" alt="WhatsApp" />
        </a>
      </div>
</body>
</html>

