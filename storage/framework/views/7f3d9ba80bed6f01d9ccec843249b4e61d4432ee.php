</head>
    <body>
        <!-- Page Heading -->
        <header>
            <div class="content flex_space">
                <div class="logo">
                    <span>GOLDEN TREE APARTMENT</span>
                </div>
                <nav class="navlinks">
                    <ul id="menulist">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#about">About</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#rooms">Rooms</a></li>
                        <li><a href="#pages">Pages</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                        <li>
                        <a href="<?php echo e(route('cart.index')); ?>" aria-label="Giỏ hàng">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-count">
                                <?php echo e(array_sum(array_column(session('shoppingCart', []), 'quantity')) ?: ''); ?>

                            </span>
                        </a>
                        </li>
                        <li>
                            <?php if(auth()->guard()->check()): ?>
                                <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="primary-btn">Logout</button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('admin.login.form')); ?>" class="primary-btn">Login</a>
                            <?php endif; ?>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </header>
        <script>
                var menulist = document.getElementById('menulist');
                menulist.style.maxHeight = "0px";

                function menutoggle() {
                    if (menulist.style.maxHeight == "0px") {
                        menulist.style.maxHeight = "100vh";
                    } else {
                        menulist.style.maxHeight = "0px";
                    }
                }
        </script>
<?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt1\resources\views/layouts/header.blade.php ENDPATH**/ ?>