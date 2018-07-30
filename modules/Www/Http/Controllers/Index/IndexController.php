<?php

namespace Modules\Www\Http\Controllers\Index;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Modules\Www\Http\Controllers\WwwController;

class IndexController extends WwwController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('welcome');
    }
}