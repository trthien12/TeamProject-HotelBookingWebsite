@extends('layouts.manager')
@section('content')
    <h2 class="main-title">Danh sách đặt phòng</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="booking-list">
        @if (count($data) > 0)
            <div class="booking-container">
                @foreach ($data as $booking)
                    <div class="booking-card">
                        <div class="booking-info">
                            <p><strong>ID Đặt Phòng:</strong> {{ htmlspecialchars($booking->id) }}</p>
                            <p><strong>Tên Khách Hàng:</strong> {{ htmlspecialchars($booking->full_name) }}</p>
                            <p><strong>Ngày Nhận Phòng:</strong> {{ htmlspecialchars($booking->check_in) }}</p>
                            <p><strong>Ngày Trả Phòng:</strong> {{ htmlspecialchars($booking->check_out) }}</p>
                            <p><strong>Ngày Đặt:</strong> {{ htmlspecialchars($booking->booking_date) }}</p>
                            <p>
                                <strong>Trạng Thái:</strong> 
                                <span class="status {{ Str::slug($booking->status) }}">{{ htmlspecialchars($booking->status) }}</span>
                            </p>
                        </div>
                        <a href="{{ url('admin/detail_roomBooking/' . $booking->id) }}" class="btn-view">Xem Chi Tiết</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-data">
                <p>Không tìm thấy thông tin đặt phòng.</p>
            </div>
        @endif
    </div>
    
@endsection

    <style>
        .main-title {
            color: #8B4513;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .booking-list {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .booking-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; 
        }
        .booking-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(50% - 10px); 
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box;
            border: 1px solid #f0f0f0;
        }
        .booking-card:hover {
            transform: scale(1.02); 
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: #8B5A2B;
        }
        .booking-info p {
            margin: 10px 0;
            color: #34495e;
            font-size: 15px;
        }
        .booking-info strong {
            color: #8B5A2B;
            font-weight: 600;
        }
        .status {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 13px;
            color: #fff;
            display: inline-block;
        }
        .status.dang-xu-ly {
            background-color: #f39c12;
        }
        .status.da-xac-nhan {
            background-color: #27ae60;
        }
        .status.huy {
            background-color: #e74c3c;
        }
        .btn-view {
            align-self: flex-end; 
            margin-top: 10px; 
            padding: 10px 20px;
            background: linear-gradient(90deg, #8B5A2B 0%, #a67b5b 100%);
            color: white;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-view:hover {
            background: linear-gradient(90deg, #704c2d 0%, #8B5A2B 100%);
            transform: translateY(-2px);
        }
        .no-data {
            text-align: center;
            padding: 20px;
            background: #fce4e4;
            border-radius: 8px;
            color: #e74c3c;
            font-size: 18px;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .booking-card {
                width: 100%; 
            }
        }
    </style>
