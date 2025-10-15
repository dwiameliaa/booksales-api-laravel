<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
            height: 230px;
            object-fit: cover;
        }

        .card-title {
            color: #0d6efd;
            font-weight: 600;
        }

        .card-text {
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="header-title">✍️ Authors</h1>
        <p class="subtitle">Get to know the great writers behind the extraordinary works</p>

        <div class="row g-4 mb-5">
            @foreach ($authors as $item)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <img src="https://picsum.photos/400/230?random={{ $loop->index + 1 }}" class="card-img-top"
                            alt="Foto {{ $item['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <p class="card-text">{{ $item['bio'] }}</p>
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