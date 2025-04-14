
<?php $__env->startSection('title', 'Thanh Toán'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelayouts.css')); ?>">
    <style>
        .phandau {
            background: linear-gradient(135deg, #b88a44 0%, #8b6b2f 100%);
            padding: 40px 0;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .phandaua1:hover span {
            transform: scale(1.1);
        }

        .phandaua1.active span {
            background-color: #b88a44;
            color: white;
        }

        .phandaua1:nth-child(2) span {
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
            font-size: 1.3rem;
            color: #e74c3c;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .phanthanmot h4 {
            font-size: 1.4rem;
            color: #b88a44;
        }

        .phancuoi {
            margin: 40px auto;
            border: 3px solid #b88a44;
            border-radius: 20px;
            padding: 40px;
            max-width: 1200px;
            background-color: white;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .tieude h5 {
            color: #b88a44;
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }

        .thanphancuoi {
            display: grid;
            grid-template-columns: 1fr 1.7fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .benphai p {
            font-family: 'Arial', sans-serif;
            font-size: 20px;
            color: #555;
            margin: 10px 13px;
            line-height: 2;
        }

        .bentrai {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* Căn giữa theo chiều dọc */
            height: 100%;
            /* Đảm bảo khung có chiều cao đầy đủ */
            text-align: center;
            /* Căn giữa nội dung văn bản */
            padding: 20px;
        }

        .bentrai img {
            width: 400px;
            /* Tăng kích thước ảnh để vừa khung */
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            /* Tăng độ nổi bật */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            
        }

        .bentrai img:hover {
            transform: scale(1.1);
            /* Tăng hiệu ứng phóng to khi hover */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            /* Tăng hiệu ứng bóng khi hover */
        }

        .thongtin-icon {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .thongtin-icon pre {
            font-size: 20px;
            /* Kích thước chữ nhỏ hơn cho thông tin chi tiết */
            color: #444;
            /* Màu chữ tối hơn một chút */
            font-family: 'Arial', sans-serif;
            /* Font chữ dễ đọc */
            margin: 0;
        }

        .icon-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-item i {
            font-size: 2rem;
            /* Tăng kích thước icon để nổi bật */
            color: #b88a44;
            /* Giữ màu vàng đồng */
        }

        .bx {
            font-size: 1.8rem;
            color: #b88a44;
        }

        .thanhtoan {
            text-align: center;
            height: 30px;
            margin-bottom: 59px;
            padding-left: 990px;
        }

        .thanhtoan button {
            background: #b88a44;
            color: white;
            border: none;
            padding: 18px 20px;
            font-size: 1.3rem;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(184, 138, 68, 0.3);
            text-align: center;
        }

        .thanhtoan button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(184, 138, 68, 0.4);
        }
    </style>
    <div class="phandau">
        <div class="container">
            <div class="phandaua">
                <div class="phandaua1 active">
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

    <div class="container">
        <div class="phanthanmot">
            <p>Thời gian còn lại: <span id="countdown"></span></p>
        </div>

        <div class="phancuoi">
            <div class="tieude">
                <h5>Thông tin chi tiết đơn hàng</h5>
            </div>
            <div class="thanphancuoi">
                <div class="benphai">
                    <p>Tên khách hàng: <span style="font-weight: bold;"><?php echo e(htmlspecialchars(session('customer_info.full_name'))); ?></span></p>
                    <p>Ngày check-in: <span style="font-weight: bold;"><?php echo e(htmlspecialchars(session('customer_info.check_in'))); ?></span></p>
                    <p>Ngày check-out: <span style="font-weight: bold;"><?php echo e(htmlspecialchars(session('customer_info.check_out'))); ?></span></p>
                    <p>Tổng tiền: <span style="font-weight: bold;"><?php echo e(number_format(session('customer_info.total_amount'), 0, ',', '.')); ?> đ</span></p>
                </div>
                <div class="bentrai">
                    <img src="<?php echo e(session('customer_info.image_url')); ?>" alt="Apartment Image" />
                </div>
                <div class="thongtin-icon">
                    <div class="icon-item">
                        <i class='bx bx-home-alt-2'></i>
                        <pre>Loại phòng: <span style="font-weight: bold;"><?php echo e(htmlspecialchars(session('customer_info.room_type'))); ?></span></pre>
                    </div>
                    <div class="icon-item">
                        <i class="bx bxs-bed"></i>
                        <pre>Loại giường: <span style="font-weight: bold;"><?php echo e(Session::get('customer_info.bed_type')); ?></span></pre>
                    </div>
                    <div class="icon-item">
                        <i class='bx bxs-florist'></i>
                        <pre>View: <span style="font-weight: bold;"><?php echo e(session('customer_info.view')); ?></span></pre>
                    </div>
                    <div class="icon-item">
                        <i class='bx bxs-group'></i>
                        <pre>Số người: <span style="font-weight: bold;"><?php echo e(session('customer_info.adults') + session('customer_info.children')); ?></span></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thanhtoan" style="font-size: 20px;">
        <form action="<?php echo e(route('payment.process')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <button type="submit" class="primary-btn">Thanh toán</button>

        </form>
    </div>

    <script>
        var countDownDate = new Date().getTime() + 15 * 60 * 1000;

        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML =
                minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Hết giờ";
            }
        }, 1000);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/thanhtoan/payment_form.blade.php ENDPATH**/ ?>