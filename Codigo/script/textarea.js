const inputTexto = document.getElementById("area_texto");
const inputIdNota = document.getElementById("id_nota");

let timer;
inputTexto.addEventListener("input", () => {
  clearTimeout(timer);
  timer = setTimeout(() => {
    enviarDatosFormulario();
  }, 1000);
});

const enviarDatosFormulario = () => {
  const contenido = inputTexto.value;
  const idNota = inputIdNota.value;

  const datosFormulario = new FormData();
  datosFormulario.append('reg_texto', contenido);
  datosFormulario.append('reg_id_nota', idNota);

  const xhr = new XMLHttpRequest();
  xhr.open('POST', './config/register_textarea.php', true);
  xhr.send(datosFormulario);
};

const end = inputTexto.value.length;
inputTexto.setSelectionRange(end, end);
inputTexto.focus();