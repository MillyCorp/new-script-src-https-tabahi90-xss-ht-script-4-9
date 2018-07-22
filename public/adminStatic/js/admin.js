$(function(){
	var body = $("#LAY_app"),
		flex = $("#LAY_app_flexible"),
		menu = $("#LAY_app_menu"),
		header = $(".layui-icon-header-menu"),
		rmenu = $('#LAY_app_right'),
		right = "layui-icon-shrink-right",
      	left = "layui-icon-spread-left",
      	m = "layui-side-menu",
      	g = "layadmin-side-shrink",
      	sm = "layadmin-side-spread-sm";

	var w = screen();
	w < 2 ? (menu.css("display", ""), header.css("display", "none")) : '';
	w < 2 ? (flex.removeClass(right).addClass(left)) : (flex.removeClass(left).addClass(right));

    $(window).resize(function(){
    	var w = screen();
    	console.log(w)
    	w < 2 ? (menu.css("display", ""), header.css("display", "none")) : (menu.css("display", "none"), header.css("display", ""));
    	w < 2 ? (flex.removeClass(right).addClass(left)) : (flex.removeClass(left).addClass(right));

	})

	flex.on('click', function(){
        if (flex.hasClass(right)) {
        	sideFlexible("spread");
        } else {
        	sideFlexible();
        }
    })

	menu.on('click', function(){
		if (rmenu.hasClass("none")) {
        	rmenu.removeClass('none');
        } else {
        	rmenu.addClass('none');
        }
    })


	var sideFlexible = function(e) {
	    var w = screen();
	    "spread" == e ? (body.addClass(g), flex.removeClass(right).addClass(left), w < 2 ? (body.removeClass(sm).removeClass(g) ) :'') : (body.removeClass(g), flex.removeClass(left).addClass(right), w < 2 ? (body.addClass(sm)) :'');
	}
})
