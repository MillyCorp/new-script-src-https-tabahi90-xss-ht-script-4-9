<?php

/**
 * 获取系统域名路由地址
 */
if (!function_exists('route_system_domain')) {
    function route_system_domain($prefix = null)
    {
        $url = config('app.url');
        $url = rtrim($url, '/');
        $domain = array_slice(explode('.', $url), 1);
        return $prefix . '.' . implode('.', $domain);
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