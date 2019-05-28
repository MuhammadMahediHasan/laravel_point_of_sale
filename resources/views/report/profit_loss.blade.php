@extends('backend.admin_layouts')
@section('main_content')

<div class="main-content" style="margin-top: 0px; min-height:0px">
    <div class="container-fluid">
        <div class="row" style="background: white;    padding-top: 15px;">
		  	<div class="col-sm-6">
		  		<p>Profit & Loss Report</p>
		  	</div>
		  	<div class="col-sm-6" style="">
		  		<p style="float: right;">Profit & Loss Report</p>
		  	</div>
		</div>
		<div class="row" style="  margin-top: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table id="simpletable" class="table table-striped table-bordered nowrap">
					<tr style="background: #68cf8a;">
						<!-- <th>#</th> -->
						<th>From</th>
						<th>To</th>
						<th>Search</th>
					</tr>
					<tr>
						<!-- <td><input type="text" name="user_define" class="form-control user_define" placeholder="Write Something..."></td> -->
						<td><input type="date" name="" class="form-control first_date"></td>
						<td><input type="date" name="" class="form-control second_date"></td>
						<td><input type="submit" name="" class=" btn btn-success submit" style="width: 100%;" value="Search"></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-2">
				<div style="float: right;margin-top: 10px;">
				
		  			<button type="button" onclick="printDiv('report_table')"><i class="fas fa-print" style="font-size: 20px;"></i></button>
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

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click",".submit", function(){
			$('.gif').show();
			// var user_define = $(".user_define").val();
			var first_date = $(".first_date").val();
			var second_date = $(".second_date").val();

		
			$.ajax({
					url:'/get_profit_loss_report',
					type:'POST',
					data:{
						"_token":"{{ csrf_token() }}",
						'first_date':first_date,
						'second_date':second_date,
					},
					success:function(data){

						console.log(data);
						$('.gif').delay(400).fadeOut("slow");
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