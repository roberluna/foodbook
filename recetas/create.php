<?php 
if(!empty($_POST)){

       require_once("../config.php");
    $target_dir = "imagenes/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $archivo =  basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
    $nombre_receta = $_POST['nombre_receta'];
      $instrucciones = $_POST['instrucciones'];
    
    $query = "insert into recetas (nombre_receta, indicaciones, instrucciones) 
                                values ('$nombre_receta','$archivo','$instrucciones')
                ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    header("Location: ../index.php");
    exit;
} else {
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
    <h1>Crear categoría</h1>

    <form method="post"  enctype="multipart/form-data">
        <p>
            Nombre
            <input type="text" name="nombre_receta" required>
        </p>
        <p>
            Instrucciones
            <textarea name="instrucciones" id="" cols="30" rows="10"></textarea>
        </p>
        <p>
            Imagen
            <input type="file" name="imagen">
        </p>
        <input type="submit" value="Aceptar">
    </form>
    <p>
        <a href="index.php">Regresar</a>
    </p>
</body>
</html>
<?php } ?>