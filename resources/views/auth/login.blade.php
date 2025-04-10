<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Golden Tree Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://cf.bstatic.com/xdata/images/hotel/max1280x900/609136912.jpg?k=b58dca8a4b7c547b4e980885acddd1d55bc361707b1c4e26d61c56558b499ae3&o=&hp=1') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }


        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); 
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 1s ease-in-out;
        }

       
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container .logo img {
            width: 80px;
            height: auto;
        }

        .login-container h2 {
            color: #8B4513;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 12px 15px 12px 40px;
            width: 100%;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            border-color: #8B4513;
            box-shadow: 0 0 5px rgba(139, 69, 19, 0.3);
            outline: none;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #8B4513;
            font-size: 16px;
        }

        .btn-login {
            background: linear-gradient(90deg, #8B4513, #A0522D);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #723b0f, #8B4513);
            transform: translateY(-2px);
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <!-- Thay thế bằng logo của bạn -->
            <img src="https://i.pinimg.com/736x/07/77/88/07778883545627f1a6b50f351405ffba.jpg" alt="Golden Tree Logo">
        </div>
        <h2>Đăng Nhập</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            @if (session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif
            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
