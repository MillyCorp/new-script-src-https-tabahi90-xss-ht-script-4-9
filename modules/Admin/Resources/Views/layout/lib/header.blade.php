<div class="layui-header" style="background-color: #393D49;">
    <ul class="layui-nav layui-layout-left layui-layout-right">
        @if(!(\Request::is('/')))
            <li class="layui-nav-item layadmin-flexible" lay-unselect="">
                <a href="javascript:;" layadmin-event="flexible" title="菜单">
                    <i id="LAY_app_flexible" class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                </a>
            </li>
        @endif
        <li class="layui-nav-item layadmin-flexible" lay-unselect="">
            <a href="/" layadmin-event="flexible" title="服务器">
                <i class="layui-icon layui-icon-util @if(\Request::is('/')) selected @endif" ></i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/www" layadmin-event="flexible" title="主页">
                <i class="layui-icon layui-icon-home @if(\Request::is('www*')) selected @endif" > 主页</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/blog" layadmin-event="flexible" title="博客">
                <i class="layui-icon layui-icon-survey @if(\Request::is('blog*')) selected @endif" > 博客</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/book" layadmin-event="flexible" title="书城">
                <i class="layui-icon layui-icon-read @if(\Request::is('book*')) selected @endif" > 书城</i>
            </a>
        </li>
		<li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/mall" layadmin-event="flexible" title="商城">
                <i class="layui-icon layui-icon-cart @if(\Request::is('mall*')) selected @endif" > 商城</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/bbs" layadmin-event="flexible" title="论坛">
                <i class="layui-icon layui-icon-chat @if(\Request::is('bbs*')) selected @endif" > 论坛</i>
            </a>
        </li>
		<li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/wechat" layadmin-event="flexible" title="公众号">
                <i class="layui-icon layui-icon-login-wechat @if(\Request::is('wechat*')) selected @endif" > 公众号</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/ims" layadmin-event="flexible" title="进销存">
                <i class="layui-icon layui-icon-release @if(\Request::is('ims*')) selected @endif" > 进销存</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible layui-icon-header-menu" lay-unselect="">
            <a href="/admin" layadmin-event="flexible" title="设置">
                <i class="layui-icon layui-icon-set-fill @if(\Request::is('admin*')) selected @endif" > 设置</i>
            </a>
        </li>
        <li class="layui-nav-item layadmin-flexible" lay-unselect="" style="display: none" id="LAY_app_menu">
            <a href="javascript:;" layadmin-event="flexible" title="菜单">
                <i class="layui-icon layui-icon-template-1" > 菜单</i>
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