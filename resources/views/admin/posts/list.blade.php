@extends('admin.layouts.index')

@section('title', 'Duyệt đăng ký gia sư')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Bài đăng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã lớp</th>
                        <th>Lớp</th>
                        <th>Môn học</th>
                        <th>Địa chỉ</th>
                        <th>Mức lương</th>
                        <th>Phí</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $post->id }}</td>
                            <td>{{ \App\Models\Classes::find($post->class_id)->title }}</td>
                            <td>{{ \App\Models\Subject::find($post->subject_id)->title }}</td>
                            <td>{{ $post->address }}</td>
                            <td>{{ number_format($post->salary, -3, ',', ',') }} đồng / tháng</td>
                            <td>{{ $post->fee }}%</td>
                            <td>
                                <a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('post.edit.form',['id' => $post->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('post.show',['id' => $post->id]) }}" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
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
