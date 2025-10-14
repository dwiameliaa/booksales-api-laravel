<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 950px;
            margin-top: 50px;
        }
        .header-title {
            text-align: center;
            font-weight: 700;
            color: #0b2f6a;
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 40px;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            color: #0d6efd;
            font-weight: 600;
        }
        .price {
            font-weight: 600;
            color: #198754;
        }
        .stock {
            font-weight: 500;
            color: #0b2f6a;
        }

        /* Margin bawah ekstra untuk card terakhir di desktop */
        @media (min-width: 992px) {
            .row.g-4 > .col-md-6:last-child {
                margin-bottom: 60px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="header-title">📖 Book Collection</h1>
        <p class="subtitle">Welcome to <strong>BookSales</strong>, your favorite online bookstore! </p>

        <div class="row g-4">
            @foreach ($books as $item)
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <img src="https://picsum.photos/400/200?random={{ $loop->index + 1 }}" 
                         class="card-img-top" 
                         alt="Cover {{ $item['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text text-muted">{{ $item['description'] }}</p>
                        <p class="price">💰 Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        <p class="stock">📦 Stok: {{ $item['stock'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
