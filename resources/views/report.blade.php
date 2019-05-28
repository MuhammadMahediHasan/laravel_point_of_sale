@extends('backend.admin_layouts')
@section('main_content')

<div class="main-content" style="margin-top: 0px; min-height:0px">
    <div class="container-fluid">
        <div class="row" style="background: white;    padding-top: 15px;">
		  	<div class="col-sm-6">
		  		<p>Report</p>
		  	</div>
		  	<div class="col-sm-6" style="">
		  		<p style="float: right;">Report</p>
		  	</div>
		</div>
		<div class="row" style="  margin-top: 15px;">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<table id="simpletable" class="table table-striped table-bordered nowrap">
					<tr style="background: #68cf8a;">
						<th>DATE</th>
						<th>SUBMIT</th>
					</tr>
					<tr>
						<td><input type="date" name="" class="form-control"></td>
						<td><input type="submit" name="" class=" btn btn-success"></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<div style="float: right;margin-top: 10px;">
				<a href="#">
		  			<button ><i class=" fas fa-file-pdf" style="font-size: 20px;"></i></button>
		  		</a>
		  		<a href="#">
		  			<button ><i class="fas fa-print" style="font-size: 20px;"></i></button>
		  		</a>
		  		</div>
			</div>
		</div>
		<div class="row" style="margin-top: 100px;">
			<div class="col-sm-12 text-center">
				<h4>TMSS DEPARTMENTAL STORE</h4>
				<h5>Transection Report</h5>
				<P>Kazipara, Mirpur, Dhaka.</P>
			</div>
			<div class="col-sm-12">
				<P style="margin-bottom: -22px;margin-top: 58px;">Date : </P>
			</div>
			<div class="col-sm-12">
					<table class="table table-bordered" style="margin-top: 25px;">
					    <thead>
					      <tr>
					        <th>Firstname</th>
					        <th>Lastname</th>
					        <th>Email</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>John</td>
					        <td>Doe</td>
					        <td>john@example.com</td>
					      </tr>
					    </tbody>
					  </table>
			</div>
		</div>
    </div>
</div>

@stop  