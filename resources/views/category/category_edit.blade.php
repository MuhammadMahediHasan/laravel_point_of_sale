@extends('backend.admin_layouts')
@section('main_content')

<div class="main-content" style="margin-top: 20px;">
    <div class="container-fluid">
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
                                {{Form::open(['url'=>"/category/$category_data->category_id",'method'=>'put','class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('category_name','Name')}}
                                    {{Form::text('category_name',$category_data->category_name,['class'=>'form-control','placeholder'=>'Name'])}}
                                    <!-- <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"> -->
                                </div>

                                <div class="form-group">
                                    {{Form::label('category_code','Code')}}
                                    {{Form::text('category_code',$category_data->category_code,['class'=>'form-control','placeholder'=>'Code'])}}
                                </div>
                              
                                <div class="form-group">
                                    {{Form::label('category_description','Description')}}
                                    {{Form::textarea('category_description',$category_data->category_description,['class'=>'form-control','placeholder'=>'Description'])}}
                                </div>
                                    
                                <div class="form-group">
                                    {{Form::label('category_status','Status')}}
                                    {{Form::select('category_status',[$category_data->category_status=>'Active',$category_data->category_status=>'Inactive','Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                                </div>
                                

                                <button type="submit" class="btn btn-success btn-fw">Update</button>

                                <button class="btn btn-light">Cancel</button>
                                {{Form::close()}}
                                
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            </div>    
@stop            