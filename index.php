<?php 
require_once("config.php");

    if(!empty($_GET['ingredientes'])) {
            $ingredientes = $_GET['ingredientes'];
        
            $ingredientes_aux ="";
            foreach($ingredientes as $ingrediente){
                $ingredientes_aux .= $ingrediente.",";
            }    
            $opciones = rtrim($ingredientes_aux, ",");

                $query = "
                    select * from ingredientes_básicos_has_recetas ibr 
                inner join recetas on ibr.idrecetas = recetas.idrecetas
                where  ibr.idingredientes_básicos IN ($opciones) group by nombre_receta;
            ";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $recetas = $stmt->fetchAll();
    }

    $query = "select * from ingredientes_básicos;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $ingredientes = $stmt->fetchAll();
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
    <h1>Seleccionar ingrendientes</h1>
    <form method="GET">
            <ul>
                <?php foreach($ingredientes as $ingrediente) { ?>
                            <li>
                                <input type="checkbox" name="ingredientes[]" value="<?php echo $ingrediente['idingredientes_básicos'] ?>">
                                <?php echo $ingrediente['nombre_ingredientes'] ?>
                            </li>
                <?php } ?>
            </ul>
        <input type="submit" value="Buscar">
    </form>
    <hr>
    <h1>Resultado</h1>
    <?php  if(!empty($recetas)) { ?>
       <ul>
                <?php foreach($recetas as $receta) { ?>
                            <li>
                                <?php echo $receta['nombre_receta'] ?>
                            </li>
                <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>
