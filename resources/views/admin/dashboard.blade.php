@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<style>
   @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif; /* Sử dụng font Roboto nhất quán */
}

/* Container chính */
.container {
    position: relative;
    width: 100%;
    padding: 20px; /* Đảm bảo có khoảng cách bên trong */
}

/* Navigation */
.Navigation {
    position: fixed;
    width: 300px;
    height: 100%;
    background: #B88A44;
    padding: 20px 0; /* Khoảng cách bên trong cho navigation */
}

.Navigation.active {
    width: 80px;
}

.Navigation ul {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 0; /* Bỏ padding để tránh chồng chéo */
}

.Navigation ul li {
    position: relative;
    width: 100%;
    list-style: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    margin-bottom: 20px; /* Khoảng cách giữa các mục */
}

.Navigation ul li a {
    display: flex;
    text-decoration: none;
    color: beige;
    padding: 15px; /* Khoảng cách bên trong cho liên kết */
}

.Navigation ul li:hover,
.Navigation ul li.hovered {
    background-color: beige;
}

.Navigation ul li:hover a,
.Navigation ul li.hovered a {
    color: #B88A44;
}

/* Main nội dung */
.main {
    margin-left: 300px; /* Đảm bảo không chồng chéo với navigation */
    min-height: 100vh;
    background: beige;
    padding: 20px; /* Khoảng cách bên trong cho nội dung */
    transition: margin-left 0.3s;
}

.main.active {
    margin-left: 80px; /* Điều chỉnh cho chế độ active */
}

/* Thanh điều hướng trên cùng */
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px; /* Khoảng cách bên trong */
    background-color: #ffffff;
}

.toggle {
    font-size: 2.5rem;
    cursor: pointer;
}

.admin-info {
    display: flex;
    align-items: center;
    gap: 10px; /* Khoảng cách giữa tên và ảnh */
}

.admin-info .name span {
    font-size: 16px;
    color: #333;
}

.admin-info .user img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

/* Nút và các hành động */
.btn-back, .btn {
    padding: 10px 20px;
    background: #8B5A2B;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
}

.btn-back:hover, .btn:hover {
    background: #6F4C3E; /* Màu nền hover */
}

/* Responsive Design */
@media only screen and (max-width: 768px) {
    .Navigation {
        width: 100%; /* Chiếm toàn bộ chiều rộng trên thiết bị nhỏ */
    }

    .main {
        margin-left: 0; /* Điều chỉnh chiều rộng cho màn hình nhỏ */
        padding: 10px; /* Giảm padding cho không gian nhỏ hơn */
    }
}
    </style>
<div class="container">
        <div class="Navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="business-sharp"></ion-icon></span>
                        <span class="title">GOLDEN TREE</span>  
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
                        <span class="title">Danh sách đặt phòng</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Thông tin phòng</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Danh sách khách hàng</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="icon"><ion-icon name="home-sharp"></ion-icon></span>
                    </a>
                </div>
                <div class="admin-info">
                    <div class="name">
                        <span>{{ auth()->user()->name ?? 'Admin' }}</span> 
                    </div>
                    <div class="user">
                        <img src="{{ asset('img/nhanvien.jpg') }}" alt="User Image">
                    </div>
                </div>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
