@extends('admin.layouts.index')

@section('title', 'Chọn gia sư')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chọn gia sư</h1>

    <div class="row">
        <div class="col-lg-12">
            <form action="/ad/assign-tutor/tutor" method="POST">
                @csrf
                <div class="form-group">
                    <input name="id" type="hidden" value="{{$id}}">
                    <input name="email" type="hidden" value="{{$email}}">
                    <label>Gia sư: <span class="text-danger">*</span></label>
                    <select class="form-control teacher_select" name="teacher" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Chọn</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.teacher_select').select2();
        });
    </script>
@endsection
