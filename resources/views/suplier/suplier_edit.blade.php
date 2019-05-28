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
                                {{Form::open(['url'=>"/suplier/$suplier_data->suplier_id",'method'=>'put','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('suplier_name','Suplier Name')}}
                                    {{Form::text('suplier_name',$suplier_data->suplier_name,['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_phone','Suplier Phone')}}
                                    {{Form::text('suplier_phone',$suplier_data->suplier_phone,['class'=>'form-control','placeholder'=>'Phone'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_address','Suplier Address')}}
                                    {{Form::textarea('suplier_address',$suplier_data->suplier_address,['class'=>'form-control','placeholder'=>'Address'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_account_no','Suplier Account No')}}
                                    {{Form::text('suplier_account_no',$suplier_data->suplier_account_no,['class'=>'form-control','placeholder'=>'Account No'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_opening_balance','Suplier Opening Balence')}}
                                    {{Form::text('suplier_opening_balance',$suplier_data->suplier_opening_balance,['class'=>'form-control','placeholder'=>'Opening Balence'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_image','Suplier Image')}}
                                    {{Form::file('suplier_image',['class'=>'form-control','id'=>'profile-img'])}}
                                    {{Form::hidden('suplier_image',asset($suplier_data->suplier_image))}}

                                    <img src="{{asset($suplier_data->suplier_image)}}" id="profile-img-tag" width="200px" />

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