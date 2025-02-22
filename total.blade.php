<!DOCTYPE html>
<html>
<head>
    <title>Total Pengeluaran</title>
</head>
<body>
    <h1>Total Pengeluaran</h1>
    <p>Total Jumlah Pengeluaran: {{ $totalAmount }}</p>
    <button onclick="location.href='{{ route('expenses.index') }}'" style="background-color: blue; color: white;">Kembali</button>
</body>
</html>
