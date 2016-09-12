$(document).ready(function () {
    var app = {
        carSlider: function () {
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
                }]
            });
        },
        testimonialSlider: function () {
            $('.testimonialSlider').slick({
                autoplay: true,
                autoplaySpeed: 6000,
            });
        },
        dropDownMenu: function () {
            $('.dropdown-menu').on({
                "click": function (e) {
                    e.stopPropagation();
                }
            });
        },
        preventDefaultFunc: function () {
            $("[href$='#']").click(function (e) {
                e.preventDefault();
            });
        },
        stationOptions: function () {
            $("#select_from_time div span").click(function () {
                var val = $(this).text();
                $("#from_time_dropdown").val(val);
                $('[data-toggle="dropdown"]').parent().removeClass('open');
            });

            $("#select_to_time div span").click(function () {
                var val = $(this).text();
                $("#to_time_dropdown").val(val);
                $('[data-toggle="dropdown"]').parent().removeClass('open');
            })


            var $container = $("#station_dropdown_open"),
                $fromStation = $(".from_stationList", $container).hide(),
                $prev;

            $(".f_stnDdown_left ul li", $container).mouseenter(function () {
                if ($prev)
                    $fromStation.eq($prev.removeClass("active").index()).hide();
                $fromStation.eq(($prev = $(this).addClass("active")).index()).show();
            }).eq(0).mouseenter();

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
                var stationID = $(this).data('station-id');
                $("#to_station").val(stationID);
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

        },
        loginBox: function () {
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
        },
        filterOptions: function () {
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
        },

        changeDataPanel: function () {
            $('#changeDataTrigger').on('click', function (event) {
                $('#changeDataPanel').slideToggle('fast');
            });
        },
        activateToolTip: function () {
            /* activete tooltips */
            $('[data-toggle="tooltip"]').tooltip();
        },
        carDetailsSlider: function () {
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
        },
        carDetails: function () {
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
                }]
            });
            /* clickable rows */
            $(".toDetail").click(function () {
                window.document.location = $(this).data("href");
            });
        },
        priceRange: function () {
            if ($("#priceRange").length) {
                $("#priceRange").ionRangeSlider({
                    type: "double",
                    min: 1000,
                    step: 500,
                    max: 300000,
                    postfix: " €",

                });
            }
        }, calculator: function () {
            $('#calculate').on('click', function () {
                $('#price-calculator').toggle();
            })
        }, mainSlider: function (slider) {
            $(slider).slick({
                autoplay: true,
                autoplaySpeed: 3000,
            });

            /* car detail slider*/


        }
    };
    app.mainSlider('.mainSlider');
    app.carSlider();
    app.testimonialSlider();
    app.dropDownMenu();
    app.preventDefaultFunc();
    app.stationOptions();
    app.loginBox();
    app.filterOptions();
    app.activateToolTip();
    app.carDetailsSlider();
    app.carDetails();
    app.priceRange();
    app.changeDataPanel();
    app.calculator();
});
