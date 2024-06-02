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
  const reservationModal = $("#reservationModal");
  reservationModal.on('shown.bs.modal', function() {
    booking.attr('disabled', true);

    const agreed = $("#agree-to-terms");
    agreed.on('change', function() {
      if($(this).is(":checked")) {
        booking.attr('disabled', false);
      } else {
        booking.attr('disabled', true);
      }
    })
  });

  booking.on("click", function() {
    const celebrantName = $("#celebrant-name");
    const customerName = $("#customer-name");
    const mobile = $("#customer-mobile");
    const age = $("#customer-age");
    const gender = $("#customer-gender");
    const nickname = $("#customer-nickname");
    const customerReservationType = $("#customer-reservation-type");
    const customerReservationDate = $("#customer-reservation-date");
    const eventDateTime = $("#customer-event-date");
    const evenStatus = $("#event-status");
    const favors = $("#customer-favors");
    const cake = $("#customer-cake");
    const meal = $("#bundle-meal");
    const theme = $("#customer-theme");
    const paymentMode = $("#payment-mode");
    const paymentTerms = $("#payment-terms");
    const amount = $("#payment-amount");
    const balance = $("#payment-balance");
    const agreed = $("#agree-to-terms");
    const email = $("#customer-email");

    const submissionStatus = $(".submission-status");

    function reset() {
      celebrantName.val("");
      customerName.val("");
      email.val("");
      mobile.val("");
      age.val("");
      gender.val("0");
      nickname.val("");
      customerReservationType.val("0");
      customerReservationDate.val("");
      favors.val("");
      cake.val("");
      meal.val("");
      theme.val("");
      paymentMode.val("0");
      paymentTerms.val("0");
      amount.val("");
      agreed.prop("checked", false);
    }

    const payload = {
      module: 'customers',
      process: 'new',
      id: "0",
      celebrantName: celebrantName.val(),
      customerName: customerName.val(),
      eventStatus: 0,
      eventDateTime: customerReservationDate.val(),
      reservationType: customerReservationType.val(),
      reservationDate: new Date().toLocaleDateString(),
      mobile: mobile.val(),
      age: age.val(),
      gender: gender.val(),
      nickname: nickname.val(),
      favors: favors.val(),
      cake: cake.val(),
      meal: meal.val(),
      theme: theme.val(),
      paymentMode: paymentMode.val(),
      paymentTerms: paymentTerms.val(),
      amount: amount.val(),
      balance: 0,
      agreed: agreed.is(":checked")
    }
    // console.log(payload)

    $.ajax({
      method: 'POST',
      url: './admin/process.php',
      data: payload,
      beforeSend: function() {
          booking.text("Sending...").attr("disabled", true);
      },
      success: function(data) {
        const { isProcessed, msg } = JSON.parse(data);
        booking.text("Submit").attr("disabled", false);
        if (isProcessed) {

          submissionStatus.text(msg).css({'color':'green'});

          setTimeout(() => {
            submissionStatus.text("");
            reset();
            reservationModal.modal('hide');
            booking.text("Submit");
          }, 5000);

        } else {
          submissionStatus.text(msg).css({'color':'red'});
        }
      }
    });
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
