<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-container {
            text-align: center;
            padding: 50px;
        }
        .error-image {
            max-width: 100%;
            height: auto;
        }
        .error-message {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <img src="{{ asset('/assets/media/error/403-status-code.png') }}" alt="403 Forbidden" width="900px" height="500px" class="error-image">
        <p class="error-message">You don't have permission to access this page.</p>
        <a href="{{ url('/customer-details') }}" class="btn btn-primary back-link">Go to dashboard</a>
    </div>
</body>
</html>
