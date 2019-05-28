<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;
use Validator;
use Toastr;
use File;
use Redirect;
use PDF;
use Excel;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_data=CustomerModel::all();
        return view('customer.customer',['customer_data'=>$customer_data]);
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
        $insert_data=new CustomerModel;
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$insert_data->customer_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('customer_image'))
            {
                $image_type=$request->file('customer_image')->getClientOriginalExtension();
                $path="backend_asset/images/customer/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('customer_image')->move($path,$name);
                $requested_data=array_set($requested_data,'customer_image',$full_path);
            }

            $insert_data->fill($requested_data)->save();
            Toastr::success('Customer Data Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
         $customer_data=CustomerModel::findOrFail($id);
        return view('customer.customer_edit',['customer_data'=>$customer_data]);
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
       

        $update_data=CustomerModel::findOrFail($id);
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->customer_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('customer_image'))
            {
                $image_type=$request->file('customer_image')->getClientOriginalExtension();
                $path="backend_asset/images/customer/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('customer_image')->move($path,$name);
                $requested_data=array_set($requested_data,'customer_image',$full_path);

                if(File::exists(asset($update_data->customer_image)))
                {
                    File::delete(asset($update_data->customer_image));
                }
            }

            if(!$request->has('customer_taxable'))
            {
                $requested_data=array_add($requested_data,'customer_taxable','UnTaxable');
            }  

            //dd($requested_data);
            $update_data->fill($requested_data)->save();
            Toastr::success('Customer Data Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('/customer');
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
        CustomerModel::findOrFail($id)->delete();
            Toastr::success('Customer Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();

    }


    public function pdf()
    {
        $customer_data=CustomerModel::all();
        $file_name=time().'customer.pdf';
        $pdf=PDF::loadView('customer.customer_pdf',['customer_data'=>$customer_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $customer_data=CustomerModel::all();

        $html=view('customer.customer_pdf',['customer_data'=>$customer_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $customer_data = DB::table('customer')->get()->toArray();
        $customer_array[]= array('#','Name', 'Email', 'Phone', 'Address', 'Account No', 'Opening Balence','Is Taxable?');

        foreach ($customer_data as $key => $value) 
        {
            $customer_array[] = array(
                '#' => $key+1,
                'Name' => $value->customer_name,
                'Email' => $value->customer_email,
                'Phone' => $value->customer_phone,
                'Address' => $value->customer_address,
                'Account No' => $value->customer_account_no,
                'Opening Balence' => $value->customer_opening_balance,
                'Is Taxable?' => $value->customer_taxable,
            );
        }        
            Excel::create(time().'_customer_excel', function($excel) use ($customer_array) 
                {
                    $excel->setTitle('Customer');
                    $excel->sheet('Customer',function($sheet) use ($customer_array)
                    {
                        $sheet->fromArray($customer_array, null,'A1', false, false);
                    });
            })->download('xlsx');        

    }
}
