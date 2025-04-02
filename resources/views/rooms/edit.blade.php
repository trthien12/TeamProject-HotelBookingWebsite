@extends('layouts.app')

@section('content')
    <h2>Chỉnh Sửa Thông Tin Phòng</h2>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="room_type" class="form-label">Loại Phòng</label>
            <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $room->room_type }}" required>
        </div>
        <div class="mb-3">
            <label for="room_category" class="form-label">Loại Giường</label>
            <input type="text" class="form-control" id="room_category" name="room_category" value="{{ $room->room_category }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Diện Tích (m²)</label>
            <input type="number" class="form-control" id="area" name="area" value="{{ $room->area }}" required>
        </div>
        <div class="mb-3">
            <label for="view" class="form-label">Hướng Nhìn</label>
            <input type="text" class="form-control" id="view" name="view" value="{{ $room->view }}" required>
        </div>
        <div class="mb-3">
            <label for="original_price" class="form-label">Giá Mở Cửa (VND)</label>
            <input type="number" class="form-control" id="original_price" name="original_price" value="{{ $room->original_price }}" required>
        </div>
        <div class="mb-3">
            <label for="discounted_price" class="form-label">Giá Giảm (VND)</label>
            <input type="number" class="form-control" id="discounted_price" name="discounted_price" value="{{ $room->discounted_price }}" required>
        </div>
        <div class="mb-3">
            <label for="available_rooms" class="form-label">Số Phòng Còn Lại</label>
            <input type="number" class="form-control" id="available_rooms" name="available_rooms" value="{{ $room->available_rooms }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Link Hình Ảnh</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $room->image }}" placeholder="Nhập URL hình ảnh">
            <!-- Hiển thị hình ảnh hiện tại (nếu có) -->
            @if ($room->image)
                <div class="mt-2">
                    <img src="{{ $room->image }}" alt="Room Image" style="max-width: 200px;">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection