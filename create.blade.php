<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengeluaran/Pemasukan</title>
</head>
<body>
    <h1>Tambah Pengeluaran/Pemasukan</h1>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <label for="description">Deskripsi:</label>
        <input type="text" name="description" id="description" required>
        <br>
        <label for="amount">Jumlah:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br>
        <label for="type">Tipe:</label>
        <select name="type" id="type" required>
            <option value="income">Pemasukan</option>
            <option value="expense">Pengeluaran</option>
        </select>
        <br>
        <label for="date">Tanggal:</label>
        <input type="date" name="date" id="date" required>
        <br>
        <button type="submit" style="background-color: green; color: white;">Tambah Transaksi</button>
    </form>
    <a href="{{ route('expenses.index') }}">Kembali</a>
</body>
</html>
