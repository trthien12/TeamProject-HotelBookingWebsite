@extends('layouts.main')
@section('title', 'Chính sách quyền riêng tư')

@section('content')
<main>
    <div class="policy-background">
        <div class="policy-wrapper">
            <h1>Chính sách quyền riêng tư - Khách sạn Golden Tree</h1>

            <h2>1. Thông tin thu thập</h2>
            <p>Golden Tree thu thập thông tin cá nhân qua dữ liệu khách hàng cung cấp hoặc từ các nguồn khác như đối tác, nhà cung cấp, công khai.</p>

            <h2>2. Mục đích sử dụng</h2>
            <ul>
                <li>Cá nhân hóa trải nghiệm dịch vụ</li>
                <li>Cải thiện sản phẩm, quảng cáo phù hợp</li>
                <li>Sử dụng cookie và công nghệ tương tự</li>
            </ul>

            <h2>3. Bảo mật thông tin</h2>
            <p>Golden Tree cam kết không chia sẻ thông tin khách hàng cho bên thứ ba trừ khi được phép hoặc theo quy định pháp luật.</p>

            <h2>4. Thời gian lưu trữ</h2>
            <p>Thông tin được lưu đến khi hoàn tất mục đích sử dụng hoặc theo yêu cầu pháp luật.</p>

            <h2>5. Quyền chỉnh sửa thông tin</h2>
            <p>Khách hàng có thể liên hệ để xem, sửa hoặc xóa thông tin khách hàng đặt phòng qua:<br>
            📞 <a href="tel:19001833" class="contact-link">1900 1833</a> | ✉️ <a href="mailto:info@golden-tree.com"  class="contact-link">info@golden-tree.com</a>
            </p>
        </div>
    </div>
</main>
@endsection
<style>
.policy-wrapper {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(6px);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    padding: 40px;
    max-width: 960px;
    margin: 60px auto;
}

.policy-wrapper h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: #1a3e3e;
    text-align: center;
}

.policy-wrapper h2 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #17463b;
    margin-top: 20px;
    margin-bottom: 10px;
}

.policy-wrapper p,
.policy-wrapper ul {
    color: #333;
    line-height: 1.7;
    font-size: 0.95rem;
}

.policy-wrapper ul {
    padding-left: 1.5rem;
    list-style: disc;
}

.policy-background {
    background-image: url('/img/banner_2.jpg');
    background-size: cover;
    background-position: center;
    padding: 60px 20px;
}
</style>