$(function(){
    var //DOM对象
        oa = $("#LAY_app"),
        ob = $("#LAY_app_flexible"),
        oc = $("#LAY_app_menu"),
        od = $(".LAY_app_header"),
        oe = $("#LAY_app_admin"),
        of = $('#LAY_app_right'),
        og = $("#LAY_app_admin_info"),
        oh = $(".layui-nav-itemed"),
        oj = $(".template_bg"),

        //类名
        na = "layui-icon-shrink-right",
        nb = "layui-icon-spread-left",
        nc = "layui-side-menu",
        nd = "layadmin-side-shrink",
        ne = "layadmin-side-spread-sm",
        nf = "layui-show",
        ng = "layui-this",
        nh = "layui-disabled",
        nj = "layui-nav-itemed"
        ;


    var screen = function() {
        var e = window.innerWidth;
        return e >= 1200 ? 3 : e >= 992 ? 2 : e >= 768 ? 1 : 0
    }

    var w = screen();
    w < 3 ? (oc.css("display", ""), od.css("display", "none")) : '';
    w < 2 ? (ob.removeClass(na).addClass(nb)) : (ob.removeClass(nb).addClass(na));

    $(window).resize(function(){
        oa.removeClass(ne).removeClass(nd)
        var w = screen();
        w < 3 ? (oc.css("display", ""), od.css("display", "none")) : (oc.css("display", "none"), od.css("display", ""), of.removeClass(nf));
        w < 2 ? (ob.removeClass(na).addClass(nb)) : (ob.removeClass(nb).addClass(na));

    })

    //左侧栏
    ob.on('click', function(){
        if (ob.hasClass(na)) {
            sideFlexible("spread");
        } else {
            sideFlexible();
        }
    })

    oh.on('click', function(){
        if(oa.hasClass(nd)){
            ob.removeClass(nb).addClass(na)
            oa.removeClass(nd)
        }
    })

    //菜单栏
    oc.on('click', function(){
        og.removeClass(nf);
        oj.addClass(nf)
        if(of.hasClass(nf)) {
            oj.removeClass(nf);
        }
        of.toggleClass(nf);  
    })

    //管理员
    oe.on('click', function(){
        of.removeClass(nf);
        oj.addClass(nf)
        if(og.hasClass(nf)) {
            oj.removeClass(nf);
        }
        og.toggleClass(nf);  
    })

    //背景
    oj.on('click', function(){
        og.removeClass(nf);
        oj.removeClass(nf);
        of.removeClass(nf);
    })

    var sideFlexible = function(e) {
        "spread" == e ? (oa.addClass(nd), ob.removeClass(na).addClass(nb), w < 2 ? (oa.removeClass(ne).removeClass(nd) ) :'') : (oa.removeClass(nd), ob.removeClass(nb).addClass(na), w < 2 ? (oa.addClass(ne)) :'');
    }
})