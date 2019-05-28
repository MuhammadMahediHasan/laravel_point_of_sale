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
                                {{Form::open(['url'=>"/sub_category/$sub_category_data->sub_category_id",'method'=>'put','class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('sub_category_name','Name')}}
                                    {{Form::text('sub_category_name',$sub_category_data->sub_category_name,['class'=>'form-control','placeholder'=>'Name'])}}
                                    <!-- <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"> -->
                                </div>

                                <div class="form-group">
                                    {{Form::label('category_name','Name')}}
                                    <select class="form-control">
                                        <option>{{$sub_category_data->category_name}}</option>
                                        @foreach($category_data as $category_data_value)
                                        <option>{{$category_data_value->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    {{Form::label('sub_category_code','Code')}}
                                    {{Form::text('sub_category_code',$sub_category_data->sub_category_code,['class'=>'form-control','placeholder'=>'Code'])}}
                                </div>
                              
                                <div class="form-group">
                                    {{Form::label('sub_category_description','Description')}}
                                    {{Form::textarea('sub_category_description',$sub_category_data->sub_category_description,['class'=>'form-control','placeholder'=>'Description'])}}
                                </div>
                                    
                                <div class="form-group">
                                    {{Form::label('sub_category_status','Status')}}
                                    {{Form::select('sub_category_status',[$sub_category_data->sub_category_status=>'Active',$sub_category_data->sub_category_status=>'Inactive','Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
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