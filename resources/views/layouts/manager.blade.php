<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .row {
            flex: 1;
            display: flex;
        }

        .sidebar {
            background-color: #d4a373;
            padding: 30px 20px;
            min-height: 100%;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            color: white;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 40px;
            text-align: center;
            letter-spacing: 1px;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 16px;
            font-weight: 500;
            padding: 12px 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            font-size: 18px;
        }

        .sidebar .nav-link:hover {
            background-color: #b5894f;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link.active {
            background-color: #b5894f;
            border-left: 4px solid #fff;
            padding-left: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }


        .sidebar .logout-form {
            display: flex;
            align-items: center;
        }

        .sidebar .logout-btn {
            color: white;
            font-size: 16px;
            font-weight: 500;
            padding: 12px 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .sidebar .logout-btn i {
            margin-right: 12px;
            font-size: 18px;
        }

        .sidebar .logout-btn:hover {
            background-color: #b5894f;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .main-content {
            padding: 20px;
            position: relative;
        }

        .user-info {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info .user-name {
            color: #8B4513;
            font-weight: 500;
            font-size: 16px;
        }

        .user-info .user-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        .user-info .user-logo:hover {
            transform: scale(1.1);
            transition: transform 0.3s;
        }
        .user-info .user-name:hover {
            color: #723b0f;
            transition: color 0.3s;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h3>GOLDEN TREE</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('manager.bookinglist') ? 'active' : '' }}" href="{{ route('manager.bookinglist') }}">
                            <i class="fas fa-book"></i> Danh sách đặt phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="fas fa-bed"></i> Thông tin phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('quanly.kh') ? 'active' : '' }}" href="{{ route('quanly.kh') }}">
                            <i class="fas fa-users"></i> Danh sách khách hàng
                        </a>
                    </li>
                    <li class="nav-item logout-form">
                        <!-- <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Log out
                            </button>
                        </form> -->
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Log out
                        </button>
                    </li>
                </ul>
            </div>
            <!-- Main Content -->
            <div class="col-md-9 main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>