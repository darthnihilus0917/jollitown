document.addEventListener('DOMContentLoaded', function() {
  let calendarEl = document.getElementById('reservation-calendar');
  let calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: 'admin/calendar_data.php',
      dayCellDidMount: function(info) {
        let events = document.querySelectorAll('.fc-daygrid-day-events');
        let dayBookedCount = 0;
        events.forEach((cell) => {
          setTimeout(() => {
            let parentEl = cell.parentElement;
            dayBookedCount = cell.querySelectorAll('.fc-daygrid-event-harness').length;

            if (dayBookedCount >= 3) {
              parentEl.classList.add('many-events-fullybooked');
              parentEl.classList.remove('many-events-few');
            } 
            if (dayBookedCount < 3) {
              parentEl.classList.add('many-events-few');
              parentEl.classList.remove('many-events-fullybooked');
            } 
            if (dayBookedCount === 0) {
              parentEl.style.backgroundColor = 'white';
              parentEl.classList.remove('many-events-fullybooked', 'many-events-few');
            }
          }, 500);
        });
      }
  });
  calendar.render();
});

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

  // $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();

  $().UItoTop({ easingType: "easeOutQuart" });

  // RESERVATION
  const totalPrice = [];

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

  const preview = $(".preview-wrapper").css({'text-align':'center'});

  const favors = $("#customer-favors");
  favors.on("change", function() {
    let selectedFavor = $(this).val().toLowerCase();
    if (selectedFavor === "0") {
      preview.html("");

    } else {
      selectedFavor = selectedFavor.split(" ")[0].trim();
      totalPrice.push({favor: selectedFavor});
      console.log(totalPrice);
      const image = `./images/party/favors/${selectedFavor}.png`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`);  
    }
  });

  const cake = $("#customer-cake");
  cake.on("change", function() {
    let selectedCake = $(this).val().toLowerCase();
    if (selectedCake === "0") {
      preview.html(""); 

    } else {
      let selectText = $("#customer-cake option:selected").text();
      let pricing = selectText.split("-")[1].split(" ")[0];
      console.log(pricing);
      totalPrice.push({cake: pricing});
      console.log(totalPrice);

      selectedCake = selectedCake.split(" ")[0].trim();
      selectedCake =  (selectedCake === 'mocha') ? 'cake-1' : 'cake-2';
      let extension = (selectedCake === 'mocha') ? '.jpg' : '.png';
  
      selectedCake = `${selectedCake}${extension}`;
      const image = `./images/party/cake/${selectedCake}`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`); 
    }   
  });

  const meal = $("#bundle-meal");
  meal.on("change", function() {
    let selectedMeal = $(this).val().toLowerCase();
    let extension = null;
    let pricing = null;
    if (selectedMeal !== 0) {
      selectedMeal = selectedMeal.split("-")[0].trim();
      pricing = selectedMeal.split(" ")[2];
      extension = (selectedMeal === 'c') ? '.jpg' : '.png';
      if (selectedMeal.includes(" ")) {
        selectedMeal = selectedMeal.replace(" ", "-");
      }
      selectedMeal = `meal-${selectedMeal}${extension}`;
      totalPrice.push({meal: pricing});
      console.log(totalPrice);
      const image = `./images/party/meal/${selectedMeal}`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`);

    } else {
      preview.html(""); 
    }
  });

  const theme = $("#customer-theme");
  theme.on("change", function() {
    let selectedTheme = $(this).val().toLowerCase();
    if (selectedTheme === "0") {
      preview.html(""); 

    } else {
      if (selectedTheme.includes(" ")) {
        selectedTheme = selectedTheme.replace(" ", "-");
      }
      const image = `./images/party/theme/${selectedTheme}.png`;
      preview.html(`<img src='${image}'/>`);
    }
  });

  const otherPackage = $("#others");
  otherPackage.on("change", function() {
    let othersSelected = $(this).val().toLocaleLowerCase();
    if (othersSelected !== "0" || othersSelected !== "n/a") {
      let pricing = others.split("-")[1].split(" ")[0];
      totalPrice.push({others:pricing});
      console.log(totalPrice);
    }
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
      otherPackage.val("0");
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
      others: otherPackage.val(),
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
});
