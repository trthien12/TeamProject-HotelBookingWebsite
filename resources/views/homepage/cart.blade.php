<div class="container">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(empty(Session::get('shoppingCart')))
        <p>Giỏ hàng của bạn hiện đang trống.</p>
    @else
        @foreach(Session::get('shoppingCart') as $roomId => $cartItem)
            <div class="room-info">
                <h3>Thông Tin Phòng: {{ $cartItem['room_type'] }}</h3>
                <img src="{{ asset($cartItem['image_url']) }}" alt="{{ $cartItem['room_type'] }}" width="400px">
                <p><strong>ID:</strong> {{ $cartItem['room_id'] }}</p>
                <p><strong>Loại Giường:</strong> {{ $cartItem['bed_type'] }}</p>
                <p><strong>Diện Tích:</strong> {{ $cartItem['area'] }} m²</p>
                <p><strong>Hướng phòng:</strong> {{ $cartItem['view'] }}</p>
                <p><strong>Giá Mỗi Đêm:</strong> {{ number_format($cartItem['price_per_night'], 0, ',', '.') }} VNĐ</p>
                <p><strong>Ngày Nhận Phòng:</strong> {{ $cartItem['check_in'] }}</p>
                <p><strong>Ngày Trả Phòng:</strong> {{ $cartItem['check_out'] }}</p>

                <form action="{{ route('cart.remove', $roomId) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
            <hr>
        @endforeach
    @endif
        <div style="text-align: center; margin-top: 20px;">
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
    }

    /* Container chính */
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
    /* Container cho các nút */
    .button-container {
        display: flex;
        justify-content: center; 
        align-items: center; 
        width: 100%;
        margin: 20px ;
    }
    /* Nút quay lại */
    .btn-back {
        margin-right: auto;
        padding: 10px 20px;
        background: #8B5A2B; /* Màu nền nâu */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }
    .btn-back:hover {
        background: #6F4C3E; /* Màu nền khi hover */
    }
    /* Container cho các nút thêm, sửa, xóa */
    .action-buttons {
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        margin-left: 20px; 
    }
    /* Các nút */
    .btn {
        margin: 5px ; 
        padding: 10px 20px;
        background: #8B5A2B; /* Màu nền nâu */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        text-align: center;
       
    }
    .btn:hover {
        background: #6F4C3E; /* Màu nền khi hover */
    }
</style>