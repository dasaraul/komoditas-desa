<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kopmoditas Desa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
{{-- <button onclick="printPage()" class="btn btn-warning">Cetak</button> --}}
<body onload="window.print();">
<h2>Cetak Komoditas Desa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Desa</th>
                <th>Nama Komoditas</th>
                <th>Status</th>
                <th>Jumlah</th>
                
            </tr>
        </thead>
        <tbody>
<td>{{ $komoditasDesa->desa->nama_desa }}</td>
<td>{{ $komoditasDesa->komoditi->nama_komoditi}}</td>
<td>{{ $komoditasDesa->kategori->kategori }}</td>
<td>{{ $komoditasDesa->jumlah  }}</td>
            {{-- <?php
            $query = "SELECT * FROM komoditasDesa"; 
            $hasil = mysqli_query($komoditasDesa, $desa_id);
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>"; 
                echo "<td>" . $row['nama'] . "</td>"; 
                
                echo "</tr>";
            }
            ?> --}}
        </tbody>
    </table>
</body>
</html>