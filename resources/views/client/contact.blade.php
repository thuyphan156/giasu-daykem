@extends('client.layouts.index')

@section('title', 'Liên hệ đăng bài')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">LIÊN HỆ</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 mb-5">
                    <form action="{{ route('client.post.contact') }}" method="post"
                        enctype="multipart/form-data" autocomplete="on">

                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Họ tên: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nhập họ tên" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Điện thoại: <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Địa chỉ hiện tại: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ hiện tại" name="address"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Lớp: <span class="text-danger">*</span></label>
                                <select class="form-control" name="class" id="class_select" required>
                                    <option value="">Chọn lớp</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Môn: <span class="text-danger">*</span></label>
                                <select class="form-control" name="subject" id="subject_select" required>
                                    <option value="">Chọn môn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Tỉnh/Thành phố: <span class="text-danger">*</span></label>
                                <select class="form-control" name="city" id="city_select" required>
                                    <option value="">Chọn tỉnh/thành phố</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Quận/Huyện: <span class="text-danger">*</span></label>
                                <select class="form-control" name="district" id="district_select" required>
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Thời gian có thể học (chọn nhiều): <span class="text-danger">*</span></label>
                                <select class="form-control" name="times[]" multiple required>
                                    <option value="Thứ 2 - Sáng">Thứ 2 - Sáng</option>
                                    <option value="Thứ 2 - Chiều">Thứ 2 - Chiều</option>
                                    <option value="Thứ 2 - Tối">Thứ 2 - Tối</option>
                                    <option value="Thứ 3 - Sáng">Thứ 3 - Sáng</option>
                                    <option value="Thứ 3 - Chiều">Thứ 3 - Chiều</option>
                                    <option value="Thứ 3 - Tối">Thứ 3 - Tối</option>
                                    <option value="Thứ 4 - Sáng">Thứ 4 - Sáng</option>
                                    <option value="Thứ 4 - Chiều">Thứ 4 - Chiều</option>
                                    <option value="Thứ 4 - Tối">Thứ 4 - Tối</option>
                                    <option value="Thứ 5 - Sáng">Thứ 5 - Sáng</option>
                                    <option value="Thứ 5 - Chiều">Thứ 5 - Chiều</option>
                                    <option value="Thứ 5 - Tối">Thứ 5 - Tối</option>
                                    <option value="Thứ 6 - Sáng">Thứ 6 - Sáng</option>
                                    <option value="Thứ 6 - Chiều">Thứ 6 - Chiều</option>
                                    <option value="Thứ 6 - Tối">Thứ 6 - Tối</option>
                                    <option value="Thứ 7 - Sáng">Thứ 7 - Sáng</option>
                                    <option value="Thứ 7 - Chiều">Thứ 7 - Chiều</option>
                                    <option value="Thứ 7 - Tối">Thứ 7 - Tối</option>
                                    <option value="CN - Sáng">CN - Sáng</option>
                                    <option value="CN - Chiều">CN - Chiều</option>
                                    <option value="CN - Tối">CN - Tối</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Số lượng học sinh: <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Nhập số lượng học sinh" value="1" min=1 name="students"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Mức lương yêu cầu (đồng/tháng): <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Nhập mức lương" name="salary" min=1
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Yêu cầu khác:</label>
                                <textarea class="form-control" rows="3" cols="10" placeholder="Nhập yêu cầu khác" name="note"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                    value="Gửi">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
@endsection
