// Submit Payment Form.
$(".form").submit(function () {
  // Get Post Data.
  var post_url = $(this).attr("action");
  var request_uri = $(this).attr("method");
  var post_data = $(this).serialize();

  // Implement through AJAX.
  $.ajax({
    url: post_url,
    method: request_uri,
    data: post_data,
    success: function (response) {
      console.log(response);
    },
  });
});

// Submit Cart Actions.
function submitCart(pid, type) {
  $message = $(".message");
  $message.html("");

  if (type == "update") {
    var qty = jQuery("#" + pid + "qty").val();
  } else {
    var qty = jQuery("#qty").val();
  }

  $.ajax({
    url: "http://localhost/estuffcart/includes/manage_cart.php",
    type: "POST",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (response) {
      if (type == "update" || type == "remove") {
        window.location.href = window.location.href;
      }
      // Parse The Json Format.
      response = $.parseJSON(response);
      // Reload Page After Alert.
      if (response.success) {
        $message.html(response.message);
        setTimeout(function () {
          window.location.reload();
        }, 2000);
      }
    },
  });
}
