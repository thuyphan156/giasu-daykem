@extends('client.layouts.index')

@section('title', 'Đăng ký làm gia sư')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">ĐĂNG KÝ LÀM GIA SƯ</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 mb-5">
                    <form action="{{ route('client.handle.register.teacher') }}" method="post"
                        enctype="multipart/form-data" autocomplete="on">

                        @csrf
                        <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Họ tên: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nhập họ tên" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <label>Giới tính: <span class="text-danger">*</span></label>
                                <select class="form-control" name="gender" required>
                                    <!-- <option value="">Chọn giới tính</option> -->
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Khác</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Giọng nói: <span class="text-danger">*</span></label>
                                <select class="form-control" name="voice" required>
                                    <!-- <option value="">Chọn giọng nói</option> -->                                  
                                    <option value="0">Miền Nam</option>
                                    <option value="1">Miền Trung</option>
                                    <option value="2">Miền Bắc</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Ngày sinh: <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="birthday" max="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Email: <span class="text-danger">*</span></label>
                                <br>
                                <span class="text-info">Lưu ý: Vui lòng sử dụng email chưa từng đăng ký hệ thống</span>
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email"
                                    required>
                                <!-- <span class="text-info">Lưu ý: Vui lòng sử dụng email chưa từng đăng ký hệ thống</span> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Mật khẩu: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Xác nhận mật khẩu: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="re_password"
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
                                <label>Số CCCD: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nhập số cccd" name="identity_number"
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
                                <label>Ảnh thẻ: <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="avatar"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Bằng cấp: <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="certificate_img"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Lớp dạy (chọn nhiều bằng cách giữ phím Ctrl): <span class="text-danger">*</span></label>
                                <select class="form-control" name="classes[]" id="class_select" size="5" multiple required>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Môn dạy (chọn nhiều bằng cách giữ phím Ctrl): <span class="text-danger">*</span></label>
                                <select class="form-control" name="subjects[]" id="subject_select" multiple required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Tỉnh/Thành phố dạy: <span class="text-danger">*</span></label>
                                <select class="form-control" name="city" id="city_select" required>
                                    <option value="">Chọn tỉnh/thành phố dạy</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Khu vực dạy (chọn nhiều bằng cách giữ phím Ctrl): <span class="text-danger">*</span></label>
                                <select class="form-control" name="districts[]" id="district_select" size="10" multiple required>
                                    <option value="">Chọn khu vực dạy</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Thời gian dạy (chọn nhiều bằng cách giữ phím Ctrl): <span class="text-danger">*</span></label>
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
                                <label>Số buổi dạy (buổi/tuần): <span class="text-danger">*</span></label>
                                <select class="form-control" name="number_sessions" required>
                                    <option value="">Chọn số buổi</option>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
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
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                    value="Đăng ký">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
@endsection
