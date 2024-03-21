window.addEventListener("DOMContentLoaded", () => {
  const adicionar = document.querySelector("#cont_form_Adicionar");
  const editar = document.querySelector("#cont_form_Editar");
  //const cont_consultas =document.getElementById('contenedor_consultas');
  const editarTA = document.querySelector("#cont_form_EditarTA");
  const cambiarAbogado = document.querySelector("#cont_form_CambiarA");
  const error_container = document.querySelector("#error_container");
  const searchCedula = document.querySelector("#cedula");
  const boton = document.querySelector("#guardarUsuario");
  const cont_Radicado = document.querySelector("#cont_Radicado");
  const cont_add_Radicado = document.querySelector("#cont_add_Radicado");
  const tabla = document.querySelector("#table");
  const tabla1 = document.querySelector("#table1");

  let searchCriterio = "";
  //let searchCriterioRadicado = "";

  if (searchCedula) {
    searchCedula.addEventListener("input", (event) => {
      searchCriterio = event.target.value;
      showResultado();
    });
  }

  //Enviar peticion
  const searchData = async () => {
    //enviar parametros
    let formData = new FormData();
    formData.append("searchCriterio", searchCriterio);

    try {
      const response = await fetch(
        "api/buscar",
        {
          method: "POST",
          body: formData,
        }
      );

      return response.json();
    } catch (error) {
      alert(
        `${"Hubo un error y no podemos procesar la solicitud en este momento. Razones:"}${
          error.message
        }`
      );
    }
  };

  //funcion para mostarr los datos
  const showResultado = () => {
    searchData().then((dataresults) => {
      if (typeof dataresults.data !== "undefined" && !dataresults.data) {
        error_container.style.display = "block";
        error_container.querySelector("p").innerHTML = `
        No hay resultados para el criterio de busqueda: ${searchCriterio}`;
        $("#intcedula").val("");
        $("#strnombres").val("");
        $("#strdireccion").val("");
        $("#strsector").val("");
        $("#strtelefono").val("");
        $("#strnacionalidad").val("");
        $("#edad").val("");
        $("#email").val("");
        $("#poblacion").val("");
        //Editar
        $("#intcedulaE").val("");
        $("#strnombresE").val("");
        $("#strdireccionE").val("");
        $("#strsectorE").val("");
        $("#strtelefonoE").val("");
        $("#strnacionalidadE").val("");
        $("#edadE").val("");
        $("#emailE").val("");
        $("#poblacionE").val("");
      } else {
        error_container.style.display = "none";
        for (const usuario of dataresults) {
          $("#id").val(usuario.id);
          $("#intcedula").val(usuario.intcedula);
          $("#strnombres").val(usuario.strnombres);
          $("#strdireccion").val(usuario.strdireccion);
          $("#strsector").val(usuario.strsector);
          $("#strtelefono").val(usuario.strtelefono);
          $("#strnacionalidad").val(usuario.strnacionalidad);
          $("#edad").val(usuario.edad);
          $("#email").val(usuario.email);
          $("#poblacion").val(usuario.poblacion);
        }
      }
    });
  };

  //Editar

  $(document).on("click", "tr td #editar", function (e) {
    adicionar.style.display = "none";
    editar.style.display = "block";
    //cont_consultas.style.display = "none";

    const inputs = document.getElementsByClassName("editar");
    console.log(inputs);
    const numInputs = inputs.length;
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }
  });

  //Editar Radicado Recibido

  $(document).on("click", "tr td #editarRadRec", function (e) {
    adicionar.style.display = "none";
    editar.style.display = "block";
    $("#nroRadicadoE").focus();

    const inputs = document.getElementsByClassName("editar");
    console.log(inputs);
    const numInputs = inputs.length;
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }

    let codigo = document.getElementById("codbarrecE").value;
    $("#imagen1E").val(codigo);
  });

  //Editar Radicado Enviado

  $(document).on("click", "tr td #editarRadEnv", function (e) {
    adicionar.style.display = "none";
    editar.style.display = "block";
    $("#nroRadicadoE").focus();

    const inputs = document.getElementsByClassName("editar");
    console.log(inputs);
    const numInputs = inputs.length;
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }

    let codigo = document.getElementById("codbarenvE").value;
    $("#imagen1E").val(codigo);
  });

  //Editar Tramite Abogado
  $(document).on("click", "tr td #editarTA", function (e) {
    //adicionar.style.display = "none";
    editarTA.style.display = "block";
    $("#intcedula").focus();
    const inputs = document.getElementsByClassName("editar");
    const numInputs = inputs.length;
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }
  });

  //Cambiar Abogado
  $(document).on("click", "tr td #cambiarAbogado", function (e) {
    cambiarAbogado.style.display = "block";
    $("#strprofesionalCambiar").focus();
    const inputs = document.getElementsByClassName("editarA");
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = 0;
    for (let index of inputs) {
      index.value = data[count].textContent;
      count += 4;
    }
  });

  //Editar Tabla Radicado Recibido
  $(document).on("click", "tr td #editarTablaRec", function (e) {
    const btneditarRec = document.querySelector("#actualizarRecibido");
    const btneditarEnv = document.querySelector("#actualizarEnviado");
    btneditarRec.style.display = "block";
    btneditarEnv.style.display = "none";

    $("#nroRadicado").focus();

    const inputs = document.getElementsByClassName("editar");
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }
  });

  //Editar Tabla Radicado Recibido
  $(document).on("click", "tr td #editarTablaEnv", function (e) {
    const btneditarRec = document.querySelector("#actualizarRecibido");
    const btneditarEnv = document.querySelector("#actualizarEnviado");
    btneditarRec.style.display = "none";
    btneditarEnv.style.display = "block";

    $("#nroRadicado").focus();

    const inputs = document.getElementsByClassName("editar");
    let data = e.target.parentElement.parentElement.parentElement.children;
    let count = -1;
    for (let index of inputs) {
      count += 1;
      index.value = data[count].textContent;
    }
  });

  //Llamar archivo PDF Recibido
  $(document).on("click", "tr td #archivoRecibidos", function (e) {
    id = $(this).parents("tr").find("td:first").text();
    archivoPDFRecibido(id);
  });


  //Llamar archivo PDF Enviado
  $(document).on("click", "tr td #archivoEnviado", function (e) {
    id = $(this).parents("tr").find("td:first").text();
    archivoPDFEnviado(id);
  });

  //Botón cancelar
  $(document).on("click", "#cancelar", (e) => {
    e.preventDefault();
    adicionar.style.display = "block";
    editar.style.display = "none";
    cont_consultas.style.display = "block";
  });

  //Botón cancelar TA
  $(document).on("click", "#cancelarTA", (e) => {
    e.preventDefault();
    editarTA.style.display = "none";
  });

  //Botón cancelar Cambio Abogado
  $(document).on("click", "#cancelarCA", (e) => {
    e.preventDefault();
    cambiarAbogado.style.display = "none";
  });

  //Activar Tablas de modulo Administrador
  $("#regUsuario").on("click", function (e) {
    e.preventDefault();
    const tableContrasena = document.getElementById("tableContrasena");
    const tableProfesional = document.getElementById("tableProfesional");
    const tableSemaforo = document.getElementById("tableSemaforo");
    const tableCargarImagen = document.getElementById("tableCargarImagen");

    tableContrasena.style.display = "block";
    tableProfesional.style.display = "none";
    tableSemaforo.style.display = "none";
    tableCargarImagen.style.display = "none";

    tableContrasena.focus();
  });

  $("#regProfesional").on("click", function (e) {
    e.preventDefault();
    const tableContrasena = document.getElementById("tableContrasena");
    const tableProfesional = document.getElementById("tableProfesional");
    const tableSemaforo = document.getElementById("tableSemaforo");
    const tableCargarImagen = document.getElementById("tableCargarImagen");

    tableContrasena.style.display = "none";
    tableProfesional.style.display = "block";
    tableSemaforo.style.display = "none";
    tableCargarImagen.style.display = "none";

    tableProfesional.focus();
  });

  $("#regFestivos").on("click", function (e) {
    e.preventDefault();
    const tableContrasena = document.getElementById("tableContrasena");
    const tableProfesional = document.getElementById("tableProfesional");
    const tableSemaforo = document.getElementById("tableSemaforo");
    const tableCargarImagen = document.getElementById("tableCargarImagen");

    tableContrasena.style.display = "none";
    tableProfesional.style.display = "none";
    tableSemaforo.style.display = "block";
    tableCargarImagen.style.display = "none";

    tableSemaforo.focus();
  });

  $("#regImagen").on("click", function (e) {
    e.preventDefault();
    const tableContrasena = document.getElementById("tableContrasena");
    const tableProfesional = document.getElementById("tableProfesional");
    const tableSemaforo = document.getElementById("tableSemaforo");
    const tableCargarImagen = document.getElementById("tableCargarImagen");

    tableContrasena.style.display = "none";
    tableProfesional.style.display = "none";
    tableSemaforo.style.display = "none";
    tableCargarImagen.style.display = "block";

    tableCargarImagen.focus();
  });

  //Botón cambiar a luz
  $(document).on("click", "#sol", (e) => {
    e.preventDefault();
    tabla.classList.remove("table-dark");
    tabla1.classList.remove("table-dark");
  });

  //Botón cambiar a oscuro
  $(document).on("click", "#luna", (e) => {
    e.preventDefault();
    tabla.classList.add("table-dark");
    tabla1.classList.add("table-dark");
  });

   //Botón Actualizar Tramite
   $(document).on("click", "#actTramite", () => {
    window.location.reload();
  });


});

