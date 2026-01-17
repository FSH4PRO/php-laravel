<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Inactive</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            text-align: center;
        }

        .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 28px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
            font-size: 16px;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        a, button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-logout {
            background-color: #667eea;
            color: white;
        }

        .btn-logout:hover {
            background-color: #5568d3;
        }

        .btn-support {
            background-color: #f0f0f0;
            color: #333;
        }

        .btn-support:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🔐</div>
        <h1>Your Account is Inactive</h1>
        <p>Your account has been deactivated. Please contact our support team to reactivate your account and regain access.</p>

        <div class="actions">
            <a href="mailto:support@example.com" class="btn-support">Contact Support</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
