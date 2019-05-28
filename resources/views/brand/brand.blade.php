@extends('backend.admin_layouts')
@section('main_content')

<!-- form -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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


        <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Brand</button>

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" width: 120%; margin-left: -7%;">
              <div class="modal-header">
                <h4  class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;Add New Brand</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
              </div>
              <div class="modal-body">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>'/brand','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('brand_name','Name')}}
                                    {{Form::text('brand_name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                    <!-- <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('brand_email','Email')}}
                                            {{Form::text('brand_email','',['class'=>'form-control','placeholder'=>'Email'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('brand_phone','Phone')}}
                                            {{Form::text('brand_phone','',['class'=>'form-control','placeholder'=>'Phone'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('brand_address','Brand Address')}}
                                    {{Form::textarea('brand_address','',['class'=>'form-control','placeholder'=>'Brand Address'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('brand_logo','Brand Logo')}}
                                    {{Form::file('brand_logo',['class'=>'form-control','id'=>'profile-img'])}}
                                    <img src="" id="profile-img-tag" width="200px" />

                                </div>
                                    
                                <div class="form-group">
                                    {{Form::label('brand_status','Status')}}
                                    {{Form::select('brand_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                                </div>
                                

                                <button type="submit" class="btn btn-success btn-fw">Success</button>

                                {{Form::close()}}
                                
                            </div>
                        </div>
                    </div>    
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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


    <!-- Data Table -->
<div class="main-content" style="    margin-top: -31px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Data Table</h3>
                            <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="brand_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="brand_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="brand_excel">
                                <i class="far fa-file-excel" style="margin-right: 4px;" title="Exel"></i>
                            </a>
                            <a href="">
                                <i class="fas fa-print" title="Print"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="simpletable"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($brand_data as $key => $brand_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$brand_data_value->brand_name}}</td>
                                        <td>{{$brand_data_value->brand_email}}</td>
                                        <td>{{$brand_data_value->brand_phone}}</td>
                                        <td>{{$brand_data_value->brand_address}}</td>
                                        <td>
                                            <img style="width: 75px;" src="{{$brand_data_value->brand_logo}}">
                                        </td>
                                        <td>
                                        @if($brand_data_value->brand_status=='Active')
                                            <span style="color: green;">{{$brand_data_value->brand_status}}</span>
                                        @else    
                                            <span style="color: red;">{{$brand_data_value->brand_status}}</span>
                                        @endif    
                                        </td>
                                        <td class="button-td">

                                        {{Form::open(['url'=>"/brand/$brand_data_value->brand_id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are you sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        {{Form::close()}}

                                        {{Form::open(['url'=>"/brand/$brand_data_value->brand_id/edit",'method'=>'GET'])}}
                                            <button class="button btn btn-info"><i class="far fa-edit"></i></button>
                                        {{Form::close()}}    

                                        {{Form::open(['url'=>"/brand/$brand_data_value->brand_id",'method'=>'GET'])}}    
                                        @if($brand_data_value->brand_status=='Active') 
                                            <button class="button btn btn-warning"><i class="fas fa-spinner"></i></button>
                                        @else
                                            <button class="button btn btn-success"><i class="fas fa-spinner"></i></button>
                                        @endif
                                        {{Form::close()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .button{
            width: 41px;
            margin-right: 4px;
    }
    .button-td{
            display: inline-flex;
    }
</style>



@stop    
