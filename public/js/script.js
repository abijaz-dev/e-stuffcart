$(function () {
  $(".form").on("submit", function (e) {
    e.preventDefault();
  });
});

function submitCart(pid, type) {
  $message = $(".message");
  $message.html('');

  if (type == "update") {
    var qty = jQuery("#" + pid + "qty").val();
  } else {
    var qty = jQuery("#qty").val();
  }

  $.ajax({
    url     :  "includes/manage_cart.php",
    type    :  "post",
    data    :  "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success :  function (response) {
      if (type == "update" || type == "remove" || type == "add") {
        window.location.href = window.location.href;
      }
      
    //   response = $.parseJSON(response);
    //   if (response.success) {
    //     $message.html(response.message);
    //   } 
    },
  });
}