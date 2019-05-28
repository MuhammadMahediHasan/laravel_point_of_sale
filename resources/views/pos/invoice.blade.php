<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      
      <div class="col-sm-2"></div>
      <div class="col-sm-8 modal-body" style="width: 800px; height: 1100px;">
        <div class="row">
           <div class="col-sm-6" style="line-height: 5px; width: 50%;">
                <h1>Invoice</h1>
                <h3>TMSS Departmental Store</h3>
                <p>Kazipara,Mirpur,Dhaka.</p>
           </div>
           <div class="col-sm-6" style="float: right;margin-top: -100px;">
                <img style="width: 300px;" src="{{asset('backend_asset/src/img/invoice.png')}}">
           </div>
        </div>
        <hr>
        <div class="row" style="margin-top: 60px;">
           <div class="col-sm-6">
                <p>Date: &nbsp; {{$data->sales_main_date}}</p>
                <p>Invoice ID: &nbsp; {{$data->invoice_id}}</p> 
                <p>Customer Name: &nbsp; {{$data->sales_main_customer}}</p> 
            </div>
           <div class="col-sm-6">
                   
               
                

           </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-sm-12">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
                    <h4 class="text-center">OverView</h4>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                    @foreach($data->product_name as $key => $sales_data)
                    @php
                      $product_name=DB::table('product_template')->where('product_id',$sales_data)->first();
                      $price=$product_name->product_mrp;
                      $quantity=$data->quantity[$key];
                    @endphp
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product_name->product_name}}</td>
                        <td>{{$price}}</td>
                        <td>{{$quantity}}</td>
                        <td>{{$price*$quantity}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="row" style="margin-left: 428px;">
            <div data-repeater-list="group-a">
                <table class=" table-bordered">
                    <tr class="">
                        <th style="color: #ffffff;background: black;width: 136px;text-align: center;">Total</th>
                        <td><input type="text" readonly="readonly" name="grand_total" value="{{$data->grand_total}}" class="form-control  grand_total"></td>
                      </tr>

                      <tr>
                        <th style="color: #ffffff;background: black;width: 136px;text-align: center;">Pay</th>
                        <td><input type="text" name="pay" value="{{$data->pay}}" class="form-control  pay"></td>
                      <tr>
                        <tr>
                        <th style="color: #ffffff;background: black;width: 136px;text-align: center;">Due</th>
                        <td><input type="text" readonly="readonly" name="due" value="{{$data->due}}" class="form-control  due"></td>
                      <tr>
                </table>
            </div>
        </div>
      </div>
      <div class="col-sm-2"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
     window.print();
 });
</script>      