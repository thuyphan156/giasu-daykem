@extends('admin.layouts.index')

@section('title', 'Danh sách môn học')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Thêm môn học</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('subject.add') }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="class_id">Lớp học: <span class="text-danger">*</span></label>
                <select class="form-control" name="class_id" id="class_id">
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Môn học: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập môn học" id="title" name="title" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
    </div>
</div>
@endsection