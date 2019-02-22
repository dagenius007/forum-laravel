// document.onload(function() {
  $(".search").css({
    display: "none"
  });
// });

$(".search_tab").click(function(e) {
  e.preventDefault();
  var thi = $(this);
  $(".search").css({ display: "block" });
  thi.css({ display: "none" });
});
