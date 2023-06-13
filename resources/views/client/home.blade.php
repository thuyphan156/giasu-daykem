@extends('client.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">TRUNG TÂM GIA SƯ<br>UY TÍN - CHẤT LƯỢNG - CHUYÊN NGHIỆP</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading mb-4">
                        <span class="caption">Lớp dạy kèm</span>
                        <h2>Mới nhất</h2>
                        <a href="{{ route('client.posts') }}" class="mt-2">Xem thêm</a>
                    </div>
                </div>
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
            </div>
            {{$posts->links()}}
        </div>
    </div>
    <div class="site-section bg-light" style="padding-bottom:400px">
        <div class="container">
            <div class="row section-2-title">
                <div class="col-md-6">
                    <div class="heading mb-4">
                        <span class="caption">Gặp gỡ</span>
                        <h2>Đội ngũ gia sư</h2>
                    </div>
                </div>
            </div>
            <style>
                .gradient-custom {
                 /* fallback for old browsers */
                background: #f6d365;
        
                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right bottom, rgb(72, 70, 149), rgb(58, 109, 146));
        
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right bottom, rgb(75, 115, 179), rgb(87, 182, 182))
                }
                @media (min-width: 768px){
                .site-footer {
                padding: 8em 0;}
                }
            </style>
            <section class="vh-100 mb-5" style="background-color: #f8f9fa; margin-bottom:40px;" >
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    @foreach($users as $user)
                  
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                          <div class="card mb-3" style="border-radius: .5rem;">
                            <a href="http://127.0.0.1:8000/tutor_detail/{{$user->id}}">
                                <div class="row g-0">
                                  <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="{{ $user->avatar }}"
                                      alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <h5>{{$user->name}}</h5>
                                    @php
                                    $classes = [];
                                    foreach (explode(',', $user->classes) as $class) {
                                        $classes[] = \App\Models\Classes::find($class)->title;
                                    }
                                          @endphp
                                    <p>Lớp dạy: {{ implode(', ', $classes) }}</p>
                                    <i class="far fa-edit mb-5"></i>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body p-4">
                                      <h6>Thông tin gia sư</h6>
                                      <hr class="mt-0 mb-4">
                                      <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            @php
                                            $subjects = [];
                                            foreach (explode(',', $user->subjects) as $subject) {
                                                $subjects[] = \App\Models\Subject::find($subject)->title . ' - ' . \App\Models\Classes::find(\App\Models\Subject::find($subject)->class_id)->title;
                                            }
                                        @endphp
                                
                                          <h6>Môn dạy</h6>
                                          <p class="text-muted"> {{ implode(', ', $subjects) }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            @php
                                            $districts = [];
                                            foreach (explode(',', $user->districts) as $district) {
                                                $districts[] = \Vanthao03596\HCVN\Models\District::find($district)->name;
                                            }
                                        @endphp
                                      
                                          
                                        </div>
                                      </div>
                                      <h6>thông tin giảng dạy</h6>
                                      <hr class="mt-0 mb-4">
                                      <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                          <h6>Khu vực dạy</h6>
                                          <p class="text-muted">{{ implode(', ', $districts) }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <h6>Thời gian dạy</h6>
                                          <p class="text-muted"> {{ $user->times }}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </a>
                          </div>
                        </div>

                    
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection
