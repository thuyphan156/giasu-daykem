@extends('admin.layouts.index')

@section('title', 'Thông tin tìm gia sư')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Thông tin tìm gia sư</h1>
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
                        <th>Địa chỉ</th>
                        <th>Gia sư</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($registerTeachers as $registerTeacher)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $registerTeacher->name }}</td>
                            <td>{{ $registerTeacher->email }}</td>
                            <td>{{ $registerTeacher->phone }}</td>
                            <td>{{ $registerTeacher->address }}</td>
                            <td>
                                {{ !empty($registerTeacher->teacher_id) ? \App\Models\RegisterTeacher::find($registerTeacher->teacher_id)->name : 'N/A' }}
                            </td>
                            <td>
                                <a href="/ad/assign-tutor/show/{{$registerTeacher->id}}" class="btn btn-primary btn-sm">
                                    Chi tiết
                                </a>
                                @if (is_null($registerTeacher->teacher_id))
                                    <a href="/ad/assign-tutor/tutor/{{$registerTeacher->id}}/{{$registerTeacher->email}}" class="btn btn-success btn-sm">
                                        Chọn gia sư {{$registerTeacher->teacher_id}}
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
