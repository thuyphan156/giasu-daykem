@extends('admin.layouts.index')

@section('title', 'Cập nhật bài đăng')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật bài đăng</h1>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="class_select">Lớp học: <span class="text-danger">*</span></label>
                <select class="form-control" name="class" id="class_select" required>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $class->id === $post->class_id ? 'selected' : '' }}>{{ $class->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject_select">Môn học: <span class="text-danger">*</span></label>
                <select class="form-control" name="subject" id="subject_select" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id === $post->subject_id ? 'selected' : '' }}>{{ $subject->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="students">Số học sinh: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập số học sinh" id="students" name="students" min=1 value="{{ $post->students }}" required>
            </div>
            <div class="form-group">
                <label for="number_sessions">Số buổi / tuần: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập số buổi" id="number_sessions" name="number_sessions" value="{{ $post->number_sessions }}" required>
            </div>
            <div class="form-group">
                <label for="days">Thời gian có thể học: <span class="text-danger">*</span></label>
                <select class="form-control" name="days[]" id="days" multiple required>
                    <option value="Thứ 2 - Sáng" {{ in_array('Thứ 2 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 2 - Sáng</option>
                    <option value="Thứ 2 - Chiều"  {{ in_array('Thứ 2 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 2 - Chiều</option>
                    <option value="Thứ 2 - Tối"  {{ in_array('Thứ 2 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 2 - Tối</option>
                    <option value="Thứ 3 - Sáng"  {{ in_array('Thứ 3 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 3 - Sáng</option>
                    <option value="Thứ 3 - Chiều"  {{ in_array('Thứ 3 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 3 - Chiều</option>
                    <option value="Thứ 3 - Tối"  {{ in_array('Thứ 3 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 3 - Tối</option>
                    <option value="Thứ 4 - Sáng"  {{ in_array('Thứ 4 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 4 - Sáng</option>
                    <option value="Thứ 4 - Chiều"  {{ in_array('Thứ 4 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 4 - Chiều</option>
                    <option value="Thứ 4 - Tối"  {{ in_array('Thứ 4 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 4 - Tối</option>
                    <option value="Thứ 5 - Sáng"  {{ in_array('Thứ 5 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 5 - Sáng</option>
                    <option value="Thứ 5 - Chiều"  {{ in_array('Thứ 5 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 5 - Chiều</option>
                    <option value="Thứ 5 - Tối"  {{ in_array('Thứ 5 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 5 - Tối</option>
                    <option value="Thứ 6 - Sáng"  {{ in_array('Thứ 6 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 6 - Sáng</option>
                    <option value="Thứ 6 - Chiều"  {{ in_array('Thứ 6 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 6 - Chiều</option>
                    <option value="Thứ 6 - Tối"  {{ in_array('Thứ 6 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 6 - Tối</option>
                    <option value="Thứ 7 - Sáng"  {{ in_array('Thứ 7 - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 7 - Sáng</option>
                    <option value="Thứ 7 - Chiều"  {{ in_array('Thứ 7 - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 7 - Chiều</option>
                    <option value="Thứ 7 - Tối"  {{ in_array('Thứ 7 - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>Thứ 7 - Tối</option>
                    <option value="CN - Sáng"  {{ in_array('CN - Sáng', explode(', ', $post->days)) ? 'selected' : '' }}>CN - Sáng</option>
                    <option value="CN - Chiều"  {{ in_array('CN - Chiều', explode(', ', $post->days)) ? 'selected' : '' }}>CN - Chiều</option>
                    <option value="CN - Tối"  {{ in_array('CN - Tối', explode(', ', $post->days)) ? 'selected' : '' }}>CN - Tối</option>
                </select>
            </div>
            <div class="form-group">
                <label for="minutes">Thời lượng buổi học (phút): <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập thời lượng buổi học" id="minutes" name="minutes" value="{{ $post->minutes }}" min=1 required>
            </div>
            <div class="form-group">
                <label for="time">Giờ học: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập thời gian" id="time" name="time" value="{{ $post->time }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="address" name="address" value="{{ $post->address }}" required>
            </div>
            <div class="form-group">
                <label for="salary">Lương  (đồng / tháng): <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập lương" id="salary" name="salary" value="{{ $post->salary }}" required>
            </div>
            <div class="form-group">
                <label for="fee">Phí nhận lớp (%): <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập phí nhận lớp" id="fee" name="fee" value="{{ $post->fee }}" min=1 required>
            </div>
            <div class="form-group">
                <label>Yêu cầu khác:</label>
                <textarea class="form-control" rows="3" cols="10" placeholder="Nhập yêu cầu khác" name="note">{{ $post->note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/js/ajax.js') }}"></script>
@endsection
