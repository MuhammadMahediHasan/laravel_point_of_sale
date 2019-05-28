<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductTemplateModel;
use App\BrandModel;
use App\CustomerModel;
use App\SalesMainModel;
use App\SalesProductModel;
use App\SalesProductPricingModel;
use App\PurchaseProductModel;
use App\PurchaseStockModel;
use PDF;
use DB;
class ReportController extends Controller
{
    public function report()
    {
    	return view('report.daily_report');
    }

    public function daily_report(Request $request)
    {
    	$data= SalesMainModel::where('sales_main_date',$request->date)->get();

		if(count($data) > 0)
		{
			    	$table="<div class=\"col-sm-12 text-center\">";
					$table.="<h4>TMSS DEPARTMENTAL STORE</h4>";
					$table.="<h5>Daily Report</h5>";
					$table.="<P>Kazipara, Mirpur, Dhaka.</P>";
				$table.="</div>";
				$table.="<div class=\"col-sm-12\">";
				$table.="<P style=\"margin-bottom: -22px;margin-top: 58px;\"><b>Date : ".date('d-M-Y',strtotime($request->date));"</b></P>";
			$table.="</div>";
				$table.="<div class=\"col-sm-12\">";
				$table.="<table class=\"table table-bordered\" style=\"margin-top: 25px;\">";
				   $table.="<thead>";
				      $table.="<tr style=\"background: #333e51;\">";
				        $table.="<th>Date</th>";
				        $table.="<th>Name</th>";
				        $table.="<th>Quantity</th>";
				        $table.="<th>Sub Total</th>";
				      $table.="</tr>";
				    $table.="</thead>";
				    $table.="<tbody>";
				    $i = 0;
				    foreach ($data as $key => $report_data) 
		    		{
		    		$report_data=SalesProductModel::where('sales_main_id',$report_data->sales_main_id)
		    		->get();
		    		 
			    		foreach ($report_data as $key => $value) 
			    		{
			    			$name=DB::table('product_template')->where('product_id',$value->product_name)->first();
					      $table.="<tr>";
					        $table.="<td>".date('d-M-Y',strtotime($request->date));"</td>";
					        $table.="<td>$name->product_name</td>";
					        $table.="<td>$value->quantity</td>";
					        $table.="<td>$value->sub_total</td>";
					      $table.="</tr>";
					     $i += $value->sub_total;
			    		}
		    		}
		    		$table.="<tr>";
					    $table.="<th colspan=\"3\" class=\"text-center\">Total : $i </th>";
					$table.="</tr>";
				    $table.="</tbody>";
				  $table.="</table>";
				$table.="</div>";	

				echo $table;	
		}
		else
		{
			echo "<font color='red'><h2>No Data Found</h2></font>";
		}
    }


    public function monthly_report()
    {
    	return view('report.monthly_report');
    }


    public function get_monthly_report(Request $request)
    {
    	$first_date=$request->first_date;
    	$second_date=$request->second_date;

    	$data=SalesMainModel::whereBetween('sales_main_date',[$first_date,$second_date])->get();
    	// echo "<pre>";
    	// print_r($data);

    	$table="<div class=\"col-sm-12 text-center\">";
			$table.="<h4>TMSS DEPARTMENTAL STORE</h4>";
			$table.="<h5>Monthly Report</h5>";
			$table.="<P>Kazipara, Mirpur, Dhaka.</P>";
		$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
				$table.="<P style=\"margin-bottom: -60px;margin-top: 58px;\"><b>From : ".date('d-M-Y',strtotime($first_date));"</b></P>";
				$table.="<P style=\"margin-bottom: -22px;margin-top: 58px;\"><b>To : ".date('d-M-Y',strtotime($second_date));"</b></P>";
			$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
		$table.="<table class=\"table table-bordered\" style=\"margin-top: 25px;\">";
		   $table.="<thead>";
		      $table.="<tr style=\"background: #333e51;\">";
		        $table.="<th>Date</th>";
		        $table.="<th>Name</th>";
		        $table.="<th>Quantity</th>";
		        $table.="<th>Sub Total</th>";
		      $table.="</tr>";
		    $table.="</thead>";
		    $table.="<tbody>";
		    $i = 0;
    	foreach ($data as $key => $report_data) 
    	{
    		$report_data=SalesProductModel::where('sales_main_id',$report_data->sales_main_id)->get();
    		foreach ($report_data as $key => $value) 
    		{
    			// echo "<pre>";
    			// print_r($value);
    			$name=DB::table('product_template')->where('product_id',$value->product_name)->first();
    			$date=DB::table('sales_main')->where('sales_main_id',$value->sales_main_id)->first();
    			// echo "<pre>";
    			// print_r($name);
    			$table.="<tr>";
			        $table.="<td>".date('d-M-Y',strtotime($date->sales_main_date));"</td>";
			        $table.="<td>$name->product_name</td>";
			        $table.="<td>$value->quantity</td>";
			        $table.="<td>$value->sub_total</td>";
			      $table.="</tr>";
			     $i += $value->sub_total;
    		}
    	}
    	$table.="<tr>";
			    $table.="<th colspan=\"3\" class=\"text-center\">Total : $i </th>";
			$table.="</tr>";
		    $table.="</tbody>";
		  $table.="</table>";
		$table.="</div>";	

		echo $table;
    }


