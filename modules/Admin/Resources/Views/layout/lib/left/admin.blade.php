<div class="layui-side layui-side-menu" style="background-color: #393D49;">
    <div class="layui-side-scroll">
        @include('admin::layout.lib.logo')
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="" data-jump="" class="layui-nav-item layui-nav-itemed layui-this">
                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>admin</cite>
                </a>
            </li>
            <li data-name="app" data-jump="" class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;" lay-tips="应用" lay-direction="2">
                    <i class="layui-icon layui-icon-app"></i>
                    <cite>应用</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="content" data-jump="" class="layui-nav-itemed">
                        <a href="javascript:;">内容系统<span class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="list" data-jump="" class="layui-this">
                                <a href="javascript:;" lay-href="app/content/list">文章列表</a>
                            </dd>
                            <dd data-name="tags" data-jump="">
                                <a href="javascript:;" lay-href="app/content/tags">分类管理</a>
                            </dd>
                            <dd data-name="comment" data-jump="">
                                <a href="javascript:;" lay-href="app/content/comment">评论管理</a>
                            </dd>
                        </dl>
                    </dd>
                    <dd data-name="forum" data-jump="">
                        <a href="javascript:;">社区系统<span class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="list" data-jump="">
                                <a href="javascript:;" lay-href="app/forum/list">帖子列表</a>
                            </dd>
                            <dd data-name="replys" data-jump="">
                                <a href="javascript:;" lay-href="app/forum/replys">回帖列表</a>
                            </dd>
                        </dl>
                    </dd>
                    <dd data-name="message" data-jump="" class="layui-this">
                        <a href="javascript:;" lay-href="app/message/">消息中心</a>
                    </dd>
                    <dd data-name="workorder" data-jump="app/workorder/list">
                        <a href="javascript:;" lay-href="app/workorder/list">工单系统</a>
                    </dd>
                </dl>
            </li>
            <span class="layui-nav-bar" style="top: 28px; height: 0px; opacity: 0;"></span>
        </ul>
    </div>
</div>