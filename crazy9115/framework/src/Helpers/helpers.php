<?php

/**
 * 获取系统域名路由地址
 */
if (!function_exists('route_system_domain')) {
    function route_system_domain($prefix = null)
    {
        $url = config('app.url');
        return $prefix . '.' . $url;
    }
}


/**
 * @return null|string
 *
 * 获取路由前缀 如:www admin ....
 */
if (!function_exists('domainPrefix')) {
	function domainPrefix()
	{
	    $url = request()->url();
	    if (!$url) {
	        return null;
	    }
	    $urls = parse_url($url);
	    $host = $urls['host'];
	    $segment = explode('.', $host)[0];
	    $segment = strtolower($segment);
	    return $segment;
	}
}

/**
 * @return string
 *
 * 将::1转为127.0.0.1
 */
if (!function_exists('localhost2ip')) {
	function localhost2ip($ip)
	{
	    if($ip == '::1') {
	    	return '127.0.0.1';
	    }
	    return $ip;
	}
}

/**
 * @return string
 *
 * 将::1转为127.0.0.1
 */
if (!function_exists('cuid')) {
	function cuid($len = 8) {
	    $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $rand = $code[rand(0,25)]
	        .strtoupper(dechex(date('m')))
	        .date('d').substr(time(),-5)
	        .substr(microtime(),2,5)
	        .sprintf('%02d',rand(0,99));
	    for(
	        $a = md5( $rand, true ),
	        $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
	        $d = '',
	        $f = 0;
	        $f < $len;
	        $g = ord( $a[ $f ] ),
	        $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
	        $f++
	    );
	    return $d;
	}
}

function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}