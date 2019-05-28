<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrandModel;
use Validator;
use Session;
use Toastr;
use Redirect;
use File;
use Excel;
use PDF;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_data=BrandModel::all();
        return view('brand.brand',['brand_data'=>$brand_data]);
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
        $insert_data=new BrandModel;
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$insert_data->brand_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if ($request->hasFile('brand_logo'))

            {
                $image_type=$request->file('brand_logo')->getClientOriginalExtension();
                $path="backend_asset/images/brand/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('brand_logo')->move($path,$name);
                $requested_data=array_set($requested_data,'brand_logo',$full_path);
            }


            $insert_data->fill($requested_data)->save();
            Toastr::success('Brand Data Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $status=BrandModel::findOrFail($id);
        if ($status->brand_status=='Active') 
        {
            $status->update(['brand_status'=>'Inactive']);
        }
        else
        {
            $status->update(['brand_status'=>'Active']);
        }
        Toastr::success('Brand Brand Status Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $brand_data=BrandModel::findOrFail($id);
        return view('brand.brand_edit',['brand_data'=>$brand_data]);
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
        $update_data=BrandModel::findOrFail($id);
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->brand_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if ($request->hasFile('brand_logo'))

            {
                $image_type=$request->file('brand_logo')->getClientOriginalExtension();
                $path="backend_asset/images/brand/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('brand_logo')->move($path,$name);
                $requested_data=array_set($requested_data,'brand_logo',$full_path);


                if(File::exists(asset($update_data->brand_logo)))
                {
                    File::delete(asset($update_data->brand_logo));
                }
            }


            $update_data->fill($requested_data)->save();
            Toastr::success('Brand Data Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('/brand');

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
        BrandModel::findOrFail($id)->delete();
        Toastr::success('Brand Data Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
        return back();
    }




    public function pdf()
    {
        $brand_data=BrandModel::all();
        $file_name=time().'brand.pdf';
        $pdf=PDF::loadView('brand.brand_pdf',['brand_data'=>$brand_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $brand_data=BrandModel::all();

        $html=view('brand.brand_pdf',['brand_data'=>$brand_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $brand_data = DB::table('brand')->get()->toArray();
        $brand_array[]= array('#','Name', 'Email', 'Phone', 'Address', 'Status');

        foreach ($brand_data as $key => $value) 
        {
            $brand_array[] = array(
                '#' => $key+1,
                'Name' => $value->brand_name,
                'Email' => $value->brand_email,
                'Phone' => $value->brand_phone,
                'Address' => $value->brand_address,
                'Status' => $value->brand_status,
            );
        }        
            Excel::create(time().'_users_excel', function($excel) use ($brand_array) 
                {
                    $excel->setTitle('User');
                    $excel->sheet('User',function($sheet) use ($brand_array)
                    {
                        $sheet->fromArray($brand_array, null,'A1', false, false);
                    });
            })->download('xlsx');        

    }
}
