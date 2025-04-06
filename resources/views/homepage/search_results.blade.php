@extends('layouts.main')
@section('title', 'Kết quả tìm kiếm')
@section('content')
    <div class="container">
        <h2>Kết quả tìm kiếm</h2>
        @if($rooms->isEmpty())
            <p>Không có phòng phù hợp với yêu cầu của bạn.</p>
        @else
            <div class="grid-container">
                @foreach($rooms as $room)
                    <div class="item">
                        <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_type }}" width="400px">
                        <div class="infor_room">
                            <h3>{{ $room->room_type }}</h3>
                            <p><i class="fas fa-bed"></i> Giường: {{ $room->bed_type }}</p>
                            <p><i class="fas fa-expand"></i> Diện tích: {{ $room->area }} m²</p>
                            <p><i class="fas fa-binoculars"></i> Hướng: {{ $room->view }}</p>
                            <p><i class="fas fa-wallet"></i> Giá: {{ number_format($room->price_per_night, 0, ',', '.') }}₫</p>
                            <p class="discount"><i class="fas fa-tag"></i> Giảm {{ $room->discount_percent }}%</p>
                            <p><i class="fas fa-door-open"></i> Còn lại: {{ $room->remaining_rooms }}</p>
                            <p><i class="fas fa-users"></i> Sức chứa: {{ $room->capacities->first()->max_capacity ?? 'Không xác định' }} người</p>

                            <div class="action-buttons">
                                <form action="{{ route('booking.form') }}" method="GET" class="p-4 bg-light rounded shadow">
                                @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="check_in" value="{{ $check_in }}">
                                    <input type="hidden" name="check_out" value="{{ $check_out }}">
                                    <input type="hidden" name="adults" value="{{ $adults }}">
                                    <input type="hidden" name="children" value="{{ $children }}">
                                    <button type="submit" class="book-now">Đặt ngay</button>
                                </form>
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <input type="hidden" name="check_in" value="{{ $check_in }}">
                                    <input type="hidden" name="check_out" value="{{ $check_out }}">
                                    <input type="hidden" name="adults" value="{{ $adults }}">
                                    <input type="hidden" name="children" value="{{ $children }}">
                                    <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                                </form>
                             </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
<style>
    /* Định dạng cho container chính */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin: 0 20px;
        }

    .item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    .item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

    .item img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
        }

    .infor_room {
        padding: 15px;
        text-align: left;
        }

    .infor_room h3 {
        margin: 0 0 10px;
        color: #333;
        font-size: 1.2em;
        }

    .infor_room p {
        margin: 5px 0;
        color: #555;
        font-size: 0.95em;
        }
    .infor_room .discount {
        color: #e63946;
        font-weight: bold;
        margin-top: 5px;
        }

    .action-buttons .button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 200px;
        }

    .book-now {
        background-color: #B88A44;
        color: white;
        width: 150px;
        }

    .add-cart {
        background-color: #ddd;
        color: black;
        width: 150px;
        }

    .action-buttons .button:hover {
        opacity: 0.9;
        }
    h1, h2 {
        font-family: 'Roboto', sans-serif;

        font-weight: 400;
        }
</style>