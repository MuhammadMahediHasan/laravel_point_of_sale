@extends('backend.admin_layouts')
@section('main_content')
<div class="main-content" style="margin-top: 20px; min-height:0px">
    <div class="container-fluid">
        {!! Toastr::message() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif       
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>"/users/$user_data->id",'method'=>'put','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('name','User Name')}}
                                    {{Form::text('name',$user_data->name,['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_branch','User Branch')}}
                                    {{Form::text('user_branch',$user_data->user_branch,['class'=>'form-control','placeholder'=>'Branch'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_address','User Address')}}
                                    {{Form::text('user_address',$user_data->user_address,['class'=>'form-control','placeholder'=>'User Address'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_status','Status')}}
                                    {{Form::select('user_status',[$user_data->user_status=>'Active',$user_data->user_status=>'Inactive','Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_image','Image')}}
                                    {{Form::file('user_image',['class'=>'form-control','id'=>'profile-img'])}}
                                    <img src="{{asset($user_data->user_image)}}" id="profile-img-tag" width="200px" />

                                    {{Form::hidden('user_image',$user_data->user_image)}}

                                </div>

                                

                                <button type="submit" class="btn btn-success btn-fw">Submit</button>
                                
                                {{Form::close()}}
                                
                            </div>
                        </div>
                    </div>    
                </div>
    </div>
</div>


@stop 