/**
 * Used in snapshot.php
 */

$(function () {

    let tripStart = getDefaultDate();

    initializeDatepicker(tripStart);

    listenChangeDate();
});

function listenChangeDate() {
    $('#datepicker').on('changeDate', function () {
        $('#hidden-date').val(
            $('#datepicker').datepicker('getFormattedDate')
        );
        $('#form-date').submit();
    });
}

function initializeDatepicker(tripStart) {
    $('.datepicker').datepicker({
        defaultViewDate: tripStart,
        format: 'yyyy-mm-dd',
        endDate: new Date(),
        maxViewMode: 2,
        startDate: '2009-12-27',
        orientation: 'bottom',
    });
}

function getDefaultDate() {
    let searchParams = new URLSearchParams(window.location.search);
    let tripStart;
    if (searchParams.has("trip-start")) {
        tripStart = searchParams.get("trip-start");
    } else {
        tripStart = new Date().toISOString().slice(0, 10);;
    }
    $('#date-value').val(tripStart);
    return tripStart;
}
