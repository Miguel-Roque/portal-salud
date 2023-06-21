<?php include("../templete/header.php")?>
<?php
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $txtPlatillo=(isset($_POST['txtPlatillo']))?$_POST['txtPlatillo']:"";
        $txtImg=(isset($_POST['txtImg']))?$_POST['txtImg']:"";
        $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
        $txtIngredientes=(isset($_POST['txtIngredientes']))?$_POST['txtIngredientes']:"";
        $txtPreparacion=(isset($_POST['txtPreparacion']))?$_POST['txtPreparacion']:"";
        $accion=(isset($_POST['accion']))?$_POST['accion']:"";


        include("../config/db.php");

        switch($accion){
            case "Agregar":
                $sentenciaSQL = $conexion->prepare("INSERT INTO platillos (platillo, img, descripcion, ingredientes, preparacion) VALUES (:platillo, :img, :descripcion, :ingredientes, :preparacion );");
                $sentenciaSQL->bindParam(':platillo',$txtPlatillo);
                $sentenciaSQL->bindParam(':img',$txtImg);
                $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                $sentenciaSQL->bindParam(':ingredientes',$txtIngredientes);
                $sentenciaSQL->bindParam(':preparacion',$txtPreparacion);
                $sentenciaSQL->execute();
                break;
            case "Eliminar":
                $sentenciaSQL = $conexion->prepare("DELETE FROM platillos WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                break;
            case "Modificar":
                $sentenciaSQL = $conexion->prepare("SELECT * FROM platillos WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $platillo=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtPlatillo=$platillo['platillo'];
                $txtImg=$platillo['img'];
                $txtDescripcion=$platillo['descripcion'];
                $txtIngredientes=$platillo['ingredientes'];
                $txtPreparacion=$platillo['preparacion'];
                break;
            case "Actualizar":
                $sentenciaSQL = $conexion->prepare("UPDATE platillos SET platillo=:platillo, img=:img, descripcion=:descripcion, ingredientes=:ingredientes, preparacion=:preparacion WHERE id=:id");
                $sentenciaSQL->bindParam(':platillo',$txtPlatillo);
                $sentenciaSQL->bindParam(':img',$txtImg);
                $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                $sentenciaSQL->bindParam(':ingredientes',$txtIngredientes);
                $sentenciaSQL->bindParam(':preparacion',$txtPreparacion);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();


        }
        $sentenciaSQL = $conexion->prepare("SELECT * FROM platillos");
        $sentenciaSQL->execute();
        $listaPlatillo = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
    <header class="contend__node" >
        <i class="fa-solid fa-chart-simple" onclick="sidedarOpen()"></i>
        <span class="html-text">Platillos Saludables</span>
    </header>
    <article class="article__contenido contenido_platillos" onclick="sidedarclose()">
    <?php foreach ($listaPlatillo as $Platillo) { ?>
        <div class="platillo">
            <img class="platillo__img" src="<?php echo $Platillo['img']; ?>" alt="platillo">
            <div class="platillo__info">
                <span class="platillo__name"><?php echo $Platillo['platillo']; ?></span>
                <p class="platillo__descripcion">
                    <?php echo $Platillo['descripcion']; ?>
                </p>
                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $Platillo['id']; ?>">
                    <button name="accion" value="Modificar" class="formulario__boton-eliminar modificar-sad">Seleccionar</button>
                    <button name="accion" value="Eliminar" class="formulario__boton-eliminar">Eliminar</button>
                </form><br>
            </div>
        </div>
    <?php } ?>
    <div class="Modal-platillo">
        <div class="Modal-platillo__contend">
        <i class="fa-solid fa-circle-xmark sadd-derecha-sad" onclick="closeFormulario4()"></i>
            <p class="text-title-asdas">
                <input value="<?php echo $txtID; ?>" name="txtID" id="txtID" type="hidden" class="formulario__input txtID" readonly>
                <?php echo $txtPlatillo; ?>
            </p>
            <div class="mosal-platillo__flex-1">
                <img src="<?php echo $txtImg; ?>" alt="" class="img-platillo_2s">
                <div class="">
                    <p>
                        <b class="asd-asdw-ff">Ingredientes:</b><br>
                        <?php echo $txtIngredientes; ?><br>
                    </p>
                    <p>
                        <b class="asd-asdw-ff">Preparacion:</b><br>
                        <?php echo $txtPreparacion; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
        <div>
            <i class="fa-solid fa-magnifying-glass boton-asdasw sadd-masderecha" onclick="openFormulario4()"></i>
            <i class="fa-solid fa-pen boton-asdasw sadd-derecha" onclick="openFormulario()"></i>
            <i class="fa-solid fa-plus boton-asdasw" onclick="openFormularioLimpio()"></i>
        </div>
        <div class="formulario">
            <div class="formulario__conted asd-sad-wewe">
                <span class="formulario__nombre">Editar Progreso</span>
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                        <input value="<?php echo $txtID; ?>" name="txtID" id="txtID" type="hidden" class="formulario__input txtID" readonly>
                        <label class="formulario__lavel" for="">Platillo</label>
                        <input value="<?php echo $txtPlatillo; ?>" name="txtPlatillo" id="txtPlatillo" type="text" class="formulario__input txtMotivo">
                        <br><br>
                        <label class="formulario__lavel" for="">Img</label>
                        <input value="<?php echo $txtImg; ?>" required name="txtImg" id="txtImg" type="text" class="formulario__input txtFecha">
                        <br><br>
                        <label class="formulario__lavel" for="">Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" rows="5" class="formulario__input txtFecha"><?php echo $txtDescripcion; ?></textarea>
                        <br><br>
                        <label class="formulario__lavel" for="">Ingredientes</label>
                        <textarea name="txtIngredientes" id="txtIngredientes" rows="5" class="formulario__input txtFecha"><?php echo $txtIngredientes; ?></textarea>
                        <br><br>
                        <label class="formulario__lavel" for="">Preparacion</label>
                        <textarea name="txtPreparacion" id="txtPreparacion" rows="5" class="formulario__input txtFecha"><?php echo $txtPreparacion; ?></textarea>
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
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                    <label class="formulario__lavel" for="">Platillo</label>
                        <input name="txtPlatillo" id="txtPlatillo" type="text" class="formulario__input txtMotivo">
                        <br><br>
                        <label class="formulario__lavel" for="">Img</label>
                        <input name="txtImg" id="txtImg" type="text" class="formulario__input txtFecha">
                        <br><br>
                        <label class="formulario__lavel" for="">Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" rows="5" class="formulario__input txtFecha"></textarea>
                        <br><br>
                        <label class="formulario__lavel" for="">Ingredientes</label>
                        <textarea name="txtIngredientes" id="txtIngredientes" rows="5" class="formulario__input txtFecha"></textarea>
                        <br><br>
                        <label class="formulario__lavel" for="">Preparacion</label>
                        <textarea name="txtPreparacion" id="txtPreparacion" rows="5" class="formulario__input txtFecha"></textarea>
                        <div class="formulario__botones">
                            <span class="formulario__boton agendar-sad-a" onclick="openFormulario3()">Agregar</span>
                            <div class="modal-acetar">
                                <div class="mini-msa">
                                    <span  class="mini-msasx">Se agrego Día</span>
                                    <button class="formulario__boton-eliminar asdc-1-sd" type="submit" name="accion" value="Agregar">Aceptar</button>
                                </div>
                                <br>                     
                            </div>
                            <button class="formulario__boton-eliminar" onclick="closeFormulario()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
<?php include("../templete/footer.php")?>