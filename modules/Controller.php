<?php

namespace Modules;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        
    }    

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @return void
     */
    protected function success($message = '', $jumpUrl = '')
    {
        return $this->dispatchJump(1, $message, $jumpUrl);
    }

    /**
     * 操作失败转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @return void
     */
    protected function error($message = '', $jumpUrl = '')
    {
        return $this->dispatchJump(2, $message, $jumpUrl);
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @return void
     */
    protected function warn($message = '', $jumpUrl = '')
    {
        return $this->dispatchJump(7, $message, $jumpUrl);
    }

    /**
     * 默认跳转操作 支持错误导向和正确跳转
     * 调用模板显示 默认为public目录下面的success页面
     * 提示页面为可配置 支持模板标签
     * @access private
     * @param intiger $status 状态
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @return void
     */
    private function dispatchJump($status, $message, $jumpUrl = '')
    {
        $data['status'] = $status;
        $data['msg']    = $message;
        $data['url']    = $jumpUrl;
        return $this->ajaxReturn($data);
    }


    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @return void
     */
    protected function ajaxReturn($data, $type = '')
    {
        if (empty($type)) {
            $type = 'JSON';
        }
        switch (strtoupper($type)) {
            case 'JSON':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML':
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler = request('callback') ? request('callback') : 'jsonpReturn';
                exit($handler . '(' . json_encode($data) . ');');
            case 'EVAL':
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);
        }
    }
}