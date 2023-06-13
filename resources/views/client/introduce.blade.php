@extends('client.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">GIỚI THIỆU</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
                    <img src="{{ asset('client/images/teachers.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-lg-4 mr-auto">
                    <div class="heading mb-4">
                        <h2>Về chúng tôi</h2>
                    </div>
                    <p>Với nhiều năm kinh nghiệm giảng dạy, Trung tâm gia sư sẽ giúp học sinh có thể cải thiện và nâng cao chất lượng học tập một cách tốt nhất</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5 section-2-title">
                <div class="col-md-6">
                    <div class="heading mb-4">
                        <span class="caption">Gặp gỡ</span>
                        <h2>Đội ngũ giảng viên của chúng tôi</h2>
                    </div>


                </div>
            </div>
            <div class="row align-items-stretch">

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_1.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Toán</span>
                            <h2>Thầy Nguyễn Văn Công</h2>
                            <p>Tốt nghiệp sư phạm Toán, có 10 năm kinh nghiệm dạy Toán ở các trung tâm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_2.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Tiếng Anh</span>
                            <h2>Cô Nguyễn Sao Mai</h2>
                            <p>Tốt nghiệp sư phạm Anh, có 8 năm kinh nghiệm dạy Tiếng Anh ở các trung tâm</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_3.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Hóa</span>
                            <h2>Cô Trần Thị Lượng</h2>
                            <p>Tốt nghiệp sư phạm Hóa, có 9 năm kinh nghiệm dạy Hóa ở các trường cấp 2 và 3</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_4.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Lý</span>
                            <h2>Thầy Trần Công Tuấn</h2>
                            <p>Tốt nghiệp sư phạm Lý, có 10 năm kinh nghiệm dạy Lý ở các trường đại học</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_5.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Ngữ Văn</span>
                            <h2>Cô Trần Nhật Lệ</h2>
                            <p>Tốt nghiệp sư phạm Văn, có 7 năm kinh nghiệm dạy Văn ở các trường cấp 2 và 3</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">

                        <img src="{{ asset('client/images/person_6.jpg') }}" alt="Image" class="img-fluid">

                        <div class="post-entry-1-contents">
                            <span class="meta">Giáo viên dạy Sinh</span>
                            <h2>Cô Lê Thị Gấm</h2>
                            <p>Tốt nghiệp sư phạm Sinh, có 9 năm kinh nghiệm dạy Văn ở các trường cấp 2 và 3</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
