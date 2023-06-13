@extends('client.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">DANH SÁCH LỚP</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <form action="{{ route('client.search.post') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Lớp</label>
                                    <select class="form-control" name="class" id="class_select">
                                        <option value="">Vui lòng chọn lớp</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Môn</label>
                                    <select class="form-control" name="subject" id="subject_select">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tỉnh / Thành phố</label>
                                    <select class="form-control" name="city" id="city_select">
                                        <option value="">Vui lòng tỉnh / thành phố</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Khu vực</label>
                                    <select class="form-control" name="district" id="district_select">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary">Lọc</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (request()->has('class') || request()->has('subject') || request()->has('city') || request()->has('district'))
                    <div class="col-lg-12">
                        <h3>Kết quả tìm kiếm</h3>
                    </div>
                @endif
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="col-lg-6">
                            <div class="d-flex tutorial-item mb-4">
                                <div>
                                    <h3 class="font-weight-bold mb-1"><a href="#">MS: {{ $post->id }}</a></h3>
                                    <p class="mb-1">{{ $post->number_sessions }} buổi / tuần, dạy {{ $post->minutes }} phút / buổi</p>
                                    <p class="mb-1">Thời gian có thể học (tự chọn): {{ $post->days }}</p>
                                    <p class="mb-1">{{ \App\Models\Classes::find($post->class_id)->title }}: {{ \App\Models\Subject::find($post->subject_id)->title }}</p>
                                    <p class="mb-1">Địa chỉ: {{ $post->address }}</p>
                                    <p class="mb-1">Mức lương: <span class="text-danger">{{ number_format($post->salary, -3, ',', ',') }} đồng</span> / tháng</p>
                                    <p class="mb-1">Mức phí: {{ $post->fee }}%</p>
                                    <p class="mb-1">Yêu cầu: {{ $post->note }}</p>
                                    @if (!Auth::check())
                                        <p><a href="{{ route('client.show.login') }}" class="btn btn-primary custom-btn">Đăng nhập để nhận lớp</a></p>
                                    @else
                                        @if (\App\Models\RegisterClass::where([['post_id', $post->id], ['teacher_id', Auth::user()->id]])->exists())
                                            @if (\App\Models\RegisterClass::where([['post_id', $post->id], ['teacher_id', Auth::user()->id]])->first()->status == 0)
                                                <p class="text-primary">Đang trong quá trình chờ duyệt ...</p>
                                            @elseif (\App\Models\RegisterClass::where([['post_id', $post->id], ['teacher_id', Auth::user()->id]])->first()->status == 1)
                                                <p class="text-success">Đã duyệt, chờ thanh toán phí</p>
                                            @elseif (\App\Models\RegisterClass::where([['post_id', $post->id], ['teacher_id', Auth::user()->id]])->first()->status == 2)
                                                <p class="text-danger">Từ chối</p>
                                            @elseif (\App\Models\RegisterClass::where([['post_id', $post->id], ['teacher_id', Auth::user()->id]])->first()->status == 3)
                                                <p class="text-success">Đã bàn giao</p>
                                            @endif
                                        @else
                                            <p><a href="{{ route('client.register.class', ['id' => $post->id]) }}" class="btn btn-primary custom-btn">Đăng ký nhận lớp</a></p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-6 text-danger">Không có kết quả phù hợp</div>
                @endif
                <div class="custom-pagination">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
