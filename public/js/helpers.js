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