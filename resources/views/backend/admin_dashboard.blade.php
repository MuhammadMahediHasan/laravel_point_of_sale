@extends('backend.admin_layouts');
@section('main_content');
                <div class="main-content" style="margin-top: 20px;">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-menu bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>DashBoard</h5>
                                            <span>Point Of Sale</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="/backend"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="pos">POS</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a href="/purchase">Purchase</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Round Chart statustc card start -->
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget bg-primary">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Total Stock</h6>
                                                <h2 class="total_stock"></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-box"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget bg-success">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Sold</h6>
                                                <h2 class="sold"></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget bg-warning">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                
                                                <h6>Total Purchase</h6>
                                                <h2 class="purchase"></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-inbox"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget bg-danger">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                              
                                                <h6>Product Template</h6>
                                                <h2 class="product"></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-grid"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Round Chart statustc card end -->

                            <!-- product bar chart start -->
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            @php
                                $product_data=DB::table('product_template')->get();
                            @endphp
                          google.charts.load("current", {packages:["corechart"]});
                          google.charts.setOnLoadCallback(drawChart);
                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['PRODUCT', 'OVERVIEW'],
                              @foreach($product_data as $product_data_value)
                                @php
                                $stock=DB::table('purchase_stock')
                                        ->where('product_id',$product_data_value->product_id)
                                        ->where('stock_status','Active')
                                        ->get()
                                        ->count()
                                @endphp  
                                 ['{{$product_data_value->product_name}}',{{$stock}}],
                              @endforeach
                              // ['Work',     11],
                              // ['Eat',      2],
                              // ['Commute',  2],
                              // ['Watch TV', 2],
                              // ['Sleep',    7]
                            ]);

                            var options = {
                              is3D: true,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                          }
                        </script>



                            <div class="col-xl-6 col-md-6">
                                <div class="card prod-bar-card">
                                    <div class="card-header">
                                        <h3>Product OverView</h3>
                                    </div>
                                    <div class="card-block">
                                        <div id="piechart_3d" style="height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card prod-bar-card">
                                    <div class="card-header">
                                        <h3>Sales | Expenses | Profit</h3>
                                    </div>
                                    <div class="card-block">
                                        <div id="chart_div"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- product bar chart end -->
<!-- SELECT * FROM purchase_stock WHERE `updated_at` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() -->
<!-- Seven Days -->
<?php 
$date = \Carbon\Carbon::today()->subDays(7);
$query=DB::table('purchase_stock')
        ->where('updated_at', '>=', $date)
        ->where('stock_status','Inactive')->get();

        // echo "<pre>";
        // print_r($query);

    $purchase_total=0;
    $sales_total=0;
        foreach ($query as $key => $value) 
        {
            $name=DB::table('product_template')->where('product_id',$value->product_id)->first();
            $brand=DB::table('brand')->where('brand_id',$name->brand_name)->first();
            

        $purchase_total += $name->product_cost;
        $sales_total += $name->product_mrp;
        }
        $profit=$sales_total - $purchase_total;
?>
<!-- Fifteen Days -->
<?php 
$date = \Carbon\Carbon::today()->subDays(15);
$query=DB::table('purchase_stock')
        ->where('updated_at', '>=', $date)
        ->where('stock_status','Inactive')->get();

        // echo "<pre>";
        // print_r($query);

    $fifteen_days_purchase=0;
    $fifteen_days_sale=0;
        foreach ($query as $key => $value) 
        {
            $name=DB::table('product_template')->where('product_id',$value->product_id)->first();
            $brand=DB::table('brand')->where('brand_id',$name->brand_name)->first();
            

        $fifteen_days_purchase += $name->product_cost;
        $fifteen_days_sale += $name->product_mrp;
        }
        $fifteen_days_profit=$fifteen_days_sale - $fifteen_days_purchase;
?>

<!-- Thirteen Days -->
<?php 
$date = \Carbon\Carbon::today()->subDays(30);
$query=DB::table('purchase_stock')
        ->where('updated_at', '>=', $date)
        ->where('stock_status','Inactive')->get();

        // echo "<pre>";
        // print_r($query);

    $thirteen_days_purchase=0;
    $thirteen_days_sale=0;
        foreach ($query as $key => $value) 
        {
            $name=DB::table('product_template')->where('product_id',$value->product_id)->first();
            $brand=DB::table('brand')->where('brand_id',$name->brand_name)->first();
            

        $thirteen_days_purchase += $name->product_cost;
        $thirteen_days_sale += $name->product_mrp;
        }
        $thirteen_days_profit=$thirteen_days_sale - $thirteen_days_purchase;
?>
                            
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Days', 'Sales', 'Expenses', 'Profit'],
          ['7 Days', {{$sales_total}}, {{$purchase_total}}, {{$profit}}],
          ['15 Days', {{$fifteen_days_sale}}, {{$fifteen_days_purchase}}, {{$fifteen_days_profit}}],

          ['30 Days', {{$thirteen_days_sale}}, {{$thirteen_days_purchase}}, {{$thirteen_days_profit}}],
          // ['60 Days', 1030, 540, 350]
        ]);

        var options = {
          // chart: {
          //   title: 'Company Performance',
          //   subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          // },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
</script>
                            
                            <!-- income end -->

                        </div>

                    </div>
                </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            get_total_stock();
            get_sold();
            get_purchase();
            get_product();
        },1000);


    });

function get_total_stock()
    {
        $.ajax({
            url:'/total_stock',
            type:'get',
            data:{

            },
            success:function(data)
            {
                console.log(data);
                $(".total_stock").html(data.data)
            }
        });
    }
function get_sold()
    {
        $.ajax({
            url:'/sold',
            type:'get',
            data:{

            },
            success:function(data)
            {
                console.log(data);
                $(".sold").html(data.total_sold)
            }
        });
    }
function get_purchase()
    {
        $.ajax({
            url:'/purchase_dashboard',
            type:'get',
            data:{

            },
            success:function(data)
            {
                console.log(data);
                $(".purchase").html(data.total_purchase)
            }
        });
    } 
function get_product()
    {
        $.ajax({
            url:'/product',
            type:'get',
            data:{

            },
            success:function(data)
            {
                console.log(data);
                $(".product").html(data.product_template)
            }
        });
    }            
</script>                
@stop 

