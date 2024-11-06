<?php
include("header.php");
?> 
            <!-- iqoniq Mina Banner Start-->       
            <div class="mg_hotel_banner">
                <div class="mg_slider1">
                    <div>
                        <figure>
                            <img src="extra-images/banner1.jpg" alt=""/>
                        </figure>
                    </div>
                    <div>
                        <figure>
                            <img src="extra-images/banner2.jpg" alt=""/>
                        </figure>
                    </div>
                    <div>
                        <figure>
                            <img src="extra-images/banner3.jpg" alt=""/>
                        </figure>
                    </div>
                </div>
                <!-- iqoniq Search Wrapper Start-->
                <div class="search_wraper">
                    <div class="container">
                        <div class="search_one absolute">
                            <!-- Nav tabs Start -->
                            <ul class="mg_hotel_search" role="tablist">
                                <li role="presentation" class="active"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Hotels</a></li>
                                <li role="presentation"><a href="#rental" aria-controls="rental" role="tab" data-toggle="tab">VACATION RENTALS</a></li>
                                <li role="presentation"><a href="#todo" aria-controls="todo" role="tab" data-toggle="tab">THINGS TO DO</a></li>
                                <li role="presentation"><a href="#restaurante" aria-controls="restaurante" role="tab" data-toggle="tab">RESTAURANTS</a></li> 
                                <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">FLIGHTS</a></li>
                            </ul>
                            <!-- Nav tabs End -->
                            <!-- Tab panes Start -->
                            <div class="tab-content">
                                <!-- Tabs Pane Start -->
                                <div role="tabpanel" class="tab-pane active" id="hotels">
                                    <!-- Search Start -->
                                    <div class="mg_search_tab">
                                        <div class="row">
                                            <!-- Input Field Start -->
                                            <div class="col-md-6 col-sm-6">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="Type Hotel Name here...">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <select class="mg_selectric">
                                                        <option>1 Room</option>
                                                        <option>2 Rooms</option>
                                                        <option>3 Rooms</option>
                                                        <option>4 Rooms</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <select class="mg_selectric">
                                                        <option>1 Person</option>
                                                        <option>2 Persons</option>
                                                        <option>3 Persons</option>
                                                        <option>4 Persons</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="rq-check-in-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">Check In</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month"></span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check in</span>
                                                            <input type="hidden" class="kode-checkin-date" name="date_in" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="rq-check-out-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">24</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month">sep</span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check out</span>
                                                            <input type="hidden" class="kode-checkout-date"  name="date_out" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check in" class="time_picker">
                                                        <input id="rq-check-in-time" class="timepicker" placeholder="Time" name="time_in" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check out" class="time_picker">
                                                        <input id="rq-check-out-time" class="timepicker" placeholder="Time" name="time_out" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <button class="mg_btn1"><i class="fa fa-search"></i>Find Hotel</button>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                                <!-- Tabs Pane End -->
                                <div role="tabpanel" class="tab-pane" id="rental">
                                    <!-- Search Start -->
                                    <div class="mg_search_tab">
                                        <div class="row">
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="Where do you want to go?">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="vr-check-in-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">Check In</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month"></span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check in</span>
                                                            <input type="hidden" class="kode-checkin-date" name="date_in" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="vr-check-out-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">24</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month">sep</span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check out</span>
                                                            <input type="hidden" class="kode-checkout-date"  name="date_out" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check in" class="time_picker">
                                                        <input id="vr-check-in-time" class="timepicker" placeholder="Time" name="time_in" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check out" class="time_picker">
                                                        <input id="vr-check-out-time" class="timepicker" placeholder="Time" name="time_out" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <button class="mg_btn1"><i class="fa fa-search"></i>Find vacation rentals</button>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="todo">
                                    <!-- Search Start -->
                                    <div class="mg_search_tab">
                                        <div class="row">
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="Search a destination, attraction, or activity">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <button class="mg_btn1"><i class="fa fa-search"></i>Find things to do</button>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="restaurante">
                                    <!-- Search Start -->
                                    <div class="mg_search_tab">
                                        <div class="row">
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="City or restaurant name">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <button class="mg_btn1"><i class="fa fa-search"></i>Find restaurants</button>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="flight">
                                    <!-- Search Start -->
                                    <div class="mg_search_tab">
                                        <div class="row">
                                            <!-- Input Field Start -->
                                            <div class="col-md-6 col-sm-6">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="City or Airport">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <input type="text" placeholder="City or Airport">
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <select class="mg_selectric">
                                                        <option>1 Person economy</option>
                                                        <option>2 Persons economy</option>
                                                        <option>3 Persons economy</option>
                                                        <option>4 Persons economy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->

                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check in" class="time_picker">
                                                        <input id="fl-check-in-time" class="timepicker" placeholder="Time" name="time_in" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <!-- TIME WRAP START-->
                                                    <div title="check out" class="time_picker">
                                                        <input id="fl-check-out-time" class="timepicker" placeholder="Time" name="time_out" />
                                                    </div>
                                                    <!--TIME WRAP END-->
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="fl-check-in-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">Check In</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month"></span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check in</span>
                                                            <input type="hidden" class="kode-checkin-date" name="date_in" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-3 col-sm-3">
                                                <div class="mg_input_1">
                                                    <div class="rq-check-inout-wrapper rq-check-in-wrapper" id="fl-check-out-single">
                                                        <div class="rq-check-inout-single-wrapper">
                                                            <span class="rq-single-date">24</span>
                                                            <span class="rq-month-year">
                                                                <span class="rq-single-month">sep</span>
                                                                <span class="rq-single-year"></span>
                                                            </span>
                                                            <span>check out</span>
                                                            <input type="hidden" class="kode-checkout-date"  name="date_out" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                            <!-- Input Field Start -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="mg_input_1">
                                                    <button class="mg_btn1"><i class="fa fa-search"></i>Find Flight</button>
                                                </div>
                                            </div>
                                            <!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                            </div>
                            <!-- Tab panes End -->
                        </div>
                    </div>
                </div>
                <!-- iqoniq Search Wrapper End-->
            </div>
            <!-- iqoniq Mina Banner End-->  
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>What are you in the Mood for.?</h6>
                            <h4>Book hotels in top destinations</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Destination Start -->
                        <div class="mg_hotel_destination_tab">
                            <!-- Nav tabs Start -->
                            <ul class="mg_hotel_nav2" role="tablist">
                                <li role="presentation" class="active"><a href="#worldwide" aria-controls="worldwide" role="tab" data-toggle="tab">Worldwide</a></li>
                                <li role="presentation"><a href="#usa" aria-controls="usa" role="tab" data-toggle="tab">USA & Canada</a></li>
                                <li role="presentation"><a href="#mexico" aria-controls="mexico" role="tab" data-toggle="tab">Mexico & Caribbean </a></li>
                                <li role="presentation"><a href="#central" aria-controls="central" role="tab" data-toggle="tab">Central & South America </a></li>
                                <li role="presentation"><a href="#europe" aria-controls="europe" role="tab" data-toggle="tab">Europe</a></li>
                                <li role="presentation"><a href="#asia" aria-controls="asia" role="tab" data-toggle="tab">Asia</a></li>
                                <li role="presentation"><a href="#elsewhere" aria-controls="elsewhere" role="tab" data-toggle="tab">Elsewhere</a></li>
                            </ul>
                            <!-- Nav tabs End -->
                            <!-- Tab panes Start -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="worldwide">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination11.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">London</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination12.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Thailand</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination13.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">France</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination14.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Dubai UAE</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination15.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Germany</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/destination16.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Cyprus</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="usa">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">New York City</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Maui, Hawaii</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Island of Hawaii</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Oahu, Hawaii</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Las Vegas, Nevada</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/usa6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Orlando, Florida</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="mexico">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Jamaica</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">St. Maarten-St</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Grand Cayman</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Puerto Rico</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Barbados</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/mexico6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Aruba</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="central">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Rio de Janeiro</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Cusco, Peru</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Buenos Aires</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Sao Paulo, Brazil</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Urubamba, Peru</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/central6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Jijoca , Brazil</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>                                
                                <div role="tabpanel" class="tab-pane" id="europe">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Rio de Janeiro, Brazil</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Cusco, Peru</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Buenos Aires</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Sao Paulo, Brazil</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Urubamba, Peru</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/europe6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Jijoca, Brazil</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="asia">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Bali, Indonesia</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Siem Reap, Cambodia</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Phuket, Thailand</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Hoi An, Vietnam</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Kathmandu, Nepal</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/asia6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Hanoi, Vietnam</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="elsewhere">
                                    <!-- Destination Tab Wrap Start -->
                                    <div class="mg_hotel_destination_wrapper">
                                        <div class="row">
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere1.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Excellence Mujeres</a></h5>
                                                            <a class="no_hotel" href="#">1500 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere2.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Ikos Resorts</a></h5>
                                                            <a class="no_hotel" href="#">1206 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere3.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Tamassa</a></h5>
                                                            <a class="no_hotel" href="#">1476 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:70%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere4.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Kurumba Maldives</a></h5>
                                                            <a class="no_hotel" href="#">156 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere5.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Grand Velas Riviera</a></h5>
                                                            <a class="no_hotel" href="#">126 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:50%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                            <!-- Hotel Destination Start -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="mg_hotel_destination fancy-overlay">
                                                    <figure>
                                                        <img src="extra-images/elsewhere6.jpg" alt=""/>
                                                        <figcaption>
                                                            <a class="view_btn" href="#">view deal</a>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="text">
                                                        <div class="mg_destination_hd">
                                                            <h5><a href="#">Ikos Oceania</a></h5>
                                                            <a class="no_hotel" href="#">1996 Hotels</a>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Hotel 41</p>
                                                            <div class="rating_down">
                                                                <div class="rating_up" style="width:40%;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="mg_destination_review">
                                                            <p>Egerton House Hotel</p>
                                                            <div class="iqoniq_rating">
                                                                <div class="rating_down">
                                                                    <div class="rating_up" style="width:40%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Hotel Destination End -->
                                        </div>
                                    </div>
                                    <!-- Destination Tab Wrap End -->
                                </div>
                            </div>
                            <!-- Tab panes End -->
                        </div>
                        <!-- Destination End -->
                    </div>
                </section>
                <!-- Why Chooses us Section Start -->
                <section class="why_chooseus">
                    <div class="container-fluid">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>Chosen by Millions of Travelers</h6>
                            <h4>Why choose iqoniq Travel</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- Chooseus Slider Start -->
                            <div class="chooseus_slider">
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_1.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Booking</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_2.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Ticket Ordering</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_3.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">handpicked hotels</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_4.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">rent a car</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_5.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">dance club</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_6.jpg" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Booking</a></h5>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proi auctor aliquet. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                            </div>
                            <!-- Chooseus Slider Ens -->
                        </div>
                    </div>
                </section>
                <!-- Why Chooses us Section End -->
                <!-- Destination Section Start -->
                <section class="mg_destination_bg">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>The Very Best of Travel, Chosen by Millions of Travelers</h6>
                            <h4>Travelers' Choice Award Winners</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination1.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Hotels</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination2.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Islands</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination3.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">All-inclusive resorts</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination4.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Attractions</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_theme_logo">
                                    <figure>
                                        <a href="#"><img src="images/web_logo.png" alt=""></a>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination5.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Landmarks</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination7.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Resturants</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination8.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Beach</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                            <!-- Hotel Destination Start -->
                            <div class="col-md-4 col-sm-4">
                                <div class="mg_hotel_destination fancy-overlay">
                                    <figure>
                                        <img src="extra-images/destination6.jpg" alt=""/>
                                        <figcaption>
                                            <a class="view_btn" href="#">Destinations</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!-- Hotel Destination End -->
                        </div>
                    </div>
                </section>
                <!-- Destination Section End -->
                <!-- Services Section Start -->
                <section>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Know More About Hotel</h6>
                            <h4>See How it works?</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-bus blue-icon"></i>
                                    <h5><a href="#">Transpotation</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-sedan-car-front pink-icon"></i>
                                    <h5><a href="#">Rent a car</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-house orange-icon"></i>
                                    <h5><a href="#">Accomodation</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-cooker skyblue-icon"></i>
                                    <h5><a href="#">restaurant</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-restaurant lightred-icon"></i>
                                    <h5><a href="#">shopping centers</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                            <!-- iqoniq Travel Services Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_services">
                                    <i class="icon-ferris-wheel lightgreen-icon"></i>
                                    <h5><a href="#">Attractions</a></h5>
                                    <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                    <a class="mg_btn1" href="#">More</a>
                                </div>
                            </div>
                            <!-- iqoniq Travel Services End -->
                        </div>
                    </div>
                </section>
                <!-- Services Section End -->
                <!-- Call to Action Section Start-->
                <section class="mg_travelplan">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>Create a Custom Plan based on your Taste</h6>
                            <h4>Start making your Travel Plans</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Caption Start -->
                        <div class="mg_plan_caption">
                            <p>ducate, aid, criteria catalyst John Lennon. Life-saving diversity necessities elevate worldwide carbon rights empowerment. Pursue these aspirations leverage, accessibility UNICEF, reduce child mortality collaborative cities safeguards. Informal economies non-partisan; evolution transformative climate change local benefit.</p>
                            <a class="mg_btn1" href="#">Creat a package</a>
                        </div>
                        <!-- Caption End -->
                    </div>
                </section>
                <!-- Call to Action Section End-->
                <!-- Masonry Gallery Section Start-->
                <section class="gray-bg">
                    <div class="container-fluid">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>Photo gallery</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Masonry Grid Start -->
                        <div class="masonry-2 grid">
                            <div class="row masonry masonryFlyIn">
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height100 green">
                                        <a href="#"><span>Nature & Adventure</span></a>
                                    </h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/1.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/2.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/3.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130 green"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/4.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/5.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130 pink"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/6.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130"><a href="#">Nature sss& Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/7.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/8.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/9.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/10.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height184 peach"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                            </div>
                        </div>
                        <!-- Masonry Grid Start -->
                    </div>
                </section>
                <!-- Masonry Gallery Section End-->
                <!-- Blog Section Start-->
                <section>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>Our Latest Blog</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium1.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium2.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 hidden-sm">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium3.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                        </div>
                    </div>
                </section>
                <!-- Blog Section End-->
                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>flight information</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <!-- iqoniq Pricing Table Start -->
                                <div class="mg_pricing fancy-overlay">
                                    <span class="fa fa-plane"></span>
                                    <div class="thumb">
                                        <img src="extra-images/price1.jpg" alt="">
                                        <div class="caption">
                                            <div class="rating_down">
                                                <div class="rating_up" style="width:50%;"></div>
                                            </div>
                                            <div class="clear"></div>
                                            <p>Starting from</p>
                                            <strong>$559</strong>
                                            <h6>london</h6>
                                            <b>30 Places</b>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">Air Flight</a></h6>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                        <a class="mg_btn1" href="#">Explore Now</a>
                                    </div>
                                </div>
                                <!-- iqoniq Pricing Table End -->
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <!-- iqoniq Pricing Table Start -->
                                <div class="mg_pricing fancy-overlay">
                                    <span class="fa fa-plane"></span>
                                    <div class="thumb">
                                        <img src="extra-images/price2.jpg" alt="">
                                        <div class="caption">
                                            <div class="rating_down">
                                                <div class="rating_up" style="width:50%;"></div>
                                            </div>
                                            <div class="clear"></div>
                                            <p>Starting from</p>
                                            <strong>$666</strong>
                                            <h6>cape town</h6>
                                            <b>10 Places</b>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">Go ways </a></h6>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                        <a class="mg_btn1" href="#">Explore Now</a>
                                    </div>
                                </div>
                                <!-- iqoniq Pricing Table End -->
                            </div>
                            <div class="col-md-4 hidden-sm">
                                <!-- iqoniq Pricing Table Start -->
                                <div class="mg_pricing fancy-overlay">
                                    <span class="fa fa-plane"></span>
                                    <div class="thumb">
                                        <img src="extra-images/price3.jpg" alt="">
                                        <div class="caption">
                                            <div class="rating_down">
                                                <div class="rating_up" style="width:50%;"></div>
                                            </div>
                                            <div class="clear"></div>
                                            <p>Starting from</p>
                                            <strong>$999</strong>
                                            <h6>los angeles</h6>
                                            <b>15 Places</b>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">flightbus </a></h6>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
                                        <a class="mg_btn1" href="#">Explore Now</a>
                                    </div>
                                </div>
                                <!-- iqoniq Pricing Table End -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Pricing Table Section End-->
                <!-- Bottom Bar Start-->
                <div class="mg_bottom_bar">
                    <div class="container">
                        <div class="text">
                            <h6>Submit newsletters</h6>
                            <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy sanctus est Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- Input Start-->
                        <div class="mg_input_1">
                            <input placeholder="Your E-mail ID" type="text">
                            <label class="search_icon"><input type="submit"></label>
                        </div>
                        <!-- Input End-->
                    </div>
                </div>
                <!-- Bottom Bar End-->
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?> 
