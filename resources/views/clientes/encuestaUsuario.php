<?php
session_start();

// *** Valido si hay sesion iniciada o no.

if (!isset($_SESSION['MM_NomUser'])) {
  echo
  '
  <script>
  alert("Debes iniciar sesión");
  window.location="../users/index_users.php";
  </script>
  ';
  session_destroy();
  die(); //para que no siga ejecutando el codigo que hay abajo
} else {


  include('../Connections/conexionusuario.php');
  include('../includes/users_head.php');  //require_once('../includes/authorizedUsers.php');
  include('../includes/GetSQLValueString.php');
  include('../controllers/controllers_users_client/conexiones_BD.php');
}

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



  $insertSQL = sprintf(
    "INSERT INTO encuesta_usuario (id,fecha,atencionExcelente,
          atencionBueno,atencionRegular,atencionMalo,asesoriaExcelente,asesoriaBueno,asesoriaRegular,asesoriaMalo,
          tiempoExcelente,tiempoBueno,tiempoRegular,tiempoMalo,espaciosExcelente,espaciosBueno,espaciosRegular,
          espaciosMalo,satisfaccionExcelente,satisfaccionBueno,satisfaccionRegular,satisfaccionMalo,observaciones,funcionario,nombreUsuario,
          cedula,telefono,direccion,email) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,
          %s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
    GetSQLValueString($_POST['id'], "int"),
    GetSQLValueString($_POST['fecha'], "date"),
    GetSQLValueString($_POST['atencionExcelente'], "text"),
    GetSQLValueString($_POST['atencionBueno'], "text"),
    GetSQLValueString($_POST['atencionRegular'], "text"),
    GetSQLValueString($_POST['atencionMalo'], "text"),
    GetSQLValueString($_POST['asesoriaExcelente'], "text"),
    GetSQLValueString($_POST['asesoriaBueno'], "text"),
    GetSQLValueString($_POST['asesoriaRegular'], "text"),
    GetSQLValueString($_POST['asesoriaMalo'], "text"),
    GetSQLValueString($_POST['tiempoExcelente'], "text"),
    GetSQLValueString($_POST['tiempoBueno'], "text"),
    GetSQLValueString($_POST['tiempoRegular'], "text"),
    GetSQLValueString($_POST['tiempoMalo'], "text"),
    GetSQLValueString($_POST['espaciosExcelente'], "text"),
    GetSQLValueString($_POST['espaciosBueno'], "text"),
    GetSQLValueString($_POST['espaciosRegular'], "text"),
    GetSQLValueString($_POST['espaciosMalo'], "text"),
    GetSQLValueString($_POST['satisfaccionExcelente'], "text"),
    GetSQLValueString($_POST['satisfaccionBueno'], "text"),
    GetSQLValueString($_POST['satisfaccionRegular'], "text"),
    GetSQLValueString($_POST['satisfaccionMalo'], "text"),
    GetSQLValueString($_POST['observaciones'], "text"),
    GetSQLValueString($_POST['funcionario'], "text"),
    GetSQLValueString($_POST['nombreUsuario'], "text"),
    GetSQLValueString($_POST['cedula'], "text"),
    GetSQLValueString($_POST['telefono'], "text"),
    GetSQLValueString($_POST['direccion'], "text"),
    GetSQLValueString($_POST['email'], "text")
  );

  $Result1 = mysqli_query($conexionusuario, $insertSQL) or die(mysqli_error($conexionusuario));

  $insertGoTo = "encuestaUsuario.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));


$varCedula_Recordset = "";
if (isset($_GET["cedula"])) {
  $varCedula_Recordset = $_GET["cedula"];
}
$query_Recordset = sprintf("SELECT * FROM tblusuarios WHERE tblusuarios.intcedula=%s", GetSQLValueString($varCedula_Recordset, "text"));
$Recordset = mysqli_query($conexionusuario, $query_Recordset) or die(mysqli_error($conexionusuario));
$row_Recordset = mysqli_fetch_assoc($Recordset);
$totalRows_Recordset = mysqli_num_rows($Recordset);



