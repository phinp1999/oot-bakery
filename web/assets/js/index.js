var url = window.location.pathname;
if (
  url == "/about" ||
  url == "/form" ||
  url == "/form/login" ||
  url == "/form/register" ||
  url == "/contact" ||
  url == "/profile" ||
  url == "/cart" ||
  url == "/payment" ||
  url == "/profile/editp"
) {
  document.getElementById("banner2").style.display = "block";
}

$(function ($) {
  let url = window.location.href;
  $("li a").each(function () {
    if (this.href === url) {
      $(this).closest("li").addClass("active");
    }
  });
});

$(document).on("click", function (e) {
  if (e.target.className != "oi-number" && url == "/cart") {
    $(".form-cart").submit();
  }
});

$(window).on("load", function () {
  if (localStorage.getItem("trangThai")) {
  }

  if (localStorage.getItem("trangThai") == 1) {
    swal({
      title: "Thành công!",
      text:
        "Đơn hàng của bạn đã được ghi lại! Bạn vui lòng kiểm tra email để xem lại thông tin đơn hàng.",
      icon: "success",
      button: true,
    }).then(() => {
      localStorage.setItem("trangThai", 0);
      window.location.href = "/payment/reset";
    });
  }
});
function alertSuccess() {
  localStorage.setItem("trangThai", 1);
}

function alert() {
  swal({
    title: "Bạn chưa đăng nhập!",
    text: "Bạn có muốn đến trang đăng nhập không?",
    icon: "warning",
    buttons: {
      cancel: true,
      confirm: true,
    },
  }).then((rs) => {
    if (rs) window.location.href = "/form";
  });
}
