$(function(){
	var body = $("#LAY_app"),
		flex = $("#LAY_app_flexible"),
		menu = $("#LAY_app_menu"),
		header = $(".layui-icon-header-menu"),
		rmenu = $('#LAY_app_right'),
		admin = $("#LAY_app_admin"),
		adminInfo = $("#LAY_app_admin_info"),
		item = $(".layui-nav-itemed"),
		right = "layui-icon-shrink-right",
      	left = "layui-icon-spread-left",
      	m = "layui-side-menu",
      	g = "layadmin-side-shrink",
      	sm = "layadmin-side-spread-sm";

	var w = screen();
	w < 3 ? (menu.css("display", ""), header.css("display", "none")) : '';
	w < 2 ? (flex.removeClass(right).addClass(left)) : (flex.removeClass(left).addClass(right));

    $(window).resize(function(){
    	var w = screen();
    	w < 3 ? (menu.css("display", ""), header.css("display", "none")) : (menu.css("display", "none"), header.css("display", ""), rmenu.removeClass('layui-show'));
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
		if (rmenu.hasClass("layui-show")) {
        	rmenu.removeClass('layui-show');
        } else {
        	rmenu.addClass('layui-show');
        }
    })

	admin.on('click', function(){
		if (adminInfo.hasClass("layui-show")) {
        	adminInfo.removeClass('layui-show');
        } else {
        	adminInfo.addClass('layui-show');
        }
    })

    item.on('click', function(){
    	if(body.hasClass(g)){
    		flex.removeClass(left).addClass(right)
    		body.removeClass(g)
    	}
    })

	var sideFlexible = function(e) {
	    "spread" == e ? (body.addClass(g), flex.removeClass(right).addClass(left), w < 2 ? (body.removeClass(sm).removeClass(g) ) :'') : (body.removeClass(g), flex.removeClass(left).addClass(right), w < 2 ? (body.addClass(sm)) :'');
	}
})
