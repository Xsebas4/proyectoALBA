<?php
if (!empty($_GET["Id_cerveza"])) {
    $id=$_GET["Id_cerveza"];
    $sql=$conexion->query("DELETE FROM cerveza WHERE Id_cerveza=$id");
    if ($sql==1) {
        echo "<div style='color: white;
        padding: 0 0 20px 0;
        text-align: center;
        color: #fff;
        font-size: 20px;'>Usuario eliminado exitosamente</div>";
    } else {
        echo "<div style='color: white;
        padding: 0 0 20px 0;
        text-align: center;
        color: #fff;
        font-size: 20px;'>Error en la eliminación</div>";
    }
    
}
?>