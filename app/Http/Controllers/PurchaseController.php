<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductTemplateModel;

use App\PurchaseMainModel;
use App\PurchaseProductModel;
use App\PurchaseProductPricingModel;
use App\SuplierModel;
use App\PurchaseStockModel;
use Validator;
use Toastr;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier=SuplierModel::all();
        $product=ProductTemplateModel::where('product_status','Active')->get();

        return view('purchase.purchase',['product'=>$product,'suplier'=>$suplier]);
    }



    public function purchase_list()
    {
        $purchase_list=PurchaseProductModel::join('purchase_main','purchase_main.product_main_id','=','purchase_product.product_main_id')
                                    ->join('product_template','product_template.product_id','=','purchase_product.purchase_product_name')
                                    ->join('purchase_pricing','purchase_pricing.purchase_product_id','=','purchase_product.purchase_product_id')
                                    ->groupBy('purchase_product.product_main_id')
                                    ->get();
        //dd($purchase_list);
        return view('purchase.purchase_list',['purchase_list'=>$purchase_list]);
    }




    public function purchase_pay(Request $request)
    {
        return PurchaseProductPricingModel::where('purchase_product_id',$request->purchase_product_id)->first();
    }


    public function stock_table()
    {
      $purchase_product=ProductTemplateModel::join("purchase_product", "product_template.product_id", "=", "purchase_product.purchase_product_name")
                                          ->selectRaw('*,sum(purchase_product_quantity) as quantity')
                                          ->groupBy('purchase_product.purchase_product_name')
                                          ->get();


      
      //dd($purchase_product);
      return view('purchase.stock_table',['purchase_product'=>$purchase_product]);
    }




    public function full_stock()
    {
      $full_stock=ProductTemplateModel::join("purchase_stock","product_template.product_id", "=", "purchase_stock.product_id")
                                      ->where('purchase_stock.stock_status','Active')
                                      ->get();

      return view('purchase.full_stock',['full_stock'=>$full_stock]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->pro;
        return ProductTemplateModel::where('product_id',$request->pro)->first();
    }




    public function store_purchase(Request $request)
    {
       $product_main=new PurchaseMainModel;
       $validation=Validator::make($request->all(),$product_main->purchase_main_validation());
           if ($validation->fails()) 
           {
               return back()->withInput()->withErrors($validation);
           }
           else
           {
              $product_main->fill($request->all())->save();

              $product_main_id=$product_main->product_main_id;
        
               foreach ($request->product_name as $key => $product_name_data) 
               {
                  $purchase_product=new PurchaseProductModel;
                  $product_price=ProductTemplateModel::where('product_id',$product_name_data)->first();
                  $product_price_data=$product_price->product_cost;
                  $quantity=$request->quantity[$key];
                  $sub_total=$product_price_data*$quantity;
                   // echo $sub_total."<br>";

                  $purchase_product->product_main_id=$product_main_id;
                  $purchase_product->purchase_product_name=$product_name_data;
                  $purchase_product->purchase_product_quantity=$quantity;
                  $purchase_product->purchase_product_unit_cost=$product_price_data;
                  $purchase_product->purchase_product_sub_total=$sub_total;

                  $purchase_product->save();

                  $purchase_id=$purchase_product->purchase_product_id;

                  for ($i=0;$i<$quantity;$i++) 
                  {
                    $product_unq_name=$product_price->product_name;
                     $stock=new PurchaseStockModel;
                     $stock->purchase_id=$purchase_id;
                     $stock->product_id=$request->product_name[$key];
                     $stock->product_stock_code=$product_unq_name."-".time().$i;
                     $stock->stock_status='Active';

                     $stock->save();

                  }

               }
               $purchase_product_id=$purchase_product->purchase_product_id;

               $purchase_pricing=new PurchaseProductPricingModel;
               $purchase_pricing->product_main_id=$product_main_id;
               $purchase_pricing->purchase_product_id=$purchase_product_id;
               $purchase_pricing->total=$request->grand_total;
               $purchase_pricing->pay=$request->pay;
               $purchase_pricing->due=$request->due;

               $purchase_pricing->save();


               


            Toastr::success('Product Purchase Successfully', '', ["positionClass" => "toast-top-right"]);
                return back();
           }

     
    }





    public function confirm_pay(Request $request)
    {
       $id=$request->purchase_product_pricing_id;
       $update=PurchaseProductPricingModel::findOrFail($id);
       $update->update(['pay'=>$request->confirm_pay]);
       $update->update(['due'=>$request->due]);

       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PurchaseStockModel::findOrFail($id)->delete();

        Toastr::success('Stock Data Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
         return back();
    }
}
