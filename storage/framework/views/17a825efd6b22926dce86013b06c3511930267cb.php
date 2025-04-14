
<?php $__env->startSection('title', 'Liên hệ'); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-container">
    <h2>Gửi lời nhắn đến Golden Tree</h2>

    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('contact.send')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="email">Email của bạn</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="message">Nội dung</label>
            <textarea id="message" name="message" rows="5"><?php echo e(old('message')); ?></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color:red"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn-submit">Gửi liên hệ</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f4f9;
        margin: 0;
        overflow-x: hidden;
    }

    main {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
    }

    .contact-container {
        width: 100%;
        max-width: 600px;
        background: #fffdf8;
        padding: 40px;
        border-radius: 16px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }

    @keyframes  fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #222;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        background-color:rgb(250, 250, 250);
        transition: border-color 0.5s, box-shadow 0.8s;
    }

    input::placeholder, textarea::placeholder {
        color: #999;
        font-style: italic;
    }

    input:focus, textarea:focus {
        border-color:rgb(167, 124, 60);
        background-color:#fff;
        outline: none;
        box-shadow: 0 0 5px rgba(184, 138, 68, 0.45);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #B88A44;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #a37332;
    }

    .alert-success {
        background-color: #d4edda;
        border-left: 5px solid #28a745;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 6px;
        color: #155724;
    }
</style>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/homepage/contact.blade.php ENDPATH**/ ?>