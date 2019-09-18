<?php
require 'conexion.php';

switch ($_POST['opc']) {
case 'guardar':
        try {
        $sql = $conexion->prepare("INSERT INTO alumnos (numControl,paterno,materno,nombre,genero,nip,carrera_id,grupo_id,periodo_id,reticula_id)
        VALUES ('" . $_POST['numControl'] . "' , '" . $_POST['paterno'] . "' , '" . $_POST['materno'] . "' , 
        '" . $_POST['nombre'] . "' , '" . $_POST['genero'] . "' , '" . $_POST['nip'] . "' , '" . $_POST['carrera_id'] . "','" . $_POST['grupo_id'] . "','" . $_POST['periodo_id'] . "','" . $_POST['reticula_id'] . "')");
        $sql->execute();
        header("location:alumno.php");
        } catch (Exception $e) {
        echo '!Error al guardar: ',  $e->getMessage(), "\n";
        die();
        }
break;

case "eliminar":
        try {
        $sql = $conexion->prepare("DELETE FROM alumnos WHERE alumno_id=" . $_POST['clave']);
        $sql->execute();
        } catch (PDOException $e) {
        print "¡Error al Eliminar!: " . $e->getMessage() . "<br/>";
        die();
        }
        break;

case "modificar-form":
        try {
        $sql = $conexion->prepare("SELECT * FROM alumnos WHERE alumno_id=" . $_POST['clave']);
        $sql->execute();
        if ($fila = $sql->fetch()) {
        ?>
        <form action="regAlumno.php" method="POST" id="modificar">
        <input class="form-control" type="text" name="opc" value="modificar" hidden>
        <input type="text" value="<?php echo $_POST['clave'] ?>" name="clave" hidden>
        <div class="form-group">
        <label for="nombre">No. de Control:</label>
        <input class="form-control form-control-sm mb-1" value="<?php echo $fila['numControl']; ?>" type="text" name="numControl" >
        <label for="nombre">Nombre:</label>
        <input class="form-control form-control-sm mb-1" value="<?php echo $fila['paterno']; ?>" type="text" name="paterno" >
        <input class="form-control form-control-sm mb-1" value="<?php echo $fila['materno']; ?>" type="text" name="materno" >
        <input class="form-control form-control-sm mb-1" value="<?php echo $fila['nombre']; ?>" type="text" name="nombre" >
        <label for="nombre">Genero:</label>
        <label class="form-control-sm">
                
              Hombre <input type="radio" name="genero" value="M" checked>
            </label>
            <label class="form-control-sm">
              Mujer <input type="radio" name="genero" value="F">
            </label>

                <select class="custom-select custom-select-sm mb-1" name="grupo_id">
              <option value="<?php echo $fila['grupo_id']; ?>">Asigne el grupo</option>
              <?php
              require 'conexion.php';
              $cong = "SELECT * FROM grupos";
              $preg = $conexion->prepare($cong);
              $resg = $preg->execute();
              $rowg = $preg->fetchAll(\PDO::FETCH_OBJ);
              foreach ($rowg as $rowsg) {
                ?>
                <option value="<?php print($rowsg->grupo_id); ?>"><?php print($rowsg->grupo); ?></option>
              <?php
              } ?>
            </select>

            <select class="custom-select custom-select-sm mb-1 " name="carrera_id">
              <option value="<?php echo $fila['carrera_id']; ?>">Asigne la Carrera</option>
              <?php
              require 'conexion.php';
              $conc = "SELECT * FROM carreras";
              $prec = $conexion->prepare($conc);
              $resc = $prec->execute();
              $rowc = $prec->fetchAll(\PDO::FETCH_OBJ);
              foreach ($rowc as $rowsc) {
                ?>
                <option value="<?php print($rowsc->carrera_id); ?>"><?php print($rowsc->carrera); ?></option>
              <?php
              } ?>
            </select>
            <select class="custom-select custom-select-sm mb-2 " name="periodo_id">
              <option value="<?php echo $fila['periodo_id']; ?>">Asigne el Periodo</option>
              <?php
              require 'conexion.php';
              $conp = "SELECT * FROM periodos";
              $prep = $conexion->prepare($conp);
              $resp = $prep->execute();
              $rowp = $prep->fetchAll(\PDO::FETCH_OBJ);
              foreach ($rowp as $rowsp) {
                ?>
                <option value="<?php print($rowsp->periodo_id); ?>"><?php print($rowsp->periodo . ' - ' . $rowsp->semestre); ?></option>
              <?php
              } ?>
            </select>

            <select class="custom-select custom-select-sm mb-2 " name="reticula_id">
              <option value="<?php echo $fila['reticula_id']; ?>">Asigne la Reticula</option>
              <?php
              require 'conexion.php';
              $conr = "SELECT * FROM reticulas";
              $prer = $conexion->prepare($conr);
              $resr = $prer->execute();
              $rowr = $prer->fetchAll(\PDO::FETCH_OBJ);
              foreach ($rowr as $rowsr) {
                ?>
                <option value="<?php print($rowsr->reticula_id); ?>"><?php print($rowsr->reticula); ?></option>
              <?php
              } ?>
            </select>
          </div>
        </div>
        <div>
        <button type="submit" class="btn btn-outline-success btn-sm btn-block">Guardar Cambios</button>
        </div>
        </form>
                <?php
                }
        } catch (PDOException $e) {
                print "¡Error al Editar!: " . $e->getMessage() . "<br/>";
                die();
        }
        break;

case "modificar": 
        try {
        $sql = $conexion->prepare("UPDATE alumnos SET 
        numControl='" . $_POST['numControl'] . "',
        paterno='" . $_POST['paterno'] . "',
        materno='" . $_POST['materno'] . "',
        nombre='" . $_POST['nombre'] . "',
        genero='" . $_POST['genero'] . "',
        grupo_id='" . $_POST['grupo_id'] . "',
        carrera_id='" . $_POST['carrera_id'] . "',
        periodo_id='" . $_POST['periodo_id'] . "',
        reticula_id='" . $_POST['reticula_id'] . "'
        WHERE alumno_id=" . $_POST['clave']);
        $sql->execute();
        header("location:alumno.php");
        } catch (PDOException $e) {
        print "¡Error al modificar!: " . $e->getMessage() . "<br/>";
        die();
}
break;

case "cambiar": 
        try {
        $sql = $conexion->prepare("SELECT * FROM alumnos WHERE alumno_id=" . $_POST['clave']);
        $sql->execute();
        $fila = $sql->fetch();
        $estado = $fila['active'];

        $nvoEstado = ($estado == "Activo") ? $nvoestado="Inactivo" : $nvoestado="Activo";

        $sqla = $conexion->prepare ("UPDATE alumnos SET  
        active = '$nvoEstado' 
        WHERE alumno_id=" . $_POST['clave']);
        $sqla->execute();
        header("location:alumno.php");
        } 
        catch (PDOException $e) {
        print "¡Error al modificar!: " . $e->getMessage() . "<br/>";
        die();
        }
        break;

}

