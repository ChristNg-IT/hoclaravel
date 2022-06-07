<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //echo 'Khởi động Dashboard';//contruct luôn luôn chạy đầu tiên trước các action
        //return 'Khởi động Dashboard';
        //Sử dụng Session để check login
    }
    public function index(){
        return '<h2>Dashboard Welcome</h2>';
    }
}
