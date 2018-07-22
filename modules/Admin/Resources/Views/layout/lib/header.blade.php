<div class="layui-header" style="background-color: #393D49;">
    <ul class="layui-nav layui-layout-left layui-layout-right">
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="javascript:;" layadmin-event="flexible" title="探针">
                <i id="LAY_app_flexible" class="layui-icon layui-icon-shrink-right @if(\Request::is('/')) selected @endif" id="LAY_app_flexible"></i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/www" layadmin-event="flexible" title="主页">
                <i class="layui-icon layui-icon-home @if(\Request::is('www*')) selected @endif" id="LAY_app_flexible"> 主页</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/blog" layadmin-event="flexible" title="博客">
                <i class="layui-icon layui-icon-survey @if(\Request::is('blog*')) selected @endif" id="LAY_app_flexible"> 博客</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/book" layadmin-event="flexible" title="书城">
                <i class="layui-icon layui-icon-read @if(\Request::is('book*')) selected @endif" id="LAY_app_flexible"> 书城</i>
            </a>
        </li>
		<li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/mall" layadmin-event="flexible" title="商城">
                <i class="layui-icon layui-icon-cart @if(\Request::is('mall*')) selected @endif" id="LAY_app_flexible"> 商城</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/bbs" layadmin-event="flexible" title="论坛">
                <i class="layui-icon layui-icon-chat @if(\Request::is('bbs*')) selected @endif" id="LAY_app_flexible"> 论坛</i>
            </a>
        </li>
		<li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/wechat" layadmin-event="flexible" title="公众号">
                <i class="layui-icon layui-icon-login-wechat @if(\Request::is('wechat*')) selected @endif" id="LAY_app_flexible"> 公众号</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/ims" layadmin-event="flexible" title="进销存">
                <i class="layui-icon layui-icon-release @if(\Request::is('ims*')) selected @endif" id="LAY_app_flexible"> 进销存</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/admin" layadmin-event="flexible" title="设置">
                <i class="layui-icon layui-icon-set-fill @if(\Request::is('admin*')) selected @endif" id="LAY_app_flexible"> 设置</i>
            </a>
        </li>                      
        <span class="layui-nav-bar" style="left: 206px; top: 48px; width: 0px; opacity: 0;"></span>
    </ul>
    <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
        <li class="layui-nav-item" lay-unselect="">
            <a href="javascript:;">
                <cite>admin</cite>
                <span class="layui-nav-more"></span>
            </a>
            <dl class="layui-nav-child layui-anim layui-anim-upbit">
                <dd>
                    <a lay-href="set/user/info">基本资料</a></dd>
                <dd>
                    <a lay-href="set/user/password">修改密码</a></dd>
                <hr>
                <dd layadmin-event="logout" style="text-align: center;">
                    <a>退出</a>
                </dd>
            </dl>
        </li>
        <span class="layui-nav-bar" style="left: 0px; top: 48px; width: 0px; opacity: 0;"></span>
    </ul>
</div>