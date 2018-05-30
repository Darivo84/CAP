@extends('layouts.app')

@section('content')


    <section class="section_services">
        <header class="section_news_header">
            <h1>SERVICES</h1>
        </header>

        <div class="services_block">
            <div class="container" style="text-align: center !important;">

                @foreach($service_categories as $key => $category)
                    <?php $service_name = strtolower(str_replace(' ', '-', $category->name)); ?>
                    <a href="{{ route('get_service_slider',[$service_name, $slider_link])  }}" >
                        <div class="services_single {{$colours[ $key]}}">
                            <p>{{$category->name}}</p>
                        </div>
                    </a>
            @endforeach


            </div>
        </div>
    </section>

@endsection