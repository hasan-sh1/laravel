<head>
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #233b66;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #f5f5f5;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #233b66;
        }

        .form-label {
            font-weight: bold;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #233b66;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #1a2e54;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>إضافة منتج جديد</h2>
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">وصف المنتج</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">السعر</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة المنتج</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">حفظ المنتج</button>
        </form>

        @if (session('message'))
            <div class="alert alert-success text-center" style="color: #ffffff; background-color: #00d13b; border-radius: 10px; padding: 10px;">
                {{ session('message') }}
            </div>
        @endif
    </div>
</body>
