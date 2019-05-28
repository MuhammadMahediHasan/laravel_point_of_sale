<div style="">
<center>
<h1 style="text-align: center;">Customers</h1>
<h3 style="line-height: 3px;">TMSS Departmental Store</h3>
<p style="line-height: 3px;">TMSS Road, Kazipara</p>
</center>
    <table border="" style="width: 100%;">
        <thead>
        <tr style="padding: 40px">
            <th style="padding: 6px;background: #c0c0c0;">#</th>
            <th style="padding: 6px;background: #c0c0c0;">Name</th>
            <th style="padding: 6px;background: #c0c0c0;">Email</th>
            <th style="padding: 6px;background: #c0c0c0;">Phone</th>
            <th style="padding: 6px;background: #c0c0c0;">Address</th>
            <th style="padding: 6px;background: #c0c0c0;">Account No</th>
            <th style="padding: 6px;background: #c0c0c0;">Opening Balence</th>
            <th style="padding: 6px;background: #c0c0c0;">Taxable</th>

        </tr>
        </thead>
        <tbody>
            @foreach($customer_data as $key => $customer_data_value)
            <tr>
                <td style="padding: 6px;">{{$key+1}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_name}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_email}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_phone}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_address}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_account_no}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_opening_balance}}</td>
                <td style="padding: 6px;">{{$customer_data_value->customer_taxable}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<P style="margin-top: 50px; border-bottom: 1px solid">Print date:&nbsp;{{date('d-m-y')}}</P>


