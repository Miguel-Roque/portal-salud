<?php include("../templete/header.php")?>
<?php
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $txtMotivo=(isset($_POST['txtMotivo']))?$_POST['txtMotivo']:"";
        $txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
        $txtHora=(isset($_POST['txtHora']))?$_POST['txtHora']:"";
        $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
        $accion=(isset($_POST['accion']))?$_POST['accion']:"";


        include("../config/db.php");

        switch($accion){
            case "Agregar":
                $sentenciaSQL = $conexion->prepare("INSERT INTO agebdarcita (motivo, fecha, hora, descripcion) VALUES (:motivo, :fecha, :hora, :descripcion);");
                $sentenciaSQL->bindParam(':motivo',$txtMotivo);
                $sentenciaSQL->bindParam(':fecha',$txtFecha);
                $sentenciaSQL->bindParam(':hora',$txtHora);
                $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                $sentenciaSQL->execute();
                break;
            case "Eliminar":
                $sentenciaSQL = $conexion->prepare("DELETE FROM agebdarcita WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                break;
            case "Modificar":
                $sentenciaSQL = $conexion->prepare("SELECT * FROM agebdarcita WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $Cita=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtMotivo=$Cita['motivo'];
                $txtFecha=$Cita['fecha'];
                $txtHora=$Cita['hora'];
                $txtDescripcion=$Cita['descripcion'];
                break;
            case "Actualizar":
                $sentenciaSQL = $conexion->prepare("UPDATE agebdarcita SET motivo=:motivo, fecha=:fecha, hora=:hora, descripcion=:descripcion WHERE id=:id");
                $sentenciaSQL->bindParam(':motivo',$txtMotivo);
                $sentenciaSQL->bindParam(':fecha',$txtFecha);
                $sentenciaSQL->bindParam(':hora',$txtHora);
                $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();


        }
        $sentenciaSQL = $conexion->prepare("SELECT * FROM agebdarcita");
        $sentenciaSQL->execute();
        $listaCitas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
    <header class="contend__node" >
        <i class="fa-solid fa-chart-simple" onclick="sidedarOpen()"></i>
        <span class="html-text">Agendar Cita</span>
    </header>
    <article class="article__contenido grande-cd-s" onclick="sidedarclose()">
    <table class="tabla__grnde">
        <thead class="tablacolor-sda">
            <tr>
                <th scope="col">N</th>
                <th scope="col">MOTIVO</th>
                <th scope="col">FECHA</th>
                <th scope="col">HORA</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col" class="acciones-sad">ACCIONES</th>
            </tr>
        </thead>
        <tbody class="tablacolor-sda2">
            <?php foreach ($listaCitas as $Cita) { ?>
            <tr>
                <td class="text-sda-s"><?php echo $Cita['id']; ?></td>
                <td class="text-sda-s"><?php echo $Cita['motivo']; ?></td>
                <td class="text-sda-s"><?php echo $Cita['fecha']; ?></td>
                <td class="text-sda-s"><?php echo $Cita['hora']; ?></td>
                <td class="text-sda-s"><?php echo $Cita['descripcion']; ?></td>
                <td class="text-sda-s sad-cente-s">
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $Cita['id']; ?>">
                        <button name="accion" value="Modificar" class="formulario__boton-eliminar modificar-sad">Seleccionar</button>
                        <button name="accion" value="Eliminar" class="formulario__boton-eliminar">Cancelar</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
        <div>
            <i class="fa-solid fa-pen boton-asdasw sadd-derecha" onclick="openFormulario()"></i>
            <i class="fa-solid fa-plus boton-asdasw" onclick="openFormularioLimpio()"></i>
        </div>
        <div class="formulario">
            <div class="formulario__conted">
                <span class="formulario__nombre">Editar cita</span>
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                        <input value="<?php echo $txtID; ?>" name="txtID" id="txtID" type="hidden" class="formulario__input txtID" readonly>
                        <input value="<?php echo $txtMotivo; ?>" name="txtMotivo" id="txtMotivo" type="text" class="formulario__input txtMotivo">
                        <label class="formulario__lavel" for="">Motivo</label><br><br>
                        <input value="<?php echo $txtFecha; ?>" required name="txtFecha" id="txtFecha" type="date" class="formulario__input txtFecha">
                        <label class="formulario__lavel" for="">Fecha</label><br><br>
                        <input value="<?php echo $txtHora; ?>" name="txtHora" id="txtHora" type="time" class="formulario__input txtHora">
                        <label class="formulario__lavel" for="">Horario</label><br><br>
                        <textarea value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id="txtDescripcion" class="formulario__input txtDescripcion" rows="5"><?php echo $txtDescripcion; ?></textarea>
                        <label class="formulario__lavel" for="">Descipcion</label><br><br>
                        <div class="formulario__botones">
                            <button type="submit" name="accion" value="Actualizar" class="formulario__boton amarilli-sad-asd" onclick="closeFormulario()">Actualizar</button>
                            <button class="formulario__boton-eliminar" onclick="closeFormulario()">Cancelar</button>
                        </div>
                    </form>
                    <img src="https://diariocorreo.pe/resizer/4hRYBfXT37sg5L_EjMBpKhYsRZ4=/580x330/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/OSJHMODXRNHW3ENQ6KYGWNDIFE.jpg" class="citamedica-img">
                </div>
            </div>
        </div>
        <div class="formulario2">
            <div class="formulario__conted">
                <span class="formulario__nombre">Agendar una cita</span>
                <div class="formulario__inputs">
                    <form method="POST" enctype="multipart/form-data" class="formulario__form">
                        <input name="txtMotivo" id="txtMotivo" type="text" class="formulario__input txtMotivo">
                        <label class="formulario__lavel" for="">Motivo</label><br><br>
                        <input name="txtFecha" id="txtFecha" type="date" class="formulario__input txtFecha">
                        <label class="formulario__lavel" for="">Fecha</label><br><br>
                        <input name="txtHora" id="txtHora" type="time" class="formulario__input txtHora">
                        <label class="formulario__lavel" for="">Horario</label><br><br>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="formulario__input txtDescripcion" rows="5"></textarea>
                        <label class="formulario__lavel" for="">Descipcion</label><br><br>
                        <div class="formulario__botones">
                            <span class="formulario__boton agendar-sad-a" onclick="openFormulario3()">Agendar</span>
                            <div class="modal-acetar">
                                <div class="mini-msa">
                                    <span  class="mini-msasx">Se agendo tu cita</span>
                                    <button class="formulario__boton-eliminar asdc-1-sd" type="submit" name="accion" value="Agregar">Aceptar</button>
                                </div>                     
                            </div>
                            <button class="formulario__boton-eliminar" onclick="closeFormulario()">Cancelar</button>
                        </div>
                    </form>
                    <img src="https://diariocorreo.pe/resizer/4hRYBfXT37sg5L_EjMBpKhYsRZ4=/580x330/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/OSJHMODXRNHW3ENQ6KYGWNDIFE.jpg" class="citamedica-img">
                </div>
            </div>
        </div>
    </article>
<?php include("../templete/footer.php")?>