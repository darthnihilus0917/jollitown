document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('reservation-calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
});

$(function() {
    console.log("Welcome to Jollitown Admin.");

    const reservationTable = new DataTable("#reservations-table");

    const usersTable = new DataTable("#user-table");

    const customersTable = new DataTable("#customers-table");

    const calendarEl = $("#reservation-calendar");
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
});