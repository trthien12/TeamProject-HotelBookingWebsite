<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đặt Phòng</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 700px;
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }
        .info-group {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #8B5A2B;
        }
        .info-group strong {
            color: #8B5A2B;
            font-weight: 600;
        }
        .info-group p {
            margin: 5px 0;
            color: #34495e;
            font-size: 16px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .btn-back, .btn-action {
            padding: 12px 25px;
            background: linear-gradient(90deg, #8B5A2B 0%, #a67b5b 100%);
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-back:hover, .btn-action:hover {
            background: linear-gradient(90deg, #704c2d 0%, #8B5A2B 100%);
            transform: translateY(-2px);
        }
        .btn-action:active {
            transform: translateY(1px);
        }
        .status-processed {
            text-align: center;
            padding: 10px;
            background: #e9ecef;
            border-radius: 5px;
            color: #495057;
            font-style: italic;
        }
        .no-data {
            text-align: center;
            color: #e74c3c;
            font-size: 18px;
            padding: 20px;
            background: #fce4e4;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chi Tiết Đặt Phòng</h1>
        <?php if (isset($data)): ?>
            <div class="info-group">
                <p><strong>ID Đặt Phòng:</strong> <?php echo htmlspecialchars($data->id); ?></p>
                <p><strong>Tên Khách Hàng:</strong> <?php echo htmlspecialchars($data->full_name); ?></p>
                <p><strong>Ngày Nhận Phòng:</strong> <?php echo htmlspecialchars($data->check_in); ?></p>
                <p><strong>Ngày Trả Phòng:</strong> <?php echo htmlspecialchars($data->check_out); ?></p>
                <p><strong>Ngày Đặt:</strong> <?php echo htmlspecialchars($data->booking_date); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($data->email); ?></p>
                <p><strong>Số Điện Thoại:</strong> <?php echo htmlspecialchars($data->phone); ?></p>
                <p><strong>Trạng Thái:</strong> <?php echo htmlspecialchars($data->status); ?></p>
            </div>

            <!-- Nút xử lý -->
            <?php if ($data->status === 'đang xử lý'): ?>
                <form action="{{url('admin/rooms_status/'.$data->id)}}" method="post" class="btn-group">
                    <button type="submit" name="action" value="Xác nhận" class="btn-action">Xác Nhận</button>
                    <button type="submit" name="action" value="Huỷ" class="btn-action">Hủy</button>
                    {{ csrf_field() }}
                </form>
            <?php else: ?>
                <div class="status-processed">
                    <p><strong>Trạng Thái Hiện Tại:</strong> <?php echo htmlspecialchars($data->status); ?></p>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="no-data">
                <p>Không tìm thấy thông tin đặt phòng.</p>
            </div>
        <?php endif; ?>
        <div class="btn-group">
            <a href="/admin/list_roomBooking" class="btn-back">Quay Lại</a>
        </div>
    </div>
</body>
</html>