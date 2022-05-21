<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Bokking System-Admin</title>


</head>
<body style="background-color: gainsboro;">
    {{ View::make('adminHeader') }}
    <div class="home">
        <div class="Display">
            <table>                
                <tr>
                    <th colspan="3" style="color: rgb(0, 0, 0); font-size: 30px;text-align:center" >Stock Level</th>
                </tr>
                <tr>
                    <th>IBSN_13</th>
                    <th>Book Title</th>
                    <th>Stock Level</th>
            @foreach ($stock as $row)
                <tr>
                    <td>{{ $row->ISBN_13 }}</td>
                    <td>{{ $row->bookName }}</td>
                    <td style="text-align: center">{{ $row->stockLevel }}</td>
            @endforeach
            </table>
        </div>
    </div>

    {{ View::make('footer') }}
</body>
</html>