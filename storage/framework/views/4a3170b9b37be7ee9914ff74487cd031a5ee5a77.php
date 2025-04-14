
<?php $__env->startSection('title', 'Hoàn Tất Đặt Phòng'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/stylelayouts.css')); ?>">

<style>
        
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
        background-color: #b88a44;/* Màu nền mặc định cho số 1 và 3 */
        color: white; /* Màu chữ mặc định cho số 1 và 3 */
        font-weight: bold;
        font-size: 1.2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        }

        .phandaua1:hover span {
        transform: scale(1.1);
        }
        /*
        .phandaua1.active span {
        background-color: white !important;
        color: black !important;
        }
        .phandaua1.active span {
        background-color: white;
        color: black;
        }
        */
        /* Chỉnh màu số 2 thành #b88a44 */
        .xong-page .phandaua1:nth-child(3) span {
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
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 3px solid #b88a44;
        border-radius: 20px;
        }
    
        .phanthanmot p {
        text-align: center;
        font-size: 1.3rem;
        margin-bottom: 20px;
        
        line-height: 1; /* Tăng khoảng cách giữa các dòng */
        text-align: center; /* Căn giữa nội dung */
        margin-top: 20px; /* Thêm khoảng cách phía trên */

        
    
        }
</style>

<div class="phandau xong-page">
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
            <div class="phandaua1 active">
                <span>3</span>
                <p>Xác nhận đặt phòng</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="phanthanmot">
        <h2>Đặt Phòng Thành Công!</h2>
        <p style="color: red; font-weight: bold;font-weight: 500;">Thông tin đặt phòng đã được gửi về <?php echo e(htmlspecialchars(session('customer_info.email'))); ?>. 
             
            <p style="color: red; font-weight: bold;font-weight: 500;">Chúng tôi hy vọng bạn sẽ có trải nghiệm tuyệt vời.</p>
            <p style="text-size:8px; font-style: italic; color: black;">Vui lòng kiểm tra hộp thư để biết thêm chi tiết.</p>
       
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/thanhtoan/xong.blade.php ENDPATH**/ ?>