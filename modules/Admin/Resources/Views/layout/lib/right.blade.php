	<div class="none layui-layer layui-layer-page layui-anim layui-anim-rl layui-layer-adminRight" id="LAY_app_right" type="page" times="6" showtime="0" contype="string" style="z-index: 19891020; width: 100px; top: 25.5px; left: unset; right : 0px; background-color: #393D49;">
    <div id="LAY_adminPopupTheme" class="layui-layer-content">
        <div class="layui-card-body layadmin-setTheme">
            <ul >
		        <li class="padfix">
		            <a href="/www" layadmin-event="flexible" title="主页">
		                <i class="layui-icon layui-icon-home @if(\Request::is('www*')) selected @endif" > 主页</i>
		            </a>
		        </li>
		        <li class="padfix">
		            <a href="/blog" layadmin-event="flexible" title="博客">
		                <i class="layui-icon layui-icon-survey @if(\Request::is('blog*')) selected @endif" > 博客</i>
		            </a>
		        </li>
		        <li class="padfix">
		            <a href="/book" layadmin-event="flexible" title="书城">
		                <i class="layui-icon layui-icon-read @if(\Request::is('book*')) selected @endif" > 书城</i>
		            </a>
		        </li>
				<li class="padfix">
		            <a href="/mall" layadmin-event="flexible" title="商城">
		                <i class="layui-icon layui-icon-cart @if(\Request::is('mall*')) selected @endif" > 商城</i>
		            </a>
		        </li>
		        <li class="padfix">
		            <a href="/bbs" layadmin-event="flexible" title="论坛">
		                <i class="layui-icon layui-icon-chat @if(\Request::is('bbs*')) selected @endif" > 论坛</i>
		            </a>
		        </li>
				<li class="padfix">
		            <a href="/wechat" layadmin-event="flexible" title="公众号">
		                <i class="layui-icon layui-icon-login-wechat @if(\Request::is('wechat*')) selected @endif" > 公众号</i>
		            </a>
		        </li>
		        <li class="padfix">
		            <a href="/ims" layadmin-event="flexible" title="进销存">
		                <i class="layui-icon layui-icon-release @if(\Request::is('ims*')) selected @endif" > 进销存</i>
		            </a>
		        </li>
		        <li class="padfix">
		            <a href="/admin" layadmin-event="flexible" title="设置">
		                <i class="layui-icon layui-icon-set-fill @if(\Request::is('admin*')) selected @endif" > 设置</i>
		            </a>
		        </li>
            </ul>
        </div>
    </div>
</div