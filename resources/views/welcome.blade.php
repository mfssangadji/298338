@extends('layouts.app')
@section('title', 'Kota Ternate')
@section('content')
    <!-- LayerSlider  -->
    @include('parts.slider')
    <!-- LayerSlider / End -->

    <!-- 960 Container -->
    <div class="container">

        <!-- Testimonials -->
        <div class="one-third columns" style="width: 100% !important">

            <h3 class="margin-1">Peringatan Dini</h3>
            <!-- Testimonial Rotator -->
            <section class="flexslider testimonial-slider" style="width: 100% !important">
                <ul class="slides" style="width: 100% !important">
                    @foreach($pdce as $p)
                        <li class="testimonial">
                            <a href="#"><div class="testimonials">
                                {{$p->content}}
                            </div></a>
                            <div class="testimonials-bg"></div>
                        </li>
                    @endforeach
                </ul>
            </section>
            <!-- Testomonial Rotator / End -->

        </div>

    </div>
    <!-- 960 Container / End -->

    <!-- 960 Container -->
    <div class="container floated">
        <div class="blank floated">

            <!-- Recent Work Entire -->
            <div class="four columns carousel-intro">

                <section class="entire">
                    <h3>Prakiraan Cuaca</h3>
                    <p align="justify">Data prakiraan cuaca seluruh kabupaten dan kota di Maluku Utara dalam waktu 3 harian.</p>
                </section>

                <div class="carousel-navi">
                    <div id="work-prev" class="arl jcarousel-prev"><i class="icon-chevron-left"></i></div>
                    <div id="work-next" class="arr jcarousel-next"><i class="icon-chevron-right"></i></div>
                </div>
                <div class="clearfix"></div>

            </div>

            <!-- jCarousel -->
            <section class="jcarousel recent-work-jc">
                <ul>
                    <!-- Recent Work Item -->
                    @foreach($forecast as $key => $val)
                        <li class="four columns">
                            <a href="single-project.html" class="portfolio-item">
                                <figure>
                                    <center>
                                    <img src="{{url('uploads/weather/'.strtolower(str_replace(' ', '', $weatherCode[$val['weather']['value']['icon'][$dtime_ext[$key]]]).'-'.$now->format('A')))}}.png" alt="" style="padding: 10px;" />
                                    </center>
                                    <figcaption class="item-description">
                                        <h5>{{$w[$key]}}</h5>
                                        <span>
                                            {{$weatherCode[$val['weather']['value']['icon'][$dtime_ext[$key]]]}} <br>
                                            (Suhu {{$val['t']['value']['C'][$dtime_ext[$key]].' - '.$val['t']['value']['C'][$dtime_ext[$key]+2]}}&#8451;) 
                                        </span>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
            <!-- jCarousel / End -->

        </div>
    </div>
    <!-- 960 Container / End -->

    <!-- 960 Container -->
    <div class="container">
        <!-- Icon Boxes -->
        <section class="icon-box-container">

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-bullhorn"></i>
                    <h3>Cepat & Tepat</h3>
                    <!-- <p>Incredibly clean design provides you powerful way to grow your business.</p> -->
                </article>
            </div>
            <!-- Icon Box End -->

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-magic"></i>
                    <h3>Akurat & Luas</h3>
                    <!-- <p>This theme is responsive, so it will looks awesome on all mobile devices. </p> -->
                </article>
            </div>
            <!-- Icon Box End -->

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-flask"></i>
                    <h3>Mudah Dipahami</h3>
                    <!-- <p>Nevia is ready for retina and looks fantastic on high-resolution displays.</p> -->
                </article>
            </div>
            <!-- Icon Box End -->

        </section>
        <!-- Icon Boxes / End -->
    </div>
    <!-- 960 Container / End -->
@endsection