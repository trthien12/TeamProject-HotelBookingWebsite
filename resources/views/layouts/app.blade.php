<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Thêm Font Awesome -->
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
            padding: 20px;
            min-height: 100%;
        }

        .sidebar h3 {
            color: white;
            font-weight: 600;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 16px;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .sidebar .nav-link:hover {
            color: #f5f5f5;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            padding: 20px;
        }

        /* Thêm style để làm nổi bật mục đang active */
        .sidebar .nav-link.active {
            background-color: #b5894f;
            border-radius: 5px;
            padding: 8px 15px;
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
                        <a class="nav-link {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="fas fa-book"></i> Danh sách đặt phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="fas fa-bed"></i> Thông tin phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="fas fa-users"></i> Danh sách khách hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Log out</a>
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