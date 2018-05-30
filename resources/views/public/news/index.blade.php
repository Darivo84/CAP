@extends('layouts.app')

@section('content')

    <section class="section_news">
        <header class="section_news_header">
            <h1>NEWS</h1>
        </header>

        <div class="container_small">
            <div class="news_articles">
                @foreach($articles as $article)
                  <?php 
                  $article_title = strtolower(str_replace(' ', '-', $article->title));
                  $article_title = strtolower(str_replace('?', '', $article_title));
                   ?>
                    <a href="{{route('news-single', [$article_title, $article->id])}}" class="article_link">
                        <article class="news_article">
                            <header>
                                <h2 style="font-size: 19px; color: #142044;">{{$article->title}}</h2>
                                <p style="color: #142044;">{{substr($article->created_at, 0,10)}}</p>
                            </header>

                            <div class="article_content">
                                <?php
                                $new_article = strip_tags($article->description);
                                $new_article1 = str_limit($new_article, 300);
                                ?>
                                {{ $new_article1 }}
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>

            <div class="pagination_container">
                {{$articles->links()}}
            </div>

        </div>
    </section>
@endsection