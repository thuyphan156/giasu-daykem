<html>
    <body>
        <p>Chúc mừng bạn đã trở thành gia sư của Trung tâm dạy kèm</p>
        <p>Xin vui lòng truy cập <a href="{{ route('client.show.login') }}" target="_blank">link</a> đăng nhập với thông tin tài khoản như sau:</p>
        <p>Tài khoản: {{ $user->email }}</p>
        <p>Mật khẩu: <span style="color: red;">lúc đăng ký</span></p>
    </body>
</html>