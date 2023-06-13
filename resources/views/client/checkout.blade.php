@extends('client.layouts.index')

@section('title', 'Thanh toán')

@section('content')
    <div class="site-section-cover overlay" style="background-image: url({{ asset('client/images/hero_bg.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold">THANH TOÁN</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 mb-5">
                    @php
                        $url = explode('/', url()->current());
                    @endphp
                    <form action="{{ route('client.pay', ['id' => end($url)]) }}" method="post">

                        @csrf
                        <input type="hidden" name="contact_id" value="{{$post->contact_id}}"/>
                        <input type="hidden" name="total" value="{{ ($post->fee / 100) * $post->salary }}" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <div>
                            <h3 class="mb-1">MS: {{ $post->id }}</h3>
                            <p class="mb-1">{{ $post->number_sessions }} buổi / tuần, dạy {{ $post->minutes }} phút / buổi</p>
                            <p class="mb-1">Thời gian có thể học (tự chọn): {{ $post->days }}</p>
                            <p class="mb-1">{{ \App\Models\Classes::find($post->class_id)->title }}: {{ \App\Models\Subject::find($post->subject_id)->title }}</p>
                            <p class="mb-1">Địa chỉ: {{ $post->address }}</p>
                            <p class="mb-1">Mức lương: <span class="text-danger">{{ number_format($post->salary, -3, ',', ',') }} đồng</span> / tháng</p>
                            <p class="mb-1">Mức phí: {{ $post->fee }}% (tương đương: <span class="text-danger">{{ number_format(($post->fee / 100) * $post->salary, -3, ',', ',') }} đồng</span>)</p>
                            <p class="mb-1">Yêu cầu: {{ $post->note }}</p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                    value="Thanh toán">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
@endsection
