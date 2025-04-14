<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
<style>
   @import  url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('<?php echo e(asset("img/bedrom.jpg")); ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Độ tối: 0.3 - 0.5 tuỳ ý */
        z-index: 1;
    }

    /* Đảm bảo form nằm TRÊN lớp overlay */
    .wrapper {
        position: relative;
        z-index: 2;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 15px 70px;
        background-color: #B88A44;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
    }
    .GOLDENTREEAPARTMENT{
        font-size: 2em;
        color: rgb(246, 250, 26);
        user-select: none;

    }
    .navigation a {
        position: relative;
        font-size: 1.1em;
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        margin-left: 40px;
    }
    .navigation a::after {
        content:  '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 3px;
        background: #fff;
        border-radius: 5px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .5s;
    }
    .navigation a:hover::after {
        transform: scaleX(1);
    }
    .wrapper {
        position: relative;
        width: 400px;
        height: 440px;
        /*background: transparent;*/
        background: rgba(255, 255, 255, 0.85); /* Nền trắng mờ */
        border: 2px solid rgba(255, 255, 255, .3);
        border-radius: 20px;
        /*backdrop-filter: blur(25px);*/
        box-shadow: 0 0 30px rgba(0, 0, 0, .2);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transform: scale(1);
        transition: transform .5s ease;
    }

    /*.wrapper.active-popup{
        transform: scale(1);
    }
    .wrapper.active {
        height: 420px;
    }*/

    .wrapper.form-box {
        width: 100%;
        padding: 40px;
    }
    /*.wrapper .iconclose {
        position: absolute;
        top: 0;
        right: 0;
        width: 45px;
        height: 50px;
        background: #B88A44;
        font-size: 2em;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom-left-radius: 20px;
    }*/
    .form-box h1 {
        font-size: 1.8em;
        color: #030c13;
        text-align: center;
        margin-bottom: 20px;
    }
    .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        border-bottom: 2px solid #162938;
        margin: 30px 0;
    }
    .input-box label {
        position: relative;
        top: -70%;
        left: 5px;
        font-size: 1em;
        color: #162938;
        font-weight: 500;
        pointer-events: none;
        transition: .5s;
    }
    .input-box input:focus~label, 
    .input-box input:valid~label {
        top: -60px;
    }
    .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #030c13;
        font-weight: 600;
        padding: 0 35px 0 5px;
    }
    .input-box .icon {
        position: absolute;
        right: 8px;
        font-size: 1.6em;
        color: #030c13;
        line-height: 50px;
    }
    .remember-forgot {
        font-size: .9em;
        color: #030c13;
        font-weight: 500;
        margin: 15px 0 15px;
        display: flex;
        justify-content: space-between;
    }
    .remember-forgot label input {
        accent-color: #162938;
        margin-right: 3px;
    }
    .remember-forgot a {
        color: #030c13;
        text-decoration: none;
    }
    .remember-forgot a:hover {
        text-decoration: underline;
    }
    .btn {
        width: 100%;
        height: 45px;
        background: #B88A44;
        border: none;
        outline: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
        margin-top:10px;
    }
    .btn:hover {
        background-color: #B88A44; /* cùng màu gốc */
        color: #fff;               /* giữ nguyên màu chữ */
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.2); /* hiệu ứng nhẹ */
        transform: scale(1.01);    /* phóng nhẹ */
        transition: all 0.2s ease-in-out;
    }
    .home-link {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #fff;
        background-color: rgba(0,0,0,0.3);
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s;
    }
    .home-link:hover {
        background-color: rgba(0,0,0,0.5);
    }
</style>
<body>
    <div class="overlay"></div>
        <div  class="wrapper">
            <!--<button class="iconclose">X</button>-->
            <div class="form-box">
                <h1>Login</h1>
                <form action="<?php echo e(route('admin.login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" required autofocus>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" class="btn">LOGIN</button>

                    <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                    <?php endif; ?>
                    </div>
                </form>
                <a href="<?php echo e(url('/')); ?>" class="home-link">← Quay về Trang chủ</a>
            </div>
        <div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>