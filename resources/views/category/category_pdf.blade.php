<div style="">
<center>
<h1 style="text-align: center;">Category</h1>
<h3 style="line-height: 3px;">TMSS Departmental Store</h3>
<p style="line-height: 3px;">TMSS Road, Kazipara</p>
</center>
    <table border="" style="width: 100%;">
        <thead>
        <tr style="padding: 40px">
            <th style="padding: 6px;background: #c0c0c0;">#</th>
            <th style="padding: 6px;background: #c0c0c0;">Name</th>
            <th style="padding: 6px;background: #c0c0c0;">Code</th>
            <th style="padding: 6px;background: #c0c0c0;">Description</th>
            <th style="padding: 6px;background: #c0c0c0;">Status</th>

        </tr>
        </thead>
        <tbody>
            @foreach($category_data as $key => $category_data_value)
            <tr>
                <td style="padding: 6px;">{{$key+1}}</td>
                <td style="padding: 6px;">{{$category_data_value->category_name}}</td>
                <td style="padding: 6px;">{{$category_data_value->category_code}}</td>
                <td style="padding: 6px;">{{$category_data_value->category_description}}</td>
                <td style="padding: 6px;">{{$category_data_value->category_status}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<P style="margin-top: 50px; border-bottom: 1px solid">Print date:&nbsp;{{date('d-m-y')}}</P>


