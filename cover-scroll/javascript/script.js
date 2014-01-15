/** Define globals for JSLint **/
/*global $, jQuery,$window,console,iScroll*/

function resizeDiv(obj, w, h) {
	obj.css({"width": w + "px", "height": h + "px"});
}

$(document).ready(function() {

	var c = $(".cover");

	resizeDiv(c, $(window).width(), $(window).height());

	$(window).on("resize", function() {
		resizeDiv(c, $(window).width(), $(window).height());
	});


	$(window).scroll(function() {

		var winpos = $(window).scrollTop();

		if (winpos >= c.height()) {

			$(".content")
				.css("margin-top", (c.height() + 40) + "px")
				.removeClass("stick");

			$(".fullpage").css("height", c.height());

		} else if (winpos <= c.height) {
			$(".content").addClass("stick");
		}


		// console.log(c.height > winpos);


	});

});
