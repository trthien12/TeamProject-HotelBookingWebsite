<div class="container">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
     <?php if($errors->has('quantity')): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first('quantity')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(empty(Session::get('shoppingCart'))): ?>
        <p>Giỏ hàng của bạn hiện đang trống.</p>
    <?php else: ?>
        <?php $__currentLoopData = Session::get('shoppingCart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="room-info">
                <div class="room-details">
                    <h3>Thông Tin Phòng: <?php echo e($cartItem['room_type']); ?></h3>
                    <img src="<?php echo e(asset($cartItem['image_url'])); ?>" alt="<?php echo e($cartItem['room_type']); ?>" width="400px">
                    <p><strong>ID:</strong> <?php echo e($cartItem['room_id']); ?></p>
                    <p><strong>Loại Giường:</strong> <?php echo e($cartItem['bed_type']); ?></p>
                    <p><strong>Diện Tích:</strong> <?php echo e($cartItem['area']); ?> m²</p>
                    <p><strong>Hướng phòng:</strong> <?php echo e($cartItem['view']); ?></p>
                    <p><strong>Giá Mỗi Đêm:</strong> <?php echo e(number_format($cartItem['price_per_night'], 0, ',', '.')); ?> VNĐ</p>
                    <p><strong>Ngày Nhận Phòng:</strong> <?php echo e($cartItem['check_in']); ?></p>
                    <p><strong>Ngày Trả Phòng:</strong> <?php echo e($cartItem['check_out']); ?></p>
                    <p><strong>Số lượng phòng:</strong> <?php echo e($cartItem['quantity']); ?></p>
                </div>

                <div class="action-buttons">
                    <form action="<?php echo e(route('cart.remove',  $key)); ?>" method="POST"  onsubmit="return confirm('Bạn có chắc muốn xóa phòng này khỏi giỏ hàng?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn">Xóa</button>
                    </form>
                    <form method="GET" action="<?php echo e(route('booking.form')); ?>">
                        <input type="hidden" name="room_id" value="<?php echo e($cartItem['room_id']); ?>">
                        <input type="hidden" name="check_in" value="<?php echo e($cartItem['check_in']); ?>">
                        <input type="hidden" name="check_out" value="<?php echo e($cartItem['check_out']); ?>">
                        <input type="hidden" name="adults" value="<?php echo e($cartItem['adults'] ?? 1); ?>">
                        <input type="hidden" name="children" value="<?php echo e($cartItem['children'] ?? 0); ?>">
                        <button type="submit" class="btn">Đặt ngay</button>
                    </form>
                </div>
            </div>
            <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="button-group">
        <!-- Nút quay lại kết quả tìm kiếm -->
        <?php if(session('search_data')): ?>
            <form action="<?php echo e(route('home.search')); ?>" method="GET">
                <input type="hidden" name="check_in" value="<?php echo e(session('search_data')['check_in']); ?>">
                <input type="hidden" name="check_out" value="<?php echo e(session('search_data')['check_out']); ?>">
                <input type="hidden" name="adults" value="<?php echo e(session('search_data')['adults']); ?>">
                <input type="hidden" name="children" value="<?php echo e(session('search_data')['children']); ?>">
                <button type="submit" class="btn-back">← Quay lại kết quả tìm kiếm</button>
            </form>
        <?php endif; ?>
        <!-- Nút quay lại trang chính -->
        <a href="<?php echo e(route('home')); ?>" class="btn-back">Quay lại trang chính</a>    
    </div>
</div>
<style>
    body, h1, h2, h3, p {
        margin: 0;
        padding: 0;
    }

    /* Đặt kiểu chung cho body */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }/* Container chính */
    .container {
        width: 80%;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }    
    /* Tiêu đề chính */
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #B88A44;
    }
    /* Chi tiết phòng */
    .room-info {
        margin-bottom: 30px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fafafa;
        display: flex;
        justify-content: space-between; /* Đặt phần thông tin bên trái, nút lệnh bên phải */
        align-items: flex-start; /* Căn phần tử lên trên cùng */
    }
    .room-details {
            width: 70%;
        }
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-left: 20px;
        width: 25%;
    }
    /* Tiêu đề phòng */
    .room-info h3 {
        color: #333;
        margin-bottom: 10px;
    }
    /* Hình ảnh */
    .room-info img {
        max-width: 100%;
        border-radius: 8px;
    }
    /* Các đoạn văn bản */
    .room-info p {
        margin: 5px 0;
    }
    /* Ngăn cách giữa các phòng */
    hr {
        border: 1px solid #ddd;
        margin: 20px 0;
    }
    /* Nút quay lại */
    .btn-back {
        padding: 10px 20px;
        background: #8B5A2B; /* Màu nền nâu */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        flex-direction:row;
    }
    .btn-back:hover {
        background: #6F4C3E; /* Màu nền khi hover */
    }
    /* Đảm bảo các nút có cùng kích thước */
    .action-buttons .btn {
        padding: 10px 20px;   /* Điều chỉnh padding */
        background-color: #B88A44;
        color: white;
        border: none;
        border-radius: 5px;
        text-align: center;
        width: 100%;  /* Chiều rộng của nút chiếm 100% của phần tử chứa */
        transition: background 0.3s;
    }

    .action-buttons .btn:hover {
        background-color: #6F4C3E;  /* Thay đổi màu khi hover */
    }

    /* Đảm bảo các form có cùng chiều rộng */
    .action-buttons form {
        width: 100%;  /* Form chứa nút chiếm 100% chiều rộng */
        display: flex;
        justify-content: center;  /* Căn giữa nút trong form */
        margin-bottom: 10px;
    }

    /* Thêm một số khoảng cách giữa các nút nếu cần */
    .action-buttons .btn {
        margin-top: 10px;  /* Tạo khoảng cách giữa các nút */
    }
    .button-group {
        display: flex;
        justify-content: center;     /* Căn giữa cả hàng nút */
        align-items: center;         /* Căn giữa theo chiều dọc nếu cần */
        gap: 20px;                   /* Khoảng cách giữa hai nút */
        margin-top: 20px;
    }

    .button-group form,
    .button-group a {
        display: inline-block;
    }
    .button-group form {
        margin: 0; /* bỏ margin mặc định */
    }
    .button-group .btn-back {
    display: block;
    }
</style><?php /**PATH C:\laravel\BTN-PTUDMNM-tcdt\resources\views/cart/index.blade.php ENDPATH**/ ?>