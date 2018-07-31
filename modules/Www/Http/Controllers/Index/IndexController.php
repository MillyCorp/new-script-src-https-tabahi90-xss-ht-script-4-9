<?php

namespace Modules\Www\Http\Controllers\Index;

use Illuminate\Http\Request;
use Modules\Www\Http\Controllers\WwwController;
use Crazy9115\Open51094;

class IndexController extends WwwController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
    	if($request->get('code')) {
			$open = new Open51094();
			$code = $_GET['code'];
			$inf = $open->me($code);
			dump($inf);	
    	}
    	dump(cuid(2));
    	dump(guid());
        return view('www::index.index');
    }
}