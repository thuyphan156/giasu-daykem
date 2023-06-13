<html>
    <body>
        <p><b>Thông tin lớp học</b></p>
        <p>Họ tên phụ huynh: {{ $registerTeacher->name }}</p>
        <p>Email: {{ $registerTeacher->email }}</p>
        <p>Số điện thoại: {{ $registerTeacher->phone }}</p>
        <p>Địa chỉ: {{ $registerTeacher->address }}</p>
        <p>Lớp: {{ \App\Models\Classes::find($registerTeacher->class_id)->title }}</p>
        <p>Môn dạy: {{ \App\Models\Subject::find($registerTeacher->subject_id)->title }}</p>
        <p>Tỉnh thành: {{ \Vanthao03596\HCVN\Models\Province::find($registerTeacher->province_id)->name }}</p>
        <p>Quận huyện: {{ \Vanthao03596\HCVN\Models\District::find($registerTeacher->district_id)->name }}</p>
        <p>Thời gian học: {{ $registerTeacher->time }} (tùy chọn)</p>
        <p>Mức lương: {{ number_format($registerTeacher->salary, -3, ',', ',') }} đồng / tháng</p>
    </body>
</html>