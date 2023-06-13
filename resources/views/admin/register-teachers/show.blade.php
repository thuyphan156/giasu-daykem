@extends('admin.layouts.index')

@section('title', 'Chi tiết gia sư')

@section('content')
    <div class="float-right">
        @if ($user->status == 0)
            <a class="btn btn-sm btn-primary" 
            href="{{ route('register-teacher.approve', ['id' => $user->id]) }}" onclick="return confirm('Bạn có chắc muốn duyệt gia sư này ?')">
            Duyệt</a>
        @else
            @if ($user->active == 1)
                <a class="btn btn-sm btn-danger" 
                href="{{ route('register-teacher.update-active', ['id' => $user->id, 'active' => 0]) }}" onclick="return confirm('Bạn có chắc muốn khóa gia sư này ?')">
                Khóa</a>
            @else
                <a class="btn btn-sm btn-success" 
                href="{{ route('register-teacher.update-active', ['id' => $user->id, 'active' => 1]) }}" onclick="return confirm('Bạn có chắc muốn mở khóa gia sư này ?')">
                Mở khóa</a>
            @endif
        @endif
    </div>
    <h1 class="h3 mb-2 text-gray-800">Chi tiết gia sư</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <th>Ảnh thẻ</th>
                        <td><img src="{{ asset($user->avatar) }}" width="100"></td>
                    </tr>
                    <tr>
                        <th>Họ tên</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td>{{ $user->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                    </tr>
                    <tr>
                        <th>Giọng nói</th>
                        <td>{{ $user->voice == 0 ? 'Miền Nam' : ($user->voice == 1 ? 'Miền Trung' : 'Miền Bắc' ) }}</td>
                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td>{{ date('d/m/Y', strtotime($user->birthday)) }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Số CCCD</th>
                        <td>{{ $user->identity_number }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ hiện tại</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <th>Bằng cấp</th>
                        <td><a href="{{ asset($user->certificate_img) }}" target="_blank"><img src="{{ asset($user->certificate_img) }}" width="100"></a></td>
                    </tr>
                    <tr>
                        <th>Lớp dạy</th>
                        @php
                            $classes = [];
                            foreach (explode(',', $user->classes) as $class) {
                                $classes[] = \App\Models\Classes::find($class)->title;
                            }
                        @endphp
                        <td>{{ implode(', ', $classes) }}</td>
                    </tr>
                    <tr>
                        <th>Môn dạy</th>
                        @php
                            $subjects = [];
                            foreach (explode(',', $user->subjects) as $subject) {
                                $subjects[] = \App\Models\Subject::find($subject)->title . ' - ' . \App\Models\Classes::find(\App\Models\Subject::find($subject)->class_id)->title;
                            }
                        @endphp
                        <td>{{ implode(', ', $subjects) }}</td>
                    </tr>
                    <tr>
                        <th>Tỉnh thành dạy</th>
                        <td>{{ \Vanthao03596\HCVN\Models\Province::find($user->province_id)->name }}</td>
                    </tr>
                    <tr>
                        <th>Khu vực dạy</th>
                        @php
                            $districts = [];
                            foreach (explode(',', $user->districts) as $district) {
                                $districts[] = \Vanthao03596\HCVN\Models\District::find($district)->name;
                            }
                        @endphp
                        <td>{{ implode(', ', $districts) }}</td>
                    </tr>
                    <tr>
                        <th>Thời gian dạy</th>
                        <td>{{ $user->times }}</td>
                    </tr>
                    <tr>
                        <th>Số buổi dạy</th>
                        <td>{{ $user->number_sessions }} buổi / tuần</td>
                    </tr>
                    <tr>
                        <th>Mức lương yêu cầu</th>
                        <td>{{ number_format($user->salary, -3, ',', ',') }} đồng / tháng</td>
                    </tr>
                    <tr>
                        <th>Trạng thái duyệt</th>
                        <td>{{ $user->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái hoạt động</th>
                        @if ($user->status == 1)
                            <td>{{ $user->active == 1 ? 'Hoạt động' : 'Khóa' }}</td>
                        @else
                            <td>N/A</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