//guardar usuario
function guardar() {
  let datos = $("#frmUsuario").serialize();
  const error_container = document.querySelector("#error_container");
  const cont_form = document.querySelector("#frmUsuario");

  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_client/load_Insert_Usuario.php",
    data: datos,
    success: function () {
      cont_form.reset();
      document.querySelector("#cedula").value = "";
      error_container.style.display = "none";
      window.location.reload();
    },
  });

 /*   $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_client/load_Insert_Usuario.php",
    data: datos,
    success: function () {
      // e.preventDefault();
      cont_form.reset();
      document.querySelector("#cedula").value = "";
      error_container.style.display = "none";
      window.location.reload();
    },
  });  */
}

//editar usuario
function editarTramite() {
  const adicionar = document.querySelector("#cont_form_Adicionar");
  const editar = document.querySelector("#cont_form_Editar");
  const cont_consultas =document.getElementById('contenedor_consultas');
  let datos = $("#frmUsuarioEditar").serialize();
  const cont_form_Editar = document.querySelector("#frmUsuarioEditar");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_client/load_Update.php",
    data: datos,
    success: function () {
      cont_form_Editar.reset();
      //e.preventDefault();
      adicionar.style.display = "block";
      editar.style.display = "none";
      cont_consultas.style.display = "block";
    },
  });
}

