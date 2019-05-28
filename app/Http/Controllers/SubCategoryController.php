<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategoryModel;
use App\CategoryModel;
use Validator;
use Toastr;
use Session;
use Redirect;
use Excel;
use PDF;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category_data=SubCategoryModel::join("category", "sub_category.category_name", "=", "category.category_id")->get();

        $category_data=CategoryModel::all();
        return view('sub_category.sub_category',['sub_category_data'=>$sub_category_data,'category_data'=>$category_data]);
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
        $insert_data=new SubCategoryModel;
        $validation=Validator::make($request->all(),$insert_data->sub_category_validation());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $insert_data->fill($request->all())->save();
            Toastr::success('Sub Category Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $status=SubCategoryModel::findOrFail($id);
        if ($status->sub_category_status=='Active') 
        {
            $status->update(['sub_category_status'=>'Inactive']);
        }
        else
        {
            $status->update(['sub_category_status'=>'Active']);
        }
        Toastr::success('Sub Category Status Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $sub_category_data=SubCategoryModel::findOrFail($id);
        return view('sub_category.sub_category_edit',['sub_category_data'=>$sub_category_data,'category_data'=>$category_data]);
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
        $update_data=SubCategoryModel::findOrFail($id);
        $validation=Validator::make($request->all(),$update_data->sub_category_validation());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $update_data->fill($request->all())->save();
            Toastr::success('Sub Category Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('sub_category');
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
        SubCategoryModel::findOrFail($id)->delete();
        Toastr::success('Sub Category Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }


    public function pdf()
    {
        $sub_category_data=SubCategoryModel::join("category", "sub_category.category_name", "=", "category.category_id")->get();
        $file_name=time().'_sub_category.pdf';
        $pdf=PDF::loadView('sub_category.sub_category_pdf',['sub_category_data'=>$sub_category_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $sub_category_data=SubCategoryModel::join("category", "sub_category.category_name", "=", "category.category_id")->get();

        $html=view('sub_category.sub_category_pdf',['sub_category_data'=>$sub_category_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $data = SubCategoryModel::join("category", "sub_category.category_name", "=", "category.category_id")->get()->toArray();
            
        return Excel::create(time().'_Sub_Category_excel', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');

    }
}
