<style>
    section.book {
        position: relative;
        z-index: 10;
        margin-top: -6.5px; /* chỉnh tuỳ chỉnh theo chiều cao ảnh slide */
    }
    /* Đảm bảo phần slider không bị ảnh hưởng */
    .home {
        position: relative;
        z-index: 1;
        height: 600px;
    }
    .owl-carousel .item img {
        height: 600px; /* Chiều cao tối đa slide, có thể thay đổi nếu cần */
        object-fit: cover;
        width: 100%;
    }
    /* Optional: Tối ưu phần text của slideshow để không bị form che */
    .owl-carousel .text {
        position: absolute;
        bottom: 20%;
        left: 10%;
        z-index: 5;
        color: white;
        text-align: left;
    }
</style>
<section class="book">
    <div class="container flex_space">
        <div class="text">
            <h1><span>Book</span> Your Rooms</h1>
        </div>
        <div class="form">
                <form action="{{ route('home.search') }}" class="grid" method="POST">
                    @csrf
                    <table class="table-book">
                        <tr>
                            <th><i class="fa-solid fa-calendar-days"></i>Ngày nhận phòng</th>
                            <th><i class="fa-solid fa-calendar-check"></i>Ngày trả phòng</th>
                            <th><i class="fa-solid fa-user"></i> Người lớn</th>
                            <th><i class="fa-solid fa-child"></i>Trẻ em</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="date" name="check_in" id="checkin" required></td>
                            <td><input type="date" name="check_out" id="checkout" required></td>
                            <td><input type="number" name="adults" min="1" placeholder="Người lớn" max="10" value="1" required></td>
                            <td><input type="number" name="children" min="0" placeholder="Trẻ em"  max="10" value="0"  required></td>
                            <td><button type="submit" class="primary-btn" style="font-size:18px;">Tìm kiếm</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>
</section>
