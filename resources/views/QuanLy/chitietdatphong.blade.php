<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đặt Phòng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #8B5A2B;
            text-align: left;
        }
        th {
            background-color: #8B5A2B;
            color: white;
        }
        .btn-back, .btn-action {
            display: inline-block;
            margin: 15px 0;
            padding: 10px 15px;
            background-color: #8B5A2B;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .btn-back:hover, .btn-action:hover {
            background-color: #704c2d;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Chi Tiết Đặt Phòng</h1>
        <?php if (isset($bookingDetails)): ?>
            <p><strong>ID Đặt Phòng:</strong> <?php echo htmlspecialchars($bookingDetails->id); ?></p>
            <p><strong>Tên Khách Hàng:</strong> <?php echo htmlspecialchars($bookingDetails->full_name); ?></p>
            <p><strong>Ngày Nhận Phòng:</strong> <?php echo htmlspecialchars($bookingDetails->check_in); ?></p>
            <p><strong>Ngày Trả Phòng:</strong> <?php echo htmlspecialchars($bookingDetails->check_out); ?></p>
            <p><strong>Ngày Đặt:</strong> <?php echo htmlspecialchars($bookingDetails->booking_date); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($bookingDetails->email); ?></p>
            <p><strong>Số Điện Thoại:</strong> <?php echo htmlspecialchars($bookingDetails->phone); ?></p>
            <p><strong>Trạng Thái:</strong> <?php echo htmlspecialchars($bookingDetails->status); ?></p>
           
            <!-- Nút xử lý -->
            <?php if ($bookingDetails->status === 'đang xử lý'): ?>
                <form action="{{url('rooms_status/'.$bookingDetails->id)}}" method = "post"> 
                    <button type="submit" name="action" value="Xác nhận" class="btn-action">Xác Nhận</button>
                    <button type="submit" name="action" value="Huỷ" class="btn-action">Hủy</button>
                    {{ csrf_field() }}
                </form>
            <?php else: ?>
                <p><strong>Trạng Thái Hiện Tại:</strong> <?php echo htmlspecialchars($bookingDetails->status); ?></p>
            <?php endif; ?>

        <?php else: ?>
            <p>Không tìm thấy thông tin đặt phòng.</p>
        <?php endif; ?>
        <a href="/list_roomBooking" class="btn-back">Quay Lại</a>
    </div>
</body>
</html>
