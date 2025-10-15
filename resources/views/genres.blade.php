<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Genres</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #0d6efd;
            font-weight: 600;
        }

        .header-title {
            text-align: center;
            font-weight: 700;
            color: #0b2f6a;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="header-title">📚 Book Genres</h1>

        <div class="row g-4 mb-5">
            @foreach ($genres as $item)
                <div class="col-md-6">
                    <div class="card shadow-sm p-3 h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <p class="card-text text-muted">{{ $item['description'] }}</p>
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