@extends('admin.layouts.index')

@section('title', 'Danh sách lớp học')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Lớp học</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->title }}</td>
                            <td>
                                <a href="{{ route('classes.delete',['id' => $class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('classes.edit.form',['id' => $class->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
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
