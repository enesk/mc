$(document).ready(function () {



    /* main slider  */
    $('.mainSlider').slick({
        autoplay: true,
        autoplaySpeed: 3000,
    });

    /* car slider  */
    $('.carSlider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        responsive: [{
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }


        ]
    });

    /* testimonial slider  */

    $('.testimonialSlider').slick({
        autoplay: true,
        autoplaySpeed: 6000,
    });


    /*prevent dropdown closing caused by click */
    $('.dropdown-menu').on({
        "click": function (e) {
            e.stopPropagation();
        }
    });


    /*prevent refresh caused by dead links*/

    $("[href$='#']").click(function (e) {
        e.preventDefault();
    });


    /* Choose time from dropdown -from- */

    $("#select_from_time div span").click(function () {
        var val = $(this).text();
        $("#from_time_dropdown").val(val);
        $('[data-toggle="dropdown"]').parent().removeClass('open');
    });


    /* Choose time from dropdown -to- */

    $("#select_to_time div span").click(function () {
        var val = $(this).text();
        $("#to_time_dropdown").val(val);
        $('[data-toggle="dropdown"]').parent().removeClass('open');
    });


    /*Change station dropdown details on hover - from - */

    var $container = $("#station_dropdown_open"),
        $fromStation = $(".from_stationList", $container).hide(),
        $prev;

    $(".f_stnDdown_left ul li", $container).mouseenter(function () {
        if ($prev)
            $fromStation.eq($prev.removeClass("active").index()).hide();
        $fromStation.eq(($prev = $(this).addClass("active")).index()).show();
    }).eq(0).mouseenter();


    /*Choose station_from dropdown*/
    function getStationID() {
        var stationID = $(this).data('station-id');
        $("#from_station").val(stationID);
    }


    $("#station_dropdown_open ul li a").click(function () {
        var val = $(this).find('span').text();
        getStationID.call(this);
        $("#station_dropdown").val(val);
        $('[data-toggle="dropdown"]').parent().removeClass('open');
    });


    /*Change station dropdown details on hover - to - */
    var $container2 = $("#arrival_dropdown"),
        $toStation = $(".to_stationList", $container2).hide(),
        $prev2;

    $(".stnDdown_left ul li", $container2).mouseenter(function () {
        if ($prev2)
            $toStation.eq($prev2.removeClass("active").index()).hide();
        $toStation.eq(($prev2 = $(this).addClass("active")).index()).show();
    }).eq(0).mouseenter();


    /*Choose station_to dropdown*/
    $("#arrival_dropdown ul li a").click(function () {
        var val = $(this).find('span').text();
        $("#station_dropdown_destination").val(val);
        $('[data-toggle="dropdown"]').parent().removeClass('open');
    });


    /* Show destination input */

    $("#destination").hide();
    $('.destinationActivate input[type="checkbox"]').click(function () {
        if ($(this).is(":checked")) {
            $(".searchBox").css("height", "370px");
            $(".noSelect.loginActivate").css("margin-top", "15px");
            $("#destination").show();
        } else {
            $(".searchBox").css("height", "320px");
            $(".noSelect.loginActivate").css("margin-top", "0");
            $("#destination").hide();

        }
    });


    /* Show Login Form */

    $('#checkbox2').on('click', function () {
        $('#login_inBox').toggle();
    })


    $("#loginForm_activate").hide();

    $('#loginForm_trigger input[type="checkbox"]').click(function () {
        if ($(this).is(":checked")) {
            $("#loginForm_activate").show();
        } else {
            $("#loginForm_activate").hide();

        }
    });

    /* Product Filter */

    $('#filterOptions a').click(function () {
        $('#filterOptions a').removeClass('active');
        var ourClass = $(this).attr('class');
        $(this).addClass('active');

        if (ourClass == 'all') {
            $('#ourHolder').children('div.item').show();
        } else {
            $('#ourHolder').children('div:not(.' + ourClass + ')').hide();
            $('#ourHolder').children('div.' + ourClass).show();
        }
        return false;
    });


    /* Change data panel show/hide */
    $('#changeDataTrigger').on('click', function (event) {
        $('#changeDataPanel').slideToggle('fast');
    });


    /* Date pickers with past date selection filter */

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#dpd1').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');


    /* activete tooltips */
    $('[data-toggle="tooltip"]').tooltip();


    /* car detail slider*/

    $('.carDetl_slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.carDetl_slider-nav',
        responsive: [{
            breakpoint: 480,
            settings: {
                arrows: true
            }
        }, {
            breakpoint: 1000,
            settings: {
                arrows: true
            }
        }


        ]

    });
    $('.carDetl_slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.carDetl_slider-for',
        focusOnSelect: true,
        vertical: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3
            }
        }


        ]


    });
    /* clickable rows */
    $(".toDetail").click(function () {
        window.document.location = $(this).data("href");
    });

    if ($("#priceRange").length) {
        $("#priceRange").ionRangeSlider({
            type: "double",
            min: 1000,
            step: 500,
            max: 300000,
            postfix: " €",

        });
    }

    $('#calculate').on('click', function() {
        $('#price-calculator').toggle();
    })
});
