<?php
session_start();
//echo $_SESSION['id_usuario'];
//echo $_SESSION['nombre'];

require "modelo/Cliente.php";
require "modelo/Bd.php";
require "modelo/funciones.php";
require "modelo/Casa.php";
require "modelo/ListaCasas.php";

//--------------------Para traer los datos del cliente
$id2 =$_SESSION['id_cliente']; //con esto nos traemos el id que nos viene del login

$cliente=new Cliente();

$cliente->obtenerPorId($id2);

//---------------------Para introducir nuevas casas
if(isset($_POST) && !empty($_POST)) {

//primero queremos que nos genere un objeto cerveza
    $casa = new Casa();

//y ahora quiero que a ese objeto cerveza se le inserte el POST ( que son los datos)
    $casa->insertar($_POST, $_FILES['foto']);

}
//---------------------Para la impresion de la lista de casas
$lista =new ListaCasas();
$lista->obtenerElementosPrivados($id2);



?>
<!doctype html>
<html lang="en">
<?php
include "includes/head.php";

?>
<body>
<div id="contenedor">
    <header>
        <div id="todo_c">
            <?php
            include "includes/nav.php"
            ?>
            <div id="fotoareacliente">
                <img src="img/cliente.png">
            </div>
        </div>
    </header>

    <section>
        <div class="areaPrivada" >
            <div id="datosusuario">
                <div id="titulo">
                    <h1>Datos Usuario</h1>
                </div>
                <div id="foto_datosu">
                    <img src="img/cliente2.png" width="525px" height="350px">
                </div>
                <div class="areaPrivadaCaja"> <div class="areaPrivadaCaja2">

                        <?php
                        echo $cliente->imprimirEnFicha();
                        ?>
                            <a href="logout.php" id="logout">LogOut</a>
                    </div></div>

            </div>
            <div id="titulo2">
                <h1>Insertar</h1>
                <h1>Insertar</h1>
                <h1>Insertar</h1>
                <h1>Insertar</h1>
            </div>
            <div class="areaPrivadaCaja" id="cajaabajo"> <div class="areaPrivadaCaja3">
                    <form name="casa" action="<?php echo $_SERVER['PHP_SELF']?> " method="post" enctype="multipart/form-data" class="fain">
                        <ul>
                            <li><input class="dato1" placeholder="  Id Cliente" type="text" id="idCliente" name="id_cliente" value="<?php echo $id2 ?>"></li>
                            <li><input class="dato1" placeholder="  Nombre" type="text" id="nombre" name="nombre"></li>
                            <li><input class="dato1" placeholder="  Direccion" type="text"  id="direccion" name="direccion"></li>
                            <li><label>Iluminación</label><input class="dato1" type="checkbox"  id="iluminacion" name="iluminacion" value="1"></li>
                            <li><label>Sensores   </label><input class="dato1"  type="checkbox" id="sensores" name="sensores" value="1"></li>
                            <li><label>Reguladores</label><input class="dato1"  type="checkbox" id="reguladores" name="reguladores" value="1"></li>
                            <li><label>Riego</label><input class="dato1"  type="checkbox" id="riego" name="riego" value="1"></li>
                            <li><label>Camaras</label><input class="dato1"  type="checkbox" id="camaras" name="camaras" value="1"></li>

                            <li><textarea class="dato1" placeholder="  Descripción" type="text" name="descripcion" ></textarea></li>
                            <li><input class="dato1" placeholder="  Metros cuadrados" type="text"  id="metros" name="metros"></li>

                            <li><input placeholder="Foto" type="file" name="foto"></li>
                            <li><input type="submit" value="Enviar" onclick=" presupuestoCliente('presupuestoCliente.html', 300, 400)" ></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div id="casasss">
                <?php
                echo $lista->imprimirCasasEnBack();
                ?>
            </div>
        </div>
    </section>
</div>
</body>
</html>
