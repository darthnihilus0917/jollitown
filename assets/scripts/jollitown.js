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

  // RESERVATION
  const booking = $("#customer-booking-btn");
  const reservationModal = $("#reservation-modal");
  booking.on("click", function() {
    console.log('testing')

    reservationModal.modal('hide');
  });

  //NEWSLETTER SIGN-UP
  $("#sign-up").on("click", function () {
    const fieldStatus = $(".sub-status-result");
    const name = $("#name");
    const phone = $("#phone");
    const email = $("#email");

    const fields = [name, phone, email];
    fields.forEach((field) => {
      field.on("keyup", function() {
        fieldStatus.text("");
      });
    });

    function validateEmail(email) {
      // Regular expression to validate email
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function validatePhoneNumber(phoneNumber) {
      // Regular expression to validate phone number
      const phoneRegex = /^\d{10,15}$/;
      return phoneRegex.test(phoneNumber);
    }

    if (name.val() === "") {
      fieldStatus.text("Please provide a name").css("color", "pink");
      return false;
    } else if (phone.val() === "") {
      fieldStatus.text("Please provide a valid phone").css("color", "pink");
      return false;
    } else if (email.val() === "" || !validateEmail(email.val())) {
      fieldStatus.text("Please provide a valid email").css("color", "pink");
      return false;
    } else {
      const payload = {
        name: name.val(),
        phone: phone.val(),
        email: email.val(),
        approval: "Not Allowed"
      };
      $.ajax({
          method: 'POST',
          url: 'index.php',
          data: payload,
          beforeSend: function() {
            $(this).attr("disabled", false).text("Sending...");
          },
          success: function(data) {
            fieldStatus.text("Subscribed!").css("color", "lightgreen").fadeOut(5000);
            $(this).attr("disabled", false).text("Send Now");
            name.val("");
            phone.val("");
            email.val("");
          }
      });
    }
  });

  // RESERVATION CALENDAR
  const calendarEl = $("#reservation-calendar");
  const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
  });
  calendar.render();
});
