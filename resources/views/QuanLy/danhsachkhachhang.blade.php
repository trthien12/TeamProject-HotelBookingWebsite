<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khách Hàng</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif; /* Font hiện đại hơn */
            background-color: #f8f9fa; /* Màu nền nhẹ nhàng */
            margin: 0;
            padding: 30px; /* Tăng khoảng cách bên ngoài */
            color: #333; /* Màu chữ chính */
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px; /* Bo góc lớn hơn */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Đổ bóng mềm mại */
            padding: 30px; /* Tăng padding */
            border: 1px solid #e9ecef; /* Thêm viền nhẹ */
        }
        h2 {
            text-align: center;
            color: #2c3e50; /* Màu chữ tối hơn */
            margin-bottom: 30px; /* Tăng khoảng cách dưới */
            font-size: 28px; /* Tăng kích thước chữ */
            font-weight: 600; /* Đậm hơn */
            letter-spacing: 0.5px; /* Tăng khoảng cách giữa các chữ */
        }
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff; /* Nền trắng cho bảng */
            border-radius: 8px; /* Bo góc bảng */
            overflow: hidden; /* Ẩn phần thừa khi bo góc */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); /* Đổ bóng nhẹ cho bảng */
        }
        .styled-table thead tr {
            background: linear-gradient(90deg, #B88A44 0%, #a67b5b 100%); /* Gradient cho tiêu đề */
            color: #fff;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase; /* Chữ in hoa */
            letter-spacing: 0.5px;
        }
        .styled-table th, .styled-table td {
            padding: 15px 20px; /* Tăng padding cho ô */
            border-bottom: 1px solid #e9ecef;
            font-size: 15px; /* Kích thước chữ hợp lý */
            transition: background 0.3s ease; /* Hiệu ứng chuyển màu mượt mà */
        }
        .styled-table th {
            font-weight: 600; /* Chữ đậm hơn */
        }
        .styled-table td {
            color: #555; /* Màu chữ nhạt hơn cho nội dung */
        }
        .styled-table tbody tr {
            transition: all 0.3s ease; /* Hiệu ứng mượt mà khi hover */
        }
        .styled-table tbody tr:hover {
            background-color: #f8f9fa; /* Màu nền khi hover */
            transform: translateY(-2px); /* Hiệu ứng nâng lên nhẹ */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Đổ bóng khi hover */
        }
        .styled-table tbody tr:last-child td {
            border-bottom: none; /* Bỏ viền dưới cho hàng cuối */
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #e74c3c;
            font-size: 16px;
            font-weight: 500;
        }
        .button-container {
            text-align: left;
            margin-top: 30px; /* Tăng khoảng cách phía trên */
        }
        .btn-logout {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(90deg, #B88A44 0%, #a67b5b 100%); /* Gradient cho nút */
            color: #fff;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease; /* Hiệu ứng mượt mà */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho nút */
        }
        .btn-logout:hover {
            background: linear-gradient(90deg, #a67b5b 0%, #B88A44 100%); /* Đổi màu gradient khi hover */
            transform: translateY(-2px); /* Nâng nút lên */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Tăng bóng */
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 15px; /* Giảm padding trên thiết bị nhỏ */
            }
            .container {
                padding: 20px;
            }
            .styled-table th, .styled-table td {
                padding: 10px 12px; /* Giảm padding */
                font-size: 14px; /* Giảm kích thước chữ */
            }
            h2 {
                font-size: 24px; /* Giảm kích thước tiêu đề */
            }
            .btn-logout {
                padding: 10px 25px;
                font-size: 14px;
            }
        }
        @media (max-width: 480px) {
            .styled-table thead {
                display: none; /* Ẩn tiêu đề trên màn hình rất nhỏ */
            }
            .styled-table, .styled-table tbody, .styled-table tr, .styled-table td {
                display: block; /* Chuyển sang dạng khối */
            }
            .styled-table tr {
                margin-bottom: 15px;
                border: 1px solid #e9ecef;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }
            .styled-table td {
                text-align: left;
                padding: 10px;
                border-bottom: none;
                position: relative;
                padding-left: 50%; /* Để lại không gian cho nhãn */
            }
            .styled-table td:before {
                content: attr(data-label); /* Sử dụng data-label để hiển thị nhãn */
                position: absolute;
                left: 10px;
                width: 45%;
                font-weight: 600;
                color: #2c3e50;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="button-container">
            <a href="/admin" class="btn-logout">Quay Lại</a>
        </div>
        <div class="content">
            <h2>Danh Sách Khách Hàng</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nationality</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $row)
                            <tr>
                                <td data-label="ID">{{ $row->id }}</td>
                                <td data-label="Full Name">{{ $row->full_name }}</td>
                                <td data-label="Email">{{ $row->email }}</td>
                                <td data-label="Phone">{{ $row->phone }}</td>
                                <td data-label="Nationality">{{ $row->nationality }}</td>
                            </tr>
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="5" class="no-data">Không có khách hàng nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>