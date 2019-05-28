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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Suplier Info</button>

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" width: 120%; margin-left: -7%;">
              <div class="modal-header">
                <h4  class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;Add Suplier Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
              </div>
              <div class="modal-body">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>'/suplier','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('suplier_name','Suplier Name')}}
                                    {{Form::text('suplier_name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_phone','Suplier Phone')}}
                                    {{Form::text('suplier_phone','',['class'=>'form-control','placeholder'=>'Phone'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_address','Suplier Address')}}
                                    {{Form::textarea('suplier_address','',['class'=>'form-control','placeholder'=>'Address'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_account_no','Suplier Account No')}}
                                    {{Form::text('suplier_account_no','',['class'=>'form-control','placeholder'=>'Account No'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_opening_balance','Suplier Opening Balence')}}
                                    {{Form::text('suplier_opening_balance','',['class'=>'form-control','placeholder'=>'Opening Balence'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('suplier_image','Suplier Image')}}
                                    {{Form::file('suplier_image',['class'=>'form-control','id'=>'profile-img'])}}
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
                        <h3>Suplier Data Table</h3>
                        <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="/suplier_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="/suplier_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="/suplier_excel">
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
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Account No</th>
                                    <th>Opening Balence</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($suplier_data as $key => $suplier_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$suplier_data_value->suplier_name}}</td>
                                        <td>{{$suplier_data_value->suplier_phone}}</td>
                                        <td>{{$suplier_data_value->suplier_address}}</td>
                                        <td>{{$suplier_data_value->suplier_account_no}}</td>
                                        <td>{{$suplier_data_value->suplier_opening_balance}}</td>
                                        <td>
                                            <img onerror="this.src = '{{asset('backend_asset/images/avatar.png')}}';" style="width: 65px;" src="{{$suplier_data_value->suplier_image}}">
                                        </td>
                                        <td class="button-td">

                                            {{Form::open(['url'=>"/suplier/$suplier_data_value->suplier_id",'method'=>'DELETE'])}}
                                            <button  onclick="return confirm('Are you sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"/suplier/$suplier_data_value->suplier_id/edit",'method'=>'GET'])}}
                                            <button class="button btn btn-info"><i class="far fa-edit"></i></button>
                                            {{Form::close()}}


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Account No</th>
                                    <th>Opening Balence</th>
                                    <th>Image</th>
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
