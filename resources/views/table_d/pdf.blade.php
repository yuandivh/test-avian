<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table D</title>

    <style>
        table{
            width:100%;
            border-collapse:collapse;
            table-layout: fixed;
        }

        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
            word-wrap:break-word;
        }

        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2>Data Table D</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode sales</th>
            <th>Nama Sales</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_sales }}</td>
            <td>{{ $item->nama_sales }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
