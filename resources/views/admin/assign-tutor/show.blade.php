@extends('admin.layouts.index')

@section('title', 'Chi tiết thông tin tìm gia sư')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin tìm gia sư</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <th>Họ tên</th>
                        <td>{{ $registerTeacher->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $registerTeacher->email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $registerTeacher->phone }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{ $registerTeacher->address }}</td>
                    </tr>
                    <tr>
                        <th>Lớp</th>
                        <td>{{ \App\Models\Classes::find($registerTeacher->class_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Môn dạy</th>
                        <td>{{ \App\Models\Subject::find($registerTeacher->subject_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Tỉnh thành</th>
                        <td>{{ \Vanthao03596\HCVN\Models\Province::find($registerTeacher->province_id)->name }}</td>
                    </tr>
                    <tr>
                        <th>Quận huyện</th>
                        <td>{{ \Vanthao03596\HCVN\Models\District::find($registerTeacher->district_id)->name }}</td>
                    </tr>
                    <tr>
                        <th>Thời gian có thể học</th>
                        <td>{{ $registerTeacher->time }} (tùy chọn)</td>
                    </tr>
                    <tr>
                        <th>Mức lương yêu cầu</th>
                        <td>{{ number_format($registerTeacher->salary, -3, ',', ',') }} đồng / tháng</td>
                    </tr>
                    <tr>
                        <th>Yêu cầu khác</th>
                        <td>{{ $registerTeacher->note ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Gia sư</th>
                        <td>{{ !empty($registerTeacher->teacher_id) ? \App\Models\RegisterTeacher::find($registerTeacher->teacher_id)->name : 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
