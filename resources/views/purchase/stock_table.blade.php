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
                            <a href="/category_pdf">
                                <i class="far fa-file-pdf" style="margin-right: 4px;" title="PDF"></i>
                            </a>
                            <a href="/category_pdf_preview">
                                <i class="far fa-file" style="margin-right: 4px;" title="PDF Preview"></i>
                            </a>
                            <a href="">
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
                                    <th>Product Name</th>
                                    <th>Total Purchase</th>
                                    <th>Quantity On hand</th>
                                    <th>Total Sold</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchase_product as $key => $purchase_product_value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$purchase_product_value->product_name}}</td>
                                        <td>{{$purchase_product_value->quantity}}</td>
                                        <td>
                                            @php
                                                $quantity=DB::table('purchase_stock')
                                                            ->where('product_id',$purchase_product_value->product_id)
                                                            ->where('stock_status','Active')->get()
                                                            ->count();
                                            @endphp
                                            {{$quantity}}
                                        </td>
                                        <td>
                                            {{$purchase_product_value->quantity-$quantity}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Total Purchase</th>
                                    <th>Quantity On hand</th>
                                    <th>Total Sold</th>
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