$query_Recordset4 = "SELECT * FROM tblprofesional ORDER BY tblprofesional.profesional ASC ";
$Recordset4 = mysqli_query($conexionusuario, $query_Recordset4) or die(mysqli_error($conexionusuario));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);


$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (
      stristr($param, "pageNum_Recordset1") == false &&
      stristr($param, "totalRows_Recordset1") == false
    ) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}

$varId_Recordset = "0";
if (isset($_GET["recordID"])) {
  $varId_Recordset = $_GET["recordID"];
}

$query_Recordset6 = sprintf("SELECT * FROM tbltramites WHERE  tbltramites.id=%s ", GetSQLValueString($varId_Recordset, "text"));
$Recordset6 = mysqli_query($conexionusuario, $query_Recordset6) or die(mysqli_error($conexionusuario));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

?>
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/plantillasencilla.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Plantilla Principal</title>
  <!-- InstanceEndEditable -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" user-scalable="no" , initial-scale=1, maximun-scale=1, minimun-scale=1 />
  <link type="text/css" rel="stylesheet" href="../public/cssStyles/bootstrap.min.css" media="screen,projection" />
  <script type="text/javascript" src="../public/js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../public/cssStyles/estilosmenu.css">
  <script src="../public/js/sweetalert.min.js"></script>
  <!-- InstanceBeginEditable name="head" -->
  <!-- InstanceEndEditable -->
</head>
<style type="text/css">
  .container {
    border: 1px solid #d0d0d0;
    background: #EAFAF1;
    border: 1px solid #CBC4C2;
    width: 100%;
    margin: 10px;
  }

  .blanco {
    border: 1px solid #d0d0d0;
    background: #fff;
  }

  .blancotd {
    color: #fff;
  }

  .btn:hover {
    background: #F4F6F6;
    color: #000;
  }

  label {
    font-size: 16px;
  }

  .tamaño100 {
    width: 100%;
  }

  .izquierda {
    width: 50%;
    color: #fff;
    font-size: 30px;
  }

  nav {
    z-index: 1000;
  }

  td {
    font-size: 12px;

  }

  .barra {
    width: 100%;
  }

  .encabezado {
    width: 30%;
  }

  .progress {
    height: 25px !important;
  }

  .progress-bar {
    font-size: 1.5em !important;
  }

  table {
    margin: 0 10px !important;
  }

  .form-check-input {
    align-items: center !important;
  }

  .input-group {
    margin: 10px 0 !important;
  }

  .bg-success,
  .btn-success {
    background-color: #690 !important;
  }
</style>

<p>&nbsp;</p>
<div class="container">
  <p>&nbsp;</p>
  <h6><strong>USUARIO ACTIVO.... <?php echo $_SESSION['MM_NomUser']; ?></strong></h6>
  <p>&nbsp;</p>