    public function product_report()
    {	
    	$data['product']=ProductTemplateModel::all();
    	$data['brand']=BrandModel::all();
    	return view('report.product_report',$data);
    }



    public function get_product_report(Request $request)
    {	

    	$query=ProductTemplateModel::all();
    	if($request->product_name)
    	{
    		$query=$query->where('product_id',$request->product_name);
    	}

    	if($request->brand_name)
    	{
    		$query=$query->where('brand_name',$request->brand_name);
    	}
    	if($request->user_define)
    	{
    		$query=ProductTemplateModel::Where('product_code','like','%'.$request->user_define.'%')
						->orWhere('brand_name','like','%'.$request->user_define.'%')
						->orWhere('product_cost','like','%'.$request->user_define.'%')
						->orWhere('product_mrp','like','%'.$request->user_define.'%')
						->orWhere('product_status','like','%'.$request->user_define.'%')
						->get();

    	}




    	$table="<div class=\"col-sm-12 text-center\">";
			$table.="<h4>TMSS DEPARTMENTAL STORE</h4>";
			$table.="<h5>Product Report</h5>";
			$table.="<P>Kazipara, Mirpur, Dhaka.</P>";
		$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
				$table.="<P style=\"margin-bottom: -60px;margin-top: 58px;\"><b>Search By :</b></P>";
				$table.="<P style=\"margin-bottom: -22px;margin-top: 58px;\"><b> </b></P>";
			$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
		$table.="<table class=\"table table-bordered\" style=\"margin-top: 25px;\">";
		   $table.="<thead>";
		      $table.="<tr style=\"background: #333e51;\">";
		        $table.="<th>Product Name</th>";
		        $table.="<th>Product Code</th>";
		        $table.="<th>Brand Name</th>";
		        $table.="<th>Purchase Price</th>";
		        $table.="<th>Sales Price</th>";
		        $table.="<th>Product Tax</th>";
		        $table.="<th>Product Status</th>";
		      $table.="</tr>";
		    $table.="</thead>";
		    $table.="<tbody>";
    
    		foreach ($query as $key => $value) 
    		{
    			
    			$table.="<tr>";
			        $table.="<td>$value->product_name</td>";
			        $table.="<td>$value->product_code</td>";
			        $table.="<td>$value->brand_name</td>";
			        $table.="<td>$value->product_cost</td>";
			        $table.="<td>$value->product_mrp</td>";
			        $table.="<td>$value->product_tax</td>";
			        $table.="<td>$value->product_status</td>";
			      $table.="</tr>";
    		}
    	
		    $table.="</tbody>";
		  $table.="</table>";
		$table.="</div>";	

		echo $table;

    }


    public function profit_loss()
    {
    	return view('report.profit_loss');
    }




