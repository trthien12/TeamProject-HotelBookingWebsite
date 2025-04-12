<style>
    /* Định dạng cho container chính */
    .room .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin: 0 20px;
        }

    .room .item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    .room .item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

    .room .item img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
        }

    .room .infor_room {
        padding: 15px;
        text-align: left;
        }

    .room .infor_room h3 {
        margin: 0 0 10px;
        color: #333;
        font-size: 1.2em;
        }

    .room .infor_room p {
        margin: 5px 0;
        color: #555;
        font-size: 0.95em;
        }

    .room .infor_room strong {
        color: #000;
        }

    .room .infor_room .discount {
        color: #e63946;
        font-weight: bold;
        margin-top: 5px;
        }

    .room button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
        }

    .room .book-now {
        background-color: #B88A44;
        color: white;
        width: 150px;
        }

    .room .add-cart {
        background-color: #ddd;
        color: black;
        width: 150px;
        }

    .room button:hover {
        opacity: 0.9;
        }
    .room h1, h2 {
        font-family: 'Roboto', sans-serif;

        font-weight: 400;
        }
    .room .action-buttons {
        display: flex;
        flex-direction: column;
        align-items: flex-end; /* giữ các nút và form nằm sát phải */
        gap: 8px; /* khoảng cách nhỏ giữa các phần tử */
    }
    .room .add-to-cart-form {
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap; /* để không bị vỡ layout trên màn hình nhỏ */
    }

    .room .add-to-cart-form label {
        font-size: 0.7em;
        color: #333;
        margin-bottom: 0;
    }

    .room .add-to-cart-form input[type="number"] {
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 60px;
        text-align: center;
        font-size: 0.7em;
    }

    .room .add-to-cart-form .add-cart {
        flex-shrink: 0; /* tránh nút bị co nhỏ nếu không đủ chỗ */
    }

</style>
<section class="room"id="rooms">
    <div class="container top">
        <div class="heading">
            <h1 style="font-family: serif; font-size: 45px;">Our Rooms</h1><br>
            <p>Phòng nghỉ tại Golden Tree được thiết kế hiện đại, đầy đủ tiện nghi, 
                mang đến không gian thoải mái và thư giãn. Chúng tôi luôn sẵn sàng phục vụ 
                để bạn có trải nghiệm lưu trú hoàn hảo nhất!</p>
        </div>
    </div>
    <div class="grid-container">
        @foreach($roomDetails as $room)
            <div class="item">
                <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_type }}" width=400px>
                <div class="infor_room">
                    <h3>{{ $room->room_type }}</h3>
                    <p><i class="fas fa-bed"></i> Giường: {{ $room->bed_type }}</p>
                    <p><i class="fas fa-expand"></i> Diện tích: {{ $room->area }} m²</p>
                    <p><i class="fas fa-binoculars"></i> Hướng phòng: {{ $room->view }}</p>
                    <p><i class="fas fa-wallet"></i> Giá: {{ number_format($room->price_per_night, 0, ',', '.') }}₫</p>
                    <p class="discount"><i class="fas fa-tag"></i> Giảm {{ $room->discount_percent }}%</p>
                    <p><i class="fas fa-door-open"></i> Còn trống: {{ $room->remaining_rooms }}</p>
                    <p><i class="fas fa-users-friends"></i> Sức chứa: {{ $room->capacities->first()->max_capacity ?? 'Không xác định' }} người </p>
                    
                    <div class="action-buttons">
                        <form action="{{ route('booking.form') }}" method="GET" class="p-4 bg-light rounded shadow">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <input type="hidden" name="check_in" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="check_out" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            <input type="hidden" name="adults" value="1">
                            <input type="hidden" name="children" value="0">
                            <button type="submit" class="book-now">Đặt ngay</button>
                        </form>

                        <form  method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <input type="hidden" name="check_in" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="check_out" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            <input type="hidden" name="adults" value="1">
                            <input type="hidden" name="children" value="0">
                            <label for="quantity">Số lượng:</label>
                            <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
                            @if ($errors->has('quantity'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
