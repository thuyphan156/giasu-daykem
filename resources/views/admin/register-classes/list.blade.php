@extends('admin.layouts.index')

@section('title', 'Duyệt đăng ký gia sư')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Duyệt đăng ký nhận lớp</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã bài đăng</th>
                        <th>Gia sư</th>
                        <th>Trạng thái duyệt</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($registerClasses as $registerClass)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $registerClass->post_id }}</td>
                            <td>
                                <a href="{{ route('register-teacher.show', ['id' => $registerClass->teacher_id]) }}" target="_blank">{{ \App\Models\User::find($registerClass->teacher_id)->name }}</a>
                            </td>
                            <td>
                                @switch($registerClass->status)
                                    @case(0)
                                        Chờ duyệt
                                        @break
                                    @case(1)
                                        Đã duyệt, chờ thanh toán phí
                                        @break
                                    @case(2)
                                        Từ chối
                                        @break
                                    @default
                                        Đã bàn giao
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('post.show',['id' => $registerClass->post_id]) }}" class="btn btn-primary btn-sm" target="_blank">
                                    Chi tiết bài đăng
                                </a>
                                @if ($registerClass->status == 0)
                                    <a href="{{ route('register-class.approve',['id' => $registerClass->id]) }}" class="btn btn-success btn-sm" onclick="return confirm('Bạn có chắc muốn duyệt gia sư này ?')">
                                        Duyệt
                                    </a> 
                                @endif
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
