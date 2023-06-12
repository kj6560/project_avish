@extends('site.layouts.site')
@section('content')
<section class="classes">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="class-details">
                    <div class="class">
                        <div class="class-img">
                            <img src="images/event-header.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="class-content">
                            <div class="class-title">
                                <a href="class-details.html">
                                    <h4>Yoga For Beginners</h4>
                                </a>
                            </div>
                            <ul class="details list-unstyled">
                                <li><i class="fa fa-calendar"></i>Mon, Tue</li>
                                <li><i class="fa fa-clock-o"></i>10:00 - 11:00</li>
                            </ul>
                            <div class="class-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</p>
                                <p>Excepteur sint ocacat cupidatat non proi dent sunt in culpa qui officia deserunt.mollit anim id est laborum. sed ut pers piciatis unde omnis iste natus error.sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
                            </div>
                            <div class="class-footer">
                                <div class="class-share">
                                    <h5>Share:</h5>
                                    <ul class="list-unstyled social-media">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="class-sidebar">

                    <div class="sidebar-info">
                        <h4>Register For This Event</h4>
                        <ul class="info-list list-unstyled">
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first name" placeholder="First Name" required>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last name" placeholder="Last Name" required>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email Id" required>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone number" placeholder="Phone Number" required>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <a class="register main-btn" href="#"><span>Register Now</span></a>
                    <div class="sidebar-classes">
                        <h4>Other Events</h4>
                        <div class="class-inner">
                            <div class="class-image">
                                <img class="img-fluid" src="images/classes/2.jpg" alt>
                            </div>
                            <div class="class-info">
                                <h5><a href="#">Balance Body &amp; Mind</a></h5>
                                <p>By: Elina Ekman</p>
                            </div>
                        </div>
                        <div class="class-inner">
                            <div class="class-image">
                                <img class="img-fluid" src="images/classes/3.jpg" alt>
                            </div>
                            <div class="class-info">
                                <h5><a href="#">Yoga Classes for Children</a></h5>
                                <p>By: Razan Smith</p>
                            </div>
                        </div>
                        <div class="class-inner">
                            <div class="class-image">
                                <img class="img-fluid" src="images/classes/4.jpg" alt>
                            </div>
                            <div class="class-info">
                                <h5><a href="#">Increased body awareness</a></h5>
                                <p>By: Lily Garner</p>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-tags">
                        <h4>Tags</h4>
                        <ul class="tags-list list-unstyled">
                            <li>
                                <a href="#">Marathon</a>
                            </li>
                            <li>
                                <a href="#">Running</a>
                            </li>
                            <li>
                                <a href="#">Event</a>
                            </li>
                            <!-- <li>
										<a href="#">fitness</a>
									</li>
									<li>
										<a href="#">yoga tutorials</a>
									</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="events" id="events">
    <div class="container">
        <div class="main-title text-center">
            <h2>OBJECTIVE</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="event">
                    <div class="event-img">
                        <img src="images/events/event-image.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="event">
                    <div class="event-content">
                        <div class="event-title">
                            <a href="event-details.html">
                                <h4>Sports Conclave 2.0 aims</h4>
                            </a>
                        </div>
                        
                        <div class="event-text">
                            <p>To provide a platform for key stakeholders to exchange ideas, share experiences, and discuss strategies for the growth of sports in Bihar. The event seeks to address various aspects such as infrastructure development, athlete training and support, policy reforms, and the overall promotion of sports at the grassroots level. By bringing together experts and enthusiasts, the conclave aims to chart a path towards transforming Bihar into a sporting powerhouse.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="my-btn text-center">
            <a href="event.html" target="_blank" class="main-btn"><span>All Events</span></a>
        </div>
    </div>
</section>
@stop