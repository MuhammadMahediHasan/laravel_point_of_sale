<div style="">
<center>
<h1 style="text-align: center;">Products</h1>
<h3 style="line-height: 3px;">TMSS Departmental Store</h3>
<p style="line-height: 3px;">TMSS Road, Kazipara</p>
</center>
    <table border="" style="width: 100%;">
        <thead>
        <tr style="padding: 40px">
            <th style="padding: 6px;background: #c0c0c0;">#</th>
            <th style="padding: 6px;background: #c0c0c0;">Name</th>
            <th style="padding: 6px;background: #c0c0c0;">Code</th>
            <th style="padding: 6px;background: #c0c0c0;">Cost</th>
            <th style="padding: 6px;background: #c0c0c0;">MRP</th>
            <th style="padding: 6px;background: #c0c0c0;">Tax</th>
            <th style="padding: 6px;background: #c0c0c0;">Status</th>

        </tr>
        </thead>
        <tbody>
            @foreach($product_data as $key => $product_data_value)
            <tr>
                <td style="padding: 6px;">{{$key+1}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_name}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_code}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_cost}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_mrp}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_tax}}</td>
                <td style="padding: 6px;">{{$product_data_value->product_status}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<P style="margin-top: 50px; border-bottom: 1px solid">Print date:&nbsp;{{date('d-m-y')}}</P>


