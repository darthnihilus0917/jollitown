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
  const preview = $(".preview-wrapper").css({'text-align':'center'});
  const breakdown = $(".breakdown");
  const paymentAmount = $("#payment-amount");
  const cartTotalValue = $(".total-value");

  let breakdownResult = null;

  function recomputeTotal() {
    let totalValue = 0;
    if (totalPrice.length > 0) {
      for (let key in totalPrice[0]) {
        totalValue += Number(totalPrice[0][key]);
      }
    }
    paymentAmount.val(parseFloat(totalValue).toFixed(2));
    cartTotalValue.html(`&#8369 ${parseFloat(totalValue).toFixed(2)}`);
  }
  recomputeTotal();

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

  const favors = $("#customer-favors");
  favors.on("change", function() {
    let label = null;
    let selectedFavor = $(this).val().toLowerCase();
    if (selectedFavor === '0') {
      if (totalPrice.length > 0) {
        if (Object.keys(totalPrice[0]).length > 1) {
          delete totalPrice[0].favor;
        } else {
          totalPrice.length = 0;
        }
      } 
      preview.html("");

      const elements = document.querySelectorAll('.favor');
      elements.forEach(element => element.remove());

      recomputeTotal();

    } else {
      label = $("#customer-favors option:selected").text();
      label = label.split("-")[0];

      selectedFavor = selectedFavor.split(" ")[0].trim();
      if (totalPrice.length > 0) {
        totalPrice.forEach((obj) => {
          if (!obj.hasOwnProperty('favor')) {
            totalPrice[0].favor = selectedFavor;
          }  else {
            totalPrice[0].favor = selectedFavor;
          }
        });
      } else {
        totalPrice.push({favor: selectedFavor});
      }

      const image = `./images/party/favors/${selectedFavor}.png`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`);  

      breakdownResult = totalPrice.map((item) => { return item.favor; });
      if (totalPrice.length > 0) breakdown.addClass("d-none");

      const elements = document.querySelectorAll('.favor');
      elements.forEach(element => element.remove());

      breakdown.after(`<tr class='favor'>
        <td>${label}</td>
        <td>&#8369 ${parseFloat(breakdownResult).toFixed(2)}</td>
        </tr>`);

        recomputeTotal();
    }
  });

  const cake = $("#customer-cake");
  cake.on("change", function() {
    let label = null;
    let selectedCake = $(this).val().toLowerCase();
    if (selectedCake === '0') {
      if (totalPrice.length > 0) {
        if (Object.keys(totalPrice[0]).length > 1) {
          delete totalPrice[0].cake;
        } else {
          totalPrice.length = 0;
        }
      } 
      preview.html("");

      const elements = document.querySelectorAll('.cake');
      elements.forEach(element => element.remove());

      recomputeTotal();

    } else {
      let selectText = $("#customer-cake option:selected").text();
      label = selectText.split("-")[0].trim();
      let pricing = selectText.split("-")[1].trim();
      pricing = pricing.split(" ")[0];

      if (totalPrice.length > 0) {
        totalPrice.forEach((obj) => {
          if (!obj.hasOwnProperty('cake')) {
            totalPrice[0].cake = pricing;
          }  else {
            totalPrice[0].cake = pricing;
          }
        });
      } else {
        totalPrice.push({cake: pricing});
      }

      selectedCake = selectedCake.split(" ")[0].trim();
      selectedCake =  (selectedCake === 'mocha') ? 'cake-1' : 'cake-2';
      let extension = '.png';
  
      selectedCake = `${selectedCake}${extension}`;
      const image = `./images/party/cake/${selectedCake}`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`); 

      breakdownResult = totalPrice.map((item) => { return item.cake; });
      if (totalPrice.length > 0) breakdown.addClass("d-none");

      const elements = document.querySelectorAll('.cake');
      elements.forEach(element => element.remove());

      breakdown.after(`<tr class='cake'>
        <td>${label}</td>
        <td>&#8369 ${parseFloat(breakdownResult).toFixed(2)}</td>
        </tr>`);

      recomputeTotal();
    }  
  });

  const meal = $("#bundle-meal");
  meal.on("change", function() {
    let selectedMeal = $(this).val().toLowerCase();
    let extension = null;
    let pricing = null;
    let label = null;
    if (selectedMeal === '0') {
      if (totalPrice.length > 0) {
        if (Object.keys(totalPrice[0]).length > 1) {
          delete totalPrice[0].meal;
        } else {
          totalPrice.length = 0;
        }
      } 
      preview.html("");

      const elements = document.querySelectorAll('.meal');
      elements.forEach(element => element.remove());

      recomputeTotal();

    } else {
      label = $("#bundle-meal option:selected").text();
      label = label.split("-")[0];

      pricing = selectedMeal.split("-")[1].trim();
      pricing = pricing.split(" ")[0].trim();

      selectedMeal = selectedMeal.split("-")[0].trim();
      extension = (selectedMeal === 'c') ? '.jpg' : '.png';
      if (selectedMeal.includes(" ")) {
        selectedMeal = selectedMeal.replace(" ", "-");
      }
      selectedMeal = `meal-${selectedMeal}${extension}`;

      if (totalPrice.length > 0) {
        totalPrice.forEach((obj) => {
          if (!obj.hasOwnProperty('meal')) {
            totalPrice[0].meal = Number(pricing) * Number(guest.val());
          }  else {
            totalPrice[0].meal = Number(pricing) * Number(guest.val());
          }
        });

      } else {
        totalPrice.push({meal: Number(pricing) * Number(guest.val()) });
      }

      const image = `./images/party/meal/${selectedMeal}`;
      preview.html(`<img src='${image}' style='width: 280px;'/>`);

      breakdownResult = totalPrice.map((item) => { return item.meal; });
      if (totalPrice.length > 0) breakdown.addClass("d-none");

      const elements = document.querySelectorAll('.meal');
      elements.forEach(element => element.remove());

      breakdown.after(`<tr class='meal'>
        <td>${label}</td>
        <td>&#8369 ${parseFloat(breakdownResult).toFixed(2)}</td>
        </tr>`);

      recomputeTotal();
    }
  });

  const theme = $("#customer-theme");
  theme.on("change", function() {
    let label = null;
    let selectedTheme = $(this).val().toLowerCase();
    if (selectedTheme === "0") {
      preview.html(""); 

      const elements = document.querySelectorAll('.item-theme');
      elements.forEach(element => element.remove());

    } else {
      label = $("#customer-theme option:selected").text();
      if (selectedTheme.includes(" ")) {
        selectedTheme = selectedTheme.replace(" ", "-");
      }
      const image = `./images/party/theme/${selectedTheme}.png`;
      preview.html(`<img src='${image}'/>`);

      const elements = document.querySelectorAll('.item-theme');
      elements.forEach(element => element.remove());
      breakdown.after(`<tr class='item-theme'>
        <td>Party Theme</td>
        <td>${label}</td>
        </tr>`);
    }
  });

  const otherPackage = $("#others");
  otherPackage.on("change", function() {
    let label = null;
    let pricing = null;
    let othersSelected = $(this).val().toLocaleLowerCase();
    if (othersSelected === '0' || othersSelected === 'n.a') {
      if (totalPrice.length > 0) {
        if (Object.keys(totalPrice[0]).length > 1) {
          delete totalPrice[0].others;
        } else {
          totalPrice.length = 0;
        }
      }

      const elements = document.querySelectorAll('.others');
      elements.forEach(element => element.remove());

      recomputeTotal();

    } else {
      label = $("#others option:selected").text();
      label = label.split("-")[0];
      if (totalPrice.length > 0) {
        pricing = othersSelected.split("-")[1].trim();
        pricing = pricing.split(" ")[0].trim().trim();
        totalPrice.forEach((obj) => {
          if (!obj.hasOwnProperty('others')) {
            totalPrice[0].others = pricing;
          }  else {
            totalPrice[0].others = pricing;
          }
        });
      } else {
        pricing = othersSelected.split("-")[1].trim();
        pricing = pricing.split(" ")[0].trim().trim();
        totalPrice.push({others: pricing});
      }

      breakdownResult = totalPrice.map((item) => { return item.others; });
      if (totalPrice.length > 0) breakdown.addClass("d-none");

      const elements = document.querySelectorAll('.others');
      elements.forEach(element => element.remove());
      breakdown.after(`<tr class='others'>
        <td>${label}</td>
        <td>&#8369 ${parseFloat(breakdownResult).toFixed(2)}</td>
        </tr>`);

      recomputeTotal();
    }
  });

  const guest = $("#customer-guest");
  guest.on("keyup", function() {
    if (totalPrice.length > 0) {
      if (totalPrice[0].hasOwnProperty('meat')) {

        console.log(typeof totalPrice[0])

        pricing = $("#bundle-meal").split("-")[1].trim();
        pricing = pricing.split(" ")[0].trim();

        totalPrice[0].meat = Number($(this).val()) * Number(pricing);

        console.log(totalPrice);
      }
    }
  })

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
