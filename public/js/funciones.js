//Tabla_Retenciones_add.php
function subirarchivo() {
 
  self.name = "opener";
  remote = open(
    "gestion_archivo.php",
    "remote",
    "width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes"
  );
  remote.focus();
}

/* function mueveReloj() {
  momentoActual = new Date();
  hora = momentoActual.getHours();
  minuto = momentoActual.getMinutes();
  segundo = momentoActual.getSeconds();

  str_segundo = new String(segundo);
  if (str_segundo.length == 1) segundo = "0" + segundo;

  str_minuto = new String(minuto);
  if (str_minuto.length == 1) minuto = "0" + minuto;

  str_hora = new String(hora);
  if (str_hora.length == 1) hora = "0" + hora;

  horaImprimible = hora + " : " + minuto + " : " + segundo;

  document.form_reloj.reloj.value = horaImprimible;

  setTimeout("mueveReloj()", 1000);
}
 */
// Tramites_edit_prof.php
function llenar_textbox() {
  var asistencia = document.querySelector("#t_Asistencia").value;
  var peticion = document.querySelector("#strpeticionE").value;

  var radio = document.querySelector("#radio").value;

  console.log(peticion + " " + asistencia);
  console.log(radio);
  document.frmAbogadoEditar.strunionE.value = peticion + " - " + asistencia;
}
//Llenar el codigo de barras con los tres campos carro, fila, caja y carpeta, para laq carpeta

$(document).ready(function () {
  

  valor1 = "";
  valor2 = "";
  valor3 = "";
  valor4 = "";
  union = "";

  $("#carro").blur(function () {
    var valor = $(this).val();

    $("#imagen1").val(valor);
    $("#codbarrec").val(valor);
  });

  $("#fila").blur(function () {
    var valor = $(this).val();
    var valor1 = $("#codbarrec").val();
    var valor2 = $("#imagen1").val();
    $("#imagen1").val(valor1 + valor);
    $("#codbarrec").val(valor2 + valor);
  });

  $("#caja").blur(function () {
    var valor = $(this).val();
    var valor1 = $("#codbarrec").val();
    var valor2 = $("#imagen1").val();
    $("#imagen1").val(valor1 + valor);
    $("#codbarrec").val(valor2 + valor);
  });

  $("#numCarpeta").blur(function () {
    var valor = $(this).val();
    var valor1 = $("#codbarrec").val();
    var valor2 = $("#imagen1").val();
    $("#imagen1").val(valor1 + valor);
    $("#codbarrec").val(valor2 + valor);
  });

  // cargar el nombre del archivo en el input de seleccionar arechivo
  $("#customFileLang").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
});

//}

