document.addEventListener("DOMContentLoaded", function () {
    document
      .getElementById("formulario")
      .addEventListener("submit", validarNota);
  });
  
  function validarNota(evento) {
  
    evento.preventDefault();
  
    var bolean_titulo = false;
    var bolean_fecha = false;

    var patron_texto = /^[a-zA-ZÀ-ÿ\s]{1,20}$/;
    if (!patron_texto.test(document.getElementById("titulo").value)) {
      alert("El titulo no es válido. Tiene que introducir de 1 a 20 carácteres y que no hayan números ni carácteres especiales.");
      document.getElementById("titulo").focus();
      if (document.getElementById("titulo").classList.contains("negro")) {
        document.getElementById("titulo").classList.remove("negro");
      }
      if (!document.getElementById("titulo").classList.contains("rojo")) {
        document.getElementById("titulo").className += " rojo";
      }
      bolean_titulo = false;
    } else {
  
      if (document.getElementById("titulo").classList.contains("rojo")) {
        document.getElementById("titulo").classList.remove("rojo");
      }
      if (!document.getElementById("titulo").classList.contains("negro")) {
        document.getElementById("titulo").className += " negro";
      }
      bolean_titulo = true;
    }
  
    var patron_fecha = /^\d{4}\/\d{2}\/\d{2}$/;
    if (!patron_fecha.test(document.getElementById("fecha").value)) {
      alert("La fecha no es válida. Utilice el formato yyyy/mm/dd");
      document.getElementById("fecha").focus();
      if (document.getElementById("fecha").classList.contains("negro")) {
        document.getElementById("fecha").classList.remove("negro");
      }
      if (!document.getElementById("fecha").classList.contains("rojo")) {
        document.getElementById("fecha").className += " rojo";
      }
      bolean_fecha = false;
    } else {
  
      if (document.getElementById("fecha").classList.contains("rojo")) {
        document.getElementById("fecha").classList.remove("rojo");
      }
      if (!document.getElementById("fecha").classList.contains("negro")) {
        document.getElementById("fecha").className += " negro";
      }
      bolean_fecha = true;
    }
    
    if ((bolean_titulo === true) && (bolean_fecha === true)) {
      this.submit();
    } else {
      return ;
    }
  
  }
