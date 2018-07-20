@extends('admin::layout.main')
@section('style')

@stop
@section('content')
<div class="layui-body" id="LAY_app_body">
	<div class="layadmin-tabsbody-item layui-show">
		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md10">
			      <div class="layui-row layui-col-space15">
			      	<div class="layui-col-md12">
          				<div class="layui-card">
            				{{-- <div class="layui-card-header"></div> --}}
            				<div class="layui-card-body">
            					<p>
            						<i class="layui-icon layui-icon-face-smile" style="font-size: 20px; color: #5FB878;"></i>
            						欢迎，管理员admin，这是您第13次登录，你的IP地址是：{{localhost2ip($_SERVER['REMOTE_ADDR'])}}，当前时间：2018-7-18 20:34:12，上次登录时间：2018-7-18 20:34:12
            					</p>
            				</div>
            			</div>
            		</div>
				    <div class="layui-col-md12">
                        {{-- 服务器参数 --}}
          				<div class="layui-card">
            				<div class="layui-card-header">服务器参数</div>
            				<div class="layui-card-body layui-text">
            					<table class="layui-table">
                                <colgroup>
                                  <col width="200">
                                  <col>
                                </colgroup>
                                <tbody>
                                  <tr>
                                    <td>服务器域名-IP地址</td>
                                    <td>{{@get_current_user()}}-{{$_SERVER['SERVER_NAME']}}-{{localhost2ip($_SERVER['SERVER_ADDR'])}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器标识</td>
                                    <td>{{php_uname()}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器主机</td>
                                    <td>操作系统：{{$os[0]}} &nbsp;内核版本：@if('/'==DIRECTORY_SEPARATOR) {{$os[2]}} @else {{$os[1]}} @endif  &nbsp;主机名：@if('/'==DIRECTORY_SEPARATOR) {{$os[1]}} @else {{$os[2]}} @endif</td>
                                  </tr>
                                  <tr>
                                    <td>服务器解译引擎</td>
                                    <td>{{$_SERVER['SERVER_SOFTWARE']}} &nbsp;端口：{{$_SERVER['SERVER_PORT']}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器语言</td>
                                    <td>{{getenv("HTTP_ACCEPT_LANGUAGE")}}</td>
                                  </tr>
                                  <tr>
                                    <td>项目绝对路径</td>
                                    <td>{{$path}}</td>
                                  </tr>
                                </tbody>
                              </table>
            				</div>
            			</div>
                        {{-- 服务器实时数据 --}}
                        <div class="layui-card">
                            <div class="layui-card-header">服务器实时数据</div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                <colgroup>
                                  <col width="200">
                                  <col>
                                </colgroup>
                                <tbody>
                                  <tr>
                                    <td>服务器已运行时间</td>
                                    <td>{!! $sysInfo['uptime'] or '<span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span>' !!}</td>
                                  </tr>
                                  <tr>
                                    <td>CPU型号@if(!empty($sysInfo))[{{$sysInfo['cpu']['num'] or ''}}核]@endif</td>
                                    <td>{!! $sysInfo['cpu']['model'] or '<span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span>' !!}</td>
                                  </tr>
                                  <tr>
                                    <td>CPU使用状况</td>
                                    <td>{!! $cpu or '<span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span>' !!}</td>
                                  </tr>
                                  <tr>
                                    <td>硬盘使用状况</td>
                                    <td>
                                        <p>总空间{{$disk['total']}}G，已用{{$disk['used']}}G，可用{{$disk['free']}}G，使用率{{$disk['percent']}}%</p>
                                        <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                            <div class="layui-progress-bar layui-bg-green" lay-percent="{{$disk['percent']}}%" style="width: {{$disk['percent']}}%;">
                                                <span class="layui-progress-text">{{$disk['percent']}}%</span>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>内存使用状况</td>
                                    <td>
                                        @if($sysInfo)
                                            {{-- 物理内存 --}}
                                            <p>物理内存：共{{$memory['total'] or ''}}，已用{{$memory['used'] or ''}}，空闲{{$memory['free'] or ''}}，使用率{{$memory['percent'] or ''}}%</p>
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-green" lay-percent="{{$disk['percent']}}%" style="width: {{$disk['percent']}}%;">
                                                    <span class="layui-progress-text">{{$disk['percent']}}%</span>
                                                </div>
                                            </div>
                                            {{-- Cache化内存 --}}
                                            <p>Cache化内存为：{{$memory['cached']}}，使用率{{$memory['cachedPercent']}}%，Buffers缓冲为{{$memory['buffers']}}</p>
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-green" lay-percent="{{$memory['cachedPercent']}}%" style="width: {{$memory['cachedPercent']}}%;">
                                                    <span class="layui-progress-text">{{$memory['cachedPercent']}}%</span>
                                                </div>
                                            </div>
                                            {{-- 真实内存 --}}
                                            <p>真实内存使用{{$memory['realUsed']}}，真实内存空闲{{$memory['realFree']}}，使用率{{$memory['realPercent']}}%
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-green" lay-percent="{{$memory['realPercent']}}%" style="width: {{$memory['realPercent']}}%;">
                                                    <span class="layui-progress-text">{{$memory['realPercent']}}%</span>
                                                </div>
                                            </div>
                                            {{-- SWAP区 --}}
                                            <p>SWAP区：共{{$swap['total']}}，已使用{{$swap['used']}}，空闲{{$swap['free']}}，使用率{{$swap['percent']}}%
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-green" lay-percent="{{$swap['percent']}}%" style="width: {{$swap['percent']}}%;">
                                                    <span class="layui-progress-text">{{$swap['percent']}}%</span>
                                                </div>
                                            </div>                                                
                                        @else
                                            <span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span>                                          
                                        @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>系统平均负载</td>
                                    <td>{!! $sysInfo['loadAvg'] or '<span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span>' !!}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        {{-- 网络使用状况 --}}
                        <div class="layui-card">
                            <div class="layui-card-header">网络使用状况 @if(empty($inf)) <span style="font-size: 12px; color: #999;">(暂时只支持Linux系统)</span> @endif </div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                <colgroup>
                                  <col width="200">
                                  <col>
                                </colgroup>
                                <tbody>
                                @if(!empty($inf))
                                    @foreach($inf as $i=>$v)
                                      <tr>
                                        <td>{{$v[1][0]}}: </td>
                                        <td>
                                            <p>已接收：{{$net['input'][$i]}}；实时：{{$net['input'][$i]}}；已发送：{{$net['outSpeed'][$i]}}；实时：{{$net['out'][$i]}}</p>
                                        </td>
                                      </tr>
                                    @endforeach
                                @endif
                                </tbody>
                              </table>
                            </div>
                        </div>                                            
            		</div>            		
            	</div>
            </div>
        </div>
    </div>
</div>
@stop