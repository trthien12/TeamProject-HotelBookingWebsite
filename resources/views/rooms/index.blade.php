@extends('layouts.app')

@section('content')
    <h2 class="main-title">Thông Tin Phòng</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($rooms as $room)
        <div class="room-card d-flex align-items-center mb-5">
            <div class="col-md-4 image-container">
                <img src="{{ $room->image }}" alt="{{ $room->room_type }} Image" class="img-fluid rounded">
            </div>
            <div class="col-md-8 content-container">
                <h4 class="room-title">Thông Tin Phòng: {{ $room->room_type }}</h4>
                <p><strong>ID:</strong> {{ $room->id }}</p>
                <p><strong>Loại Phòng:</strong> {{ $room->room_type }}</p>
                <p><strong>Loại Giường:</strong> {{ $room->room_category }}</p>
                <p><strong>Diện Tích:</strong> {{ $room->area }} m²</p>
                <p><strong>Hướng Nhìn:</strong> {{ $room->view }}</p>
                <p><strong>Giá:</strong> <span class="price">{{ number_format($room->original_price) }} VND</span></p>
                <p><strong>Giá Giảm:</strong> <span class="price-discounted">{{ number_format($room->discounted_price) }} VND</span></p>
                <p><strong>Số Phòng Còn:</strong> {{ $room->available_rooms }}</p>
                <div class="text-end">
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-brown">Sửa</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<style>
    .main-title {
        color: #8B4513;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .room-card {
        border: 1px solid #ddd;
        border-radius: 15px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .room-card:hover {
        transform: translateY(-5px);
    }

    .image-container {
        padding-right: 20px;
    }

    .content-container {
        padding-left: 20px;
    }

    .image-container img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .image-container img:hover {
        transform: scale(1.05);
    }

    .content-container .room-title {
        color: #8B4513;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .content-container p {
        margin-bottom: 10px;
        font-size: 15px;
        color: #333;
    }

    .content-container .price {
        font-weight: 500;
        color: #555;
    }

    .content-container .price-discounted {
        font-weight: 600;
        color: #e74c3c;
    }

    .btn-brown {
        background-color: #8B4513;
        color: white;
        border-radius: 5px;
        padding: 8px 20px;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .btn-brown:hover {
        background-color: #723b0f;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>