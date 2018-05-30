@extends('layouts.app')

@section('content')
    <div class="new section4" id="IND">
        <h1 class="ind management">INDUSTRIES</h1>
        <div class="w-container">

            {{--ROW--}}
            <div class="row3 w-row industries">
                @foreach($industries_footer as $key => $item)

                    <?php 

                        $ind_title = strtolower(str_replace(' ', '-', $item->title));
                        $ind_title = strtolower(str_replace('/', '-', $ind_title));
                        $ind_title = strtolower(str_replace('---', '-', $ind_title));


                     ?>
                   

                    <div class="w-col w-col-4 w-col-medium-6 {{'industry-' . $key }}" style="margin-bottom: 14px;">
                        <a href="{{  '/industries/'. $ind_title . '/' . $key  }}">
                            <div class="industriesclo" data-ix="hover">
                                <img class="icon" src="{{$item->icon ? $item->icon : "images/icon1.png"}}" width="41">
                                <div class="ind_text">
                                    {{ $item->title }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br><br><br><br>
            <a class="down w-inline-block" href="#contact">
                <img src="images/down2-01.png" width="153">
            </a>
        </div>
    </div>
@endsection