//editar Trámitr Abogado
function editarTramiteAbogado() {
  //const adicionar = document.querySelector("#cont_form_Adicionar");
  const editarTA = document.querySelector("#cont_form_EditarTA");
  let datos = $("#frmAbogadoEditar").serialize();
  const cont_form_EditarTA = document.querySelector("#frmAbogadoEditar");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Abogado/load_Update_Abogado.php",
    data: datos,
    success: function () {
      cont_form_EditarTA.reset();
      editarTA.style.display = "none";

    },
  });
}

//Cambiar Abogado
function cambiarAbogado() {
  //const adicionar = document.querySelector("#cont_form_Adicionar");
  const cambiarAbogado = document.querySelector("#cont_form_CambiarA");
  let datosTA = $("#frmAbogadoCambiar").serialize();
  const cont_form_CambiarA = document.querySelector("#frmAbogadoCambiar");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Abogado/load_Cambio_Abogado.php",
    data: datosTA,
    success: function () {
      cont_form_CambiarA.reset();
      cambiarAbogado.style.display = "none";
    },
  });
}
/*  */
//Eliminar tramite
function eliminar(id) {
  let idEliminar = id;
  let modulo = 1;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_client/load_delete.php",
    data: { idEliminar: idEliminar, modulo: modulo },
    success: function (e) {
      e.preventDefault(getData());
    },
  });
}

//Eliminar tramite
function eliminarUsuario(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_client/load_delete_Usuario.php",
    data: { idEliminar: idEliminar },
    success: function (e) {
      e.preventDefault(getData());
    },
  });
}

//**********************************************RADICADOS ************************************ */


