<!-- Tải jQuery trước -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Đợi DOM load xong mới chạy OwlCarousel -->
<script>
    $(document).ready(function(){
<<<<<<< HEAD
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 40,
            nav: true,
            dots: true,
            autoplay: true,              //  Tự động chạy
            autoplayTimeout: 4000,       //  Thời gian chờ giữa các slide (ms)
            autoplayHoverPause: true,    // Dừng lại khi rê chuột vào
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: { items: 1 },
                768: { items: 1 },
                1000: { items: 1 }
            }
        });
    });
=======
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: { items: 1 },
            768: { items: 1 },
            1000: { items: 1 }
        }
    });
});
>>>>>>> ĐiềnthôngtinHậuthanhtoán
</script>
<style>
    .owl-carousel {
        display: block !important; /* Đảm bảo carousel hiển thị */
    }
    .owl-carousel .item {
        position: relative;
        text-align: center;
    }
    .owl-carousel img {
        max-width: 100%;
        height: auto;
    }
    .owl-carousel {
    display: block !important;
    opacity: 1 !important;
    visibility: visible !important;
}
</style>
<section class="home">
<<<<<<< HEAD
    <div class="content">
        <div class="owl-carousel owl-theme">
            @foreach ($slideshows as $slide)
            <div class="item">
                <!-- Lấy ảnh từ CSDL -->
                <img src="{{ asset($slide->S_img) }}" alt="">
                <div class="text">
                    <h1>{{ $slide->caption1 }}</h1>
                    <p>{{ $slide->caption2 }}</p>
                    <div class="flex">
                        <button class="primary-btn">READ MORE</button>
                        <button class="secondary-btn">CONTACT US</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
=======
    <div class="owl-carousel owl-theme">
        @foreach ($slideshows as $slide)
        <div class="item">
            <!-- Lấy ảnh từ CSDL -->
            <img src="{{ asset($slide->S_img) }}" alt="{{ $slide->caption1 }}">
            <div class="text">
                <h1>{{ $slide->caption1 }}</h1>
                <p>{{ $slide->caption2 }}</p>
                <div class="flex">
                    <button class="primary-btn">READ MORE</button>
                    <button class="secondary-btn">CONTACT US</button>
                </div>
            </div>
        </div>
        @endforeach
>>>>>>> ĐiềnthôngtinHậuthanhtoán
    </div>
</section>
