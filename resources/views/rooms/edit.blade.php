@extends('layouts.manager')

@section('content')
    <div class="container">
        <h2 class="main-title">Chỉnh Sửa Thông Tin Phòng</h2>

        <!-- Thông báo lỗi hoặc thành công -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="room_type" class="form-label">Loại Phòng <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('room_type') is-invalid @enderror" id="room_type" name="room_type" value="{{ old('room_type', $room->room_type) }}" required>
                    @error('room_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bed_type" class="form-label">Loại Giường <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('bed_type') is-invalid @enderror" id="bed_type" name="bed_type" value="{{ old('bed_type', $room->bed_type) }}" required>
                    @error('bed_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="area" class="form-label">Diện Tích (m²) <span class="text-danger">*</span></label>
                    <input type="number" step="0.1" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $room->area) }}" required>
                    @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="view" class="form-label">Hướng Nhìn <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('view') is-invalid @enderror" id="view" name="view" value="{{ old('view', $room->view) }}" required>
                    @error('view')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price_per_night" class="form-label">Giá Mở Cửa (VND) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('price_per_night') is-invalid @enderror" id="price_per_night" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" required>
                    @error('price_per_night')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="discount_percent" class="form-label">Giá Giảm (VND) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('discount_percent') is-invalid @enderror" id="discount_percent" name="discount_percent" value="{{ old('discount_percent', $room->discount_percent) }}" required>
                    @error('discount_percent')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="remaining_rooms" class="form-label">Số Phòng Còn Lại <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('remaining_rooms') is-invalid @enderror" id="remaining_rooms" name="remaining_rooms" value="{{ old('remaining_rooms', $room->remaining_rooms) }}" required>
                @error('remaining_rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Link Hình Ảnh</label>
                <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $room->image_url) }}" placeholder="Nhập URL hình ảnh">
                @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($room->image_url)
                    <div class="mt-2 image-preview">
                        <img src="{{ $room->image_url }}" alt="Room Image" class="img-fluid">
                    </div>
                @endif
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary me-2">Cập Nhật</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
@endsection
<style>
    /* Container */
    .container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
    }

    /* Main Title */
    .main-title {
        color: #4A2C2A;
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Form Styling */
    .edit-form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #4A2C2A;
        box-shadow: 0 0 5px rgba(74, 44, 42, 0.3);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }

    /* Image Preview */
    .image-preview img {
        max-width: 250px;
        height: auto;
        border-radius: 5px;
        margin-top: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Buttons */
    .btn-primary {
        background-color: #4A2C2A;
        border: none;
        padding: 10px 25px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #3A1F1D;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        padding: 10px 25px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    /* Alerts */
    .alert {
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .edit-form {
            padding: 20px;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            margin-bottom: 10px;
        }
        .text-end {
            text-align: center;
        }
    }
</style>