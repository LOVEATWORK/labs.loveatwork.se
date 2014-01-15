/** Define globals for JSLint **/
/*global $, jQuery,$window,console,iScroll*/

var fadeStart = 500;
var fadeUntil = 1500;
var opacity;

function resizeDiv(obj, w, h) {
    "use strict";

    obj.css({"width": w + "px", "height": h + "px"});
}

(function () {

    "use strict";

    var ua = navigator.userAgent, isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);

    if (isMobileWebkit) {
        $('html').addClass('mobile');
    }

    $(function () {

        if (isMobileWebkit) {
            var iScrollInstance = new iScroll('wrapper');

            $('#scroller').stellar({
                scrollProperty: 'transform',
                positionProperty: 'transform',
                horizontalScrolling: false,
                verticalOffset: 40
            });
        } else {
            $.stellar({
                horizontalScrolling: false,
                verticalOffset: -140
            });
        }
    });

})();

$(document).ready(function () {
    "use strict";

    var c = $(".cover");

    resizeDiv(c, $(window).width(), $(window).height());

    $(window).on("resize", function () {
        resizeDiv(c, $(window).width(), $(window).height());
    });

    $(document).scroll(function () {

        if ($("body").hasClass("hascover")) {

            $(".content").addClass("stick");

            var winpos = $(window).scrollTop();

            if (winpos >= c.height()) {

                $(".article-content").css("top", 1200 + "px");

                $(".content")
                    .removeClass("stick");

                $(".fullpage").css("height", c.height());

                $("body").removeClass("hascover");

            } else if (winpos <= c.height) {
                $(".content").addClass("stick");
            }

        } else {

            if ($(this).scrollTop() <= fadeStart) {
                opacity = 1;
            } else if ($(this).scrollTop() <= fadeUntil) {
                opacity = 1 - $(this).scrollTop() / fadeUntil;
            } else if ($(this).scrollTop() >= fadeUntil) {
                opacity = 0;
            }

        }

        $('.yellow-bg').css({'opacity': opacity});

    });

});
