<!-- controlador para agregar un nuevo registro desde la pagina y se guarde en la base de datos -->
<?php 
if (!empty($_POST["registrarse"])) {

    if (!empty($_POST["DNI"]) and !empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["contraseña"]) and !empty($_POST["rol"])) {
        
        $DNI=$_POST["DNI"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $contraseña=$_POST["contraseña"];

        $hash= password_hash($contraseña,PASSWORD_DEFAULT, ['cost'=>10]);

        $rol=$_POST["rol"];
        

        /* aqui se hace la condicion segun el rol del usuario para la hora de guardar sus datos */
        if ($rol == 2) {

            include "correo.php";
            $rango=$_POST["rango"];
            $sql=$conexion->query(" INSERT INTO usuarios (DNI, Nombre, Apellido, Telefono, Correo, Contrasena, Hash512, Rol, fk_rango_competidor, fk_rango_juez, fk_region, Activado, Codigo) VALUES ('$DNI', '$nombre', '$apellido', '$telefono', '$correo', '$contraseña', '$hash', '$rol', NULL, '$rango', NULL, 0, '$codigo') ");
           

        } elseif ($rol == 3) {
            
            include "correo.php";
            $rango=$_POST["rango"];
            $region=$_POST["region"];
            $sql=$conexion->query(" INSERT INTO usuarios (DNI, Nombre, Apellido, Telefono, Correo, Contrasena, Hash512, Rol, fk_rango_competidor, fk_rango_juez, fk_region, Activado, Codigo) VALUES ('$DNI', '$nombre', '$apellido', '$telefono', '$correo', '$contraseña', '$hash', '$rol', '$rango', NULL, '$region', 0, '$codigo') ");

        }
        

        if ($sql == 1) {
            
            
            /* header("location: controladorRegistro/confirmar.php"); */
            
            echo '<div class="verificado">
            <script language="javascript">
            
            alert("Revise tu correo");
            history.pushState(null, null, window.location.href);
            window.location.href="../../index.php";
            </script>
            </div>';

        } else {
            
            echo "<div style='color: white;
            padding: 0 0 30px 0;
            text-align: center;'>Ocurrio un error</div>";

        }
        
        
    } else {
        
        echo "<div 
        style='color: white;
        padding: 0 0 30px 0;
        text-align: center;'>Campos vacios</div>";

    }
}

?>