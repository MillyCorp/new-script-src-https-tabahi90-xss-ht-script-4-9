<!DOCTYPE html>
<html>
    <head>
        <title>登录-后台管理系统</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="/layui/css/layui.css"/>
        <link rel="stylesheet" href="/adminStatic/css/admin.css"/>
        <link rel="stylesheet" href="/adminStatic/css/login.css"/>
        <script src="https://cdn.staticfile.org/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/helpers.js"></script> 
        <script type="text/javascript" src="/layui/layui.all.js"></script>   
    </head>
    <body layadmin-themealias="default" class="layui-layout-body">
        <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login">
            <div class="layadmin-user-login-main">
                <div class="layadmin-user-login-box layadmin-user-login-header">
                    <h2>crazy9115.com</h2>
                    <p>后台管理系统</p>
                </div>
                <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                        <input type="text" name="data[username]" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="data[password]" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
                    </div>
                </div>
            </div>
            <div class="layui-trans layadmin-user-login-footer">
                <p>© 2018<a href="http://www.crazy9115.com/" target="_blank">crazy9115.com</a></p>
                <p>
                    <span><a href="http://blog.crazy9115.com/" target="_blank">博客</a></span>
                    <span><a href="http://book.crazy9115.com/" target="_blank">书城</a></span>
                    <span><a href="http://mall.crazy9115.com/" target="_blank">商城</a></span>
                    <span><a href="http://wechat.crazy9115.com/" target="_blank">微信公众号</a></span>
                </p>
            </div>
        </div>
        <script type="text/javascript" color="0,104,183" opacity="1" zindex="-1" count="100" src="/adminStatic/js/jquery_canvas.js"></script>
        <canvas style="position: fixed; top: 0px; left: 0px; z-index: -1; opacity: 1;"></canvas>
    </body>
</html>
<script type="text/javascript">
    ;!function(){
        var $ = layui.$,
        setter = layui.setter,
        admin = layui.admin,
        form = layui.form,
        router = layui.router(),
        search = router.search;
        form.render();
        //提交
        form.on('submit(LAY-user-login-submit)',function(obj) {
            $.post('/passport/login', obj.field, function(data) {
                tips(data);
            },'json');
        });
    }();
</script>