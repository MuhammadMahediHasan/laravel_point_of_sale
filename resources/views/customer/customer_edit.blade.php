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
                        {{Form::open(['url'=>"/customer/$customer_data->customer_id",'method'=>'put','files'=>true,'class'=>'forms-sample'])}}
                        <div class="form-group">
                            {{Form::label('customer_name','Customer Name')}}
                            {{Form::text('customer_name',$customer_data->customer_name,['class'=>'form-control','placeholder'=>'Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_email','Customer Email')}}
                            {{Form::text('customer_email',$customer_data->customer_email,['class'=>'form-control','placeholder'=>'Email'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_phone','Customer Phone')}}
                            {{Form::text('customer_phone',$customer_data->customer_phone,['class'=>'form-control','placeholder'=>'Phone'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_address','Customer Address')}}
                            {{Form::textarea('customer_address',$customer_data->customer_address,['class'=>'form-control','placeholder'=>'Address'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_account_no','Customer Account No')}}
                            {{Form::text('customer_account_no',$customer_data->customer_account_no,['class'=>'form-control','placeholder'=>'Account No'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_opening_balance','Customer Opening Balence')}}
                            {{Form::text('customer_opening_balance',$customer_data->customer_opening_balance,['class'=>'form-control','placeholder'=>'Opening Balence'])}}
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleCategoryName">Is Taxable?</label>
                            <div>
                                 <label class="custom-control custom-checkbox">
                                
                                <input type="checkbox" class="custom-control-input select_all_child" name="customer_taxable" 

                                    @if($customer_data->customer_taxable=='Taxable')
                                        checked='checked'
                                    @endif

                                  value="Taxable">
                              

                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('customer_image','Customer Image')}}
                            {{Form::file('customer_image',['class'=>'form-control','id'=>'profile-img'])}}

                            {{Form::hidden('customer_image',asset($customer_data->customer_image))}}

                            <img src="{{asset($customer_data->customer_image)}}" id="profile-img-tag" width="200px" />

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