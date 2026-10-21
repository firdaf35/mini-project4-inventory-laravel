<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Bloom & Co. Florist')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f5f1;
            color: #433b36;
        }

        header {
            background: #ffffff;
            padding: 18px 5%;
            border-bottom: 1px solid #eadfd5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h2 {
            margin: 0;
            color: #795b50;
        }

        nav {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        a {
            color: #805c50;
            text-decoration: none;
        }

        nav a {
            font-size: 14px;
        }

        nav a:hover {
            color: #b17d68;
            text-decoration: underline;
        }

        main {
            max-width: 1150px;
            margin: 30px auto;
            padding: 0 18px;
        }

        h1 {
            color: #795b50;
        }

        h2 {
            color: #795b50;
        }

        .card {
            background: #ffffff;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 10px #00000008;
            margin-bottom: 20px;
            overflow-x: auto;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
        }

        .stat {
            background: #ffffff;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 10px #00000008;
        }

        .stat strong {
            display: block;
            font-size: 28px;
            margin-top: 10px;
            color: #795b50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee5de;
            text-align: left;
        }

        th {
            background: #f1e7df;
            color: #60493f;
        }

        input, select {
            padding: 10px;
            border: 1px solid #d9c8bb;
            border-radius: 7px;
            max-width: 100%;
        }

        label {
            display: block;
            margin: 14px 0 6px;
        }

        button, .btn {
            display: inline-block;
            background: #8d695b;
            color: #ffffff;
            border: 0;
            border-radius: 7px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover, .btn:hover {
            background: #725144;
        }

        .danger {
            background: #a94c4c;
        }

        .danger:hover {
            background: #853737;
        }

        .muted {
            color: #82756d;
        }

        .success {
            padding: 12px;
            background: #e4f4e5;
            color: #276438;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .error {
            padding: 12px;
            background: #fde8e6;
            color: #8a3029;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .actions form {
            display: inline;
        }

        .inline-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .role-label {
            background: #f1e7df;
            color: #795b50;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #82756d;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            header {
                align-items: flex-start;
            }

            nav {
                gap: 12px;
            }

            table {
                font-size: 13px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>Bloom & Co. 🌷</h2>

    @auth
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>

            <a href="{{ route('products.index') }}">Data Bunga</a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('categories.index') }}">Kategori</a>

                <a href="{{ route('stock.create', ['type' => 'IN']) }}">
                    Barang Masuk
                </a>

                <a href="{{ route('stock.create', ['type' => 'OUT']) }}">
                    Barang Keluar
                </a>
            @endif

            <a href="{{ route('stock.index') }}">Histori Stok</a>

            <span class="role-label">
                {{ auth()->user()->name }}
                ({{ ucfirst(auth()->user()->role) }})
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    @endauth
</header>

<main>
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer>
    Bloom & Co. Florist — Inventory Management System
</footer>

</body>
</html>