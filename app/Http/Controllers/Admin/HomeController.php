<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $todayOrders = Order::selectRaw("COUNT(*) count, SUM(total) total, DATE_FORMAT(created_at, '%Y-%m-%e') date")
            ->groupBy('date')
            ->having('date', "=", (new DateTime)->format('Y-m-d'))
            ->first();
        $yearOrders = Order::selectRaw("COUNT(*) count, SUM(total) total, MONTH(created_at) month")
            ->groupBy("month")
            ->get();
        $categories = Category::all();
        return view("admin.pages.dashboard", [
            'categories' => $categories,
            "todayOrders" => $todayOrders,
            "yearOrders" => $yearOrders
        ]);
    }
}