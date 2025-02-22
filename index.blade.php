<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 1em;
        }
        .form-group label, .form-group input, .form-group select {
            display: block;
            width: 100%;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Expense Tracker</h1>

        <!-- Form Input -->
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="amount">Jumlah:</label>
                <input type="number" step="0.01" name="amount" id="amount" required>
            </div>
            <div class="form-group">
                <label for="type">Tipe:</label>
                <select name="type" id="type" required>
                    <option value="income">Pemasukan</option>
                    <option value="expense">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Tanggal:</label>
                <input type="date" name="date" id="date" required>
            </div>
            <button type="submit">Tambah Transaksi</button>
        </form>

        <!-- Tabel Data -->
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->type }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>
                            <a href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Pengeluaran -->
        <div>
            <h3>Total Jumlah Pengeluaran: {{ $totalAmount }}</h3>
        </div>

        <!-- Grafik -->
        <canvas id="monthlySummaryChart" width="400" height="200"></canvas>

        <script>
            var ctx = document.getElementById('monthlySummaryChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Pengeluaran Bulanan',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>
