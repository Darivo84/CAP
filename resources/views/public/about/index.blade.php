@extends('layouts.app')

@section('content')

    <div class="section1 section-about-us" id="home"><img class="imghome"
                                                          src="images/depositphotos_21186915-Business-partners-discussing-documents.jpg">
        <div class="divsect1">
            <div style="padding-top: 40px;">
                <h1 class="management">ABOUT US</h1>
                <div>
                    <div class="row w-row">
                        <div class="w-col w-col-12 about-us-inner">
                            {!! $about_us->description !!}
                        </div>
                        {{--<ul class="bxslider">

                            <div class="w-col w-col-12 about-us-inner">
                                <p>Lorem ipsum dolor sit amet, ea nec viris tation quodsi, pro cibo percipitur eu, ut
                                   nulla iusto invidunt
                                   mea. Et sea doctus iisque, facete necessitatibus ea mei, minim intellegebat id per.
                                   Pro in
                                   simul pertinacia. In ius error laudem, no nonumy consequuntur nec.
                                </p>
                                <p> Lorem ipsum dolor sit amet, ea nec viris tation quodsi, pro cibo percipitur eu, ut
                                    nulla iusto invidunt
                                    mea. Et sea doctus iisque, facete necessitatibus ea mei, minim intellegebat id per.
                                    Pro in
                                    simul pertinacia. In ius error laudem, no nonumy consequuntur nec.</p>
                                <p>
                                    Lorem ipsum dolor sit amet, ea nec viris tation quodsi, pro cibo percipitur eu, ut
                                    nulla iusto invidunt
                                    mea. Et sea doctus iisque, facete necessitatibus ea mei, minim intellegebat id per.
                                    Pro in
                                    simul pertinacia. In ius error laudem, no nonumy consequuntur nec.</p>
                            </div>
                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <br><br>
        <br><br>
        <a class="down w-inline-block" href="#section2"><img src="images/down-01.png" width="153">
        </a>
    </div>

    <div class="section-2" id="section2">
        <h1 class="management">MANAGEMENT</h1>
        <div class="slider w-slider" data-animation="slide" data-duration="500" data-infinite="1">
            <div class="mask w-slider-mask">
                @foreach($team as $team_member)

                    <div class=" w-slide">
                        <div class="managementdiv">
                            <div class="w-row">
                                <div class="colo w-col w-col-3"><img class="profile"
                                                                     src="{{ $team_member->profile_picture }}">
                                </div>
                                <div class="text w-col w-col-9"><img class="face"
                                                                     src="{{ $team_member->profile_picture }}">
                                    <h1 class="director">{{ $team_member->first_name . ' ' .  $team_member->last_name}}  <small style="color: #142044;">- {{$team_member->title}}</small></h1>
                                    <p class="director_description">
                                        <span class="experience">Experience
                                            <br xmlns="http://www.w3.org/1999/xhtml">
                                        </span>
                                        <div class="team_desc_preview">{!! str_limit($team_member->experience, 200 )!!}</div>
                                          <div class="team_desc_overlay team_disabled">
                                        {!! $team_member->experience !!}
                                    </div>
                                        <a href="javascript:void(0)" class="team_desc_trigger">Read More</a>
                                    </p>

                                  

                                    <p class="director_description qual">
                                        <span class="experience">Qualifications
                                            <br xmlns="http://www.w3.org/1999/xhtml">
                                        </span>
                                        {!! $team_member->qualifications !!}
                                    </p>

                                    <p class="director_description qual">
                                        <span class="experience">Articles
                                            <br xmlns="http://www.w3.org/1999/xhtml">
                                        </span>

                                        @foreach($team_articles[$team_member->id] as $article)
                                           <?php 
                                           $article_title = strtolower(str_replace(' ', '-', $article->title)); 
                                               $article_title = strtolower(str_replace('?', '', $article_title));
                                           ?>
                                            <a href="{{route('news-single', [$article_title, $article->id])}}" style="color: #199b99;">{{$article->title}}</a>,
                                        @endforeach
                                    </p>

                                    <p class="director_description numbers qual w-clearfix">{!! $team_member->tel !!}
                                        <span class="emailright">{!! $team_member->email !!}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="w-slider-arrow-left">
                <div class="ar w-icon-slider-left"></div>
            </div>
            <div class="arrow w-slider-arrow-right">
                <div class="ar w-icon-slider-right"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.bxslider').bxSlider();
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.team_desc_trigger').on('click', function () {

                if($('.team_desc_overlay').css('display') == 'none'){

                    $('.team_desc_preview').css('display', 'none');
                    $('.team_desc_overlay').css('display', 'block');
                }else{
                     $('.team_desc_overlay').css('display', 'none');
                     $('.team_desc_preview').css('display', 'block');
                }
    
            });

            $('.w-icon-slider-right').on('click', function () {
                $('.team_desc_overlay').hide();
                 $('.team_desc_preview').css('display', 'block');
            });

            $('.w-icon-slider-left').on('click', function () {
                $('.team_desc_overlay').hide();
                 $('.team_desc_preview').css('display', 'block');
            });

        });
    </script>
@endsection