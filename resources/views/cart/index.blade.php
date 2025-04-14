<div class="container">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
     @if ($errors->has('quantity'))
        <div class="alert alert-danger">
            {{ $errors->first('quantity') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(empty(Session::get('shoppingCart')))
        <p>Giỏ hàng của bạn hiện đang trống.</p>
    @else
        @foreach(Session::get('shoppingCart') as $key => $cartItem)
            <div class="room-info">
                <div class="room-details">
                    <h3>Thông Tin Phòng: {{ $cartItem['room_type'] }}</h3>
                    <img src="{{ asset($cartItem['image_url']) }}" alt="{{ $cartItem['room_type'] }}" width="400px">
                    <p><strong>ID:</strong> {{ $cartItem['room_id'] }}</p>
                    <p><strong>Loại Giường:</strong> {{ $cartItem['bed_type'] }}</p>
                    <p><strong>Diện Tích:</strong> {{ $cartItem['area'] }} m²</p>
                    <p><strong>Hướng phòng:</strong> {{ $cartItem['view'] }}</p>
                    <p><strong>Giá Mỗi Đêm:</strong> {{ number_format($cartItem['price_per_night'], 0, ',', '.') }} VNĐ</p>
                    <p><strong>Ngày Nhận Phòng:</strong> {{ $cartItem['check_in'] }}</p>
                    <p><strong>Ngày Trả Phòng:</strong> {{ $cartItem['check_out'] }}</p>
                    <p><strong>Số lượng phòng:</strong> {{ $cartItem['quantity'] }}</p>
                </div>

                <div class="action-buttons">
                    <form action="{{ route('cart.remove',  $key) }}" method="POST"  onsubmit="return confirm('Bạn có chắc muốn xóa phòng này khỏi giỏ hàng?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Xóa</button>
                    </form>
                    <form method="GET" action="{{ route('booking.form') }}">
                        <input type="hidden" name="room_id" value="{{ $cartItem['room_id'] }}">
                        <input type="hidden" name="check_in" value="{{ $cartItem['check_in'] }}">
                        <input type="hidden" name="check_out" value="{{ $cartItem['check_out'] }}">
                        <input type="hidden" name="adults" value="{{ $cartItem['adults'] ?? 1 }}">
                        <input type="hidden" name="children" value="{{ $cartItem['children'] ?? 0 }}">
                        <button type="submit" class="btn">Đặt ngay</button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
    @endif
    <div class="button-group">
        <!-- Nút quay lại kết quả tìm kiếm -->
        @if(session('search_data'))
            <form action="{{ route('home.search') }}" method="GET">
                <input type="hidden" name="check_in" value="{{ session('search_data')['check_in'] }}">
                <input type="hidden" name="check_out" value="{{ session('search_data')['check_out'] }}">
                <input type="hidden" name="adults" value="{{ session('search_data')['adults'] }}">
                <input type="hidden" name="children" value="{{ session('search_data')['children'] }}">
                <button type="submit" class="btn-back">← Quay lại kết quả tìm kiếm</button>
            </form>
        @endif
        <!-- Nút quay lại trang chính -->
        <a href="{{ route('home') }}" class="btn-back">Quay lại trang chính</a>    
    </div>
</div>
<style>
    body, h1, h2, h3, p {
        margin: 0;
        padding: 0;
    }

    /* Đặt kiểu chung cho body */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }/* Container chính */
    .container {
        width: 80%;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }    
    /* Tiêu đề chính */
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #B88A44;
    }
    /* Chi tiết phòng */
    .room-info {
        margin-bottom: 30px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fafafa;
        display: flex;
        justify-content: space-between; /* Đặt phần thông tin bên trái, nút lệnh bên phải */
        align-items: flex-start; /* Căn phần tử lên trên cùng */
    }
    .room-details {
            width: 70%;
        }
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-left: 20px;
        width: 25%;
    }
    /* Tiêu đề phòng */
    .room-info h3 {
        color: #333;
        margin-bottom: 10px;
    }
    /* Hình ảnh */
    .room-info img {
        max-width: 100%;
        border-radius: 8px;
    }
    /* Các đoạn văn bản */
    .room-info p {
        margin: 5px 0;
    }
    /* Ngăn cách giữa các phòng */
    hr {
        border: 1px solid #ddd;
        margin: 20px 0;
    }
    /* Nút quay lại */
    .btn-back {
        padding: 10px 20px;
        background: #8B5A2B; /* Màu nền nâu */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        flex-direction:row;
        /* font-size: 14px; */
    }
    .btn-back:hover {
        background: #6F4C3E; /* Màu nền khi hover */
    }
    /* Đảm bảo các nút có cùng kích thước */
    .action-buttons .btn {
        padding: 10px 20px;   /* Điều chỉnh padding */
        background-color: #B88A44;
        color: white;
        border: none;
        border-radius: 5px;
        text-align: center;
        width: 100%;  /* Chiều rộng của nút chiếm 100% của phần tử chứa */
        transition: background 0.3s;
    }

    .action-buttons .btn:hover {
        background-color: #6F4C3E;  /* Thay đổi màu khi hover */
    }

    /* Đảm bảo các form có cùng chiều rộng */
    .action-buttons form {
        width: 100%;  /* Form chứa nút chiếm 100% chiều rộng */
        display: flex;
        justify-content: center;  /* Căn giữa nút trong form */
        margin-bottom: 10px;
    }

    /* Thêm một số khoảng cách giữa các nút nếu cần */
    .action-buttons .btn {
        margin-top: 10px;  /* Tạo khoảng cách giữa các nút */
    }
    .button-group {
        display: flex;
        justify-content: center;     /* Căn giữa cả hàng nút */
        align-items: center;         /* Căn giữa theo chiều dọc nếu cần */
        gap: 20px;                   /* Khoảng cách giữa hai nút */
        margin-top: 20px;
    }

    .button-group form,
    .button-group a {
        display: inline-block;
    }
    .button-group form {
        margin: 0; /* bỏ margin mặc định */
    }
    .button-group .btn-back {
    display: block;
    }
</style>