$(document).ready(function () {
  $(".cantidad").keyup(function (e) {
    if ($(this).val() != "") {
      if (e.keyCode == 13) {
        let id = $(this).attr("data-id");
        let precio = $(this).attr("data-precio");
        let cantidad = $(this).val();
        $(this)
          .parentsUntil(".producto")
          .find(".subtotal")
          .text("$ "+precio * cantidad);
        $.post(
          "./actions/modificarTabla.php",
          {
            id_producto: id,
            precio_producto: precio,
            cantidad: cantidad,
          },
          function (e) {
            $("#total").text("Total: $" + e);
          }
        );
      }
    }
  });
});