//Eliminar Radicados Recibidos
function eliminarRadicadosRecibidos(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_delete_Radicados_Recibidos.php",
    data: { idEliminar: idEliminar },
    success: function () {
      location.reload();
      //getData();
    },
  });
}

//Eliminar Radicados Enviados
function eliminarRadicadosEnviados(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_delete_Radicados_Enviados.php",
    data: { idEliminar: idEliminar },
    success: function () {
      window.location.reload();
      //getData();
    },
  });
}

//guardar Radicado Recibido
function guardarRadRecibido() {
  let datos = $("#frmRadRecibido").serialize();
  const cont_form_RadRecibido = document.querySelector("#frmRadRecibido");

  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_Insert_Recibido.php",
    data: datos,
    success: function () {
      cont_form_RadRecibido.reset();
      window.location.reload();
      //getData();
    },
  });
}

//guardar Radicado Enviado
function guardarRadEnviado() {
  let datos = $("#frmRadEnviado").serialize();
  const cont_form_RadEnviado = document.querySelector("#frmRadEnviado");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_Insert_Enviado.php",
    data: datos,
    success: function () {
      cont_form_RadEnviado.reset();
      window.location.reload();
      //getData();
    },
  });
}

//editar Radicado Recibido
function editarRadicadoRecibido() {
  const adicionar = document.querySelector("#cont_form_Adicionar");
  const editar = document.querySelector("#cont_form_Editar");
  let datos = $("#frmRadRecibidoEditar").serialize();
  const cont_form_Editar = document.querySelector("#frmRadRecibidoEditar");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_Update_Recibidos.php",
    data: datos,
    success: function () {
      cont_form_Editar.reset();
      //e.preventDefault();
      adicionar.style.display = "block";
      editar.style.display = "none";
    },
  });
}

//editar Radicado Recibido
function editarRadicadoEnviado() {
  const adicionar = document.querySelector("#cont_form_Adicionar");
  const editar = document.querySelector("#cont_form_Editar");
  let datos = $("#frmRadEnviadoEditar").serialize();
  const cont_form_Editar = document.querySelector("#frmRadEnviadoEditar");
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_Gestion/load_Update_Enviados.php",
    data: datos,
    success: function () {
      cont_form_Editar.reset();
      //e.preventDefault();
      adicionar.style.display = "block";
      editar.style.display = "none";
    },
  });
}

//**********************************TABLAs CONTRASEÑAS - PROFESIONAL - FESTIVOS ************************** */

//Eliminar Contraseña
function eliminarContrasena(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_admin/load_delete_Contrasena.php",
    data: { idEliminar: idEliminar },
    success: function (e) {
      e.preventDefault(getData());
    },
  });
}

//Eliminar Profesional
function eliminarProfesional(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_admin/load_delete_Profesional.php",
    data: { idEliminar: idEliminar },
    success: function (e) {
      e.preventDefault(getDataP());
    },
  });
}

//Eliminar Profesional
function eliminarFestivo(id) {
  let idEliminar = id;
  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_admin/load_delete_Festivos.php",
    data: { idEliminar: idEliminar },
    success: function (e) {
      e.preventDefault(getDataS());
    },
  });
}

function guardarFestivo() {
  let datos = $("#festivo").serialize();

  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_admin/load_Insert.php",
    data: datos,
    success: function (e) {
      e.preventDefault(getDataS());
    },
  });
}

function guardarImagen() {
  window.reload();
}

//guardar Radicado Recibido
function actualizarRecibido() {
  let datos = $("#frmTablaRecibido").serialize();
  const cont_form_TablaRecibido = document.querySelector("#frmTablaRecibido");

  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_tablaRetencion/load_Update_tablaRecibidos.php",
    data: datos,
    success: function () {
      cont_form_TablaRecibido.reset();
      window.location.reload();
      //getData();
    },
  });
}

//guardar Radicado Recibido
function actualizarEnviados() {
  let datos = $("#frmTablaRecibido").serialize();
  const cont_form_TablaRecibido = document.querySelector("#frmTablaRecibido");

  $.ajax({
    method: "POST",
    url: "http://192.168.1.10/usuariospersoneria-V2/controllers/controllers_users_tablaRetencion/load_Update_tablaEnviados.php",
    data: datos,
    success: function () {
      cont_form_TablaRecibido.reset();
      window.location.reload();
      //getData();
    },
  });
}
