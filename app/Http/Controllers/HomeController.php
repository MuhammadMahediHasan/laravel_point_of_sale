<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.admin_dashboard');
    }


    public function total_stock()
    {
        $data=DB::table('purchase_stock')->where('stock_status','Active')->count();
        return response([
            'data'=>$data
        ],200);
    }


    public function sold()
    {
        $total_sold=DB::table('purchase_stock')->where('stock_status','Inactive')->count();
        return response([
            'total_sold'=>$total_sold
        ],200);
    }


    public function purchase()
    {
        $total_purchase=DB::table('purchase_stock')->count();
        return response([
            'total_purchase'=>$total_purchase
        ],200);
    }


    public function product()
    {
        $product_template=DB::table('product_template')->count();
        return response([
            'product_template'=>$product_template
        ],200);
    }
}
