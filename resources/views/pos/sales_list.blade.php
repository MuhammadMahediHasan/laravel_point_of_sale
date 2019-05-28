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

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Data Table</h3>
                        <div style="    float: right; font-size: 19px;margin-top: -22px;">
                            <a href="#">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-file-excel" style="margin-right: 4px;" title="Exel"></i>
                            </a>
                            <a href="#">
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
                                    <th> Date</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Invoice ID</th>
                                    <th>Customer </th>
                                    <th>Payment Information</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_list as $key => $sales_list_value)
                                  
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ \Carbon\Carbon::parse($sales_list_value->product_main_date)->format('d-M-Y')}}</td>
                                        <td>
                                            @php
                                                $product_name=DB::table('sales_product')->where('sales_main_id',$sales_list_value->sales_main_id)->get();
                                            @endphp
                                            @foreach($product_name as $product_name_value)
                                                @php
                                                    $product_temp_name=DB::table('product_template')->where('product_id',$product_name_value->product_name)->first();
                                                @endphp
                                                <i class="fas fa-angle-right"></i>&nbsp;{{$product_temp_name->product_name}}</br>
                                            @endforeach    
                                        </td>
                                        <td>
                                            @php
                                                $quantity=DB::table('sales_product')->where('sales_main_id',$sales_list_value->sales_main_id)->get();
                                            @endphp
                                            @foreach($quantity as $quantity_value)
                                                <i class="fas fa-angle-right"></i>&nbsp;{{$quantity_value->quantity}}</br>
                                            @endforeach 
                                        </td>
                                        <td>{{$sales_list_value->sales_product_id}}</td>
                                        <td>
                                            @php
                                                $customer=DB::table('customer')->where('customer_id',$sales_list_value->sales_main_customer)->first();
                                            @endphp  
                                            {{$sales_list_value->sales_main_customer}}
                                        </td>
                                        <td>
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{$sales_list_value->sales_total}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pay</td>
                                                    <td>{{$sales_list_value->sales_pay}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Due</td>
                                                    <td>{{$sales_list_value->sales_due}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td> 
                                            @if ($sales_list_value->sales_due==0) 
                                                <span style="color: green">You Have No Due</span>
                                            @else
                                                <span style="color: red">You Have Due Tk {{$sales_list_value->sales_due}}</span>
                                            @endif
                                        </td>
                                        <td class="button-td">
                                            {{Form::open(['url'=>"/sales_list/$sales_list_value->sales_product_id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are You Sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            @if ($sales_list_value->sales_due==0)
                                            <button class="btn btn-warning"><i class="fab fa-creative-commons-nc"></i></button>
                                            @else
                                            <!-- Trigger the modal with a button -->
                                            
                                            {{Form::submit('Pay',['class'=>'btn btn-success btn-lg pay_modal','data-toggle'=>'modal','data-target'=>'#myModal','get_value'=>$sales_list_value->sales_product_id])}}

                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content" >
                                                  <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fas fa-dollar-sign"></i>&nbsp;Pay</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    
                                                  </div>
                                                  <div class="modal-body">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                        <tr>
                                                            <td>Product Name</td>
                                                            <td>{{$sales_list_value->product_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Brand Name</td>
                                                            <td>{{$sales_list_value->brand_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity</td>
                                                            <td>{{$sales_list_value->quantity}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td><input type="text" readonly="readonly" name="total" class="form-control total"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pay</td>
                                                            <td><input type="text" readonly="readonly" name="pay" class="form-control pay"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Due</td>
                                                            <td><input type="text" readonly="readonly" name="due" class="form-control due"></td><input type="hidden" name="current_due" class="current_due" value="{{$sales_list_value->sales_due}}">
                                                        </tr>
                                                        <tr>
                                                            <td>Now Pay</td>
                                                            <td><input type="text" name="now_pay" class="form-control now_pay" onkeypress="javascript:return isNumber(event)"></td>
                                                        </tr>

                                                    </table>
                                                  </div>
                                                  <div class="modal-footer">
                                                    {{Form::submit('Confirm Pay',['class'=>'btn btn-success confirm_pay','style'=>'margin-right: 300px;','get_value_id'=>$sales_list_value->sales_pricing_id])}}
                                                    <input type="hidden" name="sales_pricing_id" class="sales_pricing_id" value="{{$sales_list_value->sales_product_pricing_id}}">
                                                    
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                           @endif
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Invoice ID</th>
                                    <th>Customer </th>
                                    <th>Payment Information</th>
                                    <th>Payment Status</th>
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

<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".pay_modal",function(){
            $('.confirm_pay').hide();
            var sales_product_id = $(this).attr('get_value');
            $.ajax({
                url:'sales_pay',
                type:'post',
                data:{
                    "_token":"{{ csrf_token() }}",
                    'sales_product_id':sales_product_id,
                },
                success:function(data)
                {
                    //console.log(data);
                    $(".total").val(data.sales_total);
                    $(".due").val(data.sales_due);
                    $(".pay").val(data.sales_pay);
                }
            });
        });
        $(document).on("keyup",".now_pay",function(){
            var current_due = $(".current_due").val();
            // alert(current_due);            
            var due = $(".due").val();
            var total = $(".total").val();
            var pay = $(".pay").val();
            var now_pay = $(this).val();
            var now_pay_now = parseInt(pay)+parseInt(now_pay);
            var now_due = total-now_pay_now;
            $(".due").val(now_due);

            if (now_pay>current_due) 
            {
                swal("Sorry!", "Your Pay is Greater Then Due", "error");
                var due = total-pay;
                $(".due").val(due);
                $(".now_pay").val(null);
                
            }
            else if (now_pay!=0) 
            {
                $('.confirm_pay').show();
            }
            else
            {
                var total = $(".total").val();
                var now_due = total-now_pay_now;
                $(".due").val(now_due);
                $('.confirm_pay').hide();
            }
        });
        $(document).on("click",".confirm_pay",function(){
            var sales_product_pricing_id = $(".sales_pricing_id").val();
            //alert(sales_product_pricing_id);
            var pay = $(".pay").val();
            var total = $(".total").val();
            var now_pay = $(".now_pay").val();
            var confirm_pay = parseInt(pay)+parseInt(now_pay);
            var due = parseInt(total)-parseInt(confirm_pay);

            $.ajax({
                url:"/sales_confirm_pay",
                type:'post',
                data:{
                    "_token":"{{ csrf_token() }}",
                    'sales_product_pricing_id':sales_product_pricing_id,
                    'confirm_pay':confirm_pay,
                    'due':due,
                },
                success:function(data)
                {
                    swal("Success!", "Payment Successfully Done", "success");
                    setTimeout(function() { window.location.reload(true); }, 1000);
                }
            });

        });
    });
</script>


@stop    


