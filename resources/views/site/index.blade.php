<!DOCTYPE html>

<html lang="en">



<head>

    <!-- Basic Page Needs ================================================== -->

    <meta charset="utf-8">



    <!-- Mobile Specific Metas ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">



    <!-- Site Title -->

    <title>{{env('SITE_NAME')}}</title>



    <!-- CSS

         ================================================== -->

    <!-- Bootstrap -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">



    <!-- FontAwesome -->

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Animation -->

    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- magnific -->

    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- carousel -->

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <!-- isotop -->

    <link rel="stylesheet" href="{{asset('css/isotop.css')}}">

    <!-- ico fonts -->

    <link rel="stylesheet" href="{{asset('css/xsIcon.css')}}">

    <!-- Template styles-->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Responsive styles-->

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      <![endif]-->



</head>

@php
$success = Session::get('success');
$error = Session::get('error');
@endphp

<body>

    <div class="body-inner ">

        <!-- Header start -->

        <header id="header" class="header" style="

    background-color: #5f676c;

">

            <div class="container">

                <nav class="navbar navbar-expand-lg ">

                    <!-- logo-->

                    <a class="navbar-brand" href="/">

                        <img src="{{asset('images/logos/Univ-Logo-black.png')}}" width="100" height="100">

                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>

                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav ml-auto">

                            @guest

                            <li class="header-ticket nav-item">

                                <a class="ticket-btn btn" href="/login">Login

                                </a>

                            </li>

                            @else

                            <li class="header-ticket nav-item">

                                <a class="ticket-btn btn" href="/logout">Logout

                                </a>

                            </li>

                            @endguest

                        </ul>

                    </div>

                </nav>

            </div><!-- container end-->

        </header>

        <!--/ Header end -->



        <!-- banner start-->

        <section class="main-slider owl-carousel">

            <div class="banner-item overlay" style="background-image:url(images/hero_area/banner3.jpg)">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-11 mx-auto">

                            <div class="banner-content-wrap text-center">

                                <img class="title-shap-img" src="{{asset('images/shap/title-white.png')}}" alt="">

                                <p class="banner-desc" style="color:Green;">BIHAR STATE SPORTS AUTHORITY</p>

                                <h1 class="banner-title">Sports conclave-2.0</h1>



                                <p class="banner-desc">

                                    DATE: 19 & 20 MAY 2023 | LOCATION: GYAN BHAWAN, PATNA

                                </p>

                                <!-- Countdown end -->

                                <div class="banner-btn">

                                    <a href="#" class="btn fill">View Event</a>

                                </div>



                            </div>

                            <!-- Banner content wrap end -->

                        </div><!-- col end-->



                    </div><!-- row end-->

                </div>

                <!-- Container end -->

            </div><!-- banner item end-->

            <!-- <div class="banner-item overlay" style="background-image:url(images/hero_area/banner4.jpg)">

            <div class="container">

               <div class="row">

                  <div class="col-lg-10 mx-auto">

                     <div class="banner-content-wrap text-center">

                        <img class="title-shap-img" src="images/shap/title-white.png" alt="">

                        <p class="banner-info">5 to 7 June 2019, Waterfront Hotel, London</p>

                        <h1 class="banner-title">digital thinkers Meet up</h1>



                        <p class="banner-desc">

                           How you transform your business as technology, consumer, habits industry dynamic

                           s change? Find out from those leading the charge.

                        </p> -->

            <!-- Countdown end -->

            <!--  <div class="banner-btn">

                        

                           <a href="#" class="btn fill">View Event</a>

                        </div>



                     </div> -->

            <!-- Banner content wrap end -->

    </div><!-- col end-->



    </div><!-- row end-->

    </div>

    <!-- Container end -->

    </div><!-- banner item end-->

    <!-- <div class="banner-item overlay" style="background-image:url(images/hero_area/banner5.jpg)">

            <div class="container">

               <div class="row">

                  <div class="col-lg-10 mx-auto">

                     <div class="banner-content-wrap text-center">

                        <img class="title-shap-img" src="images/shap/title-white.png" alt="">

                        <p class="banner-info">5 to 7 June 2019, Waterfront Hotel, London</p>

                        <h1 class="banner-title">digital thinkers Meet up</h1>



                        <p class="banner-desc">

                           How you transform your business as technology, consumer, habits industry dynamic

                           s change? Find out from those leading the charge.

                        </p> -->

    <!-- Countdown end -->

    <!--  <div class="banner-btn">

                           

                           <a href="#" class="btn fill">View Event</a>

                        </div>



                     </div> -->

    <!-- Banner content wrap end -->

    </div><!-- col end-->



    </div><!-- row end-->

    </div>

    <!-- Container end -->

    </div><!-- banner item end-->



    </section>







    <!-- ts intro start -->

    <section class="ts-intro-content">

        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <h2 class="column-title">

                        <span>Introduction:</span>

                        BIHAR STATE SPORTS AUTHORITY

                    </h2>

                    <div class="intro-content-text">

                        <p>

                            The Bihar State Sports Authority is proud to announce its highly anticipated event, Sports Conclave 2.0. This grand gathering will bring together sports enthusiasts, athletes, coaches, and stakeholders from across Bihar to discuss and promote the development of sports in the state. With a focus on fostering talent, enhancing infrastructure, and nurturing a sports culture, Sports Conclave 2.0 aims to create a roadmap for the future of sports in Bihar.

                        </p>

                        <a href="http://bpsm.bihar.gov.in/">www.bpsm.bihar.gov.in</a>

                    </div><!-- single intro text end-->

                </div><!-- col end-->

                @guest
                <div class="col-lg-6">
                    <div class="intro-content-img">
                        <a href="/login"><img src="{{asset('images/img.jpg')}}" alt=""></a>
                    </div>
                </div>
                @else
                <div class="col-lg-6">

                    <div class="intro-content-img">

                        <iframe width="550" height="300" src="https://www.youtube.com/embed/ThiCMd5kGbE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>

                </div><!-- col end-->
                @endguest
            </div><!-- row end-->

        </div><!-- container end-->

    </section>

    <!-- ts intro end-->







    <!-- ts experience start-->

    <section id="ts-experiences" class="ts-experiences">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-6 no-padding">

                    <div class="exp-img" style="background-image:url(images/cta_img.png); height: 624px;">

                    </div>

                </div><!-- col end-->

                <div class="col-lg-6 no-padding align-self-center">

                    <div class="ts-exp-wrap">

                        <div class="ts-exp-content">

                            <h2 class="column-title">

                                <span>Objective:</span>

                                Sports Conclave 2.0 aims

                            </h2>

                            <p>

                                To provide a platform for key stakeholders to exchange ideas, share experiences, and discuss strategies for the growth of sports in Bihar. The event seeks to address various aspects such as infrastructure development, athlete training and support, policy reforms, and the overall promotion of sports at the grassroots level. By bringing together experts and enthusiasts, the conclave aims to chart a path towards transforming Bihar into a sporting powerhouse.

                            </p>

                        </div>

                    </div>



                </div><!-- col end-->

            </div><!-- row end-->

        </div><!-- container fluid end-->

    </section>

    <!-- ts experience end-->











    <!-- ts footer area start-->

    <div class="footer-area">



        <!-- ts-book-seat start-->

        <section class="ts-book-seat" style="background-image: url(images/book_seat_img.jpg)">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8 mx-auto">

                        <div class="book-seat-content text-center mb-70">

                            <h2 class="section-title white">

                                ABOUT UNIV SPORTA TECH<br><br>

                                <span>Derived from UNIVERSE, "UNIV" stands for one-stop solution to create a profitable ecosystem for Sports,Gaming,Media & Entertainment Ventures.</span>

                            </h2>

                            <!-- <a href="#" class="btn">Buy Ticket</a> -->

                        </div><!-- book seat end-->

                    </div><!-- col end-->



                </div><!-- row end-->

                <div class="ts-footer-newsletter">

                    <div class="ts-newsletter" style="background-image: url(images/shap/subscribe_pattern.png)">

                        <div class="row">

                            <div class="col-lg-6 mx-auto">

                                <div class="ts-newsletter-content">

                                    <h2 class="section-title">

                                        <span>sUBSCRIBE for updates</span>

                                        Intrested in our future events?

                                    </h2>

                                </div>

                                <div class="newsletter-form">

                                    <form action="/subscribe" method="post" class="media align-items-end">
                                        @csrf
                                        <div class="email-form-group media-body">

                                            <input type="email" name="email" id="newsletter-form-email" class="form-control" placeholder="Your Email" autocomplete="off" required="">

                                        </div>

                                        <div class="d-flex ts-submit-btn">

                                            <button class="btn">Subscribe</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- container end-->

        </section>

        <!-- book seat  end-->



        <!-- footer start-->

        <footer class="ts-footer">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8 mx-auto">

                        <div class="ts-footer-social text-center mb-30">

                            <ul>

                                <li>

                                    <a href="{{env('FACEBOOK_LINK')}}"><i class="fa fa-facebook"></i></a>

                                </li>

                                <li>

                                    <a href="{{env('TWITTER_LINK')}}"><i class="fa fa-twitter"></i></a>

                                </li>

                                <li>

                                    <a href="{{env('GOOGLE_LINK')}}"><i class="fa fa-google-plus"></i></a>

                                </li>

                                <li>

                                    <a href="{{env('LINKEDIN_LINK')}}"><i class="fa fa-linkedin"></i></a>

                                </li>

                                <li>

                                    <a href="{{env('INSTAGRAM_LINK')}}"><i class="fa fa-instagram"></i></a>

                                </li>

                            </ul>

                        </div>

                        <!-- footer social end-->

                        <!-- <div class="footer-menu text-center mb-25">

                        <ul>

                           <li><a href="#">About Eventime</a></li>

                           <li><a href="#">Blog</a></li>

                           <li><a href="#">Contact</a></li>

                           <li><a href="#">Tickets</a></li>

                           <li><a href="#">Venue</a></li>

                        </ul>

                     </div> --><!-- footer menu end-->

                        <div class="copyright-text text-center">

                            <p>Copyright © 2023 <a href="https://www.infinityxlab.com"> Infinityxlab.</a> All Rights Reserved.</p>

                        </div>

                    </div>

                </div>

            </div>

        </footer>

        <!-- footer end-->



        <div class="BackTo">

            <a href="#" class="fa fa-angle-up" aria-hidden="true"></a>

        </div>

    </div>

    <!-- ts footer area end-->









    <!-- Javascript Files

            ================================================== -->

    <!-- initialize jQuery Library -->

    <script src="{{asset('js/jquery.js')}}"></script>



    <script src="{{asset('js/popper.min.js')}}"></script>

    <!-- Bootstrap jQuery -->

    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Counter -->

    <script src="{{asset('js/jquery.appear.min.js')}}"></script>

    <!-- Countdown -->

    <script src="{{asset('js/jquery.jCounter.js')}}"></script>

    <!-- magnific-popup -->

    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

    <!-- carousel -->

    <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <!-- Waypoints -->

    <script src="{{asset('js/wow.min.js')}}"></script>

    <!-- isotop -->

    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>



    <!-- Template custom -->

    <script src="{{asset('js/main.js')}}"></script>



    </div>

    <!-- Body inner end -->

</body>

<script>
    var success = "{{!empty($success)?$success:'NA'}}";
    var error = "{{!empty($error)?$error:'NA'}}";
    if (success != 'NA') {
        Swal.fire({
            title: 'Emailer Subscribed',
            text: success,
            icon: 'success',
            confirmButtonText: 'Okay',

        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/';
            }
        })
    }
    if (error != 'NA') {
        Swal.fire({
            title: 'Subscription Failed!',
            text: error,
            icon: 'error',
            confirmButtonText: 'Okay',

        });
    }
</script>

</html>