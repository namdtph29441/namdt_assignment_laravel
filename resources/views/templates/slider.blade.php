@php

    $banner = \App\Models\Imgbanner::all();
@endphp
<section class="slider_section slider_s_two mb-60 mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3 col-md-12">
                <div class="swiper-container gallery-top">
                    <div class="slider_area swiper-wrapper">
                        @foreach($banner as $b)
                        <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="{{ $b->url?''.Storage::url($b->url):'http://placehold.it/100x100' }}">
{{--                            <div class="slider_content">--}}
{{--                                <h3>new collection</h3>--}}
{{--                                <h1>new collection <br> sport clothes for mens</h1>--}}
{{--                                <p>discount <span> -30% off</span> this week</p>--}}
{{--                                <a class="button" href="shop.html">DISCOVER NOW</a>--}}
{{--                            </div>--}}
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->

                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        @foreach($banner as $b)
                        <div class="swiper-slide">
                            {{$b->name}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
