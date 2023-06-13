@extends('admin.layouts.index')

@section('title', 'Chi tiết liên hệ')

@section('content')
    @if (!\App\Models\Post::where('contact_id', $contact->id)->exists())
        <a class="btn btn-sm btn-primary float-right" href="{{ route('post.add.form', ['contactId' => $contact->id]) }}">Đăng bài</a>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Chi tiết liên hệ</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <th>Họ tên</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ hiện tại</th>
                        <td>{{ $contact->address }}</td>
                    </tr>
                    <tr>
                        <th>Lớp dạy</th>
                        <td>{{ \App\Models\Classes::find($contact->class_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Môn dạy</th>
                        <td>{{ \App\Models\Subject::find($contact->subject_id)->title }}</td>
                    </tr>
                    <tr>
                        <th>Tỉnh thành</th>
                        <td>{{ \Vanthao03596\HCVN\Models\Province::find($contact->province_id)->name }}</td>
                    </tr>
                    <tr>
                        <th>Quận huyện</th>
                        <td>{{ \Vanthao03596\HCVN\Models\District::find($contact->district_id)->name }}</td>
                    </tr>
                    <tr>
                        <th>Thời gian có thể học</th>
                        <td>{{ $contact->time }}</td>
                    </tr>
                    <tr>
                        <th>Mức lương yêu cầu</th>
                        <td>{{ number_format($contact->salary, -3, ',', ',') }} đồng / tháng</td>
                    </tr>
                    <tr>
                        <th>Yêu cầu khác</th>
                        <td>{{ $contact->note ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
