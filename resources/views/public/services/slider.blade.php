@extends('layouts.app')
@section('content')


    <section class="section_services">
        <header class="section_news_header">
            <h1>SERVICES</h1>
        </header>

        <div class="services_container">
            <ul class="bxslider">
                @foreach($services as $service)
                    <li class="service">
                        <div class="container_small">
                            <div class="service_content">
                                <h3>{{ $selected_cat->name . ' - '  }}{{$service->title}}</h3>
                                <p style="font-weight: 600">{{$service->subtitle}}</p>
                                {!!$service->description!!}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="contact_row">
            <a href="{{route('services_home')}}" class="btn_ghost">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back To Services
            </a>
        </div>

        @if($articles->count() > 0)
            <div class="related_articles">
                <div class="container">
                    <div class="row">
                        <header>
                            <h4 class="padding-left">RELATED ARTICLES</h4>
                        </header>
                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <a href="{{route('news-single', [$article->title, $article->id])}}" class="service_articles">
                                    <img src="{{$article->cover_image}}" alt="">
                                    <h4> {{$article->title}}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>


    <script>
        $(document).ready(function () {
            var bx_text_slider = $('.bxslider').bxSlider({
                adaptiveHeight: true
            });

            bx_text_slider.goToSlide({{$key}});
        });
    </script>
@endsection