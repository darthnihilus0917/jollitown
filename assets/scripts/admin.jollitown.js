document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('reservation-calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'calendar_data.php',
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
        },
        eventContent: function(arg) {
            const eventTitle = arg.event.title;
            const startTime = arg.event.start;
            const endTime = arg.event.end;
            // Get the hour part of the start and end times
            let startHour = new Date(startTime).toLocaleTimeString(undefined, { hour: 'numeric', hour12: true });
            startHour = startHour.split(" ")[0];

            let endHour = new Date(endTime).toLocaleTimeString(undefined, { hour: 'numeric', hour12: true });
            endHour = endHour.split(" ");
            endHour = `${endHour[0]}${endHour[1]}`;
            const content = `${startHour}-${endHour}(${eventTitle})`;

            return { html: `<div style="text-align: justified; padding: 4px; text-wrap: wrap; font-weight: bold;">${content}</div>` };
        }
    });
    calendar.render();
});

$(function() {
    console.log("Welcome to Jollitown Admin.");

    const reservationTable = new DataTable("#reservations-table");

    const usersTable = new DataTable("#user-table");

    const customersTable = new DataTable("#customers-table");

    const processResult = $("#process-result");

    function validateEmail(email) {
        // Regular expression to validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function hasInvalid(fields) {
        const result = fields.map((field) => {
            return (field.val().length <= 1) ? true : false;
        });
        console.log(result)
        return result.includes(true);
    }

    // CUSTOMER
    const today = new Date().toISOString().slice(0, 16);
    const eventDateTime = $("#customer-event-date");
    eventDateTime.attr("min", "2023-06-13")

    const customerSave = $("#customer-save");
    customerSave.on("click", function() {
        const process = $("#process");
        const celebrantName = $("#celebrant-name");
        const customerName = $("#customer-name");
        const mobile = $("#customer-mobile");
        const age = $("#customer-age");
        const gender = $("#customer-gender");
        const nickname = $("#customer-nickname");
        const customerReservationType = $("#customer-reservation-type");
        const customerReservationDate = $("#customer-reservation-date");
        // const eventDateTime = $("#customer-event-date");
        const evenStatus = $("#event-status");
        const favors = $("#customer-favors");
        const cake = $("#customer-cake");
        const meal = $("#bundle-meal");
        const theme = $("#customer-theme");
        const paymentMode = $("#payment-mode");
        const paymentTerms = $("#payment-terms");
        const amount = $("#payment-amount");
        const balance = $("#payment-balance");
        const downpayment = $("#payment-downpayment");

        const fields = [celebrantName, customerName, mobile, nickname, 
            customerReservationType, customerReservationDate,
            favors, cake, meal, theme, paymentMode, paymentTerms];
        fields.forEach((field) => {
            field.on("keyup", function() { processResult.text("");});
            field.on("change", function() { processResult.text(""); });
        });        
        
        function reset() {
            celebrantName.val("");
            customerName.val("");
            eventDateTime.val("");
            evenStatus.val("0");
            customerReservationType.val("0");
            customerReservationDate.val("");
            mobile.val("");
            age.val("");
            gender.val("0");
            nickname.val("");
            favors.val("0");
            cake.val("0");
            meal.val("0");
            theme.val("0");
            paymentMode.val("0");
            paymentTerms.val("");
            amount.val("");
            balance.val("");
            downpayment.val("");
            processResult.text("");
        }

        const payload = {
            module: 'customers',
            process: process.val(),
            id: process.attr('data-id'),
            celebrantName: celebrantName.val(),
            customerName: customerName.val(),
            eventDateTime: eventDateTime.val(),
            eventStatus: evenStatus.val(),
            reservationType: customerReservationType.val(),
            reservationDate: customerReservationDate.val(),
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
            balance: balance.val(),
            downpayment: downpayment.val(),
            agreed: true,
            others: 0
        }
        console.log(payload)

        let resultCss = null;
        if (hasInvalid(fields)) {
            resultCss =  {"color":"red"};
            processResult.text("Please provide a valid value(s).").css(resultCss);
            return false;

        } else {
            $.ajax({
                method: 'POST',
                url: './process.php',
                data: payload,
                beforeSend: function() {
                    $(this).text("Saving...").attr("disabled", true);
                },
                success: function(data) {
                    console.log(data);
                    $(this).text("Save").attr("disabled", false);
                    const { isProcessed, msg } = JSON.parse(data);
                    if (isProcessed) {
                        if (payload.process === 'new') reset();
                        resultCss =  {"color":"green"};
                    } else {
                        resultCss =  {"color":"red"};
                    }
                    processResult.text(msg).css(resultCss);
                    if (payload.process === 'edit') {
                        setTimeout(() => { location.reload(); }, 3000);
                    }
                    if (payload.process === 'delete') window.location.href = `?page=customers`;
                }
            });
        }
    });

    // RESERVATION
    const reservationSave = $("#reservation-save");
    reservationSave.on("click", function() {
        const process = $("#process");
        const celebrantName = $("#celebrant-name");
        const customerName = $("#customer-name");
        const customerReservationType = $("#customer-reservation-type");
        const customerReservationDate = $("#customer-reservation-date");
        const eventDateTime = $("#customer-event-date");
        const evenStatus = $("#event-status");

        const fields = [celebrantName, customerName, customerReservationType];
        fields.forEach((field) => {
            field.on("keyup", function() { processResult.text("");});
            field.on("change", function() { processResult.text(""); });
        });

        const payload = {
            module: 'reservations',
            process: process.val(),
            id: process.attr('data-id'),
            celebrantName: celebrantName.val(),
            customerName: customerName.val(),
            eventDateTime: eventDateTime.val(),
            eventStatus: evenStatus.val(),
            reservationType: customerReservationType.val(),
            reservationDate: customerReservationDate.val()
        }
        console.log(payload)

        let resultCss = null;
        if (hasInvalid(fields)) {
            resultCss =  {"color":"red"};
            processResult.text("Please provide a valid value(s).").css(resultCss);
            return false;

        } else {
            $.ajax({
                method: 'POST',
                url: './process.php',
                data: payload,
                beforeSend: function() {
                    $(this).text("Saving...").attr("disabled", true);
                },
                success: function(data) {
                    console.log(data)
                    $(this).text("Save").attr("disabled", false);
                    const { isProcessed, msg } = JSON.parse(data);
                    if (isProcessed) {
                        resultCss =  {"color":"green"};
                    } else {
                        resultCss =  {"color":"red"};
                    }
                    processResult.text(msg).css(resultCss);
                    if (payload.process === 'edit') {
                        setTimeout(() => { location.reload(); }, 3000);
                    }
                }
            });
        }
    });

    // USER
    const userSave = $("#user-save");
    userSave.on("click", function() {
        const process = $("#process");
        const name = $("#name");
        const username = $("#username");
        const password = $("#password");
        const role = $("#role");
        const email = $("#email");

        function reset() {
            name.val("");
            username.val("");
            password.val("");
            role.val("User");
            email.val("");
            processResult.text("");
        }

        const fields = [name, username, password, role, email];
        fields.forEach((field) => {
            field.on("keyup", function() { processResult.text("");});
            field.on("change", function() { processResult.text(""); });
        });

        const payload = {
            module: 'user',
            process: process.val(),
            id: process.attr('data-id'),
            name: name.val(),
            username: username.val(),
            password: password.val(),
            role: role.val(),
            email: email.val()
        }

        let resultCss = null;
        if (hasInvalid(fields)) {
            resultCss =  {"color":"red"};
            processResult.text("Please provide a valid value(s).").css(resultCss);
            return false;

        } else if (!validateEmail(payload.email)) {
            resultCss =  {"color":"red"};
            processResult.text("Invalid email.").css(resultCss);
            return false;

        } else {
            $.ajax({
                method: 'POST',
                url: './process.php',
                data: payload,
                beforeSend: function() {
                    $(this).text("Saving...").attr("disabled", true);
                },
                success: function(data) {
                    $(this).text("Save").attr("disabled", false);
                    const { isProcessed, msg } = JSON.parse(data);
                    if (isProcessed) {
                        if (payload.process === 'new') reset();
                        resultCss =  {"color":"green"};
                    } else {
                        resultCss =  {"color":"red"};
                    }
                    processResult.text(msg).css(resultCss);
                    if (payload.process === 'edit') location.reload();
                    if (payload.process === 'delete') window.location.href = `?page=users`;
                }
            });
        }
    });

    const print = $("#print-report");
    print.on("click", function() {
        window.print();
    });

    // const calendarEl = $("#reservation-calendar");
    // const calendar = new FullCalendar.Calendar(calendarEl, {
    //     initialView: 'dayGridMonth',
    //     timeZone: 'UTC',
    //     events: [
    //       {
    //         id: 'a',
    //         title: 'my event',
    //         start: '2024-06-03'
    //       }
    //     ]
    // });
    // calendar.render();
});