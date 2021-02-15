<?php
require "modelo/Bd.php";
require "modelo/Formulario.php";

if(isset($_POST) && !empty($_POST)){

//primero queremos que nos genere un objeto cerveza
    $formulario=new Formulario();

//y ahora quiero que a ese objeto cerveza se le inserte el POST ( que son los datos)
    $formulario-> insertar($_POST);

}

?>
<!doctype html>
<html lang="en">

<?php
include "includes/head.php"
?>
<?php
include "includes/nav.php"
?>
<body>
<div id="contenedor3">

    <section>
        <div id="skere">
        <div id="formulariopresupuestotodo">
        <div class="formulario" id="formulariopresupuesto">
        <form name="Formulario" action="<?php echo $_SERVER['PHP_SELF']?> " method="post" enctype="multipart/form-data" onsubmit="return validacion()">
            <ul>
                <li><input class="dato0" placeholder="  Nombre" type="text" id="nombre" name="nombre"></li>
                <li><input class="dato1" placeholder="  Mail" type="text" id="mail" name="mail"></li>
                <li><input class="dato1" placeholder="  Ciudad" type="text"  id="ciudad" name="ciudad"></li>
                <li><input class="dato1" placeholder="  Telefono" type="text"  id="telefono" name="telefono"></li>
                <li><textarea class="dato1" placeholder="  Que necesita..." type="text" name="cuestionario"></textarea></li>
                <li><input type="submit" value="Enviar" class="botonpresupuesto"></li>
            </ul>
        </form>
        </div>
        <div id="imgpresupuesto">
            <img src="img/presupuesto.png" width="600px" height="400px">
        </div>
        </div>
        </div>
    </section>

</div>
</body>
</html>
