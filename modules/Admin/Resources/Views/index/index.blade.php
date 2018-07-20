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
                                          
            		</div>            		
            	</div>
            </div>
        </div>
    </div>
</div>
@stop