//弹窗提醒
var tips = function(data) {
    layer.msg(data.msg, {
        offset: '15px',
        icon: data.status,
        time: 1500
    },
    function() {
    	if(data.url != "") {
    		window.location.href = data.url;
    	}
    });                 
}

//
var screen = function() {
    var e = document.body.clientWidth;
    return e >= 1200 ? 3 : e >= 992 ? 2 : e >= 768 ? 1 : 0
}

