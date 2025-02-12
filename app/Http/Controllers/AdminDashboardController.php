<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{

    public $mainTitle;
    public $pageTitle;

    public function __construct()
    {
        $this->mainTitle = 'Dashboard';
        $this->pageTitle = 'Dashboard';
    }

    public function dashboard()
    {
        $orders_info = DB::table('restaurant_orders')
                 ->select('status', DB::raw('count(*) as total'))
                 ->groupBy('status')
                 ->get();
        $total_orders  = DB::table('restaurant_orders')->count();
        // return $orders_info;
        return view('dashboard',
        [ 
            'orders_info' => $orders_info,
            'totalorders' => $total_orders,
            'mainTitle'=>$this->mainTitle,
            'pageTitle'=>$this->pageTitle,
        ]);
    }
}
