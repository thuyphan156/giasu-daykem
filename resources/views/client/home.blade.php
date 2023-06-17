@extends('client.layouts.index')

@section('title', 'Trang chủ')

@section('content')
<style>
  .sidebar {
  background-color: #f8f9fa; /* Set the background color of the sidebar */
  padding: 20px;
  border-radius: 5px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar ul li {
  margin-bottom: 10px;
}

.carousel {
  position: relative;
  width: 100%;
  /* Add any other desired styles */
}

.carousel-slides {
  display: flex;
  width: 100%;
  /* Add any other desired styles */
}

.slide {
  flex: 0 0 100%; /* Each slide takes 100% width */
  /* Add any other desired styles */
}

.carousel-control {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  /* Add any other desired styles */
}

.prev {
  left: 10px;
}

.next {
  right: 10px;
}
.sidebar ul li a {
  color: #333; /* Set the text color of sidebar links */
  text-decoration: none;
}

.sidebar ul li a:hover {
  color: #555; /* Set the hover color of sidebar links */
}
.sidebar img {
  width: 100%; /* Adjust the width as needed */
  border-radius: 5px;
}
.sidebar {
  background-color: #f8f9fa;
  padding: 20px;
  border-radius: 5px;
  position: sticky;
  top: 100px; /* Adjust the value according to your needs */
}
.carousel {
  width: 100%;
  overflow: hidden;
}

.carousel-slide {
  display: flex;
  width: 300%; /* Adjust the width based on the number of slides */
}

.carousel-slide img {
  width: 346px;
  height: 850px;
  
}

.carousel {
  width: 100%;
  overflow: hidden;
}

.carousel-slide {
  display: flex;
  width: 300%; /* Adjust the width based on the number of slides */
}

.carousel-slide img {

}
///
.carousel {
  position: relative;
  width: 100%;
  /* Add any other desired styles */
}

.carousel-slides1 {
  display: flex;
  width: 100%;
  /* Add any other desired styles */
}

.slide1 {
  flex: 0 0 100%; /* Each slide takes 100% width */
  /* Add any other desired styles */
}

.carousel-control1 {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  /* Add any other desired styles */
}

.prev1 {
  left: 10px;
}

.next1 {
  right: 10px;
}
.sidebar ul li a {
  color: #333; /* Set the text color of sidebar links */
  text-decoration: none;
}

.sidebar ul li a:hover {
  color: #555; /* Set the hover color of sidebar links */
}
.sidebar img {
  width: 100%; /* Adjust the width as needed */
  border-radius: 5px;
}
.carousel-wrapper {
  position: sticky;
  top: 0;
  z-index: 100;
}
.sidebar {
  background-color: #f8f9fa;
  padding: 20px;
  border-radius: 5px;
  position: sticky;
  top: 100px; /* Adjust the value according to your needs */
}
.carousel1 {
  width: 100%;
  overflow: hidden;
}

.carousel-slide1 {
  display: flex;
  width: 300%; /* Adjust the width based on the number of slides */
}

.carousel-slide1 img {
  width: 346px;
  height: 850px;
  
}

.carousel {
  width: 100%;
  overflow: hidden;
}

.carousel-slide1 {
  display: flex;
  width: 300%; /* Adjust the width based on the number of slides */
}

.carousel-slide1 img {

}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="site-section-cover overlay" style="  object-fit: cover;background-image: url({{ asset('client/images/banner17.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3 class="text-white font-weight-bold" style="margin-bottom: 50px">TRUNG TÂM GIA SƯ<br>UY TÍN - CHẤT LƯỢNG - CHUYÊN NGHIỆP</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="position: relative;" style="    margin-top: 100px;">
        <div class="row">
          <div class="col-md-2">
            <div class="carousel-wrapper">
              <div class="carousel">
                <div class="carousel-slide">
                  <img src="{{ asset('client/images/slider1.jpg') }}" alt="Image 1">
              
                  <img src="{{ asset('client/images/anh2.jpg') }}" alt="Image 2">
                  <img src="{{ asset('client/images/anh1.jpg') }}" alt="Image 5">
                  <img src="{{ asset('client/images/anh2.jpg') }}" alt="Image 2">
                  <img src="{{ asset('client/images/slider2.jpg') }}" alt="Image 1">>
                </div>  
                <button style="display: none" class="carousel-prev">Previous</button>
                <button style="display: none" class="carousel-next">Next</button>
              </div>

            </div>
          </div>
          <style>
          </style>
        <div class="col-md-8">
          <div class="container" style="    margin-top: 100px;" >
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
            <div class="container" style="    margin-top: 100px;">
              <div class="row section-2-title">
                <div class="col-md-6">
                    <div class="heading mb-4">
                        <span class="caption">Gặp gỡ</span>
                        <h2>Đội ngũ gia sư</h2>
                    </div>
                </div>
            </div>
              <div class="row">
                  @foreach($users as $user)
                <div class="col-sm-6 col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">{{strtoupper($user->name)}}</h5>
                    </div>
                    <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image">
                    <div class="card-body">
                      @php
                      $classes = [];
                      foreach (explode(',', $user->classes) as $class) {
                          $classes[] = \App\Models\Classes::find($class)->title;
                      }
                            @endphp
      
                          @php
                          $subjects = [];
                          foreach (explode(',', $user->subjects) as $subject) {
                          $subjects[] = \App\Models\Subject::find($subject)->title . ' - ' . \App\Models\Classes::find(\App\Models\Subject::find($subject)->class_id)->title;
                          }
                          $districts = [];
                                          foreach (explode(',', $user->districts) as $district) {
                                              $districts[] = \Vanthao03596\HCVN\Models\District::find($district)->name;
                                          }
                          @endphp
                
                      <p class="card-text">Lớp dạy: {{ implode(', ', $classes) }}</p>
                      <p class="card-text">Môn dạy: {{ implode(', ', $subjects) }}</p>
                      <p class="card-text">Khu vực dạy: {{ implode(', ', $districts) }}</p>
                      <p class="card-text">Thời gian dạy : {{ $user->times }} </p>
                    </div>
                    <div class="card-footer">
                      <a href="http://127.0.0.1:8000/tutor_detail/{{$user->id}}" class="btn btn-primary">Chi tiết gia sư</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
        </div>
        
      </div>
      
      
    </div>
    <div class="col-md-2">
      <div class="carousel-wrapper">
        <div class="carousel1">
          <div class="carousel-slide1">
            <img src="{{ asset('client/images/anh1.jpg') }}" alt="Image 1">
            <img src="{{ asset('client/images/anh2.jpg') }}" alt="Image 2">
            <img src="{{ asset('client/images/anh1.jpg') }}" alt="Image 5">
            <img src="{{ asset('client/images/anh2.jpg') }}" alt="Image 2">
            <img src="{{ asset('client/images/giphy.webp') }}" alt="Image 5">
          </div>  
          <button style="display: none" class="carousel-prev1">Previous</button>
          <button style="display: none" class="carousel-next1">Next</button>
        </div>

      </div>
   </div>
      </div>
      <style>
      </style>
      </div>
      </div>
      <div class="site-section bg-light" style="padding-bottom:400px;display:block;">
          <div class="container">
              
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
              <style>
               .card {
        margin: 20px;
        border: none;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
      }
  
      .card:hover {
        transform: translateY(-5px);
      }
  
      .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
  
      .card-body {
        padding: 20px;
      }
  
      .card-title {
        font-weight: bold;
        margin-bottom: 10px;
        color:#fff;
      }
  
      .card-text {
        color: #555;
        line-height: 1.5;
      }
  
      .btn-primary {
        background-color: #fca311;
        border-color: #fca311;
      }
  
      .btn-primary:hover {
        background-color: #e94e1b;
        border-color: #e94e1b;
      }
  
      .card-header {
        background-color: #14213d;
        color: #fff;
        padding: 10px;
        border-bottom: none;
      }
  
      .card-footer {
        background-color: #14213d;
        color: #fff;
        padding: 10px;
        border-top: none;
        text-align: right;
      }
      .sidebar {
    background-color: #f8f9fa; /* Set the background color of the sidebar */
    padding: 20px;
    border-radius: 5px;
  }
  
  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .sidebar ul li {
    margin-bottom: 10px;
  }
  
  .sidebar ul li a {
    color: #333; /* Set the text color of sidebar links */
    text-decoration: none;
  }
  
  .sidebar ul li a:hover {
    color: #555; /* Set the hover color of sidebar links */
  }
  .sidebar img {
    width: 100%; /* Adjust the width as needed */
    border-radius: 5px;
  }
</style>


<script>
  const carouselSlide = document.querySelector('.carousel-slide');
  const images = document.querySelectorAll('.carousel-slide img');
  const nextButton = document.querySelector('.carousel-next');
  const prevButton = document.querySelector('.carousel-prev');
  
  let counter = 1;
  const slideWidth = images[0].clientWidth;
  carouselSlide.style.transform = `translateX(${(-slideWidth * counter)*2}px)`;
  
  // Move to the next slide
  function moveToNextSlide() {
    if (counter >= images.length - 1) {
      counter = 1;
      carouselSlide.style.transition = 'none';
      carouselSlide.style.transform = `translateX(${(-slideWidth * counter)*2}px)`;
    } else {
      counter++;
      carouselSlide.style.transition = 'transform 0.4s ease-in-out';
      carouselSlide.style.transform = `translateX(${(-slideWidth * counter)*2}px)`;
    }
  }
  
  // Move to the previous slide
  function moveToPrevSlide() {
    if (counter <= 0) {
      counter = images.length - 2;
      carouselSlide.style.transition = 'none';
      carouselSlide.style.transform = `translateX(${(-slideWidth * counter)*2}px)`;
    } else {
      counter--;
      carouselSlide.style.transition = 'transform 0.4s ease-in-out';
      carouselSlide.style.transform = `translateX(${(-slideWidth * counter)*2}px)`;
    }
  }
  
  // Autoplay functionality
  let autoplayInterval;
  
  function startAutoplay() {
    autoplayInterval = setInterval(moveToNextSlide, 2000); // Change the interval duration as desired (in milliseconds)
  }
  
  function stopAutoplay() {
    clearInterval(autoplayInterval);
  }
  
  // Event listeners for next and previous buttons
  nextButton.addEventListener('click', () => {
    stopAutoplay();
    moveToNextSlide();
    startAutoplay();
  });
  
  prevButton.addEventListener('click', () => {
    stopAutoplay();
    moveToPrevSlide();
    startAutoplay();
  });
  
  // Start autoplay and handle loop on page load
  startAutoplay();
                  

  const carouselSlide1 = document.querySelector('.carousel-slide1');
  const images1 = document.querySelectorAll('.carousel-slide1 img');
  const nextButton1 = document.querySelector('.carousel-next1');
  const prevButton1 = document.querySelector('.carousel-prev1');
  
  let counter1 = 1;
  const slideWidth1 = images1[0].clientWidth;
  carouselSlide1.style.transform = `translateX(${(-slideWidth1 * counter1)*2}px)`;
  
  // Move to the next slide
  function moveToNextSlide1() {
    if (counter1 >= images1.length - 1) {
      counter1 = 1;
      carouselSlide1.style.transition = 'none';
      carouselSlide1.style.transform = `translateX(${(-slideWidth1 * counter1)*2}px)`;
    } else {
      counter1++;
      carouselSlide1.style.transition = 'transform 0.4s ease-in-out';
      carouselSlide1.style.transform = `translateX(${(-slideWidth1 * counter1)*2}px)`;
    }
  }
  
  // Move to the previous slide
  function moveToPrevSlide1() {
    if (counter1 <= 0) {
      counter1 = images1.length - 2;
      carouselSlide1.style.transition = 'none';
      carouselSlide1.style.transform = `translateX(${(-slideWidth1 * counter1)*2}px)`;
    } else {
      counter--;
      carouselSlide1.style.transition = 'transform 0.4s ease-in-out';
      carouselSlide1.style.transform = `translateX(${(-slideWidth1 * counter1)*2}px)`;
    }
  }
  
  // Autoplay functionality
  let autoplayInterval1;
  
  function startAutoplay1() {
    autoplayInterval1 = setInterval(moveToNextSlide1, 2000); // Change the interval duration as desired (in milliseconds)
  }
  
  function stopAutoplay1() {
    clearInterval1(autoplayInterval1);
  }
  
  // Event listeners for next and previous buttons
  nextButton.addEventListener('click', () => {
    stopAutoplay1();
    moveToNextSlide1();
    startAutoplay1();
  });
  
  prevButton.addEventListener('click', () => {
    stopAutoplay1();
    moveToPrevSlide1();
    startAutoplay1();
  });
  
  // Start autoplay and handle loop on page load
  startAutoplay1();
  </script>              

  
  @endsection
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

