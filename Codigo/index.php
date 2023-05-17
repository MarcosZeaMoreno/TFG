<?php

require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_nota, titulo, fecha, texto, id_icono FROM notas");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FTC - Marcos Zea Moreno</title>
    <!-- style.css -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- style.css -->
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Bootsrap -->
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <!-- Bootstrap icons -->
    <!-- Script validador de datos -->
    <script src="script/script.js"></script>
    <!-- Script validador de datos -->
    <!-- Script alerta al eliminar nota -->
    <script>
        function confirmarBorrar(idNota) {
            if (confirm("¿Estás seguro de que quieres borrar esta nota?")) {
                window.location.href = "config/borrar.php?id=" + idNota;
            }
        }
    </script>
    <!-- Script alerta al eliminar nota -->
</head>

<body>
    <header>
        <div class="row m-0">
            <div class="col-lg-3 d-md-none d-sm-none d-none d-lg-block p-2 bg-warning text-center border-end border-bottom border-dark">
                <button type="button" class="btn btn-dark border border-dark m-1 btn-crear-nota" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-lg"></i> Nueva nota
                </button>
            </div>
            <div class="col-lg-9 p-2 bg-warning border-bottom border-dark">

                <div class="header d-flex justify-content-between justify-content-lg-end">

                    <button type="button" class="btn btn-dark me-4 ms-2 mt-1 d-lg-none" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="header-right">

                        <!-- Mostrar botón funcional o no dependiendo de si se ha seleccionado alguna nota -->

                        <?php

                        $id_nota = isset($_GET['id_nota']) ? $_GET['id_nota'] : null;

                        if ($id_nota) {
                            echo '<button type="button" class="btn btn-dark me-4 mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>';
                        } else {
                            echo '<button type="button" class="btn btn-dark me-4 mt-1">
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>';
                        }
                        ?>

                        <!-- Mostrar botón funcional o no dependiendo de si se ha seleccionado alguna nota -->

                        <button type="button" class="btn btn-dark me-4 mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop_alarm">
                            <i class="bi-alarm"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Crear Nota -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Creación de nota
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="formulario" id="formulario" action="config/register.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Introduzca una fecha</label>
                                <input type="text" id="fecha" name="reg_fecha" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo de fecha -> 2023/07/23" />
                            </div>
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Introduzca un título</label>
                                <input type="text" id="titulo" name="reg_titulo" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo de título -> Poema atardecer" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <input type="submit" name="crear" class="btn btn-warning boton" id="btn-agregar" value="Crear nota"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Crear Nota -->
        <!-- Cambiar Icono -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pulse un nuevo icono para cambiarlo.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="row mt-3">

                            <!-- Recoger y mostrar datos de la base de datos de la tabla iconos -->

                            <?php

                            $id_nota = isset($_GET['id_nota']) ? $_GET['id_nota'] : null;
                            $resultado_iconos = $con->query('SELECT nombre, id_icono, link_icono FROM iconos');

                            foreach ($resultado_iconos as $row_iconos) {
                                echo '<div class="col-3 mb-4">
                                        <button type="button" class="btn btn-dark mt-1"><a href="config/cambiar_icono.php?id=' . $id_nota . '&id_icono=' . $row_iconos['id_icono'] . '">
                                            ' . $row_iconos['link_icono'] . '
                                            </a></button>
                                        </div>';
                            }
                            ?>

                            <!-- Recoger y mostrar datos de la base de datos de la tabla iconos -->

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cambiar Icono -->
        <!-- Crear Alarma -->
        <div class="modal fade" id="staticBackdrop_alarm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_alarm" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel_alarm">Crear alarma</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="contenido-alarma1">
                        <div class="modal-body">
                            <div class="cuerpo">
                                <i class="bi-alarm alarma"></i>
                                <h1 class="hora-alarma">00:00:00 PM</h1>
                                <div class="contenido-alarma2">
                                    <div class="columna">
                                        <select>
                                            <option value="Hora" selected hidden>Hora</option>
                                        </select>
                                    </div>
                                    <div class="columna">
                                        <select>
                                            <option value="Minutos" selected hidden>Minutos</option>
                                        </select>
                                    </div>
                                    <div class="columna">
                                        <select>
                                            <option value="AM/PM" selected hidden>AM/PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-warning boton alarma-btn">Crear Alarma</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Crear Alarma -->
        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header text-bg-warning">
                <button type="button" class="btn btn-dark border border-dark m-1 btn-crear-nota" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-lg"></i> Nueva nota
                </button>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body text-bg-warning botones-offcanvas">
                <h4>Notas:</h4>
                <div class="d-flex flex-column bd-highlight menu-notas">
                    <div id="lista" class="lista">

                        <!-- Mostrar Notas en Botones -->
                        <?php foreach ($resultado as $row) { ?>
                            <div class="bd-highlight m-2 p-2">
                                <div class="btn-group grupo-boton" role="group" aria-label="Basic example">
                                    <button type="button" class="btn p-3 btn-dark border border-dark boton-izquierdo" style="width: 100px">

                                        <!-- Mostrar Iconos -->
                                        <?php

                                        $id_icono = $row['id_icono'];

                                        $resultado_iconos = $con->query('SELECT link_icono FROM iconos WHERE id_icono = ' . $id_icono);
                                        $resultado_iconos->execute();
                                        $valor = $resultado_iconos->fetchColumn();

                                        echo $valor;

                                        ?>
                                        <!-- Mostrar Iconos -->

                                    </button>

                                    <!-- Mostrar Título y Fecha de los Botones -->
                                    <button type="button" class="btn btn-light border border-dark boton-central" style="width: 200px" onclick="window.location.href = 'index.php?id_nota=' + <?php echo $row['id_nota']; ?>">
                                        <a class="a-nota"><?php echo $row['titulo'] ?>
                                            <?php echo $row['fecha'] ?></a>
                                    </button>
                                    <!-- Mostrar Título y Fecha de los Botones -->

                                    <!-- Mostrar botón elmininar con la id de su nota -->
                                    <button type="button" onclick="confirmarBorrar(<?php echo $row['id_nota']; ?>)" class="btn btn-danger border border-dark delete-button boton-derecho" style="width: 100px">
                                        <a class="icon-nota"><i class="bi bi-x-lg"></i></a>
                                    </button>
                                    <!-- Mostrar botón elmininar con la id de su nota -->
                                    <!-- Mostrar Notas en Botones -->

                                </div>
                            </div>
                        <?php } ?>
                        <!-- Mostrar Notas en Botones -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Offcanvas -->

    </header>
    <div class="row m-0">
        <div class="col-lg-3 d-md-none d-sm-none d-none d-lg-block p-2 bg-warning text-center border-end border-dark">
            <h4>Notas:</h4>
            <div class="d-flex flex-column bd-highlight menu-notas">
                <div id="lista" class="lista">

                    <!-- Mostrar Notas en Botones -->
                    <?php foreach ($resultado as $row) { ?>
                        <div class="bd-highlight m-2 p-2">
                            <div class="btn-group grupo-boton" role="group" aria-label="Basic example">
                                <button type="button" class="btn p-3 btn-dark border border-dark boton-izquierdo" style="width: 100px">

                                    <!-- Mostrar Iconos -->
                                    <?php

                                    $id_icono = $row['id_icono'];

                                    $resultado_iconos = $con->query('SELECT link_icono FROM iconos WHERE id_icono = ' . $id_icono);
                                    $resultado_iconos->execute();
                                    $valor = $resultado_iconos->fetchColumn();

                                    echo $valor;

                                    ?>
                                    <!-- Mostrar Iconos -->

                                </button>

                                <!-- Mostrar Título y Fecha de los Botones -->
                                <button type="button" class="btn btn-light border border-dark boton-central" style="width: 200px" onclick="window.location.href = 'index.php?id_nota=' + <?php echo $row['id_nota']; ?>">
                                    <a class="a-nota"><?php echo $row['titulo'] ?>
                                        <?php echo $row['fecha'] ?></a>
                                </button>
                                <!-- Mostrar Título y Fecha de los Botones -->

                                <!-- Mostrar botón elmininar con la id de su nota -->
                                <button type="button" onclick="confirmarBorrar(<?php echo $row['id_nota']; ?>)" class="btn btn-danger border border-dark delete-button boton-derecho" style="width: 100px">
                                    <a class="icon-nota"><i class="bi bi-x-lg"></i></a>
                                </button>
                                <!-- Mostrar botón elmininar con la id de su nota -->
                                <!-- Mostrar Notas en Botones -->

                            </div>
                        </div>
                    <?php } ?>
                    <!-- Mostrar Notas en Botones -->

                </div>
            </div>
        </div>
        <div id="texto_notas" class="col-lg-9 bg-light">
            <div class="row m-0">

                <!-- Mostrar Cuerpo (Titulo, Fecha y Textarea) -->
                <?php

                function formatearFecha($fecha) {
                    $meses = array(
                    'January' => 'enero',
                    'February' => 'febrero',
                    'March' => 'marzo',
                    'April' => 'abril',
                    'May' => 'mayo',
                    'June' => 'junio',
                    'July' => 'julio',
                    'August' => 'agosto',
                    'September' => 'septiembre',
                    'October' => 'octubre',
                    'November' => 'noviembre',
                    'December' => 'diciembre'
                    );

                    $timestamp = strtotime($fecha);
                    $dia = date("d", $timestamp);
                    $mes = date('F', $timestamp);
                    $anio = date('Y', $timestamp);
                    $hora = date('H', $timestamp);
                    $minuto = date('i', $timestamp);
                    $am_pm = date('A', $timestamp);

                    $mesEspanol = $meses[$mes];

                    $fechaFormateada = $dia . ' de ' . $mesEspanol . ' de ' . $anio . ' a las ' . $hora . ':' . $minuto . $am_pm;

                    return $fechaFormateada;
                }

                $id_nota = isset($_GET['id_nota']) ? $_GET['id_nota'] : null;

                if ($id_nota) {
                    $resultado = $con->query('SELECT titulo, fecha, texto, id_nota FROM notas WHERE id_nota = ' . $id_nota);
                    $row = $resultado->fetch();
                    echo '<div id="texto_notas" class="col-9 p-2 bg-light">
                    <h4 class="text-end"></h4>
                    <div id="titulo_nota">
                        <h1>' . $row['titulo'] . '</h1><h5>' . formatearFecha($row["fecha"]) . '</h5>
                    </div>
                    <form id="form_textarea" method="post">
                        <textarea class="textarea_notas text-bad-script" spellcheck="false" name="reg_texto" id="area_texto">' . $row['texto'] . '</textarea>
                        <input type="hidden" name="reg_id_nota" id="id_nota" value="' . $row['id_nota'] . '">
                        <script type="text/javascript" src="script/textarea.js"></script>
                    </form>
                </div>';
                } else {
                    echo '<div class="text-center seleccion-notas">
                                <h1>Selecciona o crea una nota para empezar a editar</h1>
                                <hr>
                                <h1><i class="bi bi-pencil-square"></i></h1>
                            </div>';
                }
                ?>
                <!-- Mostrar Cuerpo (Titulo, Fecha y Textarea) -->

            </div>
        </div>
    </div>

    <!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Bootsrap -->
    <!-- Alarma script -->
    <script src="./script/alarma.js"></script>
    <!-- Alarma script -->

</body>

</html>