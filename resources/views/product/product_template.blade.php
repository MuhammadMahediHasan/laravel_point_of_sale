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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Product</button>

    <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" width: 790px; margin-left: -24%;">
              <div class="modal-header">
                <h4  class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp;Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
              </div>
              <div class="modal-body" style="">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body"> 
                                {{Form::open(['url'=>'/product_template','files'=>true,'class'=>'forms-sample'])}}


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('product_name','Product Name')}}
                                            {{Form::text('product_name','',['class'=>'form-control','placeholder'=>'Product Name'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('product_code','Product Code')}}
                                            {{Form::text('product_code','',['class'=>'form-control','placeholder'=>'Product Code'])}}
                                        </div>
                                    </div>
                                </div>
                                <center>
                                     <div>
                                        <img class="gif" style="display: none;" src="{{asset('backend_asset/images/spinner-loop.gif')}}" height="85px">
                                    </div>
                                </center>
                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        {{Form::label('category_name','Category_name')}}
                                        <select name="category_name" class="form-control category_name">
                                            <option>--select--</option>
                                            @foreach($category_data as $category_data_value)
                                            <option value="{{$category_data_value->category_id}}">{{$category_data_value->category_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        {{Form::label('sub_category_name','Sub Category Name')}}
                                        <select name="sub_category_name" class="sub_category_name form-control">
                                          <option>--select category--</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('brand_name','Brand Name')}}
                                    <select name="brand_name" class="form-control">
                                        @foreach($brand_data as $brand_data_value)
                                        <option value="{{$brand_data_value->brand_id}}">{{$brand_data_value->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    {{Form::label('product_cost','Product Cost')}}
                                    {{Form::text('product_cost','',['class'=>'form-control','placeholder'=>'Product Cost'])}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('product_mrp','MRP')}}
                                            {{Form::text('product_mrp','',['class'=>'form-control','placeholder'=>'MRP'])}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{Form::label('product_tax','Tax')}}
                                            {{Form::text('product_tax','',['class'=>'form-control','placeholder'=>'Tax'])}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{Form::label('product_description','Product Description')}}
                                    {{Form::textarea('product_description','',['class'=>'form-control','placeholder'=>'Product Description'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('product_status','Status')}}
                                    {{Form::select('product_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('product_image','Image')}}
                                    {{Form::file('product_image',['class'=>'form-control','id'=>'profile-img'])}}
                                    <img onerror="this.src = '{{asset('backend_asset/images/no_image.png')}}';" src="" id="profile-img-tag" width="200px" />

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




    <!-- Data Table -->
<div class="main-content" style="    margin-top: -31px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Products Table</h3>
                        <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="/product_template_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="/product_template_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="/product_template_excel">
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
                                    <th>Code</th>
                                    <th>Cost</th>
                                    <th>MRP</th>
                                    <th>Tax</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($product_data as $key => $product_data_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$product_data_value->product_name}}</td>
                                        <td>{{$product_data_value->product_code}}</td>
                                        <td>{{$product_data_value->product_cost}}</td>
                                        <td>{{$product_data_value->product_mrp}}</td>
                                        <td>{{$product_data_value->product_tax}}</td>
                                        <td>
                                            @if($product_data_value->product_status=='Active')
                                            <span style="color: green;">{{$product_data_value->product_status}}</span>
                                            @else
                                            <span style="color: red;">{{$product_data_value->product_status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img style="width: 66px;" src="{{$product_data_value->product_image}}">
                                        </td>
                                        <td class="button-td">
                                            {{Form::open(['url'=>"/product_template/$product_data_value->product_id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are you sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            {{Form::open(['url'=>"/product_template/$product_data_value->product_id/edit",'method'=>'GET'])}}
                                            <button class="button btn btn-info"><i class="far fa-edit"></i></button>
                                            {{Form::close()}}
                                            

                                            {{Form::open(['url'=>"/product_template/$product_data_value->product_id",'method'=>'GET'])}}

                                            @if($product_data_value->product_status=='Active')
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
                                    <th>Code</th>
                                    <th>Cost</th>
                                    <th>MRP</th>
                                    <th>Tax</th>
                                    <th>Status</th>
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

<script type="text/javascript">
    $(document).ready(function(){

        $('.category_name').change(function(){
            var category_id=$(this).val();
            $.ajax({
                url:'/category_wise_sub_category',
                type:'post',
                data:{
                    "_token":"{{ csrf_token() }}",
                    'category_id':category_id,
                },

                success:function(data){
                    $(".gif").show();
                    if(data[0])
                    {
                        $(".gif").hide('slow');
                        $(".sub_category_name").html("");
                        for(var i=0;i<=data.length;i++)
                        {
                            $(".sub_category_name").append("<option>"+data[i].sub_category_name+"</option>");
                        }
                    }
                    else
                    {
                         $(".sub_category_name").html("");
                         $(".sub_category_name").append("<option>No Data Found</option>");
                          $(".gif").hide('slow');
                    }

                    

                }



            });
        });
    });
</script>\  


@stop    
