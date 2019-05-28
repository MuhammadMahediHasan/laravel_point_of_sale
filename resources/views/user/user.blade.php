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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add User Info</button>

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" width: 120%; margin-left: -7%;">
              <div class="modal-header">
                <h4  class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;Add User Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
              </div>
              <div class="modal-body">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>'/users','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('name','User Name')}}
                                    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('email','User Email')}}
                                    {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('password','Password')}}
                                    <!-- <input type="password" name="password" class="form-control"> -->
                                    {{Form::password('password',['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('password_confirmation','Confirm Password')}}
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_branch','User Branch')}}
                                    {{Form::text('user_branch','',['class'=>'form-control','placeholder'=>'Branch'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_address','User Address')}}
                                    {{Form::text('user_address','',['class'=>'form-control','placeholder'=>'User Address'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_status','Status')}}
                                    {{Form::select('user_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('user_image','Image')}}
                                    {{Form::file('user_image',['class'=>'form-control','id'=>'profile-img'])}}
                                    <img onerror="this.src = '{{asset('backend_asset/images/avatar.png')}}';" src="" id="profile-img-tag" width="200px" />

                                </div>

                                

                                <button type="submit" class="btn btn-success btn-fw">Submit</button>
                                
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
                        <h3>User Data Table</h3>
                        <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="/users_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="/users_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="/users__excel">
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
                                    <th>Branch</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach($user_data as $key => $user_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user_data_value->name}}</td>
                                        <td>{{$user_data_value->email}}</td>
                                        <td>{{$user_data_value->user_branch}}</td>
                                        <td>{{$user_data_value->user_address}}</td>
                                        <td>
                                            @if($user_data_value->user_status=='Active')
                                            <span style="color: green;">{{$user_data_value->user_status}}</span>
                                            @else
                                            <span style="color: red;">{{$user_data_value->user_status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img onerror="this.src = '{{asset('backend_asset/images/avatar.png')}}';" style="width: 65px;" src="{{asset($user_data_value->user_image)}}">
                                        </td>
                                        <td class="button-td">

                                            {{Form::open(['url'=>"/users/$user_data_value->id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are you sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"users/$user_data_value->id/edit",'method'=>'GET'])}}
                                            <button class="button btn btn-info"><i class="far fa-edit"></i></button>
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"/users/$user_data_value->id",'method'=>'GET'])}}
                                            @if($user_data_value->user_status=='Active')
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
                                    <th>Branch</th>
                                    <th>Address</th>
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
