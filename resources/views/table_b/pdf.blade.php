<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table B</title>

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

<h2>Data Table B</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Toko</th>
            <th>Nominal Transaksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_toko }}</td>
            <td>{{ $item->nominal_transaksi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
