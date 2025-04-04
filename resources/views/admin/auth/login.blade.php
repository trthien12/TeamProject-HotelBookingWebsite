<style>
   @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

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
        background-image: url('{{ asset("img/golden-tree-apartment.jpg") }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
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
    .navigation .btnLogin-popup{
        width: 130px;
        height: 50px;
        background: transparent;
        border: 2px solid #fff;
        outline: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1.1em;
        color: #fff;
        font-weight: 500;
        margin-left: 40px;
        transition: .5s;
    }
    .navigation .btnLogin-popup:hover{
        background: #fff;
        color: #162938;
    }

    .wrapper {
        position: relative;
        width: 400px;
        height: 440px;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, .5);
        border-radius: 20px;
        backdrop-filter: blur(20px);
        box-shadow: 0 0 30px rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transform: scale(0);
        transition: transform .5s ease;
    }

    .wrapper.active-popup{
        transform: scale(1);
    }

    .wrapper.active {
        height: 420px;
    }

    .wrapper.form-box {
        width: 100%;
        padding: 40px;
    }
    .wrapper .iconclose {
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
    }
    .form-box h2 {
        font-size: 1em;
        color: #030c13;
        text-align: center;
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
    }
</style>
<body>
    <header>
        <div class="GOLDENTREEAPARTMENT">GOLDEN TREE APARTMENT</div>
        <nav class="navigation">
            <button class="btnLogin-popup">Admin Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <button class="iconclose">X</button>
        <div class="from-box">
            <h2>Login</h2>
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required autofocus>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">LOGIN</button>

                <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Remember me</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                </div>
            </form>
        </div>
    <div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log("JavaScript is running!");
            const wrapper = document.querySelector('.wrapper');
            const btnPopup = document.querySelector('.btnLogin-popup');
            const iconClose = document.querySelector('.iconclose');

            btnPopup.addEventListener('click', () => {
                wrapper.classList.add('active-popup');
            });

            iconClose.addEventListener('click', () => {
                wrapper.classList.remove('active-popup');
            });
        });
    </script>
</body>
    

