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
                        {{Form::open(['url'=>"/product_template/$product_data->product_id",'method'=>'put','files'=>true,'class'=>'forms-sample'])}}
                        <div class="form-group">
                            {{Form::label('product_name','Product Name')}}
                            {{Form::text('product_name',$product_data->product_name,['class'=>'form-control','placeholder'=>'Product Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('product_code','Product Code')}}
                            {{Form::text('product_code',$product_data->product_code,['class'=>'form-control','placeholder'=>'Product Code'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('category_name','Category_name')}}
                            <select name="category_name" class="form-control">
                                <option>{{$product_data->category_name}}</option>
                                @foreach($category_data as $category_data_value)
                                <option>{{$category_data_value->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('sub_category_name','Sub Category Name')}}
                            <select name="sub_category_name" class="form-control">
                                <option>{{$product_data->sub_category_name}}</option>
                                @foreach($sub_category_data as $sub_category_data_value)
                                <option>{{$sub_category_data_value->sub_category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('brand_name','Brand Name')}}
                            <select name="brand_name" class="form-control">
                                <option>{{$product_data->brand_name}}</option>
                                @foreach($brand_data as $brand_data_value)
                                <option>{{$brand_data_value->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('product_cost','Product Cost')}}
                            {{Form::text('product_cost',$product_data->product_cost,['class'=>'form-control','placeholder'=>'Product Cost'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('product_mrp','MRP')}}
                            {{Form::text('product_mrp',$product_data->product_mrp,['class'=>'form-control','placeholder'=>'MRP'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('product_tax','Tax')}}
                            {{Form::text('product_tax',$product_data->product_tax,['class'=>'form-control','placeholder'=>'Tax'])}}
                        </div>
                      
                        <div class="form-group">
                            {{Form::label('product_description','Product Description')}}
                            {{Form::textarea('product_description',$product_data->product_description,['class'=>'form-control','placeholder'=>'Product Description'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('product_status','Status')}}
                            {{Form::select('product_status',[$product_data->product_status=>'Active',$product_data->product_status=>'Inactive','Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('product_image','Image')}}
                            {{Form::file('product_image',['class'=>'form-control','id'=>'profile-img'])}}

                            {{Form::hidden('product_image',asset($product_data->product_image))}}

                            <img src="{{asset($product_data->product_image)}}" id="profile-img-tag" width="200px" />

                        </div>

<!--                       <div class="input_fields_wrap">
                    <button class="add_field_button btn btn-success" style="float: right;margin-top: 40px;margin-left: -326px;width: 19%;">Add Fields
                    </button>
                    <div>
                        <table>
                            <tr style="background: black;color: #fff;
                            padding: 28px;border-bottom: 3px solid #ced4da;">
                                <th style="padding: 6px;border-right: 1px solid #ced4da;">aaa</th>
                                <th style="padding: 6px;border-right: 1px solid #ced4da;">aaa</th>
                                <th style="padding: 6px;border-right: 1px solid #ced4da;">aaa</th>
                                <th style="padding: 6px;border-right: 1px solid #ced4da;">aaa</th>
                                <th style="padding: 6px;border-right: 1px solid #ced4da;     width:      19%;">aaa</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="mytext[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="mytext[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="mytext[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="mytext[]" class="form-control">
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div> -->

                        

                        <button type="submit" class="btn btn-success btn-fw">Submit</button>
                        
                        {{Form::close()}}
                        
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>


@stop    
