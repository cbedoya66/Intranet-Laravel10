<?php


$hostname = "p:localhost";
$database = "personeria";
$username = "root";
$password = "";


try {
    $conexionusuario = new mysqli($hostname, $username, $password, $database);
    $conexionusuario->set_charset("utf8");
} catch (Exception $e) {
    echo $e->getMessage();
}
//hay dos formas de conectarme a la BD
//$conexionusuario = mysqli_connect($hostname, $username, $password, $database);


if (mysqli_connect_errno()) {
    echo '<script language="javascript">alert("La conexión a la BD Fue fallida, Base de datos no existe");</script>';
}


$table = "tramits";
$columns = ['id', 'fecha', 'intcedula', 'strnombres', 'strprofesional', 'strpeticion', 'email', 'strobservaciones', 'edad', 'poblacion', 'strnacionalidad'];
$campo =  isset($_POST['campo']) ? mysqli_real_escape_string($conexionusuario, trim($_POST['campo'])) : null;
$campo1 =  isset($_POST['campo1']) ? mysqli_real_escape_string($conexionusuario, trim($_POST['campo1'])) : null;
$campo2 =  isset($_POST['campo2']) ? mysqli_real_escape_string($conexionusuario, trim($_POST['campo2'])) : null;

var_dump($table);
//Generamos el filtro
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%'  OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

if ($campo1 != null) {
    $where = "WHERE (";
    $where .= 'poblacion' . " LIKE '%" . $campo1 . "%' OR ";
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


if ($campo2 != null) {
    $where = "WHERE (";
    $where .= 'strnacionalidad' . " LIKE '%" . $campo2 . "%' OR ";
    $where = substr_replace($where, "", -3);
    $where .= ")";
}
//Calcular el limite y paginacion de registros
$limite =  isset($_POST['registros']) ? mysqli_real_escape_string($conexionusuario, trim($_POST['registros'])) : 10;
$pagina =  isset($_POST['pagina']) ? mysqli_real_escape_string($conexionusuario, trim($_POST['pagina'])) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limite;
}

$query_limite = " LIMIT $inicio, $limite";

//Crear el ordenamiento
$sOrder = "";
if (isset($_POST['orderCol'])) {
    $orderCol = $_POST['orderCol'];
    $orderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'desc ';

    $sOrder = "ORDER BY " . $columns[intval($orderCol)] . ' ' . $orderType;
}


//cONSULTA PARA EL TOTAL DE REGISTROS FILTRADOS
$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$query_limite ";
$Recordset =  mysqli_query($conexionusuario, $query) or die(mysqli_error($conexionusuario));
$num_Recordset = mysqli_num_rows($Recordset);


$query_Filtro = "SELECT FOUND_ROWS()";
$result_Filtro = mysqli_query($conexionusuario, $query_Filtro) or die(mysqli_error($conexionusuario));
$row_Filtro = mysqli_fetch_array($result_Filtro);
$total_Filtro = $row_Filtro[0];


//cONSULTA PARA EL TOTAL DE REGISTROS FILTRADOS
$id = 'id';

$query_Total = "SELECT count($id) FROM $table";
$result_Total = mysqli_query($conexionusuario, $query_Total) or die(mysqli_error($conexionusuario));
$row_Total = mysqli_fetch_array($result_Total);
$total_Registros = $row_Total[0];

return  $Recordset;
//Mostrar resultados
$output = [];
$output['total_Registros'] = $total_Registros;
$output['total_Filtro'] = $total_Filtro;
$output['data'] = '';
$output['paginacion'] = '';


if ($num_Recordset > 0) {
    while ($row = $Recordset->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td height="39">' . $row['id'] . '</td>';
        $output['data'] .= '<td>' . $row['fecha'] . '</td>';
        $output['data'] .= '<td>' . $row['intcedula'] . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['strnombres'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['strprofesional'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['strpeticion'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td width="800">' . htmlentities($row['strobservaciones'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['email'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['edad'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['poblacion'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td>' . htmlentities($row['strnacionalidad'], ENT_COMPAT, 'UTF-8') . '</td>';
        $output['data'] .= '<td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="submit" class="btn btn-secondary btn-sm" id="editar">✏</button><p>&nbsp;</p><p>&nbsp;</p>
        <button type="submit" class="btn btn-danger btn-sm" id="delete"  >🗑</button><p>&nbsp;</p><p>&nbsp;</p>
        <form method="post" action="encuestaUsuario.php?cedula=' . $row['intcedula'] . '&recordID=' . $row['id'] . '"><button type="submit" class="btn btn-success btn-sm">📰</button></form>
      </div>
    </td>';
        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan = "7">NO SE ENCUENTRAN RESULTADOS PARA ESTA CONSULTA</td>';
    $output['data'] .= '</tr>';
}

//calcular paginas en total
if ($output['total_Registros'] > 0) {
    $totalPaginas = ceil($output['total_Registros'] / $limite);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class = "pagination">';

    //PARA MOSTRAR SOLO CIERTA CANTIDAD DE PAGINAS EN EL PAGINADOR, QUE EN ESTE CASO SERÍA 9
    $numeroInicio = 1;
    if (($pagina - 4) > 1) {
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;
    //si el numero fianal de paginas no exede el total de paginas de la consulta
    if ($numeroFin > $totalPaginas) {
        $numeroFin = $totalPaginas;
    }



    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage
        (' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

return $output;

//lo retornamos con formato JSON  y si trae algun caracter especial JSON_UNESCAPED_UNICODE
//var_dump(json_encode($output, JSON_UNESCAPED_UNICODE));