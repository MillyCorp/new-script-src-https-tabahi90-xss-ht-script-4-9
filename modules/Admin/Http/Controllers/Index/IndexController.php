<?php

namespace Modules\Admin\Http\Controllers\Index;

use Illuminate\Support\Facades\Request;
use Modules\Admin\Http\Controllers\AdminController;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
    	$host = @gethostbyname($_SERVER['SERVER_NAME']);
    	$sysInfo = sys_linux();
    	$os = explode(" ", php_uname());

        $path = $this->pathInf();//项目在服务器的绝对路径
        $cpu = $this->cpuInf();//CPU使用状况
        $disk = $this->diskInf();//硬盘使用状况
    	list($memory, $swap) = $this->memoryInf();//内存使用状况
    	list($inf, $net) = $this->netInf();
    	

    	$data = compact('host', 'sysInfo', 'os', 'path', 'cpu', 'disk', 'memory', 'swap', 'inf', 'net');
        return view('admin::index.index', $data);
    }

    /*
    * 项目在服务器的绝对路径
    * @access private
    * @return string $path 项目路径
    */
    private function pathInf()
    {
        $route = $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));
        $path = substr($route,0,-7);
        return $path;
    }

    /*
    * CPU使用状况
    * @access private
    * @return array $cpu cpu信息
    */
    private function cpuInf()
    {
        if(sys_linux()) {
            $stat1 = GetCoreInformation();
            sleep(1);
            $stat2 = GetCoreInformation();
            $data = GetCpuPercentages($stat1, $stat2);
            $cpu = $data['cpu0']['user']."%us,  ".$data['cpu0']['sys']."%sy,  ".$data['cpu0']['nice']."%ni, ".$data['cpu0']['idle']."%id,  ".$data['cpu0']['iowait']."%wa,  ".$data['cpu0']['irq']."%irq,  ".$data['cpu0']['softirq']."%softirq";
            return $cpu;
        }
        return null;
    }

    /*
    * 硬盘使用状况
    * @access private
    * @return array $disk 硬盘信息
    */
    private function diskInf()
    {
        $disk['total'] = round(@disk_total_space(".")/(1024*1024*1024),3); //总
        $disk['free'] = round(@disk_free_space(".")/(1024*1024*1024),3); //可用
        $disk['used'] = $disk['total'] - $disk['free']; //已用
        $disk['percent'] = (floatval($disk['total'])!=0)?round($disk['used']/$disk['total']*100,2):0;
        return $disk;
    }

    /*
    * 内存使用状况
    * @access private
    * @return array $memory 内存使用状况
    */
    private function memoryInf()
    {
        if($sysInfo = sys_linux()) {
            $tmp = array('memTotal', 'memUsed', 'memFree', 'memPercent', 'memCached', 'memRealPercent', 'swapTotal', 'swapUsed', 'swapFree', 'swapPercent');
            foreach ($tmp AS $v) {
                $sysInfo[$v] = $sysInfo[$v] ? $sysInfo[$v] : 0;
            }
            //判断内存如果小于1G，就显示M，否则显示G单位
            if($sysInfo['memTotal']<1024)
            {
                $memory['total']            = $sysInfo['memTotal']." M";
                $memory['used']             = $sysInfo['memUsed']." M";
                $memory['free']             = $sysInfo['memFree']." M";
                $memory['cached']           = $sysInfo['memCached']." M";   //cache化内存
                $memory['buffers']          = $sysInfo['memBuffers']." M";  //缓冲
                $swap['total']              = $sysInfo['swapTotal']." M";
                $swap['used']               = $sysInfo['swapUsed']." M";
                $swap['free']               = $sysInfo['swapFree']." M";
                $swap['percent']            = $sysInfo['swapPercent'];
                $memory['realUsed']         = $sysInfo['memRealUsed']." M"; //真实内存使用
                $memory['realFree']         = $sysInfo['memRealFree']." M"; //真实内存空闲
                $memory['realPercent']      = $sysInfo['memRealPercent']; //真实内存使用比率
                $memory['percent']          = $sysInfo['memPercent']; //内存总使用率
                $memory['cachedPercent']    = $sysInfo['memCachedPercent']; //cache内存使用率
            }
            else
            {
                $memory['total']            = round($sysInfo['memTotal']/1024,3)." G";
                $memory['used']             = round($sysInfo['memUsed']/1024,3)." G";
                $memory['free']             = round($sysInfo['memFree']/1024,3)." G";
                $memory['cached']           = round($sysInfo['memCached']/1024,3)." G";
                $memory['buffers']          = round($sysInfo['memBuffers']/1024,3)." G";
                $swap['total']              = round($sysInfo['swapTotal']/1024,3)." G";
                $swap['used']               = round($sysInfo['swapUsed']/1024,3)." G";
                $swap['free']               = round($sysInfo['swapFree']/1024,3)." G";
                $swap['percent']            = $sysInfo['swapPercent'];
                $memory['realUsed']         = round($sysInfo['memRealUsed']/1024,3)." G"; //真实内存使用
                $memory['realFree']         = round($sysInfo['memRealFree']/1024,3)." G"; //真实内存空闲
                $memory['realPercent']      = $sysInfo['memRealPercent']; //真实内存使用比率
                $memory['percent']          = $sysInfo['memPercent']; //内存总使用率
                $memory['cachedPercent']    = $sysInfo['memCachedPercent']; //cache内存使用率
            }
            return [$memory, $swap];
        }
        return null;
    }

    /*
    * 网卡流量
    * @access private
    * @return array $inf $net 网卡,流量
    */
    private function netInf()
    {
        if(sys_linux()) {
            $strs = @file("/proc/net/dev");
            for ($i = 2; $i < count($strs); $i++ )
            {
                preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );
                $net['outSpeed'][$i] = $info[10][0];
                $net['inputSpeed'][$i] = $info[2][0];
                $net['input'][$i] = formatsize($info[2][0]);
                $net['out'][$i]  = formatsize($info[10][0]);
                $inf[$i] = $inf;
            }
            return [$inf, $net];
        }
        return null;
    }
}