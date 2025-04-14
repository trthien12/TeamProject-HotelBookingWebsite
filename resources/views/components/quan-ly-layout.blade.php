<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
    <style>
        .container-detail {
            padding: 20px; /* chỉ giữ padding thôi */
        }

        .room-detail {
            display: flex; /* Sử dụng flexbox cho bố cục */
            background-color: #ffffff; /* Màu nền trắng */
            border-radius: 10px; /* Bo góc */
            padding: 15px; /* Khoảng cách bên trong */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng mạnh hơn */
            margin-bottom: 20px; /* Khoảng cách dưới giữa các khối */
        }
        .room-info {
            display: flex; /* Sử dụng flexbox cho thông tin phòng */
            flex: 1; /* Cho phép phần này chiếm không gian */
        }
        .room-header {
            display: flex;
            align-items: flex-start; /* Căn chỉnh sang bên trái */
            margin-right: 20px; /* Khoảng cách bên phải của hình ảnh */
        }
        .room-header img {
            max-width: 300px; /* Độ rộng tối đa cho hình ảnh */
            border-radius: 8px; /* Bo góc cho ảnh */
            margin-top: 10px; /* Khoảng cách trên của ảnh */
        }
        .room-description {
            display: flex; /* Để căn chỉnh các thẻ <p> */
            flex-direction: column; 
        }        
        .btn {
            padding: 8px 15px;
            background: #8B5A2B; /* Màu nền nâu */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px; /* Khoảng cách giữa các nút */
            display: inline-flex; /* Để có thể sử dụng justify-content và align-items */
            justify-content: center; /* Căn giữa các nút chính */
            align-items: center; /* Căn giữa theo chiều dọc */
        }
        .action-buttons {
            display: flex;
            justify-content: center; /* Căn giữa toàn bộ nút */
            margin-top: 80px; /* Khoảng cách trên của nút */
            margin-bottom: 80px; /* Khoảng cách trên của nút */
        }
        .toggle{
            color: black;
        }        
        .topbar {
        display: flex; 
        align-items: center; 
        justify-content: space-between;
        padding: 10px 20px; 
        background-color: #ffffff; 
        }
        .topbar .toggle {
            display: flex;
            align-items: center;
        }
        .topbar .toggle .icon {
            font-size: 24px; /* Kích thước biểu tượng */
            color: #333;
        }
        .topbar .admin-info {
            display: flex; /* Đặt tên và ảnh trong một hàng */
            align-items: center; 
            gap: 10px; 
        }
        .topbar .admin-info .name span {
            font-size: 16px; 
            color: #333; 
        }
        .topbar .admin-info .user img {
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
            object-fit: cover; 
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="Navigation">
            <ul>
                <li>
                <a href="#">
                    <span class="icon"><ion-icon name="business-sharp"></ion-icon></span>    
                    <span class="title">GOLDEN TREE</span>         
                </a>
                </li>
                <li>
                    <a href="/list_roomBooking">
                        <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
                        <span class="title">Danh sách đặt phòng</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Thông tin phòng</span>
                    </a>
                </li>
                <li>
                    <a href="/customer">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Danh sách khách hàng</span>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="arrow-undo-circle-outline"></ion-icon></span>
                        <span class="title">Log out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <a href="/admin"  class="icon"><ion-icon name="home-sharp"></ion-icon></a>
                </div>
                <div class="admin-info">
                    <div class="name">
                        <!-- <span><?php //echo $_SESSION['ten']; ?></span>  -->
                    </div>
                    <div class="user">
                        <img src="https://www.bing.com/images/blob?bcid=S2iNBP37GUgI45gCmdy80-lcHyGb.....6w" alt="User Image">
                    </div>
                </div>
            </div>
            <div class="container-detail">
                    {{$slot}}
            </div>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>