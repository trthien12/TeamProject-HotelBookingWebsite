@extends('layouts.app')
@section('title', 'Đặt phòng khách sạn')
@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">

<header>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
        <li><a href="#" class="btn" style="background-color: #c4c6b9; color:black ; padding: 8px 16px; border-radius: 5px;">Login</a></li>
      </ul>
    </div>
  </div>
</header>

<div class="phandau booking-page">
    <div class="container" style="background-color: #B88A44">
        <div class="phandaua">
            <div class="phandaua1 active">
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

<form action="{{ route('booking.submit') }}" method="POST">
    @csrf
    <!-- Hidden fields to pass booking data -->
    <input type="hidden" name="room_id" value="{{ old('room_id', $room->id ?? '') }}">
    <input type="hidden" name="check_in" value="{{ old('check_in', $checkin_date ?? '') }}">
    <input type="hidden" name="check_out" value="{{ old('check_out', $checkout_date ?? '') }}">
    <input type="hidden" name="adults" value="{{ old('adults', $adults ?? '') }}">
    <input type="hidden" name="children" value="{{ old('children', $children ?? '') }}">

    
</form>



<div class="main-container">
    <div class="booking-container">
        <!-- Form Đặt Phòng -->
        <div class="booking-form">
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
      
  </div>
</div>

<footer>
                <div class="container grid">
                    <div class="box">
                        <img src="{{ asset('images/logo-2.png') }}" alt="">
                        <p>Chào mừng bạn đến với Golden Tree Apartment – nơi mà sự sang trọng không chỉ là một lời mời gọi, mà còn là một hành trình đáng nhớ. Tại đây, bạn sẽ được trải nghiệm không gian đẳng cấp, dịch vụ chuyên nghiệp tận tâm cùng với những tiện ích hiện đại vượt mong đợi. Golden Tree Apartment không chỉ là nơi lưu trú, mà còn là điểm đến lý tưởng để thư giãn, tận hưởng sự yên bình và tái tạo năng lượng. Hãy để chúng tôi biến từng khoảnh khắc của bạn thành những kỷ niệm đáng giá và tràn đầy cảm xúc.</p>

                        <div class="icon">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-tiktok"></i>
                        </div>
                    </div>

                    <div class="box">
                        <h2>Links</h2>
                        <ul>
                            <li><a href="#">Company History</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="box">
                        <h2>Contact Us</h2>
                        <p>Đội ngũ Golden Tree Apartment luôn sẵn sàng đồng hành và hỗ trợ bạn một cách tận tâm, chuyên nghiệp. Dù bạn cần giải đáp thông tin, đặt phòng hay bất kỳ hỗ trợ nào khác, chúng tôi sẽ luôn lắng nghe và đáp ứng mọi nhu cầu của bạn một cách chu đáo nhất. Hãy để chúng tôi giúp biến kỳ nghỉ hoặc chuyến công tác của bạn trở thành trải nghiệm thật sự đáng nhớ!</p>
                        <i class="fa fa-location-dot"></i>
                        <label>120 Hà Huy Tập, Tân Phong, Thành phố Hồ Chí Minh</label> <br>
                        <i class="fa fa-phone"></i>
                        <label>01234585997</label> <br>
                        <i class="fa fa-envelope"></i>
                        <label>golden@gmail.com</label> <br>
                    </div>
                </div>
            </footer>

            <div class="legal">
                <p class="container">Copyright &copy; {{ date('Y') }} Golden Tree Apartment. All Rights Reserved.</p>
            </div>
@endsection