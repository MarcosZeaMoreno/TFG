const input = document.getElementById("area_texto");
let timer;

input.addEventListener("input", () => {
  clearTimeout(timer);
  timer = setTimeout(() => {
    document.getElementById("form_textarea").submit();
  }, 1000);
});

const end = input.value.length;
input.setSelectionRange(end, end);
input.focus();