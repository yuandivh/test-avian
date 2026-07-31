<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table C</title>

    <style>
        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
        }

        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2>Data Table C</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode toko</th>
            <th>Area sales</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_toko }}</td>
            <td>{{ $item->area_sales }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
