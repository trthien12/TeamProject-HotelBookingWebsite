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
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home') }}#about">About</a></li>
                        <li><a href="{{ route('home') }}#rooms">Rooms</a></li>
                        <li><a href="#pages">Pages</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li>
                        <a href="{{ route('cart.index') }}" aria-label="Giỏ hàng">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-count">
                                {{ array_sum(array_column(session('shoppingCart', []), 'quantity')) ?: '' }}
                            </span>
                        </a>
                        </li>
                        <li>
                            @auth
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="primary-btn">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('admin.login.form') }}" class="primary-btn">Login</a>
                            @endauth
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
