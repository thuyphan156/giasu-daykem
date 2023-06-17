<!doctype html>
<html lang="en">

<head>
    <title>Trung tâm gia sư - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('client/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/fonts/brand/style.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/aos.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/img/logo.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar light site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-3">
                        <div class="site-logo">
                            <a href="{{ route('client.home') }}"><strong>Trung tâm gia sư</strong></a>
                        </div>
                    </div>

                    <div class="col-9  text-right">

                        <span class="d-inline-block d-lg-none"><a href="#"
                                class=" site-menu-toggle js-menu-toggle py-5 "><span
                                    class="icon-menu h3 text-black"></span></a></span>

                        <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto ">
                                <li class="{{ Route::is('client.home') ? 'active' : '' }}"><a
                                        href="{{ route('client.home') }}" class="nav-link">Trang chủ</a></li>
                                <li class="{{ Route::is('client.introduce') ? 'active' : '' }}"><a href="{{ route('client.introduce') }}" class="nav-link">Giới thiệu</a></li>
                                <li class="{{ Route::is('client.find.teacher') ? 'active' : '' }}"><a href="{{ route('client.find.teacher') }}" class="nav-link">Tìm gia sư</a></li>
                                <li><a href="{{ route('client.contact') }}" class="nav-link">Liên hệ</a></li>
                                @if (!Auth::check())
                                    <li class="{{ Route::is('client.register.teacher') ? 'active' : '' }}"><a href="{{ route('client.register.teacher') }}" class="nav-link">Đăng ký làm gia sư</a></li>
                                    <li class="{{ Route::is('client.show.login') ? 'active' : '' }}"><a href="{{ route('client.show.login') }}" class="nav-link">Đăng nhập</a></li>
                                @else
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="javascript:void(0)" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Xin chào, {{ Auth::user()->name }}</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                <a class="dropdown-item text-dark" href="{{ route('client.logout') }}">Đăng xuất</a>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </header>

        @yield('content')

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="footer-heading mb-4 font-weight-bold">Về chúng tôi</h2>
                        <p>Với nhiều năm kinh nghiệm giảng dạy, Trung tâm gia sư sẽ giúp học sinh có thể cải thiện và nâng cao chất
                            lượng học tập một cách tốt nhất
                        </p>
                        <ul class="list-unstyled">
                            <li><a href="tel:0123456789"><i class="fa-solid fa-phone"></i> 0123456789</a></li>
                            <li><a href="mailto:trungtamgiasu@gmail.com"><i class="fa-solid fa-envelope"></i> trungtamgiasu@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 ml-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="footer-heading mb-4 font-weight-bold">Chi nhánh</h2>
                                <ul class="list-unstyled">
                                    <li><i class="fa-solid fa-location-dot"></i> 1073/51 Cách Mạng Tháng 8, Tân Bình, TPHCM</li>
                                    <li><i class="fa-solid fa-location-dot"></i> ĐH Bình Dương, Thủ Dầu Một, Bình Dương</li>
                                    <li><i class="fa-solid fa-location-dot"></i> ĐH Đồng Nai, TP. Biên Hòa, Đồng Nai</li>
                                    <li><i class="fa-solid fa-location-dot"></i> ĐH Cần Thơ, Ninh Kiều, Cần Thơ</li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="footer-heading mb-4 font-weight-bold">Bản đồ</h2>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1460421.1126934586!2d106.14720751090854!3d10.807888372790318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2sHo%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1677942832278!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('client/js/aos.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="{{ asset('client/js/ajax.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script>
		Stripe.setPublishableKey('pk_test_51JnN53HEueodV3DAJxPIvHgy2bBdP5BmKIlvaUb1WZ64OSUZ9UcsbP2iKXzHZulqcVWvXigwCF6Wsh5Si1Ral20M00Wvg1qjBH');

		var $form = $('#checkout-form');


		$form.submit(function(event) {
		$form.find('button').prop('disabled', true);
		Stripe.card.createToken({
			number: $('#card-number').val(),
			cvc: $('#card-cvc').val(),
			exp_month: $('#card-expiry-month').val(),
			exp_year: $('#card-expiry-year').val()
		}, stripeResponseHandler);
		return false;
		});	

        function stripeResponseHandler(status, response) {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));

            // Submit the form:
            $form.get(0).submit();
        }
	</script>
</body>

</html>
