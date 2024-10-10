<?php include 'header.php'; ?>
<?php include 'conection.php';?>
<?php 

if($_POST){

// print_r($_POST);

$nameProyect = $_POST['nameProyect'];
    
$objectConnection = new connection();

$sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL,'$nameProyect', 'imagen.png', 'esta es un nuevo proyecto de prueba');";

$objectConnection->ejecutar($sql);
}

$objectConnection= new connection();
$recovery= $objectConnection->recoverInfoDb('SELECT * FROM `proyectos`');
// print_r($recoveri);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/formPortfolio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>
    
    <main>
        <form action="portfolio.php" method="post" enctype="multipart/form-data">

            <div class="brutalist-container">
                <input
                    placeholder="nombre del proyecto"
                    class="brutalist-input smooth-type"
                    type="text"
                    name="nameProyect"
                />
            <label class="brutalist-label">Ingresa un Nombre</label>
            </div>

            <label class="custum-file-upload" for="file">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
            </div>
            <div class="text">
                <span>Click to upload image</span>
            </div>
            <input type="file" id="file" name="file">
            </label>

            <button class="buttonSubmitProyect">
                submit proyect →
            </button>

        </form>
        
        <div class="divTable">
            <table class="tableDb">
                <thead >
                    <tr class="tableItems">
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">imagen</th>
                    </tr>
                </thead>
            <tbody>
                <!-- recupera todo el $recovery (toda la información de la vairable) y lo lee item por item haciendo la teración en este caso leyendo uno a uno como una variable $proyect -->
                <?php foreach($recovery as $proyect) {?>
                <tr class="tableContentItems">
                    <td><?php echo $proyect['id']; ?></td>
                    <td><?php echo $proyect['nombre']; ?></td>
                    <td><?php echo $proyect['imagen']; ?></td>
                    <td class="containerbuttonDeletre"> 
                        <button type="button" class="buttonDeleteForm">
                        <span class="button__text">Delete</span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="512" viewBox="0 0 512 512" height="512" class="svg"><title></title><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#323232;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#323232;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg></span>
                        </button> 
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </main>
    

</body>
</html>

<?php  include 'footer.php' ?>