<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\ProductTemplateModel;
use App\CustomerModel;
use App\SalesMainModel;
use App\SalesProductModel;
use App\SalesProductPricingModel;
use App\PurchaseProductModel;
use App\PurchaseStockModel;
use Validator;
use Toastr;
use PDF;
use DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=ProductTemplateModel::all();
        $customer=CustomerModel::all();
        return view('pos.pos',['product'=>$product,'customer'=>$customer]);
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
        //dd($request->all());
        //exit();
        $sales_data= new SalesMainModel;
        $validation=Validator::make($request->all(),$sales_data->sales_main_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $sales_data->fill($request->all())->save();

            $sales_main_data=$sales_data->sales_main_id;

            foreach ($request->product_name as $key => $product_name_data) 
            {
                $product_data= new SalesProductModel;
                $product_price=ProductTemplateModel::where('product_id',$product_name_data)->first();
                $product_price_data=$product_price->product_mrp;
                $quantity=$request->quantity[$key];
                $sub_total=$product_price_data*$quantity;
                //echo $sub_total."</br>";
                $product_data->sales_main_id=$sales_main_data;
                $product_data->product_name=$product_name_data;
                $product_data->quantity=$quantity;
                $product_data->unit_cost=$product_price_data;
                $product_data->sub_total=$sub_total;

                $product_data->save();

                //echo $product_name_data;
                $data=PurchaseStockModel::where('purchase_stock.product_id',$product_name_data)->where('stock_status','Active')->limit($quantity)->get();
                foreach ($data as $key => $value) {
                    $value->stock_status='Inactive';
                    $value->save();
                }
                
                // for ($i=0; $i<3; $i++) 
                // { 
                //     $stock_status=PurchaseStockModel::findOrFail($product_name_data);
                //     echo $stock_status;
                //     //$stock_status->update(['stock_status'=>'Inactive']);
                // }


                // for ($i=0;$i<$quantity;$i++) 
                //   {
                //     $stock_status=PurchaseStockModel::where('purchase_stock.product_id',$product_name_data)->first();

                //     $names = Arr::pluck($stock_status, 'purchase_stock.stock_status');
                //     echo "<pre>";
                //     print_r($names);
                //     //$stock_status->update(['stock_status'=>'Inactive']);
                //   }
            }


            $sales_product=$product_data->sales_product_id;

            $sales_pricing= new SalesProductPricingModel;
            $sales_pricing->sales_main_id=$sales_main_data;
            $sales_pricing->sales_product_id=$sales_product;
            $sales_pricing->sales_total=$request->grand_total;
            $sales_pricing->sales_pay=$request->pay;
            $sales_pricing->sales_due=$request->due;

            $sales_pricing->save();
            //quantity

             // Invoice
            $request_data=$request->all();
            $request_data=array_add($request_data,'invoice_id',$sales_product);
            $data=(object)$request_data;

            Toastr::success('Product Sale Successfully', '', ["positionClass" => "toast-top-right"]);
            return view('pos.invoice',['data'=>$data]);

            //$product_name=$request->product_name;
            //$quantity=$request->quantity;
            //$invoice=$product_data->sales_product_id;

            //$html=view('pos.invoice');
            //return PDF::loadHtml($html)->stream();
        }
       
    }


    public function sales_pay(Request $request)
    {
        return SalesProductPricingModel::where('sales_product_id',$request->sales_product_id)->first();
    }




    public function sales_list()
    {
        $sales_list=SalesProductModel::join('sales_main','sales_main.sales_main_id','=','sales_product.sales_main_id')
                                        ->join('product_template','product_template.product_id','=','sales_product.product_name')
                                        ->join('sales_product_pricing','sales_product_pricing.sales_product_id','=','sales_product.sales_product_id')
                                        ->groupBy('sales_product.sales_main_id')
                                        ->get();
        return view('pos.sales_list',['sales_list'=>$sales_list]);                                
    }



    public function confirm_pay(Request $request)
    {
       $id=$request->sales_product_pricing_id;
       $update=SalesProductPricingModel::findOrFail($id);
       $update->update(['sales_pay'=>$request->confirm_pay]);
       $update->update(['sales_due'=>$request->due]);

       
    }



    public function product_data(Request $request)
    {
        $product_price= ProductTemplateModel::where('product_id',$request->product_id)->first();
        $data['product_mrp']=$product_price->product_mrp;


        $data['quantity']=PurchaseStockModel::where('product_id',$request->product_id)
                                            ->where('stock_status','Active')
                                            ->get()
                                            ->count();


        return $data;

        // return ProductTemplateModel::join('purchase_product','purchase_product.purchase_product_name','=','product_template.product_id')
        //                         ->join('purchase_stock','purchase_stock.product_id','=','purchase_product.purchase_product_name')
        //                         ->where('product_template.product_id','=',$request->product_id)
        //                         ->select('*,count(purchase_stock.product_id) as quantity')
        //                         //->selectRaw('*,sum(purchase_id) as quantity')
        //                         //->count('purchase_stock.product_id')
        //                         ->first();                    

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
        //
    }
}
