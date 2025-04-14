
<?php $__env->startSection('title', 'Kết quả tìm kiếm'); ?>
<?php $__env->startSection('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container">
        <h2>Kết quả tìm kiếm</h2>
        <?php if($rooms->isEmpty()): ?>
            <p>Không có phòng phù hợp với yêu cầu của bạn.</p>
        <?php else: ?>
            <div class="grid-container">
                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset($room->image_url)); ?>" alt="<?php echo e($room->room_type); ?>" width="400px">
                        <div class="infor_room">
                            <h3><?php echo e($room->room_type); ?></h3>
                            <p><i class="fas fa-bed"></i> Giường: <?php echo e($room->bed_type); ?></p>
                            <p><i class="fas fa-expand"></i> Diện tích: <?php echo e($room->area); ?> m²</p>
                            <p><i class="fas fa-binoculars"></i> Hướng: <?php echo e($room->view); ?></p>
                            <p><i class="fas fa-wallet"></i> Giá: <?php echo e(number_format($room->price_per_night, 0, ',', '.')); ?>₫</p>
                            <p class="discount"><i class="fas fa-tag"></i> Giảm <?php echo e($room->discount_percent); ?>%</p>
                            <p><i class="fas fa-door-open"></i> Còn lại: <?php echo e($room->remaining_rooms); ?></p>
                            <p><i class="fas fa-users"></i> Sức chứa: <?php echo e($room->capacities->first()->max_capacity ?? 'Không xác định'); ?> người</p>

                            <div class="action-buttons">
                                <<form action="<?php echo e(route('booking.form')); ?>" method="GET" class="p-4 bg-light rounded shadow">
                                <?php echo csrf_field(); ?>
                                    <input type="hidden" name="room_id" value="<?php echo e($room->id); ?>">
                                    <input type="hidden" name="check_in" value="<?php echo e($check_in); ?>">
                                    <input type="hidden" name="check_out" value="<?php echo e($check_out); ?>">
                                    <input type="hidden" name="adults" value="<?php echo e($adults); ?>">
                                    <input type="hidden" name="children" value="<?php echo e($children); ?>">
                                    <button type="submit" class="book-now">Đặt ngay</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('cart.add')); ?>"class="add-to-cart-form">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="room_id" value="<?php echo e($room->id); ?>">
                                    <input type="hidden" name="check_in" value="<?php echo e($check_in); ?>">
                                    <input type="hidden" name="check_out" value="<?php echo e($check_out); ?>">
                                    <input type="hidden" name="adults" value="<?php echo e($adults); ?>">
                                    <input type="hidden" name="children" value="<?php echo e($children); ?>">
                                    <label for="quantity">Số lượng:</label>
                                    <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
                                    <?php if($errors->has('quantity')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?php echo e($errors->first('quantity')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                                </form>
                             </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<style>
    /* Định dạng cho container chính */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin: 0 20px;
        }

    .item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    .item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

    .item img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
        }

    .infor_room {
        padding: 15px;
        text-align: left;
        }

    .infor_room h3 {
        margin: 0 0 10px;
        color: #333;
        font-size: 1.2em;
        }

    .infor_room p {
        margin: 5px 0;
        color: #555;
        font-size: 0.95em;
        }
    .infor_room .discount {
        color: #e63946;
        font-weight: bold;
        margin-top: 5px;
        }

    .action-buttons .button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
        }

    .book-now {
        background-color: #B88A44;
        color: white;
        width: 150px;
        }

    .add-cart {
        background-color: #ddd;
        color: black;
        width: 150px;
        }

    .action-buttons .button:hover {
        opacity: 0.9;
        }
    h1, h2 {
        font-family: 'Roboto', sans-serif;

        font-weight: 400;
        }
    .add-to-cart-form {
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap; /* để không bị vỡ layout trên màn hình nhỏ */
    }
    .add-to-cart-form label {
        font-size: 0.9em;
        color: #333;
        margin-bottom: 0;
    }
    .add-to-cart-form input[type="number"] {
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 60px;
        text-align: center;
        font-size: 1em;
    }
    .add-to-cart-form .add-cart {
        flex-shrink: 0; /* tránh nút bị co nhỏ nếu không đủ chỗ */
    }
</style>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Downloads\Baicua_\BTN-PTUDMNM-tcdt1\resources\views/homepage/search_results.blade.php ENDPATH**/ ?>