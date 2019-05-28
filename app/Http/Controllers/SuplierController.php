<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuplierModel;
use Toastr;
use Validator;
use File;
use Redirect;
use PDF;
use Excel;
use DB;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier_data=SuplierModel::all();
        return view('suplier.suplier',['suplier_data'=>$suplier_data]);
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
        $insert_data=new SuplierModel;
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$insert_data->suplier_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('suplier_image'))
            {
                $image_type=$request->file('suplier_image')->getClientOriginalExtension();
                $path="backend_asset/images/suplier/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('suplier_image')->move($path,$name);
                $requested_data=array_set($requested_data,'suplier_image',$full_path);
            }

            $insert_data->fill($requested_data)->save();
            Toastr::success('Suplier Data Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $suplier_data=SuplierModel::findOrFail($id);
        return view('suplier.suplier_edit',['suplier_data'=>$suplier_data]);
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
        $update_data=SuplierModel::findOrFail($id);
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->suplier_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('suplier_image'))
            {
                $image_type=$request->file('suplier_image')->getClientOriginalExtension();
                $path="backend_asset/images/suplier/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('suplier_image')->move($path,$name);
                $requested_data=array_set($requested_data,'suplier_image',$full_path);

                if(File::exists(asset($update_data->suplier_image)))
                {
                    File::delete(asset($update_data->suplier_image));
                }
            }

            $update_data->fill($requested_data)->save();
            Toastr::success('Suplier Data Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('/suplier');
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
        SuplierModel::findOrFail($id)->delete();
        Toastr::success('Suplier Data Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }



    public function pdf()
    {
        $suplier_data=SuplierModel::all();
        $file_name=time().'suplier.pdf';
        $pdf=PDF::loadView('suplier.suplier_pdf',['suplier_data'=>$suplier_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $suplier_data=SuplierModel::all();

        $html=view('suplier.suplier_pdf',['suplier_data'=>$suplier_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $suplier_data = DB::table('suplier')->get()->toArray();
        $suplier_array[]= array('#','Name', 'Phone', 'Address', 'Account No', 'Opening Balence');

        foreach ($suplier_data as $key => $value) 
        {
            $suplier_array[] = array(
                '#' => $key+1,
                'Name' => $value->suplier_name,
                'Phone' => $value->suplier_phone,
                'Address' => $value->suplier_address,
                'Account No' => $value->suplier_account_no,
                'Opening Balence' => $value->suplier_opening_balance,
            );
        }        
            Excel::create(time().'_suplier_excel', function($excel) use ($suplier_array) 
                {
                    $excel->setTitle('Suplier');
                    $excel->sheet('Suplier',function($sheet) use ($suplier_array)
                    {
                        $sheet->fromArray($suplier_array, null,'A1', false, false);
                    });
            })->download('xlsx');        

    }
}
