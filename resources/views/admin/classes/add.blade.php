@extends('admin.layouts.index')

@section('title', 'Thêm lớp học')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Thêm lớp học</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('classes.add') }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="title">Tiêu đề: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tiêu đề" id="title" name="title" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
    </div>
</div>
@endsection