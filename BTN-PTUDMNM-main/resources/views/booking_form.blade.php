@extends('layouts.app')
@section('title', 'Đặt phòng khách sạn')
@section('content')
   
<header>
  <div class="content">
    <div class="logo">
      <span>GOLDEN TREE APARTMENT</span>
    </div>
    <div class="navlinks">
      <ul id="menulist">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Pages</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact</a></li>
        <li>
          <a href="#" title="Giỏ hàng">
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
        </li>
        <li><a href="#" class="btn" style="background-color: #b88642; color: white; padding: 8px 16px; border-radius: 5px;">Login</a></li>
      </ul>
    </div>
  </div>
</header>
<div class="container mt-4">
    <div class="steps d-flex justify-content-center">
        <div class="step active">
            <span>1</span>
            <p>Thông tin khách hàng</p>
        </div>
        <div class="step">
            <span>2</span>
            <p>Chi tiết thanh toán</p>
        </div>
        <div class="step">
            <span>3</span>
            <p>Xác nhận đặt phòng</p>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center">Đặt Phòng Khách Sạn</h2>
    <form action="{{ route('booking.store') }}" method="POST" class="p-4 bg-light rounded shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Họ và tên:</label>
            <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Số điện thoại:</label>
            <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại">
        </div>

        <div class="mb-3">
            <label class="form-label">Quốc tịch:</label>
            <input type="text" name="nationality" class="form-control" placeholder="Nhập quốc tịch" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Xác nhận đặt phòng</button>
    </form>
</div>
@endsection
