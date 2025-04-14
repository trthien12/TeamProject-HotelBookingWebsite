<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đã gửi liên hệ</title>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            title: 'Gửi liên hệ thành công!',
            text: 'Xin chân thành cảm ơn các đóng góp, ý kiến, thắc mắc của Quý Khách hàng. Chúng tôi sẽ phản hồi đến bạn trong thời gian sớm nhất.',
            icon: 'success',
            confirmButtonText: 'Về trang chủ',
            confirmButtonColor: '#B88A44',
            timer: 4000, // Tự động đóng sau 4 giây
            timerProgressBar: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didClose: () => {
                window.location.href = "{{ route('home') }}";
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('home') }}";
            }
        });
    });
</script>

</head>
<body></body>
</html>
