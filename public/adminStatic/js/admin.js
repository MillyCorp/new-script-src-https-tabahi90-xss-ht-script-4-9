// !function(){
 //    var c = "layui-show"
 //      , d = "layui-this"
 //      , y = "layui-disabled"
 //      , m = "#LAY_app_body"
 //      , h = "LAY_app_flexible"
 //      , f = "layadmin-side-spread-sm"
 //      , p = "layadmin-tabsbody-item"
 //      , v = "layui-icon-shrink-right"
 //      , b = "layui-icon-spread-left"
 //      , g = "layadmin-side-shrink"
 //      , C = "LAY-system-side-menu"

	// var screen = function() {
	// 	var e = r.width();
	// 	return e >= 1200 ? 3 : e >= 992 ? 2 : e >= 768 ? 1 : 0
	// }



 //    $("#"+h).on('click', function(){
 //    	alert(1);
 //    })
// }
$(function(){
	var body = $("#LAY_app"),
		flex = $("#LAY_app_flexible"),
		right = "layui-icon-shrink-right",
      	left = "layui-icon-spread-left",
      	m = "layui-side-menu",
      	g = "layadmin-side-shrink",
      	sm = "layadmin-side-spread-sm";

	var w = screen();
	w < 2 ? (flex.removeClass(right).addClass(left)) : (flex.removeClass(left).addClass(right));

    $(window).resize(function(){
    	var w = screen();
    	console.log(w)
    	w < 2 ? (flex.removeClass(right).addClass(left)) : (flex.removeClass(left).addClass(right));

	})

	flex.on('click', function(){
        if (flex.hasClass(right)) {
        	sideFlexible("spread");
        } else {
        	sideFlexible();
        }
    })


	var sideFlexible = function(e) {
	    var w = screen();
	    "spread" == e ? (body.addClass(g), flex.removeClass(right).addClass(left), w < 2 ? (body.removeClass(sm).removeClass(g) ) :'') : (body.removeClass(g), flex.removeClass(left).addClass(right), w < 2 ? (body.addClass(sm)) :'');
	    // "spread" === e ? (t.removeClass(b).addClass(v),
	    // l < 2 ? i.addClass(f) : i.removeClass(f),
	    // i.removeClass(g)) : (t.removeClass(v).addClass(b),
	    // l < 2 ? i.removeClass(g) : i.addClass(g),
	    // i.removeClass(f))
	}
})
