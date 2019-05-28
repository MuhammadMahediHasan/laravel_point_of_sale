@extends('backend.admin_layouts')
@section('main_content')

<div class="main-content" style="margin-top: 0px; min-height:0px">
    <div class="container-fluid">
        <div class="row" style="background: white;    padding-top: 15px;">
		  	<div class="col-sm-6">
		  		<p>Monthly Report</p>
		  	</div>
		  	<div class="col-sm-6" style="">
		  		<p style="float: right;">Monthly Report</p>
		  	</div>
		</div>
		<div class="row" style="  margin-top: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table id="simpletable" class="table table-striped table-bordered nowrap">
					<tr style="background: #68cf8a;">
						<th>FROM</th>
						<th>TO</th>
						<th>SUBMIT</th>
					</tr>
					<tr>
						<td><input type="date" name="" class="form-control first_date"></td>
						<td><input type="date" name="" class="form-control second_date"></td>
						<td><input type="submit" name="" class=" btn btn-success submit" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-2">
				<div style="float: right;margin-top: 10px;">
				<a href="#">
		  			<button type="button"><i class=" fas fa-file-pdf pdf" id="pdf" style="font-size: 20px;"></i></button>
		  		</a>
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

<script src=”https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js”></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click",".submit", function(){
			
			var first_date = $(".first_date").val();
			var second_date = $(".second_date").val();
			if (second_date=='') 
			{
				swal("Not Selected!", "Please Select Date First!", "error");
				//alert();
			}
			else if (first_date=='')
			{
				swal("Not Selected!", "Please Select Date First!", "error");
			}
			//alert(second_date);
			else
			{
				$('.gif').show();
				$.ajax({
					url:'/get_monthly_report',
					type:'post',
					data:{
						"_token":"{{ csrf_token() }}",
						'first_date':first_date,
						'second_date':second_date,
					},
					success:function(data){
						//console.log(data);
						$('.gif').delay(400).fadeOut("slow");
						$(".report_table").html(data);
					}
				});
			}
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