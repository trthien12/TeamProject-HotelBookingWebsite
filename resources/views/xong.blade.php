@extends('layouts.app')
@section('title', 'Hoàn Tất Đặt Phòng')
@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">

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
                <li><a href="#" class="btn" style="background-color: #c4c6b9; color:black ; padding: 8px 16px; border-radius: 5px;">Login</a></li>
            </ul>
        </div>
    </div>
</header>

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
            <div class="phandaua1 active">
                <span>3</span>
                <p>Xác nhận đặt phòng</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="phanthanmot">
        <h2>Đặt Phòng Thành Công!</h2>
        <p>Cảm ơn bạn đã đặt phòng tại Golden Tree Apartment. Chúng tôi hy vọng bạn sẽ có trải nghiệm tuyệt vời.</p>
        <a href="{{ url('/') }}" class="btn-complete">Quay lại trang chủ</a>
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
