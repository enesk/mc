function parseDate(str) {
    var mdy = str.split('.');
    return new Date(mdy[2], mdy[1] - 1, mdy[0]);
}
function dayDiff(date, date2) {
    var timeDiff = Math.abs(date2.getTime() - date.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return diffDays
}
var reservation = {
    from: function () {
        $('#from_date').datepicker({
            language: 'de',
            autoclose: true,
            startDate: '+1d'
        });
    },
    totalDays: function () {
        var fromDate = parseDate($('#from_date').val());
        var toDate = parseDate($('#to_date').val());
        var dayDifference = dayDiff(toDate, fromDate);
        $('#total_days').val(dayDifference);
    },
    to: function () {
        reservation.totalDays();
        $('#to_date').prop('disabled', true);
        $('#from_date').on('change', function () {
            $('#to_date').val('');
            var fromDate = $(this).val();
            var dayDifference = dayDiff(parseDate(fromDate), new Date());
            reservation.totalDays()
            $('#to_date').datepicker({
                startDate: '+' + dayDifference + 'd',
                language: 'de',
                autoclose: true
            });
            $('#to_date').prop('disabled', false);
        });
        $('#to_date').on('change', function() {
            reservation.totalDays();
        })
    }
};