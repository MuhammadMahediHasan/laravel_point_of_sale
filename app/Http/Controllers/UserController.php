<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Validator;
use Toastr;
use File;
use Redirect;
use DB;
use PDF;
use Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        return view('report');
    }




    public function index()
    {
        $user_data=UserModel::all();
        return view('user.user',['user_data'=>$user_data]);
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
        $insert_data=new UserModel;
        $password=$request->password;
        $requested_data=$request->all();
      
         $password_bcrt=bcrypt($request->password);
       
        $validation=Validator::make($request->all(),$insert_data->user_validation());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('user_image'))
            {
                $image_type=$request->file('user_image')->getClientOriginalExtension();
                $path="backend_asset/images/user/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('user_image')->move($path,$name);
                $requested_data=array_set($requested_data,'user_image',$full_path);
            }

            $requested_data=array_set($requested_data,'password',$password_bcrt);
            $insert_data->fill($requested_data)->save();
            Toastr::success('User Data Added Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $user_status=UserModel::findOrFail($id);
        if ($user_status->user_status=='Active') 
        {
            $user_status->update(['user_status'=>'Inactive']);
        }
        else
        {
            $user_status->update(['user_status'=>'Active']);
        }
        Toastr::success('User Status Update Successfully', '', ["positionClass" => "toast-top-right"]);
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
        $user_data=UserModel::findOrFail($id);
        return view('user.user_edit',['user_data'=>$user_data]);
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
        $update_data=UserModel::findOrFail($id);
        
        $requested_data=$request->all();
        $validation=Validator::make($request->all(),$update_data->user_validation_update());
        if ($validation->fails()) 
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->hasFile('user_image'))
            {
                $image_type=$request->file('user_image')->getClientOriginalExtension();
                $path="backend_asset/images/user/";
                $name=time().".".$image_type;
                $full_path=$path.$name;
                $request->file('user_image')->move($path,$name);
                $requested_data=array_set($requested_data,'user_image',$full_path);
            }
            $update_data->fill($requested_data)->save();
            Toastr::success('User Data Update Successfully', '', ["positionClass" => "toast-top-right"]);
            return Redirect::to('/users');
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
        UserModel::findOrFail($id)->delete();
        Toastr::success('User Data Deleted Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
    }




    public function pdf()
    {
        $users_data=UserModel::all();
        $file_name=time().'user.pdf';
        $pdf=PDF::loadView('user.users_pdf',['users_data'=>$users_data]);
        return $pdf->download($file_name);
    }


    public function pdf_preview()
    {
        $users_data=UserModel::all();

        $html=view('user.users_pdf',['users_data'=>$users_data]);
        return PDF::loadHtml($html)->stream();
    }

    public function excel()
    {
        $users_data = DB::table('users')->get()->toArray();
        $users_array[]= array('#','Name', 'Email', 'Branch', 'Address', 'Status');

        foreach ($users_data as $key => $value) 
        {
            $users_array[] = array(
                '#' => $key+1,
                'Name' => $value->name,
                'Email' => $value->email,
                'Branch' => $value->user_branch,
                'Address' => $value->user_address,
                'Status' => $value->user_status,
            );
        }        
            Excel::create(time().'_users_excel', function($excel) use ($users_array) 
                {
                    $excel->setTitle('User');
                    $excel->sheet('User',function($sheet) use ($users_array)
                    {
                        $sheet->fromArray($users_array, null,'A1', false, false);
                    });
            })->download('xlsx');        

    }
}
