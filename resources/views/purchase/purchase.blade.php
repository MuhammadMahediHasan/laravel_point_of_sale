@extends('backend.admin_layouts')
@section('main_content')



<!-- form -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<link rel="stylesheet" href="{{asset('backend_asset/plugins/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend_asset/plugins/summernote/dist/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('backend_asset/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('backend_asset/plugins/mohithg-switchery/dist/switchery.min.css')}}">

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
                    <div class="card-header" style="background: #d8d8d8"><h2>Add Purchase</h2></div>
            {{Form::open(['url'=>"/purchase_data",'class'=>'purchase_form'])}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="sample-form">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        {{Form::date('product_main_date','',['class'=>'form-control product_main_date'])}}
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Suplier</label>
                                        <select name="product_main_suplier" class="form-control product_main_suplier">
                                            <option>--select--</option>
                                            @foreach($suplier as $suplier_data)
                                            <option value="{{$suplier_data->suplier_id}}">{{$suplier_data->suplier_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <img class="gif" style="width: 111px; display: none;" src="{{asset('backend_asset/images/spinner-loop.gif')}}">
                        </div>

                        <div class="row" style="margin-top: 0%;background: #d8d8d8;padding-top: 34px;">

                            <div class="input_fields_wrap" style="margin-left: 2%;     margin-bottom: 3%; width: 135%;">
                            <button class="add_field_button btn btn-success" style="    float: right;margin-top: 28px;margin-right: 16px;padding-bottom: 25px;">
                                <i class="fas fa-plus" style="margin-top: 4px;"></i></button>
                            <div>
                                <table>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td >
                                            <label style="margin-left: 44%;" for="">
                                            <b>Product</b></label>

                        @php
                            $product_name_array=[''=>'']
                        @endphp
                        @foreach($product as $product_data)
                            @php
                               $product_name_array[$product_data->product_id]=$product_data->product_name
                            @endphp
                        @endforeach


                        {{Form::select('product_name[]',$product_name_array,null,['class'=>'form-control product_name','style'=>'width: 450px;'])}}

                                        </td>
                                        <td>
                                            <label style="margin-left: 31px;">Quantity</label>
                                            <input type="text" name="quantity[]" class="form-control quantity" onkeypress="javascript:return isNumber(event)" style="margin-left: 17%;width: 85%;">
                                        </td>
                                        <td>
                                            <label style="margin-left: 27px;">Unit Cost</label>
                                            <input type="text" id="unit_cost" name="unit_cost" readonly="readonly" class="form-control unit_cost" style="width: 81%;margin-left: 14%;">

                                        </td>
                                        <td>
                                            <label style="margin-left: 18px;">Sub Total</label>
                                            <input type="text" readonly="readonly" id="sub_total" name="sub_total" class="form-control sub_total" style="width: 140px;margin-left: 14px;">
                                        </td>
                                    </tr>
                                </table>
                                <!-- <div class="col-md-12" style="margin-top: 10px;">
                                    <label style="margin-left:19%;"><b>Total</b></label>
                                    <p style="float: right;margin-right: 9%;">1212</p>
                                </div> --> 
                             </div>
                             </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class=""></div>
                                    <div class="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header"><h3></h3></div>
                                    <div class="card-body">
                                        <p></p>
                                        <div data-repeater-list="group-a">
                                                <table class=" table-bordered">
                                                    <tr class="tr_back">
                                                        <th class="th_back" >Total</th>
                                                        <td><input type="text" readonly="readonly" name="grand_total" class="form-control td_input grand_total"></td>
                                                      </tr>

                                                      <tr>
                                                        <th class="th_back">Pay</th>
                                                        <td><input type="te
                                                            " name="pay" class="form-control td_input pay" onkeypress="javascript:return isNumber(event)"></td>
                                                      <tr>

                                                        <tr>
                                                        <th class="th_back">Due</th>
                                                        <td><input type="text" readonly="readonly" name="due" class="form-control td_input due"></td>
                                                      <tr>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<style type="text/css">
    .th_back{
        color: #ffffff;
        background: black;
        width: 136px;
        text-align: center;
    }
    .tr_back{
        background: white;
    }
    .td_input{
        width: 137px;
        margin-left: 1px;
    }
</style>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="    margin-top: 22px;">
                                    <button class="btn btn-success submit"  type="button">Add Purchase</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    $(".pay").attr("disabled","disabled"); 
    $(document).ready(function(){
        $(document).on("change",".product_name",function(){
            var product_id=$(this).val();
            //alert(product_id);
             var v = $(this).closest("div");
             $('.gif').show();

            $.ajax({
                'url':'/purchase',
                'type':'post',
                'data':{
                    "_token":"{{ csrf_token() }}",
                    'pro':product_id,
                },
                success:function(data) {
                    $('.gif').hide('slow');
                    v.find("input[name=unit_cost]").val(data.product_cost);

               },
            });

        });

        $(document).on("keyup", ".quantity", function(){

            var total = $(this).closest("div");

            var quantity=$(this).val();
            var unit_cost=$(this).closest("div").find(".unit_cost").val();
            var sub_total=parseInt(unit_cost*quantity);
            total.find("input[name=sub_total]").val(sub_total);

            var grand_total=0;
            $(".sub_total").each(function(){
                var value =parseInt($(this).val());

                grand_total=parseInt(value+grand_total);
                $(".grand_total").val(grand_total);
            });
            if (quantity=='') 
            {
                $(".pay").attr("disabled","disabled"); 
            }
            else
            {
                $(".pay").removeAttr("disabled");
            }
        });

        $(document).on("keyup", ".pay", function(){
            var pay = $(this).val();
            var grand_total=$(".grand_total").val();
            if (parseInt(pay)>parseInt(grand_total)) 
            {
                swal("Sorry!", "Your Pay is Greater Then Total", "error");
                $(".pay").val(null);
                $(".due").val(grand_total);
            }
            else if (pay<=0) 
            {
                swal("Sorry!", "Pay Must Be Greater Then Zero", "error");
                $(".pay").val(null);
            }
            else
            {
                var due = parseInt(grand_total-pay);
                $(".due").val(due);
            }

        });

        $(document).on("click",".submit", function(){
            var date = $(".product_main_date").val();
            var suplier = $(".product_main_suplier").val();
            var pay = $(".pay").val();
            var product_name = [];
            var quantity = [];
            // var pay = $(".pay").val();

                $(".product_name").each(function(){
                    var value = $(this).val();

                    if (value!='') 
                    {
                        product_name.push(value);
                    }
                });
                $(".quantity").each(function(){
                    var value = $(this).val();

                    if (value!='') 
                    {
                        quantity.push(value);
                    }
                });

            if (date=='') 
            {
                swal("Sorry!", "Date Is Empty", "error");
            }
            else if(suplier=='--select--')
            {
                swal("Sorry!", "Suplier Name Is Empty", "error");
            }
            else if(product_name =='')
            {
                swal("Sorry!", "Product Name Is Empty", "error");
            }
            else if(quantity =='')
            {
                swal("Sorry!", "Quantity Is Empty", "error");
            }
            else if(pay=='')
            {
                swal("Sorry!", "Pay Is Empty", "error");
            }
            else
            {
                $(".submit").attr("type","submit");
            }
        });

    });



$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x <= max_fields)
    { //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div style="display: inline-flex;margin-top: 2%;    width: 100%;"><tr>\
        <td><select name="product_name[]" class="form-control product_name" style="width: 265%;">\
        <option>--select--</option>\
        @foreach($product as $product_data)\
            <option value="{{$product_data->product_id}}">{{$product_data->product_name}}</option>\
        @endforeach\
            </select>\
          </td>\
        <td><input type="text" name="quantity[]" class="form-control quantity" onkeypress="javascript:return isNumber(event)" style="    margin-left: 32px;width: 78%;"></td>\
        <td><input type="text" name="unit_cost" readonly="readonly" class="form-control unit_cost" style="width: 78%;margin-left: 22px;"></td>\
        <td><input type="text" name="sub_total" readonly="readonly" class="form-control sub_total" style="width: 78%;margin-left: 23px;"></td></tr>\
        <a href="#" class="remove_field btn btn-danger" style="margin-right: 13px; margin-right: 16px;padding-right: 11px;padding-bottom: 24px;"><i style="padding: 4px;color: white;" class="fas fa-times"></i></a></div>'); //add input box
        }

        else
        {
            swal("Sorry!", "Only 10 Fields Are Allowed!", "error");
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
{{Form::close()}}

@stop    
