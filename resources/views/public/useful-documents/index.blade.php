@extends('layouts.app')
@section('content')

    <section class="section_services">
        <header class="section_news_header">
            <h1>USEFUL DOCUMENTS</h1>
        </header>

        <div class="container_small">
            <div class="useful_documents_container">
                @foreach($documents as $document)
                    <div class="useful_document">
                        <a href="{{ route('post_download_pdf', $document->id)}}" class="input-btn blue-btn">
                            <p><i class="fa fa-download" aria-hidden="true"></i> {{ $document->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection