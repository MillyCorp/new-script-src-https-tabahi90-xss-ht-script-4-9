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
                                    <td>{{@get_current_user()}}-{{$_SERVER['SERVER_NAME'] or ''}}-{{localhost2ip($_SERVER['SERVER_ADDR'])}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器标识</td>
                                    <td>{{php_uname()}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器主机</td>
                                    <td>操作系统：{{$os[0] or ''}} &nbsp;内核版本：@if('/'==DIRECTORY_SEPARATOR) {{$os[2] or ''}} @else {{$os[1] or ''}} @endif  &nbsp;主机名：@if('/'==DIRECTORY_SEPARATOR) {{$os[1] or ''}} @else {{$os[2] or ''}} @endif</td>
                                  </tr>
                                  <tr>
                                    <td>服务器解译引擎</td>
                                    <td>{{$_SERVER['SERVER_SOFTWARE'] or ''}} &nbsp;端口：{{$_SERVER['SERVER_PORT'] or ''}}</td>
                                  </tr>
                                  <tr>
                                    <td>服务器语言</td>
                                    <td>{{getenv("HTTP_ACCEPT_LANGUAGE")}}</td>
                                  </tr>
                                  <tr>
                                    <td>管理员邮箱</td>
                                    <td>{{$_SERVER['SERVER_ADMIN'] or ''}}</td>
                                  </tr>
                                  <tr>
                                    <td>项目绝对路径</td>
                                    <td>{{$path or ''}}</td>
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
                                        <p>总空间{{$disk['total'] or ''}}G，已用{{$disk['used'] or ''}}G，可用{{$disk['free'] or ''}}G，使用率{{$disk['percent'] or ''}}%</p>
                                        <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                            <div class="layui-progress-bar layui-bg-green" lay-percent="{{$disk['percent'] or ''}}%" style="width: {{$disk['percent'] or ''}}%;">
                                                <span class="layui-progress-text">{{$disk['percent'] or ''}}%</span>
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
                                                <div class="layui-progress-bar layui-bg-orange" lay-percent="{{$memory['percent'] or ''}}%" style="width: {{$memory['percent'] or ''}}%;">
                                                    <span class="layui-progress-text">{{$memory['percent'] or ''}}%</span>
                                                </div>
                                            </div>
                                            {{-- Cache化内存 --}}
                                            <p>Cache化内存为：{{$memory['cached'] or ''}}，使用率{{$memory['cachedPercent'] or ''}}%，Buffers缓冲为{{$memory['buffers'] or ''}}</p>
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-blue" lay-percent="{{$memory['cachedPercent'] or ''}}%" style="width: {{$memory['cachedPercent'] or ''}}%;">
                                                    <span class="layui-progress-text">{{$memory['cachedPercent'] or ''}}%</span>
                                                </div>
                                            </div>
                                            {{-- 真实内存 --}}
                                            <p>真实内存使用{{$memory['realUsed'] or ''}}，真实内存空闲{{$memory['realFree'] or ''}}，使用率{{$memory['realPercent'] or ''}}%
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-cyan" lay-percent="{{$memory['realPercent'] or ''}}%" style="width: {{$memory['realPercent'] or ''}}%;">
                                                    <span class="layui-progress-text">{{$memory['realPercent'] or ''}}%</span>
                                                </div>
                                            </div>
                                            {{-- SWAP区 --}}
                                            <p>SWAP区：共{{$swap['total'] or ''}}，已使用{{$swap['used'] or ''}}，空闲{{$swap['free'] or ''}}，使用率{{$swap['percent'] or ''}}%
                                            <div class="layui-progress layui-progress-big" lay-showpercent="true">
                                                <div class="layui-progress-bar layui-bg-red" lay-percent="{{$swap['percent'] or ''}}%" style="width: {{$swap['percent'] or ''}}%;">
                                                    <span class="layui-progress-text">{{$swap['percent'] or ''}}%</span>
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
                                        <td>{{$v[1][0] or ''}}: </td>
                                        <td>
                                            <p>已接收：{{$net['input'][$i] or ''}}；实时：0B/s；已发送：{{$net['out'][$i] or ''}}；实时：0B/s</p>
                                        </td>
                                      </tr>
                                    @endforeach
                                @endif
                                </tbody>
                              </table>
                            </div>
                        </div>
                        {{-- PHP已编译模块检测 --}}
                        <div class="layui-card">
                            <div class="layui-card-header">PHP已编译模块检测</div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                <colgroup>
                                  <col width="200">
                                  <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if(count(get_loaded_extensions()))
                                                @foreach (get_loaded_extensions() as $key=>$value)
                                                    {!!"$value&nbsp;&nbsp;"!!}
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        {{-- PHP相关参数 --}}
                        <div class="layui-card">
                            <div class="layui-card-header">PHP相关参数</div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                <colgroup>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>PHP信息（phpinfo）：</td>
                                        <td><a href='/phpinfo'>PNPINFO</a></td>
                                        <td>PHP版本（php_version）: </td>
                                        <td>{{PHP_VERSION}}</td>                                        
                                    </tr>
                                    <tr>
                                        <td>默认支持函数（enable_functions）：</td>
                                        <td><a href="/enable_functions">查看详细信息</a></td>
                                        <td>被禁用的函数（disable_functions）：</td>
                                        <td>
                                            <?php 
                                                $disFuns=get_cfg_var("disable_functions");
                                                if(empty($disFuns)){
                                                    echo '<font color=red>×</font>';
                                                } else { 
                                                    //echo $disFuns;
                                                    $disFuns_array =  explode(',',$disFuns);
                                                    foreach ($disFuns_array as $key=>$value) 
                                                    {
                                                        if ($key!=0 && $key%5==0) {
                                                            echo '<br />';
                                                        }
                                                        echo "$value&nbsp;&nbsp;";
                                                    }   
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PHP运行方式：</td>
                                        <td>{{strtoupper(php_sapi_name())}}</td>
                                        <td>脚本占用最大内存（memory_limit）: </td>
                                        <td>{{show("memory_limit")}}</td>                                        
                                    </tr>
                                    <tr>
                                        <td>PHP安全模式（safe_mode）：</td>
                                        <td><?php echo show("safe_mode");?></td>
                                        <td>POST方法提交最大限制（post_max_size）：</td>
                                        <td><?php echo show("post_max_size");?></td>
                                    </tr>
                                    <tr>
                                        <td>上传文件最大限制（upload_max_filesize）：</td>
                                        <td><?php echo show("upload_max_filesize");?></td>
                                        <td>浮点型数据显示的有效位数（precision）：</td>
                                        <td><?php echo show("precision");?></td>
                                    </tr>
                                    <tr>
                                        <td>脚本超时时间（max_execution_time）：</td>
                                        <td><?php echo show("max_execution_time");?>秒</td>
                                        <td>socket超时时间（default_socket_timeout）：</td>
                                        <td><?php echo show("default_socket_timeout");?>秒</td>
                                    </tr>
                                    <tr>
                                        <td>PHP页面根目录（doc_root）：</td>
                                        <td><?php echo show("doc_root");?></td>
                                        <td>用户根目录（user_dir）：</td>
                                        <td><?php echo show("user_dir");?></td>
                                    </tr>
                                    <tr>
                                        <td>dl()函数（enable_dl）：</td>
                                        <td><?php echo show("enable_dl");?></td>
                                        <td>指定包含文件目录（include_path）：</td>
                                        <td><?php echo show("include_path");?></td>
                                    </tr>
                                    <tr>
                                        <td>显示错误信息（display_errors）：</td>
                                        <td><?php echo show("display_errors");?></td>
                                        <td>自定义全局变量（register_globals）：</td>
                                        <td><?php echo show("register_globals");?></td>
                                    </tr>
                                    <tr>
                                        <td>数据反斜杠转义（magic_quotes_gpc）：</td>
                                        <td><?php echo show("magic_quotes_gpc");?></td>
                                        <td>"&lt;?...?&gt;"短标签（short_open_tag）：</td>
                                        <td><?php echo show("short_open_tag");?></td>
                                    </tr>
                                    <tr>
                                        <td>"&lt;% %&gt;"ASP风格标记（asp_tags）：</td>
                                        <td><?php echo show("asp_tags");?></td>
                                        <td>忽略重复错误信息（ignore_repeated_errors）：</td>
                                        <td><?php echo show("ignore_repeated_errors");?></td>
                                    </tr>
                                    <tr>
                                        <td>忽略重复的错误源（ignore_repeated_source）：</td>
                                        <td><?php echo show("ignore_repeated_source");?></td>
                                        <td>报告内存泄漏（report_memleaks）：</td>
                                        <td><?php echo show("report_memleaks");?></td>
                                    </tr>
                                    <tr>
                                        <td>自动字符串转义（magic_quotes_gpc）：</td>
                                        <td><?php echo show("magic_quotes_gpc");?></td>
                                        <td>外部字符串自动转义（magic_quotes_runtime）：</td>
                                        <td><?php echo show("magic_quotes_runtime");?></td>
                                    </tr>
                                    <tr>
                                        <td>打开远程文件（allow_url_fopen）：</td>
                                        <td><?php echo show("allow_url_fopen");?></td>
                                        <td>声明argv和argc变量（register_argc_argv）：</td>
                                        <td><?php echo show("register_argc_argv");?></td>
                                    </tr>
                                    <tr>
                                        <td>Cookie 支持：</td>
                                        <td><?php echo isset($_COOKIE)?'<font color="green">√</font>' : '<font color="red">×</font>';?></td>
                                        <td>拼写检查（ASpell Library）：</td>
                                        <td><?php echo isfun("aspell_check_raw");?></td>
                                    </tr>
                                    <tr>
                                        <td>高精度数学运算（BCMath）：</td>
                                        <td><?php echo isfun("bcadd");?></td>
                                        <td>PREL相容语法（PCRE）：</td>
                                        <td><?php echo isfun("preg_match");?></td>
                                    <tr>
                                        <td>PDF文档支持：</td>
                                        <td><?php echo isfun("pdf_close");?></td>
                                        <td>SNMP网络管理协议：</td>
                                        <td><?php echo isfun("snmpget");?></td>
                                    </tr> 
                                    <tr>
                                        <td>VMailMgr邮件处理：</td>
                                        <td><?php echo isfun("vm_adduser");?></td>
                                        <td>Curl支持：</td>
                                        <td><?php echo isfun("curl_init");?></td>
                                    </tr> 
                                    <tr>
                                        <td>SMTP支持：</td>
                                        <td><?php echo get_cfg_var("SMTP")?'<font color="green">√</font>' : '<font color="red">×</font>';?></td>
                                        <td>SMTP地址：</td>
                                        <td><?php echo get_cfg_var("SMTP")?get_cfg_var("SMTP"):'<font color="red">×</font>';?></td>
                                    </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>                        
                        {{-- 组件支持 --}}
                        <div class="layui-card">
                            <div class="layui-card-header">组件支持</div>
                            <div class="layui-card-body layui-text">
                                <table class="layui-table">
                                <colgroup>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td width="32%">FTP支持：</td>
                                        <td width="18%"><?php echo isfun("ftp_login");?></td>
                                        <td width="32%">XML解析支持：</td>
                                        <td width="18%"><?php echo isfun("xml_set_object");?></td>
                                    </tr>
                                    <tr>
                                        <td>Session支持：</td>
                                        <td><?php echo isfun("session_start");?></td>
                                        <td>Socket支持：</td>
                                        <td><?php echo isfun("socket_accept");?></td>
                                    </tr>
                                    <tr>
                                        <td>Calendar支持</td>
                                        <td><?php echo isfun('cal_days_in_month');?>
                                        </td>
                                        <td>允许URL打开文件：</td>
                                        <td><?php echo show("allow_url_fopen");?></td>
                                    </tr>
                                    <tr>
                                    <td>GD库支持：</td>
                                        <td>
                                            <?php
                                            if(function_exists('gd_info')) {
                                                $gd_info = @gd_info();
                                                echo $gd_info["GD Version"];
                                            } else {echo '<font color="red">×</font>';}
                                            ?>
                                        </td>
                                        <td>压缩文件支持(Zlib)：</td>
                                        <td><?php echo isfun("gzclose");?></td>
                                    </tr>
                                    <tr>
                                        <td>IMAP电子邮件系统函数库：</td>
                                        <td><?php echo isfun("imap_close");?></td>
                                        <td>历法运算函数库：</td>
                                        <td><?php echo isfun("JDToGregorian");?></td>
                                    </tr>
                                    <tr>
                                        <td>正则表达式函数库：</td>
                                        <td><?php echo isfun("preg_match");?></td>
                                        <td>WDDX支持：</td>
                                        <td><?php echo isfun("wddx_add_vars");?></td>
                                    </tr>
                                    <tr>
                                        <td>Iconv编码转换：</td>
                                        <td><?php echo isfun("iconv");?></td>
                                        <td>mbstring：</td>
                                        <td><?php echo isfun("mb_eregi");?></td>
                                    </tr>
                                    <tr>
                                        <td>高精度数学运算：</td>
                                        <td><?php echo isfun("bcadd");?></td>
                                        <td>LDAP目录协议：</td>
                                        <td><?php echo isfun("ldap_close");?></td>
                                    </tr>
                                    <tr>
                                        <td>MCrypt加密处理：</td>
                                        <td><?php echo isfun("mcrypt_cbc");?></td>
                                        <td>哈稀计算：</td>
                                        <td><?php echo isfun("mhash_count");?></td>
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
@stop