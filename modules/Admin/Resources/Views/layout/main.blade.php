<!DOCTYPE html>
<html>
    <head>
        <title>后台管理系统</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <script src="https://cdn.staticfile.org/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/layui/css/layui.css"/>
        <script type="text/javascript" src="/layui/layui.all.js"></script>
        <script type="text/javascript" src="/static/js/helpers.js"></script>
        <link rel="stylesheet" href="/modules/admin/css/admin.css"/>
        <script type="text/javascript" src="/modules/admin/js/admin.js"></script>
        <style type="text/css">
            .layui-layout-admin .layui-header a, .layui-layout-admin .layui-header a cite {
                color: #f8f8f8;
            }
            .selected{
                color: #5FB878;
            }
            .block{
                display: block;
            }
            .none{
                display: none;
            }
            #LAY_app_right a {
                color: #f8f8f8;
            }
            .padfix{
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .template_bg {
                display: none;
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.2);
                z-index: 999;
            }            
        </style>
        @yield('style')
    </head>
    <body class="layui-layout-body">
        <div id="LAY_app" class="layadmin-tabspage-none">
            <div class="layui-layout layui-layout-admin">
                <!-- 头部区域 -->
                @include('admin::layout.lib.header')
                <!-- 头部区域end -->
                <!-- 左侧栏 -->
                @yield('left')
                <!-- 左侧栏end -->
                <!-- 内容 -->
                @yield('content')
                <!-- 内容end -->
                <!-- 右侧栏 -->
                @include('admin::layout.lib.right')
                <!-- 右侧栏end -->
                <!-- 遮罩 -->
                <div class="template_bg" style="display: none;"></div>
                <!-- 遮罩end -->
            </div>
        </div>
    </body>
</html>
@yield('js')
       
