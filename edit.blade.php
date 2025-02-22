<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran/Pemasukan</title>
</head>
<body>
    <h1>Edit Pengeluaran/Pemasukan</h1>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="description">Deskripsi:</label>
        <input type="text" name="description" id="description" value="{{ $expense->description }}" required>
        <br>
        <label for="amount">Jumlah:</label>
        <input type="number" step="0.01" name="amount" id="amount" value="{{ $expense->amount }}" required>
        <br>
        <label for="type">Tipe:</label>
        <select name="type" id="type" required>
            <option value="income" {{ $expense->type == 'income' ? 'selected' : '' }}>Pemasukan</option>
            <option value="expense" {{ $expense->type == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
        <br>
        <label for="date">Tanggal:</label>
        <input type="date" name="date" id="date" value="{{ $expense->date }}" required>
        <br>
        <button type="submit" style="background-color: blue; color: white;">Update</button>
    </form>
    <a href="{{ route('expenses.index') }}">Kembali</a>
</body>
</html>
