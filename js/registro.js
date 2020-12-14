let iconnohide = document.getElementById("nohide");
let iconhide = document.getElementById("hide");
let riconnohide = document.getElementById("rnohide");
let riconhide = document.getElementById("rhide");

iconnohide.style.opacity = "0";
function mostrarContrasena() {
  var tipo = document.getElementById("password");
  var rtipo = document.getElementById("rpassword");
  if (tipo.type == "password") {
    tipo.type = "text";
    iconhide.style.opacity = "0";
    iconhide.style.transition = "0.2s all";
    iconnohide.style.opacity = "1";
    iconnohide.style.transition = "0.2s all";
  } else {
    tipo.type = "password";
    iconhide.style.opacity = "1";
    iconhide.style.transition = "0.2s all";
    iconnohide.style.opacity = "0";
    iconhide.style.transition = "0.2s all";
  }
  if (rtipo.type == "password") {
    rtipo.type = "text";
    riconhide.style.opacity = "0";
    riconhide.style.transition = "0.2s all";
    riconnohide.style.opacity = "1";
    riconnohide.style.transition = "0.2s all";
  } else {
    rtipo.type = "password";
    riconhide.style.opacity = "1";
    riconhide.style.transition = "0.2s all";
    riconnohide.style.opacity = "0";
    riconhide.style.transition = "0.2s all";
  }
}
