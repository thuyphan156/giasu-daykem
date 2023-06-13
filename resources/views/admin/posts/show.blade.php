@extends('admin.layouts.index')

@section('title', 'Chi tiết bài đăng')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết bài đăng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <th>Mã lớp</th>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <th>Lớp học</th>
                        <td>{{ \App\Models\Classes::find($post->class_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Môn học</th>
                        <td>{{ \App\Models\Subject::find($post->subject_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Số lượng học sinh</th>
                        <td>{{ $post->students }}</td>
                    </tr>
                    <tr>
                        <th>Số buổi</th>
                        <td>{{ $post->number_sessions }}</td>
                    </tr>
                    <tr>
                        <th>Thời gian có thể học</th>
                        <td>{{ $post->days }}</td>
                    </tr>
                    <tr>
                        <th>Thời lượng buổi học</th>
                        <td>{{ $post->minutes }} phút / buổi</td>
                    </tr>
                    <tr>
                        <th>Giờ học</th>
                        <td>{{ $post->time }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{ $post->address }}</td>
                    </tr>
                    <tr>
                        <th>Mức lương yêu cầu</th>
                        <td>{{ number_format($post->salary, -3, ',', ',') }} đồng / tháng</td>
                    </tr>
                    <tr>
                        <th>Phí nhận lớp</th>
                        <td>{{ $post->fee }}%</td>
                    </tr>
                    <tr>
                        <th>Yêu cầu khác</th>
                        <td>{{ $post->note ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
