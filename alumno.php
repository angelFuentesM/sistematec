<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  <link rel="stylesheet" href="DataTables/datatables.min.css" />
  <title>Hello, world!</title>

</head>

<body>
  <!--Menu-->
  <div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand-lg bg-light">
      <a class="navbar-brand" href="#">
        <img src="imagenes/itsppTexto.png" width="35%">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <hr>
  <!--Fin del menu-->

  <div class="container">

    <div class="row">
      <div class="col-2">

        <form action="regAlumno.php" method="POST" id="formAlumno" name="formUno">
          <input class="form-control" type="text" name="opc" value="guardar" hidden>
          <div class="form-group">
            <h6>Agregar Alumno</h6>
            <input class="form-control form-control-sm mb-1" type="text" name="numControl" placeholder="Numero de Control" id="numControl">
            <hr>
            <input class="form-control form-control-sm mb-1" type="text" name="paterno" placeholder="Apellido Paterno">
            <input class="form-control form-control-sm mb-1" type="text" name="materno" placeholder="Apellido Materno">
            <input class="form-control form-control-sm mb-1" type="text" name="nombre" placeholder="Nombre (s)">
            <input class="form-control form-control-sm mb-1" name="nip" id="salida" hidden>
            <label class="form-control-sm">
              Hombre <input type="radio" name="genero" value="M">
            </label>
            <label class="form-control-sm">
              Mujer <input type="radio" name="genero" value="F">
            </label>

            <select class="custom-select custom-select-sm mb-1" name="grupo_id">
              <option value="">Asigne el grupo</option>
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
              <option value="">Asigne la Carrera</option>
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
              <option value="">Asigne el Periodo</option>
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
              <option value="">Asigne la Reticula</option>
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

          <div>
            <button type="submit" class=" btn btn-outline-secondary btn-sm btn-block" id="boton">Agregar</button>
          </div>
        </form>
      </div>

      <div class="col-10">
        <table id="myTable" class="">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Control</th>
              <th scope="col">Nombre</th>
              <th scope="col">Grupo</th>
              <th scope="col">Semestre</th>
              <th scope="col">Estatus</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'conexion.php';
            $sql = $conexion->prepare("SELECT a.active,a.alumno_id,a.numControl,a.paterno,a.materno,a.nombre,g.grupo,p.semestre
            FROM alumnos as a
            JOIN grupos as g
            ON a.grupo_id =  g.grupo_id
            JOIN periodos as p
            ON a.periodo_id = p.periodo_id            
            ");
            $sql->execute();
            $i = 1;
            while ($fila = $sql->fetch()) {
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $fila['numControl'] ?></td>
                <td><?php echo $fila['paterno'] . " " . $fila['materno'] . " " . $fila['nombre'] ?></td>
                <td class="text-center"><?php echo $fila['grupo']; ?></td>
                <td class="text-center"><?php echo $fila['semestre']; ?></td>
                <td class="text-center"><?php echo $fila['active']; ?></td>

                <td class="text-center">
                  <span style="font-size: 1em; color:#2980b9; cursor:pointer;">
                    <i class="fas fa-arrows-alt-h cambiar" value="" id="<?php echo $fila['alumno_id']; ?>"></i>
                  </span>

                  <span style="font-size: 1em; color: #f1c40f; cursor:pointer;">
                    <i class="fas fa-highlighter mr-1 modificar" id="<?php echo $fila['alumno_id']; ?>"></i>
                  </span>

                  <span style="font-size: 1em; color: tomato; cursor:pointer;">
                    <i class="fas fa-trash-alt eliminar" id="<?php echo $fila['alumno_id']; ?>"></i>
                  </span>
                </td>

              </tr>
            <?php } ?>
          </tbody>
        </table>

        <!-- Inicia Modal -->
        <div class="modal fade bd-example-modal-sm" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body datos">
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>
        <!-- fin Modal -->
      </div>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="js/Datatables.js"></script>
  <script type="text/javascript" src="js/validation/dist/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/acciones.js"></script>
  <script src="js/validar.js"></script>
  <script>
    document.getElementById("boton").addEventListener("click", function() {
      var control = document.getElementById("numControl").value,
        nip = control.slice(4);
      document.getElementById("salida").value = nip;
    })
  </script>

  <script>
    $(".cambiar").click(function() {
      var clave = $(this).attr("id");
      alert("Esta seguro de cambiar el estado del registro.")
      $.ajax({
        url: "regAlumno.php",
        data: "opc=cambiar&clave=" + clave,
        type: "POST",
        success: function() {
          location.reload();
        }
      })
    });
  </script>

  <script>

  </script>


</body>

</html>