<?php

namespace Modules\Admin\Http\Controllers\Passport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Url;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Http\Controllers\AdminController;

class PassportController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     * 登录
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            Session::put('admin.user', '1');
            Session::save();
            return $this->success('登录成功', '/');
        }
        return view('admin::passport.login');
    }

    public function logout()
    {
        Session::forget('admin.user');
        return view('admin::passport.login');
    }
}