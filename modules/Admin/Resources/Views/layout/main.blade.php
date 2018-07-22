<!DOCTYPE html>
<html>
    <head>
        <title>后台管理系统</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="/layui/css/layui.css"/>
        <link rel="stylesheet" href="/adminStatic/css/admin.css"/>
        <script src="https://cdn.staticfile.org/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="/layui/layui.all.js"></script>
        <script type="text/javascript" src="/js/helpers.js"></script> 
        <script type="text/javascript" src="/adminStatic/js/admin.js"></script> 
        <style type="text/css">
            .layui-layout-admin .layui-header a, .layui-layout-admin .layui-header a cite {
                color: #f8f8f8;
            }
            .selected{
                color: #5FB878;
            }
        </style>
        @yield('style')
    </head>
    <body class="layui-layout-body" layadmin-themealias="default">
        <div id="LAY_app" class="layadmin-tabspage-none">
            <div class="layui-layout layui-layout-admin">
                <!-- 头部区域 -->
                @include('admin::layout.lib.header')
                <!-- 头部区域 - end -->
                <!-- 左侧栏 -->
                @yield('left')
                <!-- 左侧栏 - end -->
                <!-- 内容 -->
                @yield('content')
                <!-- 内容 - end -->
            </div>
        </div>
    </body>
</html>
@yield('js')
       
