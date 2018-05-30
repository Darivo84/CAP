@extends('layouts.app')

@section('content')
    <section class="section_services">
        <header class="section_news_header">
            <h1 style="width: 230px;">INDUSTRIES</h1>
        </header>

        <div class="services_container">
            <ul class="bxslider">
                @foreach($industries as $industry)
                    <li class="service">
                        <div class="container_small">
                            <div class="service_content">
                                <div class="industry_icon" style="">
                                     <img class="icon" src="{{$industry->icon ? $industry->icon : "images/icon1.png"}}" width="41">
                                </div>
                                <h3 style="text-align: center;font-size: 22px;padding:10px;margin-top: 0;">{{$industry->title}}</h3>
                                {!!$industry->description!!}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="contact_row">
            <a href="{{route('industries')}}" class="btn_ghost">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back To Industries
            </a>
        </div>

    </section>
    <script>
        $(document).ready(function () {

            $link = "<?php echo $link;?>";

            var bx_text_slider = $('.bxslider').bxSlider({
                adaptiveHeight: true
            });

            var pp = "<?php echo Request::getHost();?>"
            
            if(window.location == "http://"+pp+'/industries/trusts/0') {
                slider.goToSlide(1); // Go to slide number 8 that is "About" slide.
            }else{
                bx_text_slider.goToSlide($link);
            } //
        });
    </script>
@endsection