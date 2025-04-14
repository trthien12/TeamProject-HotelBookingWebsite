
<?php $__env->startSection('title', 'Đặt phòng khách sạn'); ?>
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelayouts.css')); ?>">

        <style>

            .primary-btn {
                padding: 15px 40px;
                background: #B88A44;
                color: white;             
                font-weight: bold;

            }

            .primary-btn:hover {
                background-color: #c4c6b9;
                color: white;
            }

            .secondary-btn {
                padding: 15px 40px;
                background: #B88A44;
                font-weight: bold;
                color: white;
            }

            .secondary-btn:hover {
                background-color: #a09688;
                color: #fff;
            }

            .back-btn {
                color: #B88A44;

            }

            .btn {
                background-color: #c4c6b9;
                color: black;
                padding: 8px 16px;
                border-radius: 5px;
                font-size: 1rem;
                text-align: center;
            }

            .btn:hover {
                background-color: #B88A44;
            }

            .phandau h1 {
                text-align: center;
                font-size: 3rem;
                margin-bottom: 30px;
                letter-spacing: 2px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            }

            .phandaua {
                display: flex;
                justify-content: center;
                gap: 100px;
                margin-top: 40px;
                position: relative;
            }

            .phandaua::before {
                content: "";
                position: absolute;
                top: 17px;
                left: 50%;
                transform: translateX(-50%);
                width: 60%;
                height: 2px;
                background-color: rgba(255, 255, 255, 0.3);
                z-index: 0;
            }

            .phandaua1 {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 15px;
                position: relative;
                z-index: 1;
            }

            .phandaua1 span {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background-color: #b88a44;
                /* Màu nền mặc định cho số 1 và 3 */
                color: white;
                /* Màu chữ mặc định cho số 1 và 3 */
                font-weight: bold;
                font-size: 1.2rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease;
            }

            .phandaua1:hover span {
                transform: scale(1.1);
            }

            .phandaua1.active span {
                background-color: white;
                color: #b88a44;
            }

            /* Chỉnh màu số 2 thành #b88a44 */
            .phandaua1:nth-child(1) span {
                background-color: white;
                color: #b88a44;
            }

            .phandaua1 p {
                font-size: 1.2rem;
                font-weight: 500;
                color: white;
                text-align: center;
            }

            .phanthanmot {
                text-align: center;
                padding: 20px;
                background-color: white;
                margin: 30px auto;
                max-width: 900px;
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            }

            .phanthanmot p {
                text-align: center;
                font-size: 1.3rem;
                color: #e74c3c;
                margin-bottom: 20px;
                font-weight: 500;
            }
          /*Thông tin đặt phồng*/
            .infor-container-right {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background: #ffffff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .infor-container-button {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px;
            }

            h2 {
                text-align: center;
                color: #333;
            }

            .infor_order {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }

            .infor_order th,
            .infor_order td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: center;
            }

            .infor_order th {
                background-color: #B88A44;
                color: white;
                font-weight: bold;
            }

            .infor_order tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .infor_order tr:hover {
                background-color: #f1f1f1;
            }

            .loading {
                font-style: italic;
                color: black;
            }

            .booking-container {
                width: 90%;
                max-width: 1200px;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                /* Giữ nội dung ở trên */
                margin: 0 auto;
                /* Căn giữa */
            }

            .booking-content {
                display: flex;
                justify-content: space-between;
                align-items: stretch;
                /* Đảm bảo chiều cao hai phần bằng nhau */
                width: 90%;
                max-width: 1200px;
                gap: 20px;

            }

            .booking-form {
                width: 30%;
                /* Giảm kích thước để vừa với phần bên cạnh */
                background: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                min-width: 280px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }

            .booking-info {
                width: 65%;
                /* Phần thông tin đặt phòng lớn hơn */
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }
            .form-label{
                font-weight: bold;
                color: #333;
            }

            /* Responsive: Khi màn hình nhỏ, xếp dọc */
            @media (max-width: 768px) {
                .booking-content {
                    flex-direction: column;
                    align-items: center;
                }

                .booking-form,
                .booking-info {
                    width: 100%;
                }
            }
        </style>

    <div class="phandau">
        <div class="container" style="background-color: #B88A44">
            <div class="phandaua">
                <div class="phandaua1">
                    <span>1</span>
                    <p>Thông tin khách hàng</p>
                </div>
                <div class="phandaua1">
                    <span>2</span>
                    <p>Chi tiết thanh toán</p>
                </div>
                <div class="phandaua1">
                    <span>3</span>
                    <p>Xác nhận đặt phòng</p>
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo e(route('booking.store')); ?>" method="POST" class="p-4 bg-light rounded shadow">

    <?php echo csrf_field(); ?>
    <!-- Hidden fields to pass booking data -->
    <input type="hidden" name="room_id" value="<?php echo e(old('room_id', $roomDetail->id)); ?>">
    <input type="hidden" name="check_in" value="<?php echo e(old('check_in', $check_in)); ?>">
    <input type="hidden" name="check_out" value="<?php echo e(old('check_out', $check_out)); ?>">
    <input type="hidden" name="adults" value="<?php echo e(old('adults', $adults)); ?>">
    <input type="hidden" name="children" value="<?php echo e(old('children', $children)); ?>">

    
    <div class="main-container">
        <div class="booking-container">
            <!-- Form Đặt Phòng -->
            <div class="booking-form">
                <h2 class="text-center">Đặt Phòng Khách Sạn</h2>
            
                    <div class="mb-3">
                        <label class="form-label">Họ và tên:</label>
                        <input type="text" name="ho_ten" class="form-control" placeholder="Nhập họ và tên" value="<?php echo e(old('ho_ten')); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập email" value="<?php echo e(old('email')); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại:</label>
                        <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo e(old('sdt')); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quốc tịch:</label>
                        <input type="text" name="nationality" class="form-control" placeholder="Nhập quốc tịch" value="<?php echo e(old('nationality')); ?>" required>
                    </div>

                    <div class="infor-container-button d-flex justify-content-between">
                        <a href="<?php echo e(url('/')); ?>" class="back-btn btn secondary-btn"><span>&#171;</span> Quay lại</a>
                        <button type="submit" class="primary-btn btn">Thanh toán</button>
                    </div>
                
            </div>
        
            <!-- Hiển thị thông tin đặt phòng -->
            <div class="infor-container-right">
                <h2>Thông tin đặt phòng</h2>
                <table class="infor_order">
                    <tr>
                        <th>Loại phòng</th>
                        <th>Ngày check-in</th>
                        <th>Ngày check-out</th>
                        <th>Số người</th>
                        <th>Giá phòng/đêm</th>
                        <th>Thành tiền</th>
                    </tr>
                    <tr>
                        <td><?php echo e($roomDetail->room_type ?? 'Không có dữ liệu'); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($check_in)->format('d/m/Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($check_out)->format('d/m/Y')); ?></td>
                        <td><?php echo e(($adults ?? 0) + ($children ?? 0)); ?></td>
                        <td><?php echo e(number_format($roomDetail->price_per_night ?? 0, 0, ',', '.')); ?> VNĐ</td>
                        <td><?php echo e(number_format($total_amount ?? 0, 0, ',', '.')); ?> VNĐ</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
            <!-- Hiển thị lỗi nếu có -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(false): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let roomId = document.querySelector('input[name="room_id"]').value;

                    // Nếu có dữ liệu trước đó, hiển thị ngay
                    if (localStorage.getItem(`booking_${roomId}`)) {
                        let cachedData = JSON.parse(localStorage.getItem(`booking_${roomId}`));
                        updateBookingInfo(cachedData);
                    }

                    fetch(`/api/booking-info/${roomId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                showError("Không có dữ liệu");
                                return;
                            }

                            updateBookingInfo(data);
                            localStorage.setItem(`booking_${roomId}`, JSON.stringify(data));
                        })
                        .catch(error => {
                            console.error("Lỗi khi tải dữ liệu:", error);
                            showError("Lỗi tải dữ liệu");
                        });
                });

                // Hàm cập nhật dữ liệu vào bảng
                function updateBookingInfo(data) {
                    document.querySelectorAll(".loading").forEach(el => el.classList.remove("loading"));

                    document.getElementById("room_type").innerText = data.room_type;
                    document.getElementById("checkin_date").innerText = data.checkin_date;
                    document.getElementById("checkout_date").innerText = data.checkout_date;
                    document.getElementById("total_people").innerText = data.total_people;
                    document.getElementById("price_per_night").innerText = data.price_per_night;
                    document.getElementById("total_amount").innerText = data.total_amount;
                }

                // Hàm hiển thị lỗi nếu API không hoạt động
                function showError(message) {
                    document.querySelectorAll(".loading").forEach(el => el.innerText = message);
                }

            </script>
            
            <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/booking_form.blade.php ENDPATH**/ ?>