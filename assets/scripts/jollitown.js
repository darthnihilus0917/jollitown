$(function () {
  console.log(`Welcome to Jollitown!!!`);

  $(".scroll").on("click", function (event) {
    event.preventDefault();
    $("html,body").animate({ scrollTop: $(this.hash).offset().top }, 1000);
  });

  $(window).load(function () {
    $(".flexslider").flexslider({
      animation: "slide",
      start: function (slider) {
        $("body").removeClass("loading");
      },
    });
  });

  $(".swipebox").swipebox();

  // Slideshow 4
  $("#slider4").responsiveSlides({
    auto: true,
    pager: true,
    nav: false,
    speed: 500,
    namespace: "callbacks",
    before: function () {
      $(".events").append("<li>before event fired.</li>");
    },
    after: function () {
      $(".events").append("<li>after event fired.</li>");
    },
  });

  $("#horizontalTab").easyResponsiveTabs({
    type: "default", //Types: default, vertical, accordion
    width: "auto", //auto or any width like 600px
    fit: true, // 100% fit in a container
    closed: "accordion", // Start closed if in accordion view
    activate: function (event) {
      // Callback function if tab is switched
      var $tab = $(this);
      var $info = $("#tabInfo");
      var $name = $("span", $info);
      $name.text($tab.text());
      $info.show();
    },
  });

  $("#verticalTab").easyResponsiveTabs({
    type: "vertical",
    width: "auto",
    fit: true,
  });

  $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();

  $().UItoTop({ easingType: "easeOutQuart" });

  //NEWSLETTER SIGN-UP
  $("#sign-up").on("click", function () {
    const name = $("#name");
    const phone = $("#phone");
    const email = $("#email");
    const payload = {
        name: name.val(),
        phone: phone.val(),
        email: email.val(),
        approval: "Not Allowed"
    };
    $.ajax({
        method: 'POST',
        url: 'index.php',
        data: payload
    }).success(function() {
        name.val("");
        phone.val("");
        email.val("");
    })
  });
});
