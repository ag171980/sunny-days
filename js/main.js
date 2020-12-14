
/*-loader-*/
window.onload = function () {
  var content = document.getElementById("loader-container");
  content.style.visibility = "hidden";
  content.style.transition='all 2.1s';
  content.style.opacity='0';
};

/*scroll loader*/
ScrollReveal().reveal('.ofertas',{delay:300,reset:true});

