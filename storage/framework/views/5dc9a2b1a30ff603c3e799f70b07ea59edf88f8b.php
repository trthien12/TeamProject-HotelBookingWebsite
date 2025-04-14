
<?php $__env->startSection('title', 'QR Payment'); ?>
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelayouts.css')); ?>">
 
<style>
            body {
                font-family: "Segoe UI", Arial, sans-serif;
                background-image: url("hinh1.jpg");
                /* Đường dẫn tới ảnh nền */
                background-size: cover;
                /* Đảm bảo ảnh phủ toàn bộ */
                background-position: center;
                /* Căn giữa ảnh nền */
                background-repeat: no-repeat;
                /* Không lặp lại ảnh nền */
                margin: auto;
                padding: auto;
                display: block;
                justify-content: center;
                align-items: center;

            }

            .payment-container {
                width: 50%;
                max-width: 600px;
                margin: auto;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 30px;
                /* Tăng padding */
                text-align: left;
                /* Chữ căn trái */
            }

            h2 {
                font-size: 24px;
                /* Tăng kích thước */
                color: #b38c3f;
                margin-bottom: 20px;
                text-align: center;
                /* Căn giữa tiêu đề */
            }

            .qr-section {
                margin-bottom: 20px;
                text-align: center;
                /* Căn giữa QR code */
            }

            .qr-code {
                width: 200px;
                /* Tăng kích thước QR */
                height: 200px;
                margin: 0 auto;
                display: block;
                margin-bottom: 10px;
            }

            .scan-text {
                font-size: 16px;
                font-weight: bold;
                color: #333;
            }

            .countdown {
                font-size: 28px;
                /* Tăng kích thước đồng hồ */
                color: #b38c3f;
                margin-bottom: 20px;
                text-align: center;
                /* Đồng hồ căn giữa */
            }

            .payment-info p {
                /* Tăng kích thước chữ */
                font-weight: bold;
                font-size: 1.2rem;
                color: #444;
                margin: 8px 0;
            }

            .instructions {
                font-size: 18px;
                /* Tăng kích thước */
                color: #555;
                margin-top: 20px;
                line-height: 1.6;
                /* Tăng khoảng cách giữa các dòng */
            }

            .complete-payment {
                text-align: center;
                margin-top: 20px;
            }

            .btn-complete {
                background-color: #b88a44;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 1.2rem;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .btn-complete:hover {
                background-color: rgb(116, 72, 6);
                /* Màu xanh đậm khi hover */
            }
</style>

    <div class="payment-container">
        <h2>Cổng Thanh Toán Tự Động</h2>

        <div class="qr-section">
            <img src="<?php echo e(asset('img/QR.png')); ?>" alt="QR Code" class="qr-code" />
            <p>Quét mã QR</p>
        </div>

        <div class="countdown">
            <span id="countdown-timer">05:00</span>
        </div>

        <div class="payment-info">
            <p>Khách hàng: <?php echo e(session('customer_info.full_name')); ?></p>
            <p>Số tiền thanh toán: <?php echo e(number_format(session('customer_info.total_amount'), 0, ',', '.')); ?>

                đ</p>
        </div>

        <p class="instructions">
            Quý khách quét mã QR (vui lòng không thay đổi nội dung chuyển khoản) để thanh toán...
        </p>

        <div class="complete-payment">
        <a href="<?php echo e(route('payment.success')); ?>" class="btn-complete">Hoàn tất</a>
        </div>
    </div>

    <script>
        let timer = 5 * 60;
        const countdownElement = document.getElementById("countdown-timer");

        function updateCountdown() {
            const minutes = Math.floor(timer / 60);
            const seconds = timer % 60;
            countdownElement.textContent = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

            if (timer > 0) {
                timer--;
            } else {
                clearInterval(countdownInterval);
                alert("Thời gian đã hết, vui lòng thử lại!");
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/thanhtoan/payment.blade.php ENDPATH**/ ?>