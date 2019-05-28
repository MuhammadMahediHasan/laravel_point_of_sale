<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\SubCategoryModel;
use App\BrandModel;
use App\ProductTemplateModel;
use Validator;
use File;
use Toastr;
use Redirect;
use PDF;
use Excel;
use DB;

class ProductTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_data=CategoryModel::all();
        $sub_category_data=SubCategoryModel::all();
        $brand_data=BrandModel::all();
        $product_data=ProductTemplateModel::all();
        return view('product.product_template',['category_data'=>$category_data,'sub_category_data'=>$sub_category_data,'brand_data'=>$brand_data,'product_data'=>$product_data]);
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
        $insert_data=new ProductTemplateModel;
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$insert_data->product_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('product_image'))
            {
                $image_type=$request->file('product_image')->getClientOriginalExtension();
                $path="backend_asset/images/product/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('product_image')->move($path,$name);
                $requested_data=array_set($requested_data,'product_image',$full_path);
            }

            $insert_data->fill($requested_data)->save();
            Toastr::success('Product Data Added Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status=ProductTemplateModel::findOrFail($id);
        if ($status->product_status=='Active') 
        {
            $status->update(['product_status'=>'Inactive']);
        }
        else
        {
            $status->update(['product_status'=>'Active']);
        }
        Toastr::success('Product Status Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_data=CategoryModel::all();
        $sub_category_data=SubCategoryModel::all();
        $brand_data=BrandModel::all();
        $product_data=ProductTemplateModel::findOrFail($id);
        return view('product.product_template_edit',['category_data'=>$category_data,'sub_category_data'=>$sub_category_data,'brand_data'=>$brand_data,'product_data'=>$product_data,]);
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
        $update_data=ProductTemplateModel::findOrFail($id);
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->product_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('product_image'))
            {
                $image_type=$request->file('product_image')->getClientOriginalExtension();
                $path="backend_asset/images/product/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('product_image')->move($path,$name);
                $requested_data=array_set($requested_data,'product_image',$full_path);

                if(File::exists(asset($update_data->product_image)))
                {
                    File::delete(asset($update_data->product_image));
                }
            }

            $update_data->fill($requested_data)->save();
            Toastr::success('Product Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('/product_template');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTemplateModel::findOrFail($id)->delete();
        Toastr::success('Product Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }


    public function category_wise_sub_category(Request $request)
    {
       return SubCategoryModel::where('category_name',$request->category_id)->get();

    }



    public function pdf()
    {
        $product_data=ProductTemplateModel::all();
        $file_name=time().'product.pdf';
        $pdf=PDF::loadView('product.product_template_pdf',['product_data'=>$product_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $product_data=ProductTemplateModel::all();

        $html=view('product.product_template_pdf',['product_data'=>$product_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $product_data = DB::table('product_template')->get()->toArray();
        $product_array[]= array('#','Name', 'Code', 'Cost', 'MRP', 'Tax', 'Status');

        foreach ($product_data as $key => $value) 
        {
            $product_array[] = array(
                '#' => $key+1,
                'Name' => $value->product_name,
                'Code' => $value->product_code,
                'Cost' => $value->product_cost,
                'MRP' => $value->product_mrp,
                'Tax' => $value->product_tax,
                'Status' => $value->product_status,
            );
        }        
            Excel::create(time().'_product_excel', function($excel) use ($product_array) 
                {
                    $excel->setTitle('Products');
                    $excel->sheet('Products',function($sheet) use ($product_array)
                    {
                        $sheet->fromArray($product_array, null,'A1', false, false);
                    });
            })->download('xlsx');        

    }
}
