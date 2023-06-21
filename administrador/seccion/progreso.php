<?php include("../templete/header.php")?>
<?php
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $txtPlatillo=(isset($_POST['txtPlatillo']))?$_POST['txtPlatillo']:"";
        $txtFisica=(isset($_POST['txtFisica']))?$_POST['txtFisica']:"";
        $accion=(isset($_POST['accion']))?$_POST['accion']:"";


        include("../config/db.php");

        switch($accion){
            case "Agregar":
                $sentenciaSQL = $conexion->prepare("INSERT INTO actividadfisica (platillo, fisica) VALUES (:platillo, :fisica);");
                $sentenciaSQL->bindParam(':platillo',$txtPlatillo);
                $sentenciaSQL->bindParam(':fisica',$txtFisica);
                $sentenciaSQL->execute();
                break;
            case "Eliminar":
                $sentenciaSQL = $conexion->prepare("DELETE FROM actividadfisica WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                break;
            case "Modificar":
                $sentenciaSQL = $conexion->prepare("SELECT * FROM actividadfisica WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $actividad=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtPlatillo=$actividad['platillo'];
                $txtFisica=$actividad['fisica'];
                break;
            case "Actualizar":
                $sentenciaSQL = $conexion->prepare("UPDATE actividadfisica SET platillo=:platillo, fisica=:fisica WHERE id=:id");
                $sentenciaSQL->bindParam(':platillo',$txtPlatillo);
                $sentenciaSQL->bindParam(':fisica',$txtFisica);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();


        }
        $sentenciaSQL = $conexion->prepare("SELECT * FROM actividadfisica");
        $sentenciaSQL->execute();
        $listaActividad = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
    <header class="contend__node" >
        <i class="fa-solid fa-chart-simple" onclick="sidedarOpen()"></i>
        <span class="html-text">Progreso</span>
    </header>
    <article class="article__contenido grande-cd-s grn-sde-asdsa" onclick="sidedarclose()">
        <?php foreach ($listaActividad as $Actividad) { ?>
            <div class="Actividad-rz">
                <span class="Actividad-rz-name">Dia <?php echo $Actividad['id']; ?></span><br>
                <img class="Actividad-rz-img" src="https://cdn-icons-png.flaticon.com/512/2906/2906435.png" alt="progreso"><br>
                <b>Comiste comida saludable: <?php echo $Actividad['platillo']; ?></b><br>
                <b>Realisaste actividad física: <?php echo $Actividad['fisica']; ?></b><br>
                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $Actividad['id']; ?>">
                    <button name="accion" value="Modificar" class="formulario__boton-eliminar modificar-sad">Seleccionar</button>
                    <button name="accion" value="Eliminar" class="formulario__boton-eliminar">Eliminar</button>
                </form>
            </div>
        <?php } ?>
        <div>
            <i class="fa-solid fa-pen boton-asdasw sadd-derecha" onclick="openFormulario()"></i>
            <i class="fa-solid fa-plus boton-asdasw" onclick="openFormularioLimpio()"></i>
        </div>
        <div class="formulario">
            <div class="formulario__conted asd-sad-wewe">
                <span class="formulario__nombre">Editar Progreso</span>
                <div class="sads-sdsa-asd">
                    <img class="Actividad-rz-img" src="https://cdn-icons-png.flaticon.com/512/2906/2906435.png" alt="progreso">
                </div>
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                        <input value="<?php echo $txtID; ?>" name="txtID" id="txtID" type="hidden" class="formulario__input txtID" readonly>
                        <label class="formulario__lavel" for="">¿Comiste saludable?</label>
                        <input value="<?php echo $txtPlatillo; ?>" name="txtPlatillo" id="txtPlatillo" type="text" class="formulario__input txtMotivo">
                        <br><br>
                        <label class="formulario__lavel" for="">¿Hiciste actividad física?</label>
                        <input value="<?php echo $txtFisica; ?>" required name="txtFisica" id="txtFisica" type="text" class="formulario__input txtFecha">
                        <br><br>
                        <div class="formulario__botones">
                            <button type="submit" name="accion" value="Actualizar" class="formulario__boton amarilli-sad-asd" onclick="closeFormulario()">Actualizar</button>
                            <button class="formulario__boton-eliminar" onclick="closeFormulario()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="formulario2">
            <div class="formulario__conted asd-sad-wewe">
                <span class="formulario__nombre">Agregar dia</span>
                <div class="sads-sdsa-asd">
                    <img class="Actividad-rz-img" src="https://cdn-icons-png.flaticon.com/512/2906/2906435.png" alt="progreso">
                </div>
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                        <input name="txtPlatillo" id="txtPlatillo" type="hidden" class="formulario__input txtMotivo">
                        <input name="txtFisica" id="txtFisica" type="hidden" class="formulario__input txtFecha">
                        <div class="formulario__botones">
                            <span class="formulario__boton agendar-sad-a" onclick="openFormulario3()">Agregar</span>
                            <div class="modal-acetar">
                                <div class="mini-msa">
                                    <span  class="mini-msasx">Se agrego Día</span>
                                    <button class="formulario__boton-eliminar asdc-1-sd" type="submit" name="accion" value="Agregar">Aceptar</button>
                                </div>                     
                            </div>
                            <button class="formulario__boton-eliminar" onclick="closeFormulario()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
<?php include("../templete/footer.php")?>