@extends('layouts.app')

@section('content')
    {{-- DOWNLOAD APP --}}
    <div class="download_app" style="text-align: left;">
        <div class="container_medium">

            <h1 class="management">{{$job->title}}</h1>

            <p>{!! $job->description !!}</p>

           
        </div>
    </div>
@endsection