    public function get_profit_loss_report(Request $request)
    {
    	// print_r($request->all());
    	// exit();
    	$query=PurchaseStockModel::all();
    
    	$sold_purchase_price = 0;
		$sold_price_data=0;
		$sold=DB::table('purchase_stock')->where('stock_status','Inactive')->get();
			foreach ($sold as $key => $sold_value) 
			{
				$sold_price=DB::table('product_template')->where('product_id',$sold_value->product_id)->first();

				$sold_purchase_price += $sold_price->product_cost;
				$sold_price_data += $sold_price->product_mrp;
			}


		$estimate_purchase_price=0;
		$purchase=DB::table('purchase_stock')->where('stock_status','Active')->get();
			foreach ($purchase as $key => $purchase_value) 
			{
				$purchase_price=DB::table('product_template')->where('product_id',$purchase_value->product_id)->first();

				$estimate_purchase_price += $purchase_price->product_cost;
			}


		$first_date=$request->first_date;
    	$second_date=$request->second_date;

    	if ($first_date && $second_date) 
    	{
    		$query=PurchaseStockModel::whereBetween('updated_at',[$first_date,$second_date])->get();

    		$sold_purchase_price = 0;
			$sold_price_data=0;
			$sold=DB::table('purchase_stock')->whereBetween('updated_at',[$first_date,$second_date])->where('stock_status','Inactive')->get();
				foreach ($sold as $key => $sold_value) 
				{
					$sold_price=DB::table('product_template')->where('product_id',$sold_value->product_id)->first();

					$sold_purchase_price += $sold_price->product_cost;
					$sold_price_data += $sold_price->product_mrp;
				}

			$estimate_purchase_price=0;
			$purchase=DB::table('purchase_stock')->whereBetween('updated_at',[$first_date,$second_date])->where('stock_status','Active')->get();
				foreach ($purchase as $key => $purchase_value) 
				{
					$purchase_price=DB::table('product_template')->where('product_id',$purchase_value->product_id)->first();

					$estimate_purchase_price += $purchase_price->product_cost;
				}

    	}
    	
	
    	$table="<div class=\"col-sm-12 text-center\">";
			$table.="<h4>TMSS DEPARTMENTAL STORE</h4>";
			$table.="<h5>Profit & Loss Report</h5>";
			$table.="<P>Kazipara, Mirpur, Dhaka.</P>";
		$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
				$table.="<P style=\"margin-bottom: -60px;margin-top: 58px;\"><b>Search By :</b></P>";
				$table.="<P style=\"margin-bottom: -22px;margin-top: 58px;\"><b> </b></P>";
			$table.="</div>";
		$table.="<div class=\"col-sm-12\">";
		$table.="<table class=\"table table-bordered\" style=\"margin-top: 25px;\">";
		   $table.="<thead>";
		      $table.="<tr style=\"background: #333e51;\">";
		        $table.="<th>Product Name</th>";
		        $table.="<th>Product Code</th>";
		        $table.="<th>Brand Name</th>";
		        $table.="<th>Purchase Price</th>";
		        $table.="<th>Sales Price</th>";
		        $table.="<th>Product Tax</th>";
		        $table.="<th>Product Status</th>";
		        $table.="<th>Date</th>";
		      $table.="</tr>";
		    $table.="</thead>";
		    $table.="<tbody>";
    
    		$purchase_total=0;
    		$sales_total=0;
    		foreach ($query as $key => $value) 
    		{
    			$name=DB::table('product_template')->where('product_id',$value->product_id)->first();
    			$brand=DB::table('brand')->where('brand_id',$name->brand_name)->first();
    			
    			
    			
			$date=date("Y-m-d", strtotime($value->updated_at));
    			

    			$table.="<tr>";
			        $table.="<td>$name->product_name</td>";
			        $table.="<td>$name->product_code</td>";
			        $table.="<td>$brand->brand_name</td>";
			        $table.="<td>$name->product_cost</td>";
			        $table.="<td>$name->product_mrp</td>";
			        $table.="<td>$name->product_tax</td>";
			        if ($value->stock_status == 'Active') 
			        {
			        	$table.="<td class =\"text-success\">In Stock</td>";
			        }
			        else
			        {
			        	$table.="<td class =\"text-danger\">Sold</td>";
			        }
			        $table.="<td>".date('d-M-Y',strtotime($date));"</td>";
			    $table.="</tr>";
			$purchase_total += $name->product_cost;
			$sales_total += $name->product_mrp;
    		}
    		$profit=$sold_price_data - $sold_purchase_price;

		    $table.="</tbody>";
		    $table.="<thead>";
		      $table.="<tr style=\"background: #333e51;\">";
		        $table.="<th class=\"text-center\" colspan=\"3\" style=\"border: 0px;\">Total Purchase : $purchase_total </br> Estimate Purchase : $purchase_total</th>";
		        $table.="<th class=\"text-center\" colspan=\"3\" style=\"border: 0px;\">Total Sales : $sales_total </br>Estimate Sale : $sales_total</th>";
		        $table.="<th class=\"text-center\" colspan=\"2\" style=\"border: 0px;\">Profit : $profit </th>";
		      $table.="</tr>";
		    $table.="</thead>";
		  $table.="</table>";
		$table.="</div>";	

		echo $table;

		$table.="<th style=\"border: 0px;\">Total Purchase : $purchase_total </br> Estimate Price : $estimate_purchase_price</th>";
		        $table.="<th style=\"border: 0px;\">Total Sales : $sales_total </br>Total Sold : $sold_price_data</th>";
    }
}
