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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Customer Info</button>

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" width: 120%; margin-left: -7%;">
              <div class="modal-header">
                <h4  class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;Add Customer Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
              </div>
              <div class="modal-body">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>'/customer','files'=>true,'class'=>'forms-sample'])}}
                                <div class="form-group">
                                    {{Form::label('customer_name','Customer Name')}}
                                    {{Form::text('customer_name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('customer_email','Customer Email')}}
                                            {{Form::email('customer_email','',['class'=>'form-control','placeholder'=>'Email'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('customer_phone','Customer Phone')}}
                                            {{Form::text('customer_phone','',['class'=>'form-control','placeholder'=>'Phone'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('customer_address','Customer Address')}}
                                    {{Form::textarea('customer_address','',['class'=>'form-control','placeholder'=>'Address'])}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('customer_account_no','Customer Account No')}}
                                            {{Form::text('customer_account_no','',['class'=>'form-control','placeholder'=>'Account No'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('customer_opening_balance','Customer Opening Balence')}}
                                            {{Form::text('customer_opening_balance','',['class'=>'form-control','placeholder'=>'Opening Balence'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleCategoryName">Is Taxable?</label>
                                    <div>
                                         <label class="custom-control custom-checkbox">

                                        <input type="checkbox" class="custom-control-input select_all_child" name="customer_taxable" value="Taxable">

                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{Form::label('customer_image','Customer Image')}}
                                    {{Form::file('customer_image',['class'=>'form-control','id'=>'profile-img'])}}
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
                        <h3>Customer Data Table</h3>
                        <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="/customer_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="/customer_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="/customer_excel">
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
                                    <th>Account No</th>
                                    <th>Opening Balence</th>
                                    <th>Taxable</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer_data as $key => $customer_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$customer_data_value->customer_name}}</td>
                                        <td>{{$customer_data_value->customer_email}}</td>
                                        <td>{{$customer_data_value->customer_phone}}</td>
                                        <td>{{$customer_data_value->customer_address}}</td>
                                        <td>{{$customer_data_value->customer_account_no}}</td>
                                        <td>{{$customer_data_value->customer_opening_balance}}</td>
                                        <td>{{$customer_data_value->customer_taxable}}</td>
                                        <td>
                                            <img onerror="this.src = '{{asset('backend_asset/images/avatar.png')}}';" style="        width: 39px;" src="{{$customer_data_value->customer_image}}">
                                        </td>

                                        
                                        <td class="button-td">
                                            {{Form::open(['url'=>"/customer/$customer_data_value->customer_id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are you sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"/customer/$customer_data_value->customer_id/edit",'method'=>'GET'])}}
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Account No</th>
                                    <th>Opening Balence</th>
                                    <th>Taxable</th>
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
