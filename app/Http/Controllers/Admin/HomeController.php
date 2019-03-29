<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	//页面显示视图 主要布局
    public function index(){
    	return view('admin.index');
    }
}
