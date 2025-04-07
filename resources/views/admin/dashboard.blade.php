@extends('layouts.app')
@section('title', 'DASHBOARD_Thông tin phòng')
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
.container{
    position: relative;
    width: 100%;
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
}

.Navigation ul li:hover,
.Navigation ul li.hovered {
    background-color: beige;
}

.Navigation ul li:nth-child(1){
    margin-bottom: 40px;
    pointer-events: none;
}
.Navigation ul li:hover a,
.Navigation ul li.hovered a {
    color: #B88A44;
}

.Navigation ul li .icon{
    position: relative;
    display:block;
    min-width: 60px;
    height: 60px;
    line-height: 75px;
    text-align: center;
}

.Navigation ul li a .icon ion-icon{
    font-size: 1.75rem;

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

/* CSS cho giao diện */
.container-detail {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 20px; /* Khoảng cách giữa các thẻ .room-detail */
        padding: 20px;
    }

    .room-detail {
        display: flex;
        flex-direction: column; /* Để các phần tử trong room-info xếp theo cột */
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .room-info {
        display: flex;
        justify-content: space-between; /* Đảm bảo các phần tử bên trái và phải nằm cách nhau */
        gap: 20px; /* Khoảng cách giữa room-header và room-description */
    }

    .room-header {
        display: flex;
        flex-direction: column; /* Để h3 và img xếp theo cột */
        align-items: flex-start;
        gap: 10px; /* Khoảng cách giữa h3 và img */
    }

    .room-header h3 {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .room-header img {
        max-width: 300px;
        border-radius: 8px;
        margin: 10px 0; /* Khoảng cách trên và dưới */
    }

    .room-description {
        flex: 1;
        display: flex;
        flex-direction: column; /* Để các dòng thông tin xếp theo cột */
        gap: 10px; /* Khoảng cách giữa các dòng thông tin */
    }

    .room-description p {
        margin: 0; /* Xóa margin mặc định để không bị thừa khoảng trống */
    }

    .btn-back, .btn {
        padding: 10px 20px;
        background: #8B5A2B;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .btn-back:hover, .btn:hover {
        background: #6F4C3E;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        margin-top: 80px;
        margin-bottom: 80px;
    }


    .topbar {
    display: flex; 
    align-items: center; 
    justify-content: space-between;
    padding: 10px 20px; 
    background-color: #ffffff; 
    }

    .topbar .toggle {
        display: flex;
        align-items: center;
    }

    .topbar .toggle .icon {
        font-size: 24px; /* Kích thước biểu tượng */
        color: #333;
    }

    .topbar .admin-info {
        display: flex; /* Đặt tên và ảnh trong một hàng */
        align-items: center; 
        gap: 10px; 
    }

    .topbar .admin-info .name span {
        font-size: 16px; 
        color: #333; 
    }

    .topbar .admin-info .user img {
        width: 40px; 
        height: 40px; 
        border-radius: 50%; 
        object-fit: cover; 
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
                    <a href="{{ route('admin.bookings') }}">
                        <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
                        <span class="title">Danh sách đặt phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rooms') }}">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Thông tin phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.customers') }}">
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
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                        <button type="submit" class="primary-btn">LOGOUT</button>
                    </form>
                </li>
            </div>

            <div class="container-detail">
            @foreach ($roomDetails as $room)
                <div class="room-detail">
                    <div class="room-info"style="padding: 5px;">
                        <div class="room-header">
                            <h3> Phòng: {{ $room->room_type }}</h3>
                            <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_type }}" />
                        </div>
                        <div class="room-description">
                            <p><strong>ID:</strong> {{ $room->id }}</p>
                            <p><strong>Loại Phòng:</strong> {{ $room->room_type }}</p>
                            <p><strong>Loại Giường:</strong> {{ $room->bed_type }}</p>
                            <p><strong>Diện Tích:</strong> {{ $room->area }} m²</p>
                            <p><strong>Hướng Nhìn:</strong> {{ $room->view }}</p>
                            <p><strong>Giá Mỗi Đêm:</strong> {{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</p>
                            <p><strong>Giảm Giá:</strong> {{ $room->discount_percent }}%</p>
                            <p><strong>Số Phòng Còn:</strong> {{ $room->remaining_rooms }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
         <div class="container grid">
              <div class="box">
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!--Thêm lớp "hovered" cho mục danh sách đã chọn-->
<script>
    let list = document.querySelectorAll(".Navigation ul li ");
    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered"); // Sửa tên lớp thành "hovered" cho nhất quán
        });
        this.classList.add("hovered"); // Thêm lớp "hovered" vào mục hiện tại
    }

    list.forEach((item) => item.addEventListener("mouseover", activeLink));
</script>
@endsection