@extends('layouts.app')

@section('content')
    <section class="section_news">
        <header class="section_news_header">
            <h1>NEWS</h1>
        </header>
        <?php
        $url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}";
        ?>
        <div class="container_small">
            <div class="news_articles">
                <article class="news_article">
                    <header>
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->title }}
                        <div class="social_sharing" style="display: flex;  align-items: center; ">
                            <a href="javascript:void(0)" class="fbs" style="display: inline-block;margin-top: -5px;margin-right: 5px;">
                                <i class="fa fa-facebook-official" aria-hidden="true"  style="font-size: 23px;"></i>
                            </a>
                            <a href="javascript:void(0)" class="tweet" style="display: inline-block;margin-top: -5px;margin-right: 5px;">
                                <i class="fa fa-twitter-square" aria-hidden="true" style="font-size: 23px;"></i>
                            </a>
                            <div class="linked_in">
                                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                                <script type="IN/Share" data-url="{{$url}}"></script>
                            </div>
                        </div>

                        </p>
                    </header>

                    <div class="content">
                        {!! $article->description !!}
                    </div>
                </article>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $('.fbs').click(function (e) {
                e.preventDefault();
                FB.ui(
                    {
                        method: 'feed',
                        link: "{{ $url }}",
                        picture: '{{ $url }}/images/logo.png',
                        caption: '31 DAYS OF LIVING LARGE AND WINNING WITH FAT bastard',
                        description: 'Follow Mr. b on his Live Large journey AROUND the world in 31 days and stand a chance to WIN Large prizes.',
                        // method: 'share',
                        // href: 'https://www.fatbastardwine.co.za/pages/livelarge_exp/livelarge.php',
                        // name: 'FAT bastard Live Large Experience Competition',
                        // title: 'FAT bastard Live Large Experience Competition',
                        // link: 'https://www.fatbastardwine.co.za/pages/livelarge_exp/livelarge.php',
                        // picture: 'https://www.fatbastardwine.co.za/pages/livelarge_exp/images/popup-01.png',
                        // //caption: 'Reference Documentation',
                        // description: 'Stand a chance to win a once in a lifetime Live Large Experience at the highest fireplace in SA with FAT bastard!'
                    }
                );
            });

            $('a.tweet').click(function (e) {
                //We tell our browser not to follow that link
                e.preventDefault();
                //We get the URL of the link
                var loc = $(this).attr('href');
                //We get the title of the link
                var title = encodeURIComponent($(this).attr('title'));
                //We trigger a new window with the Twitter dialog, in the middle of the page
                window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + $(window).width() / 2 + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            });
        });
    </script>
@endsection