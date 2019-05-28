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
                                    <th>Purchase Date</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Brand Name</th>
                                    <th>Payment Information</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase_list as $key => $purchase_list_value)
                                  
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ \Carbon\Carbon::parse($purchase_list_value->product_main_date)->format('d-M-Y')}}</td>
                                        <td>
                                            @php
                                                $product_name=DB::table('purchase_product')->where('product_main_id',$purchase_list_value->product_main_id)->get();
                                            @endphp

                                            @foreach($product_name as $product_name_value)
                                                @php
                                                    $product_temp_name=DB::table('product_template')->where('product_id',$product_name_value->purchase_product_name)->first();
                                                @endphp
                                                <span ><i class="fas fa-angle-right"></i>&nbsp;{{$product_temp_name->product_name}}</span></br>
                                            @endforeach
                                        </td>
                                        
                                        <td>
                                            @php
                                                $product_quantity=DB::table('purchase_product')->where('product_main_id',$purchase_list_value->product_main_id)->get();
                                            @endphp

                                            @foreach($product_quantity as $quantity_value)
                                                <i class="fas fa-angle-right"></i>&nbsp;{{$quantity_value->purchase_product_quantity}}</br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $product_name=DB::table('purchase_product')->where('product_main_id',$purchase_list_value->product_main_id)->get();
                                            @endphp

                                            @foreach($product_name as $product_name_value)
                                                @php
                                                    $product_temp_name=DB::table('product_template')->where('product_id',$product_name_value->purchase_product_name)->first();
                                                @endphp
                                                <span ><i class="fas fa-angle-right"></i>&nbsp;{{$product_temp_name->brand_name}}</span></br>
                                            @endforeach
                                        <td>
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{$purchase_list_value->total}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pay</td>
                                                    <td>{{$purchase_list_value->pay}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Due</td>
                                                    <td>{{$purchase_list_value->due}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td> 
                                            @if ($purchase_list_value->due==0) 
                                                <span style="color: green">You Have No Due</span>
                                            @else
                                                <span style="color: red">You Have Due Tk {{$purchase_list_value->due}}</span>
                                            @endif
                                        </td>
                                        <td class="button-td">
                                            {{Form::open(['url'=>"/purchase_list/$purchase_list_value->purchase_product_id",'method'=>'DELETE'])}}
                                            <button onclick="return confirm('Are You Sure?')" class="button btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            {{Form::close()}}

                                            @if ($purchase_list_value->due==0)
                                            <button class="btn btn-warning"><i class="fab fa-creative-commons-nc"></i></button>
                                            @else
                                            <!-- Trigger the modal with a button -->
                                            
                                            {{Form::submit('Pay',['class'=>'btn btn-success btn-lg pay_modal','data-toggle'=>'modal','data-target'=>'#myModal','get_value'=>$purchase_list_value->purchase_product_id])}}

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
                                                            <td>{{$purchase_list_value->product_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Brand Name</td>
                                                            <td>{{$purchase_list_value->brand_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity</td>
                                                            <td>{{$purchase_list_value->purchase_product_quantity}}</td>
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
                                                            <td><input type="text" readonly="readonly" name="due" class="form-control due"></td>
                                                            <input type="hidden" name="current_due" value="{{$purchase_list_value->due}}" class="current_due">
                                                        </tr>
                                                        <tr>
                                                            <td>Now Pay</td>
                                                            <td><input type="text" name="now_pay" class="form-control now_pay" onkeypress="javascript:return isNumber(event)"></td>
                                                        </tr>

                                                    </table>
                                                  </div>
                                                  <div class="modal-footer">
                                                    {{Form::submit('Confirm Pay',['class'=>'btn btn-success confirm_pay','style'=>'margin-right: 300px;','get_value'=>$purchase_list_value->purchase_pricing_id])}}
                                                    
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
                                    <th>Purchase Date</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Brand Name</th>
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
            //$(".confirm_pay").attr("disabled", true);
            var purchase_product_id = $(this).attr('get_value');
            $.ajax({
                url:'purchase_pay',
                type:'post',
                data:{
                    "_token":"{{ csrf_token() }}",
                    'purchase_product_id':purchase_product_id,
                },
                success:function(data)
                {
                    $(".total").val(data.total);
                    $(".due").val(data.due);
                    $(".pay").val(data.pay);
                }
            });
        });

        $(document).on("keyup",".now_pay",function(){
            
            var current_due =$(".current_due").val();

            var now_pay = $(this).val();
            var due = $(".due").val();
            var pay = $(".pay").val();
            var total = $(".total").val();

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
            else if(now_pay!=0)
            {
                $('.confirm_pay').show();
            }
            else
            {
                $('.confirm_pay').hide();
            }
        });

        $(document).on("click",".confirm_pay",function(){
            var purchase_product_pricing_id = $(this).attr('get_value');
            var pay = $(".pay").val();
            var total = $(".total").val();
            var now_pay = $(".now_pay").val();
            var confirm_pay = parseInt(pay)+parseInt(now_pay);
            var due = parseInt(total)-parseInt(confirm_pay);
            //alert(due);

            $.ajax({
                url:"/confirm_pay",
                type:'post',
                data:{
                    "_token":"{{ csrf_token() }}",
                    'purchase_product_pricing_id':purchase_product_pricing_id,
                    'confirm_pay':confirm_pay,
                    'due':due,
                },
                success:function(data)
                {
                    swal("Sorry!", "Payment Successfully Done", "success");
                    setTimeout(function() { window.location.reload(true); }, 1000);
                }
            });

        });
    });
</script>


@stop    


