//Alerta para eliminar
$(document).on("click", "tr td #delete", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el registro  " + id + " ?",
    text: "El registro sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminar(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});

//Alerta para eliminar Usuario
$(document).on("click", "tr td #deleteUsuario", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el registro  " + id + " ?",
    text: "El registro sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarUsuario(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});
//Alerta para eliminar Contraseña
$(document).on("click", "tr td #deleteContrasena", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el registro  " + id + " ?",
    text: "El registro sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarContrasena(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});

//Alerta para eliminar Profesional
$(document).on("click", "tr td #deleteProfesional", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el registro  " + id + " ?",
    text: "El registro sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarProfesional(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});

//Alerta para eliminar fESTIVOS
$(document).on("click", "tr td #deleteFestivo", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres eliminar el registro  " + id + " ?",
    text: "El registro sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarFestivo(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});

//Alerta para Radicados Recibidos
$(document).on("click", "tr td #deleteRecibidos", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //document.cookie = "RadicadoRecibido=" + encodeURIComponent(id - 1);
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el Radicado  " + id + " ?",
    text: "El Radicado sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarRadicadosRecibidos(id);
      }
      e.preventDefault();
    }
  });
});

//Alerta para Radicados Enviados
$(document).on("click", "tr td #deleteEnviados", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  //modulo = document.querySelector("#delete").val();
  Swal.fire({
    title: "Realmente quieres eliminar el Radicado  " + id + " ?",
    text: "El Radicado sera eliminado de la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        eliminarRadicadosEnviados(id),
          Swal.fire(
            "Eliminado!",
            "El registro ha sido eliminado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault();
    }
  });
});

//Alerta para Editar Tramite
$(document).on("click", "#editarTramite", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Actualizar el registro   " + id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        editarTramite(),
          Swal.fire(
            "Actualizado!",
            "El registro ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault(getData());
      e.preventDefault(getDataT());
    }
  });
});

//Alerta para Actualizar Trámite Abogado
$(document).on("click", "#editarTramiteAbogado", function (e) {
  e.preventDefault();
  id = document.getElementById("intcedulaE").value;
  Swal.fire({
    title: "Realmente quieres Actualizar el trámite de " + id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    
    if (result.value) {
      if (result.isConfirmed) {
        let peticion = document.querySelector("#strpeticionE").value;
        let union = document.querySelector("#strunion").value;

        if (peticion == "") {
          Swal.fire("Debe seleccionar la petición  !");
        } else if (union == "") {
          Swal.fire("Debe seleccionar Asistencial o Presencial  !");
        } else if (document.querySelector("#radio.form-check-input.check")) {
          editarTramiteAbogado(),
            Swal.fire(
              "Actualizado!",
              "El registro ha sido Actualizado satisfactoriamente.",
              "success"
            );
            window.location.reload();
        } else {
          Swal.fire("Debe cerrar el trámite  !");
        }
      }
      
    }
    
  });
});

//Alerta para Guardar Trámite
$(document).on("click", "#guardarTramite", function (e) {
  e.preventDefault();
  id = document.getElementById("intcedula").value;
  Swal.fire({
    title: "Realmente quieres Guardar el trámite de " + id + " ?",
    text: "El registro sera Guardado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        let cedula = document.querySelector("#intcedula").value;
        let nombres = document.querySelector("#strnombres").value;
        let profesional = document.querySelector("#strprofesional").value;
        let peticion = document.querySelector("#strpeticion").value;

        if (cedula == "") {
          Swal.fire("El campo cédula no puede estar vacio  !");
        } else if (nombres == "") {
          Swal.fire("El campo nombre no puede estar vacio  !");
        } else if (profesional == "") {
          Swal.fire("El campo profesional no puede estar sin Profesional !");
        } else {
          guardar();
        }
      }
      e.preventDefault(getDataT());
    }
  });
});

//Alerta para Cambiar Abogado
$(document).on("click", "#cambioAbogado", function (e) {
  e.preventDefault();
  //d = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Cambiar el Abogado  ",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        cambiarAbogado(),
          Swal.fire(
            "Actualizado!",
            "El Abogado ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault(getDataT());
    }
  });
});

//Alerta para Editar Radicado Recibido
$(document).on("click", "#editarTramiteRecibido", function (e) {
  e.preventDefault();
  //id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Actualizar el registro   ", //+ id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        editarRadicadoRecibido(),
          Swal.fire(
            "Actualizado!",
            "El registro ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault(getData());
    }
  });
});

//Alerta para Editar Radicado Enviado
$(document).on("click", "#editarTramiteEnviado", function (e) {
  //e.preventDefault();
  //id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Actualizar el registro   ", //+ id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        editarRadicadoEnviado(),
          Swal.fire(
            "Actualizado!",
            "El registro ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      
      //e.preventDefault(getData());
    }
  });
});

//Alerta para Editar Tabla Retención Recibido
$(document).on("click", "#actualizarRecibido", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Actualizar el trámite de " + id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        actualizarRecibido(),
          Swal.fire(
            "Actualizado!",
            "El registro ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault(getData());
    }
  });
});

//Alerta para Editar Tabla Retención Enviados
$(document).on("click", "#actualizarEnviado", function (e) {
  e.preventDefault();
  id = $(this).parents("tr").find("td:first").text();
  Swal.fire({
    title: "Realmente quieres Actualizar el trámite de " + id + " ?",
    text: "El registro sera Actualizado en la Base de Datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Actualizar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      if (result.isConfirmed) {
        actualizarEnviados(),
          Swal.fire(
            "Actualizado!",
            "El registro ha sido Actualizado satisfactoriamente.",
            "success"
          );
      }
      e.preventDefault(getData());
    }
  });
});
