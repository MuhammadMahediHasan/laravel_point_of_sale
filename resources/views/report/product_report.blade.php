@extends('backend.admin_layouts')
@section('main_content')

<div class="main-content" style="margin-top: 0px; min-height:0px">
    <div class="container-fluid">
        <div class="row" style="background: white;    padding-top: 15px;">
		  	<div class="col-sm-6">
		  		<p>Product Report</p>
		  	</div>
		  	<div class="col-sm-6" style="">
		  		<p style="float: right;">Product Report</p>
		  	</div>
		</div>
		<div class="row" style="  margin-top: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table id="simpletable" class="table table-striped table-bordered nowrap">
					<tr style="background: #68cf8a;">
						<th>#</th>
						<th>Product Name</th>
						<th>Brand Name</th>
						<th>Search</th>
					</tr>
					<tr>
						<td><input type="text" name="user_define" class="form-control user_define" style="margin-right: -89px;" placeholder="Write Something..."></td>
						<td><select class="form-control product_name" name="product_name">
								<option value="">--Select--</option>
								@foreach($product as $product_data)
								<option value="{{$product_data->product_id}}">{{$product_data->product_name}}</option>
								@endforeach
							</select>
						</td>
						<td><select class="form-control brand_name" name="brand_name">
								<option value="">--Select--</option>
								@foreach($brand as $brand_data)
								<option value="{{$brand_data->brand_id}}">{{$brand_data->brand_name}}</option>
								@endforeach
							</select>
						</td>
						<td><input type="submit" name="" class=" btn btn-success submit" style="width: 100%;" value="Search"></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-2">
				<div style="float: right;margin-top: 10px;">
				<a href="#">
		  			<button type="button"><i class=" fas fa-file-pdf pdf" id="pdf" style="font-size: 20px;" title="PDF"></i></button>
		  		</a>
		  			<button type="button" onclick="printDiv('report_table')"><i class="fas fa-print" style="font-size: 20px;" title="Print Report"></i></button>
		  		</div>
			</div>
		</div>
		<div>
			<center>
				<img class="gif" style="height: 200px; display: none; margin-top: 50px;" src="{{asset('backend_asset/images/loader.gif')}}">
			</center>
		</div>
		<div class="row report_table" id="report_table" style="margin-top: 100px;">
			
		</div>
    </div>
</div>

@stop  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src=”https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js”></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click",".submit", function(){
			//$('.gif').show();
			var user_define = $(".user_define").val();
			var product_name = $(".product_name").val();
			var brand_name = $(".brand_name").val();

		
			$.ajax({
					url:'/get_product_report',
					type:'POST',
					data:{
						"_token":"{{ csrf_token() }}",
						'user_define':user_define,
						'product_name':product_name,
						'brand_name':brand_name,
					},
					success:function(data){

						console.log(data);
						//$('.gif').delay(400).fadeOut("slow");
						$(".report_table").html(data);
					}
				});
			
		});
	});
</script>
<script type="text/javascript">
   function printDiv(divName) {
	   var printContents = document.getElementById(divName).innerHTML;
	   var originalContents = document.body.innerHTML;

	   document.body.innerHTML = printContents;

	   window.print();

	   document.body.innerHTML = originalContents;
}
</script>