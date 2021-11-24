<?php 
require_once("config.php");

    if(!empty($_GET['id'])) {

        $id = $_GET['id'];

           $query = "
                   select * from recetas where idrecetas =  $id; 
            ";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $receta = $stmt->fetch();
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <a href="index.php">Regresar</a>
     <h1>
         <?php echo $receta['nombre_receta'] ?>
     </h1>

     <h2>Indiaciones</h2>

     <p>
        <?php echo $receta['instrucciones'] ?>
     </p>

     <p>
         <img src="imagenes/<?php echo $receta['indicaciones'] ?>" alt=""
            style="width: 20%"
         >

</p>
       
     
 </body>
 </html>