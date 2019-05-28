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
                    {{Form::open(['url'=>"/brand/$brand_data->brand_id",'method'=>'put','files'=>true,'class'=>'forms-sample'])}}
                    <div class="form-group">
                        {{Form::label('brand_name','Name')}}
                        {{Form::text('brand_name',$brand_data->brand_name,['class'=>'form-control','placeholder'=>'Name'])}}
                        <!-- <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"> -->
                    </div>

                    <div class="form-group">
                        {{Form::label('brand_email','Email')}}
                        {{Form::text('brand_email',$brand_data->brand_email,['class'=>'form-control','placeholder'=>'Email'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('brand_phone','Phone')}}
                        {{Form::text('brand_phone',$brand_data->brand_phone,['class'=>'form-control','placeholder'=>'Phone'])}}
                    </div>
                  
                    <div class="form-group">
                        {{Form::label('brand_address','Brand Address')}}
                        {{Form::textarea('brand_address',$brand_data->brand_address,['class'=>'form-control','placeholder'=>'Brand Address'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('brand_logo','Brand Logo')}}
                        {{Form::file('brand_logo',['class'=>'form-control','id'=>'profile-img'])}}

                        {{Form::hidden('brand_logo',asset($brand_data->brand_logo))}}

                        
                        <img src="{{asset($brand_data->brand_logo)}}" id="profile-img-tag" width="200px" />

                    </div>
                        
                    <div class="form-group">
                        {{Form::label('brand_status','Status')}}
                        {{Form::select('brand_status',[$brand_data->brand_status=>'Active',$brand_data->brand_status=>'Inactive','Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                    </div>
                    

                    <button type="submit" class="btn btn-success btn-fw">Success</button>

                    <button class="btn btn-light">Cancel</button>
                    {{Form::close()}}
                    
                </div>

            </div>
        </div>    
    </div>
   </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function (e) {
  $('#profile-img-tag').attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]);
  }
  }
  $("#profile-img").change(function(){
  readURL(this);
  });
</script>      
@stop            