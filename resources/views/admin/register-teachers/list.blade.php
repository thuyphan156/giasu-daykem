@extends('admin.layouts.index')

@section('title', 'Duyệt đăng ký gia sư')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Duyệt đăng ký gia sư</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái duyệt</th>
                        <th>Trạng thái hoạt động</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</td>
                            @if ($user->status == 1)
                                <td>{{ $user->active == 1 ? 'Hoạt động' : 'Khóa' }}</td> 
                            @else
                                <td>N/A</td>
                            @endif
                            <td>
                                <a href="{{ route('register-teacher.show',['id' => $user->id]) }}" class="btn btn-primary btn-sm">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
