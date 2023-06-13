<html>
    <body>
        <p>Chúc mừng bạn đã trở thành gia sư của lớp có mã số bài đăng <span style="color: red;">{{ $registerClass->post_id }}</span></p>
        <p>Xin vui lòng truy cập <a href="{{ route('client.checkout', ['id' => $registerClass->id]) }}" target="_blank">link</a> để thanh toán phí nhận lớp</p>
    </body>
</html>