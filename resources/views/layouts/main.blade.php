<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> 
        @stack('styles') <!-- Cho phép các view con thêm CSS -->
    </head>
    <body>
        <!-- Page Heading -->
        <header>
            <div class="content flex_space">
                <div class="logo">
                    <span>GOLDEN TREE APARTMENT</span>
                </div>
                <nav class="navlinks">
                    <ul id="menulist">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home') }}#about">About</a></li>
                        <li><a href="{{ route('home') }}#rooms">Rooms</a></li>
                        <li><a href="#pages">Pages</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li>
                        <a href="{{ route('cart.index') }}" aria-label="Giỏ hàng">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-count">
                                {{ array_sum(array_column(session('shoppingCart', []), 'quantity')) ?: '' }}
                            </span>
                        </a>
                        </li>
                        <li>
                            @auth
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="primary-btn">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('admin.login.form') }}" class="primary-btn">Login</a>
                            @endauth
                        </li>
                        <span class="fa fa-bars" onclick="menutoggle()"></span>
                    </ul>
                </nav>
            </div>
        </header>
        <script>
                var menulist = document.getElementById('menulist');
                menulist.style.maxHeight = "0px";

                function menutoggle() {
                    if (menulist.style.maxHeight == "0px") {
                        menulist.style.maxHeight = "100vh";
                    } else {
                        menulist.style.maxHeight = "0px";
                    }
                }
        </script>
        <!-- Page Content -->
        <main>
             @yield('content')
        </main>
        <!-- Nội dung footer -->
        <footer id="contact">
            <div class="container grid">
                <div class="box">
                    <p>Golden Tree Apartment chào đón bạn với không gian sang trọng, dịch vụ chuyên nghiệp và tiện nghi hiện đại. Chúng tôi cam kết mang đến cho bạn một kỳ nghỉ thoải mái và đáng nhớ với đội ngũ nhân viên tận tâm,
                        sẵn sàng phục vụ mọi nhu cầu của bạn. </p>
            
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
                        <li><a href="{{ route('home') }}#about">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>            
                <div class="box">
                    <h2>Contact Us</h2>
                    <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn. Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi qua các kênh dưới đây.
                        Đội ngũ của Golden Tree Apartmentsẽ phản hồi bạn trong thời gian sớm nhất.   
                    </p>
                    <i class="fa fa-location-dot"></i>
                    <label>120 Hà Huy Tập, Tân Phong, Thành phố Hồ Chí Minh  </label> <br>
                    <i class="fa fa-phone"></i>
                    <label>01234585997</label> <br>
                    <i class="fa fa-envelope"></i>
                    <label>golden@gmail.com</label> 
                </div>
                <div class="box map-box">
                    <h2>Địa chỉ Khách sạn</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.101196232708!2d106.70722927377419!3d10.726677760111963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f925b569a7f%3A0xa52fa046276b4007!2zTmFtIExvbmcgMSwgMTIwIEjDoCBIdXkgVOG6rXAsIFTDom4gUGhvbmcsIFF14bqtbiA3LCBI4buTIENow60gTWluaCA3MDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1744222343820!5m2!1svi!2s" 
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </footer>
        <a href="tel:01234585997" class="hotline-button">
            <i class="fa fa-phone"></i> 0123 458 5997
        </a>
        <div class="legal">
            <p class="container">Copyright (c) {{ date('Y') }} Copyright Holder All Rights Reserved.</p>
        </div> 
         <!-- Scripts -->       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>   
        
        <script>
            $(document).ready(function(){
                $(".add-to-cart-form").submit(function(e){
                    e.preventDefault(); // Ngừng việc gửi form theo cách thông thường

                    // Lấy thông tin từ form
                    var formData = $(this).serialize(); // Lấy tất cả dữ liệu form dưới dạng chuỗi (bao gồm CSRF token và các dữ liệu ẩn)
                    
                    $.ajax({
                        type: "POST",
                        url: "{{ route('cart.add') }}", // Đảm bảo route chính xác
                        data: formData, // Gửi dữ liệu form
                        success: function(response) {
                            if (response.success) {
                                // Cập nhật số lượng giỏ hàng
                                $(".cart-count").text(response.cartCount);
                                alert('Đã thêm vào giỏ hàng!');
                            } else {
                                alert('Có lỗi xảy ra!');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Không thể kết nối server.');
                        }
                    });
                });
            });
        </script>
        @stack('scripts') <!-- Cho phép các view con thêm JS -->
    </body>
</html>
