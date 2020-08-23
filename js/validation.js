let iconnohide = document.getElementById("nohide");
let iconhide = document.getElementById("hide");
iconnohide.style.opacity = "0";
function mostrarContrasena() {
  var tipo = document.getElementById("password");
  if (tipo.type == "password") {
    tipo.type = "text";
    iconhide.style.opacity = "0";
    iconhide.style.transition="0.2s all";
    iconnohide.style.opacity = "1";
    iconnohide.style.transition="0.2s all";
  } else {
    tipo.type = "password";
    iconhide.style.opacity = "1";
    iconhide.style.transition="0.2s all";
    iconnohide.style.opacity = "0";
    iconhide.style.transition="0.2s all";
  }
}
