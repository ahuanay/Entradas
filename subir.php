<?php
    if(isset($_POST['btn'])) {
        $conexion = new mysqli('localhost', 'root', '', 'bdtecnoserv') or die('Error.');
        $tmp = $_FILES['img']['tmp_name'];
        $bytesArchivo = $conexion->real_escape_string(file_get_contents($tmp));
        $Id = $_POST['id'];
        $result = $conexion->query("UPDATE sedes SET imgSede = '".$bytesArchivo."' WHERE idSede = '".$Id."'");

        if($result)
            echo 'exito';
        else
            echo 'error';
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="">Id</label>
    <input type="text" name="id" id="id">
    <br>
    <label for="">Imagen</label>
    <input type="file" name="img" id="img">
    <br>
    <button type="submit" name="btn">Agregar</button>
</form>