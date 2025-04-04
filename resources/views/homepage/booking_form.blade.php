@extends('layouts.main')
@section('title', 'Đặt phòng khách sạn')
@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="phandau">
<div class="container" style="background-color: #B88A44">
  <div class="phandaua">
      <div class="phandaua1">
          <span>1</span>
          <p>Thông tin khách hàng</p>
      </div>
      <div class="phandaua1">
          <span>2</span>
          <p>Chi tiết thanh toán</p>
      </div>
      <div class="phandaua1">
          <span>3</span>
          <p>Xác nhận đặt phòng</p>
      </div>
  </div>
</div>
</div>

<div class="main-container">
    <div class="booking-container">
        <div class="booking-form">
            <h2>Đặt Phòng Khách Sạn</h2>
            <form action="{{ route('booking.store') }}" method="POST" class="p-4 bg-light rounded shadow">
                @csrf
                <input type="hidden" name="room_id" value="{{ old('room_id', $room_id) }}">
                <input type="hidden" name="check_in" value="{{ old('check_in', $check_in) }}">
                <input type="hidden" name="check_out" value="{{ old('check_out', $check_out) }}">
                <input type="hidden" name="adults" value="{{ old('adults', $adults) }}">
                <input type="hidden" name="children" value="{{ old('children', $children) }}">

                <div class="mb-3">
                    <label>Họ và tên:</label>
                    <input type="text" name="ho_ten" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Số điện thoại:</label>
                    <input type="text" name="sdt" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Quốc tịch:</label>
                    <input type="text" name="nationality" class="form-control" required>
                </div>

                <div class="infor-container-button">
                    <a href="{{ url('/') }}" class="back-btn"><span>&#171;</span> Quay lại</a>
                    <button type="submit" class="primary-btn">Thanh toán</button>
                </div>
            </form>
        </div>
        <!-- Hiển thị thông tin đặt phòng -->
   <div class="infor-container-right">
            <h2>Thông tin đặt phòng</h2>
            <table class="infor_order">
                <tr>
                    <th>Loại phòng</th>
                    <th>Ngày check-in</th>
                    <th>Ngày check-out</th>
                    <th>Số người</th>
                    <th>Giá phòng/đêm</th>
                    <th>Thành tiền</th>
                </tr>
                <tr>
                  <td id="room_type" class="loading">Đang tải...</td>
                  <td id="checkin_date" class="loading">Đang tải...</td>
                  <td id="checkout_date" class="loading">Đang tải...</td>
                  <td id="total_people" class="loading">Đang tải...</td>
                  <td id="price_per_night" class="loading">Đang tải...</td>
                  <td id="total_amount" class="loading">Đang tải...</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--<form action="{{ route('booking.form') }}" method="POST">
    @csrf-->
    <!-- Hidden fields to pass booking data -->
    <!--<input type="hidden" name="room_id" value="{{ old('room_id', $room->id ?? '') }}">
    <input type="hidden" name="check_in" value="{{ old('check_in', $checkin_date ?? '') }}">
    <input type="hidden" name="check_out" value="{{ old('check_out', $checkout_date ?? '') }}">
    <input type="hidden" name="adults" value="{{ old('adults', $adults ?? '') }}">
    <input type="hidden" name="children" value="{{ old('children', $children ?? '') }}">

    
</form> 

<div class="main-container">
    <div class="booking-container">-->
        <!-- Form Đặt Phòng -->
       <!-- <div class="booking-form">
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

                <div class="infor-container-button">
                    <a href="{{ url('/') }}" class="back-btn"><span>&#171;</span> Quay lại</a>
                    <button type="submit" class="primary-btn" >Thanh toán</button>
                </div>
            </form>
        </div>-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let roomId = document.querySelector('input[name="room_id"]').value;

    // Nếu có dữ liệu trước đó, hiển thị ngay
    if (localStorage.getItem(`booking_${roomId}`)) {
        let cachedData = JSON.parse(localStorage.getItem(`booking_${roomId}`));
        updateBookingInfo(cachedData);
    }

    fetch(`/api/booking-info/${roomId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                showError("Không có dữ liệu");
                return;
            }

            updateBookingInfo(data);
            localStorage.setItem(`booking_${roomId}`, JSON.stringify(data));
        })
        .catch(error => {
            console.error("Lỗi khi tải dữ liệu:", error);
            showError("Lỗi tải dữ liệu");
        });
});

// Hàm cập nhật dữ liệu vào bảng
function updateBookingInfo(data) {
    document.querySelectorAll(".loading").forEach(el => el.classList.remove("loading"));

    document.getElementById("room_type").innerText = data.room_type;
    document.getElementById("checkin_date").innerText = data.checkin_date;
    document.getElementById("checkout_date").innerText = data.checkout_date;
    document.getElementById("total_people").innerText = data.total_people;
    document.getElementById("price_per_night").innerText = data.price_per_night;
    document.getElementById("total_amount").innerText = data.total_amount;
}

// Hàm hiển thị lỗi nếu API không hoạt động
function showError(message) {
    document.querySelectorAll(".loading").forEach(el => el.innerText = message);
}

</script>
<!-- Footer -->
      
  </div></div>
@endsection