</div>
<div class="container">
  <form  action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
          <h3>ENCUESTA DE SATISFACCIÓN</h3>
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">FECHA</span>
            <input name="fecha" type="date" class="form-control" placeholder="Fecha" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $row_Recordset6['fecha'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <table height="15" class="table table-bordered table-hover table-sm">
          <thead>
            <td class="bg-success blancotd" width="400">
              <h4>ITEMS</h4>
            </td>
          </thead>
          <tbody>
            <tr>
              <td>
                <h6>¿Cómo califica usted la atención y amabilidad del funcionario que resolvió su solicitud?</h6>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="atencionExcelente" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Excelente</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="atencionBueno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Bueno</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="atencionRegular" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Regular</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="atencionMalo" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Malo</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <h6>¿Cómo califica usted la asesoría y/o realización del trámite brindado por el o los funcionarios de la Personería?</h6>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="asesoriaExcelente" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Excelente</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="asesoriaBueno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Bueno</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="asesoriaRegular" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Regular</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="asesoriaMalo" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Malo</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <h6>¿Cómo califica usted el tiempo esperado para ser atendido?</h6>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="tiempoExcelente" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Excelente</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="tiempoBueno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Bueno</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="tiempoRegular" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Regular</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="tiempoMalo" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Malo</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <h6>¿Cómo califica usted los espacios físicos de la Personería Municipal para la prestación del servicio?</h6>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="espaciosExcelente" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Excelente</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="espaciosBueno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Bueno</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="espaciosRegular" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Regular</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="espaciosMalo" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Malo</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <h6>¿Cuál es el grado de satisfacción en general que tiene con la Personería Municipal de Sabaneta?</h6>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="satisfaccionExcelente" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Excelente</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="satisfaccionBueno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Bueno</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="satisfaccionRegular" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Regular</label>
                </div>
              </td>
              <td>
                <div class="form-check form-switch">
                  <input name="satisfaccionMalo" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="Excelente">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Malo</label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">Observaciones</span>
        <textarea name="observaciones" class="form-control" aria-label="With textarea"></textarea>
      </div>


      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Abogado</span>
        <select name="funcionario" class="form-control" id="exampleFormControlSelect1">
          <option value="<?php echo $row_Recordset6['strprofesional'] ?>"><?php echo $row_Recordset6['strprofesional'] ?></option>
        </select>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Cédula</span>
        <input name="cedula" type="text" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="<?php echo $row_Recordset['intcedula'] ?>">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre Usuario</span>
        <input name="nombreUsuario" type="text" class="form-control" placeholder="Nombre Usuario" aria-label="Nombre Usuario" aria-describedby="basic-addon1" value="<?php echo $row_Recordset['strnombres'] ?>">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Teléfono</span>
        <input name="telefono" type="text" class="form-control" placeholder="Teléfono" aria-label="Teléfono" aria-describedby="basic-addon1" value="<?php echo $row_Recordset['strtelefono'] ?>">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Dirección</span>
        <input name="direccion" type="text" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon1" value="<?php echo $row_Recordset['strdireccion'] ?>">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input name="email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?php echo $row_Recordset['email'] ?>">
      </div>

      <div class="form-row">
        <div class="col-md-2 mb-2">
          <button  type="submit" class="btn btn-success form-control cambiar_color">Adicionar Encuesta</button>
          <input type="hidden" name="MM_insert" value="form1" />
        </div>
      </div>

  </form>

</div>

</div>
<p>&nbsp;</p>







<p>&nbsp;</p>

<!-- Modal -->
<form action="../reportes/reporte_discapacidad.php" method="GET" name="form3" id="form3" target="print_popup">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rango de fechas para el reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputFecha1">Fecha Inicio</label>
            <input type="date" name="fechaInicio" class="form-control" id="fechaInicio">
          </div>
          <div class="form-group">
            <label for="exampleInputFecha2">Fecha Final</label>
            <input type="date" name="fechaFinal" class="form-control" id="fechaFinal">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success form-control cambiar_color">Reporte</button>

        </div>
      </div>
    </div>
  </div>
</form>

<form action="../reportes/reporte_tramites.php" method="GET" name="form3" id="form3" target="print_popup">
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rango de fechas para el reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputFecha1">Fecha Inicio</label>
            <input type="date" name="fechaInicio" class="form-control" id="fechaInicio">
          </div>
          <div class="form-group">
            <label for="exampleInputFecha2">Fecha Final</label>
            <input type="date" name="fechaFinal" class="form-control" id="fechaFinal">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success form-control cambiar_color">Reporte</button>

        </div>
      </div>
    </div>
  </div>
</form>

<form action="../reportes/reporte_poblacion.php" method="GET" name="form3" id="form3" target="print_popup">
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rango de fechas para el reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputFecha1">Fecha Inicio</label>
            <input type="date" name="fechaInicio" class="form-control" id="fechaInicio">
          </div>
          <div class="form-group">
            <label for="exampleInputFecha2">Fecha Final</label>
            <input type="date" name="fechaFinal" class="form-control" id="fechaFinal">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success form-control cambiar_color">Reporte</button>

        </div>
      </div>
    </div>
  </div>
</form>

<!--        -->


<footer class="tamaño100">
  <p>Intranet Corporativa Versión 2.0.0 Copyright 2021 .César A Bedoya Gómez. Reservados Todos los derechos. </p>
</footer>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>