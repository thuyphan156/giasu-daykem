@extends('client.layouts.index')

@section('title', 'Đăng nhập')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">ĐĂNG NHẬP</h3>
                </div>
            </div>
        </div>

        
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 mb-5">
                    <form action="{{ route('client.post.login') }}" method="post"
                        enctype="multipart/form-data" autocomplete="on">

                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email"
                                    required>
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
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                    value="Đăng nhập">
                            </div>
                        </div>
                        <div class="text-left">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-left">
                            <a class="small" href="{{route('client.register.teacher')}}">Đăng ký làm gia sư!</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
@endsection
