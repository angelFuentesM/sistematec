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

            <div class="col-7 ">
                <h4 class="d-inline ">Bienvenido</h4>
                <p class="d-inline mx-2">Miguel Angel Fuentes Muñoz</p>

            </div>

            <div class="col-3 p-1">
                <form method="POST" id="formIngles">
                    <select class="custom-select custom-select-sm" name="docente_id">
                        <option value="">Asigne el docente a evaluar</option>
                        <?php
                        require 'conexion.php';
                        $cond = "SELECT * FROM docentes WHERE active = 1 AND lengext=1 ";
                        $pred = $conexion->prepare($cond);
                        $resd = $pred->execute();
                        $rowd = $pred->fetchAll(\PDO::FETCH_OBJ);
                        foreach ($rowd as $rowsd) {
                            ?>
                            <option value="<?php print($rowsp->docente_id); ?>"><?php print($rowsd->nombreD . '  ' . $rowsd->paternoD . '  ' . $rowsd->maternoD); ?></option>
                        <?php
                        } ?>
                    </select>
            </div>

            <div class="col-2 p-1">
                <select class="custom-select custom-select-sm" name="periodo_id">
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
            </div>
        </div>

        <hr>
        <div class="row">

            <div class="col-4">



                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>1.-</b> El profesor esplico los objetivos del curso ?</label><br><br>
                    <label>Si<input type="radio" name="ing1" value="1" id="ing1" class="mx-3"></label>
                    <label>No<input type="radio" name="ing1" value="0" id="ing1" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>4.-</b> El profesor te ayuda a que relaciones lo que ya sabes del tema con lo visto en la clase ?</label><br>
                    <label>Si<input type="radio" name="ing4" value="1" id="ing4" class="mx-3"></label>
                    <label>No<input type="radio" name="ing4" value="0" id="ing4" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>7.-</b>El profesor motiva a que te intereces en la materia ?</label><br>
                    <label>Si<input type="radio" name="ing7" value="1" id="ing7" class="mx-3"></label>
                    <label>No<input type="radio" name="ing7" value="0" id="ing7" class="mx-3"></label>
                </div>

            </div>

            <div class="col-4">

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>2.-</b> El profesor dio a conocer al inicio del curso la forma en la que evaluaria tu aprendizaje ?</label><br>
                    <label>Si<input type="radio" name="ing2" value="1" id="ing2" class="mx-3"></label>
                    <label>No<input type="radio" name="ing2" value="0" id="ing2" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>5.-</b> El profesor utiliza diferentes formas de trabajo en clase que favorecen tu aprendizaje ?</label><br>
                    <label>Si<input type="radio" name="ing5" value="1" id="ing5" class="mx-3"></label>
                    <label>No<input type="radio" name="ing5" value="0" id="ing5" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>8.-</b> El profesor define de manera clara los conceptos propios de la materia ?</label><br>
                    <label>Si<input type="radio" name="ing8" value="1" id="ing8" class="mx-3"></label>
                    <label>No<input type="radio" name="ing8" value="0" id="ing8" class="mx-3"></label>
                </div>

            </div>

            <div class="col-4">

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>3.-</b> El profesor te pregunta lo que sabes acerca de los temas a tratar ?</label><br>
                    <label>Si<input type="radio" name="ing3" value="1" id="ing3" class="mx-3"></label>
                    <label>No<input type="radio" name="ing3" value="0" id="ing3" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>6.-</b> El profesor proporciona un ambiente de confianza ?</label><br>
                    <label>Si<input type="radio" name="ing6" value="1" id="ing6" class="mx-3"></label>
                    <label>No<input type="radio" name="ing6" value="0" id="ing6" class="mx-3"></label>
                </div>

                <div class="form-group">
                    <label for="ing1" class="control-label">
                        <b>9.-</b> El profesor utilizo material didactico ?</label><br><br>
                    <label>Si<input type="radio" name="ing9" value="1" id="ing9" class="mx-3"></label>
                    <label>No<input type="radio" name="ing9" value="0" id="ing9" class="mx-3"></label>
                </div>

            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="" class="control-label "> Comentarios:</label>
                    <input type="text" name="ing10" class="form-control" id="ing10">
                </div>

            </div>

            <div class="col-4">
                <button class=" btn btn-info btn-block my-4" id="btnguardar">Enviar encuesta...</button>
            </div>

            </form>
        </div>
    </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnguardar').click(function() {
                var datos = $('#formIngles').serialize();
                $.ajax({
                    type: "POST",
                    url: "regIngles.php",
                    data: datos,
                    success: function(r) {
                        if (r == 1) {
                            alert("Tu encuesta fue enviada con exito...!");
                        } else {
                            alert("Hubo un problema con el registro...!");
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>