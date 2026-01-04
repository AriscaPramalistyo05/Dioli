<!doctype html>
<html lang="en">

<head>
    @include('include.style')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#"> <img src="assets/img/logo3.jpg" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto"> <!-- Add me-auto for margin-right auto -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#menu">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#program">Program</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Event
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="blog.html">Event</a>
                                        <a class="dropdown-item" href="#">Program</a>
                                        <a class="dropdown-item" href="elements.html">Menu Spesial</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#kontak">Contact</a>
                                </li>
                            </ul>
                            <div class="menu_btn d-flex align-items-center d-none d-lg-block ml-3">
                                <!-- Add ml-3 for margin-left -->
                                @if (Route::has('login'))
                                    @auth
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" class="btn_1 me-2"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="btn_1 me-2">Login</a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Authentic Taste, Heartfelt Experience</h5>
                            <h1>From Our Kitchen to Your Heart</h1>
                            <p>Dari Dapur Kecil Kami sampai ke Meja Anda: Kenikmatan Kuliner Indonesia yang Menggugah
                                Selera dan Menyentuh Hati</p>
                            <div class="banner_btn">
                                <div class="banner_btn_iner">
                                    <a href="#reservasi" class="btn_2">Pesan <img src="assets/img/icon/left_1.svg"
                                            alt=""></a>
                                </div>
                                <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="popup-youtube video_popup">
                                    <span><img src="assets/img/icon/play.svg" alt=""></span> Watch our
                                    story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!--::exclusive_item_part start::-->
    {{-- <section class="exclusive_item_part blog_item_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Menu Spesial</p>
                        <h2>Our Exclusive Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="assets/img/food_item/food_item_1.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Indian Burger</h3>
                            <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                            <a href="#" class="btn_3">Read More <img src="assets/img/icon/left_2.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="assets/img/food_item/food_item_2.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Cremy Noodles</h3>
                            <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                            <a href="#" class="btn_3">Read More <img src="assets/img/icon/left_2.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="assets/img/food_item/food_item_3.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Honey Meat</h3>
                            <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                            <a href="#" class="btn_3">Read More <img src="assets/img/icon/left_2.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 d-none d-sm-block d-lg-none">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="assets/img/food_item/food_item_1.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <h3>Cremy Noodles</h3>
                            <p>Was brean shed moveth day yielding tree yielding day were female and </p>
                            <a href="#" class="btn_3">Read More <img src="assets/img/icon/left_2.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--::exclusive_item_part end::-->

    <!-- about part start-->
    <section class="about_part" id="about">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-5 offset-lg-1">
                    <div class="about_img">
                        <img src="assets/img/about.png" alt="">
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4">
                    <div class="about_text">
                        <h5>Our History</h5>
                        <h2>Tentang Dioli</h2>
                        <p>Dioli lahir dari semangat dan kecintaan kami terhadap masakan Indonesia, tumbuh dari usaha
                            kecil di rumah dengan cita rasa yang autentik. Kami percaya bahwa lezatnya makanan tidak
                            harus berkompromi dengan keaslian rasa dan kualitas. Dari dapur kecil kami, kami ingin
                            berbagi kenikmatan kuliner Indonesia dengan dunia, menjadikan setiap hidangan Dioli sebagai
                            sebuah pengalaman yang menggugah selera dan menyentuh hati. </p>
                        <br>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Program "Sejuta Rasa, Satu Cerita.</li>
                            <li><i class="bi bi-check-circle"></i> Kemitraan dengan Petani Lokal.</li>
                            <li><i class="bi bi-check-circle"></i> Paket Hadiah Khusus.</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2>Expect The Best</h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                                href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>F
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->

    <!-- food_menu start-->
    <section class="food_menu gray_bg" id="menu">
        @include('menu')
    </section>

    <!-- food_menu part end-->

    <!--::chefs_part start::-->
    {{-- <section class="chefs_part blog_item_section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Team Member</p>
                        <h2>Our Experience Chefs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    use App\Models\Koki;
                    $kokis = Koki::all();

                @endphp
                <div class="row">
                    @foreach ($kokis as $koki)
                        <div class="col-sm-6 col-lg-4">
                            <div class="single_blog_item">
                                <div class="single_blog_img">
                                    <img src="{{ asset('assets/img/team/chefs_1.png') }}" alt="">
                                </div>
                                <div class="single_blog_text text-center">
                                    <h3>{{ $koki->nama }}</h3>
                                    <p>{{ $koki->jabatan }}</p>
                                    <div class="social_icon">
                                        <a href="{{ $koki->facebook }}"> <i class="ti-facebook"></i> </a>
                                        <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                        <a href="#"> <i class="ti-instagram"></i> </a>
                                        <a href="#"> <i class="ti-skype"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section> --}}
    <!--::chefs_part end::-->

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <section id="reservasi">
                        <div class="section_tittle">
                            <p>Pesan</p>
                            <h2>Untuk acara</h2>
                        </div>
                    </section>
                    <div class="regervation_part_iner">
                        <form id="pesanForm" action="{{ route('pesan.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @if (auth()->check())
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="text" class="form-control form-white" placeholder="Name *"
                                            value="{{ auth()->user()->name }}" readonly>
                                    @else
                                        <input type="hidden" name="user_id" value="">
                                        <input type="text" class="form-control form-white" placeholder="Name *"
                                            value="" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    @if (auth()->check())
                                        <input type="email" class="form-control form-white"
                                            placeholder="Email address *" value="{{ auth()->user()->email }}"
                                            readonly>
                                        @else
                                        <input type="email" class="form-control form-white"
                                            placeholder="Email address *" value="" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control form-white" name="phone"
                                        placeholder="Phone number *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="datepicker" type="text" class="form-control form-white"
                                        name="date" placeholder="Date *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="timeInput" class="form-white">Time *</label>
                                    <div class="position-relative">
                                        <input type="time" class="form-control form-white" name="time"
                                            id="timeInput" placeholder="Your Time *" required>
                                        <i class="ti-time" role="right-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control form-white" name="note" id="Textarea" rows="4" placeholder="Your Note *"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="regerv_btn">
                                <button type="submit" class="btn_4">Order</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mt-3">
                    {{-- Maps --}}
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.107110939624!2d111.04687970985682!3d-6.756791166041565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d34005eb24fb%3A0x515537d5f9034f30!2sShofiya%20celullar!5e0!3m2!1sid!2sid!4v1720674002369!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--::regervation_part end::-->

    <!--::review_part start::-->
    {{-- <section class="review_part gray_bg section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Testimonials</p>
                        <h2>Customers Feedback</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11">
                    <div class="client_review_part owl-carousel">
                        <div class="client_review_single media">
                            <div class="client_img align-self-center">
                                <img src="img/client/client_1.png" alt="">
                            </div>
                            <div class="client_review_text media-body">
                                <p>Also made from. Give may saying meat there from heaven it lights face had is
                                    gathered
                                    god dea earth light for life may itself shall whales made they're blessed whales
                                    also made from give
                                    may saying meat. There from heaven it lights face had amazing place</p>
                                <h4>Mosan Cameron, <span>Executive of fedex</span></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--::review_part end::-->

    <!--::exclusive_item_part start::-->
    <section class="blog_item_section blog_section section_padding" id="program">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Artikel Terbaru</p>
                        <h2>Kegiatan/Program Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    use App\Models\Blog;
                    $blogs = Blog::all();
                @endphp
                @foreach ($blogs as $blog)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_blog_item">
                            <div class="single_blog_img">
                                <img src="img/blog/blog_1.png" alt="">
                            </div>
                            <div class="single_blog_text">
                                <div class="date">
                                    <a href="#" class="date_item">{{ $blog->date->format('M d, Y') }}</a>
                                    <a href="#" class="date_item"> <span>#</span> {{ $blog->title }}</a>
                                </div>
                                <h3><a href="{{-- link sosmed --}}">{{ $blog->content }}</a></h3>
                                <a href="#" class="btn_3">Read More <img src="img/icon/left_1.svg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/blog/blog_2.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <div class="date">
                                <a href="#" class="date_item">Apr 06, 2019 </a>
                                <a href="#" class="date_item"> <span>#</span> Food News </a>
                            </div>
                            <h3><a href="blog.html">Adama kind deep gatherin first over fter his great</a></h3>
                            <a href="#" class="btn_3">Read More <img src="img/icon/left_1.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/blog/blog_3.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <div class="date">
                                <a href="#" class="date_item">Apr 06, 2019 </a>
                                <a href="#" class="date_item"> <span>#</span> Food News </a>
                            </div>
                            <h3><a href="blog.html">Adama kind deep gatherin first over fter his great</a></h3>
                            <a href="#" class="btn_3">Read More <img src="img/icon/left_1.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 d-none d-sm-block d-lg-none">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/blog/blog_1.png" alt="">
                        </div>
                        <div class="single_blog_text">
                            <div class="date">
                                <a href="#" class="date_item">Apr 06, 2019 </a>
                                <a href="#" class="date_item"> <span>#</span> Food News </a>
                            </div>
                            <h3><a href="blog.html">Adama kind deep gatherin first over fter his great</a></h3>
                            <a href="#" class="btn_3">Read More <img src="img/icon/left_1.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--::exclusive_item_part end::-->

    <!-- footer part start-->
    @include('include.footer')
    <!-- footer part end-->

    {{-- script part --}}
    @include('include.script')


</body>

</html>
