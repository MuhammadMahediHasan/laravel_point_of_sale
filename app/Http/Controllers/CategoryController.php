<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use Validator;
use Redirect;
use Toastr;
use Session;
use Excel;
use PDF;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_data=CategoryModel::all();
        // $category_data= 
        return view('category.category',['category_data'=>$category_data]);
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
        $insert_data=new CategoryModel;
        $validation=Validator::make($request->all(),$insert_data->category_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);

        }
        else
        {
            $insert_data->fill($request->all())->save();
            Toastr::success('Category Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $category_status=CategoryModel::findOrFail($id);
        if ($category_status->category_status=='Active') 
        {
            $category_status->update(['category_status'=>'Inactive']);
        }
        else
        {
            $category_status->update(['category_status'=>'Active']);
        }
        Toastr::success('Category Status Update Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $category_data=CategoryModel::findOrFail($id);
        return view('category.category_edit',['category_data'=>$category_data]);
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
        $update_data=CategoryModel::findOrFail($id);

        $validation=Validator::make($request->all(),$update_data->category_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);

        }
        else
        {
            $update_data->fill($request->all())->save();
            Toastr::success('Category Updated Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('category');
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
        CategoryModel::findOrFail($id)->delete();
        Toastr::success('Category Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }


    public function pdf()
    {
        $category_data=CategoryModel::all();
        $file_name=time().'_category.pdf';
        $pdf=PDF::loadView('category.category_pdf',['category_data'=>$category_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $category_data=CategoryModel::all();
        $html=view('category.category_pdf',['category_data'=>$category_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $data = CategoryModel::get()->toArray();
            
        return Excel::create('Category_excel', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');

    }


}
