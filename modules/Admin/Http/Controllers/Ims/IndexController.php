<?php

namespace Modules\Admin\Http\Controllers\Ims;

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
        return view('admin::ims.index');
    }
}