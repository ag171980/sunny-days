/*-Simple count 0 to 100-*/
var value = 0;
for (let i = 0; i <= 100; i++) {
  value = i;
  var numb = document.getElementById("numb");
  numb.innerHTML = value + "%";
}
/*-loader-*/
window.onload = function () {
  var content = document.getElementById("loader-container");
  content.style.visibility = "hidden";
  content.style.opacity = "0";
};
