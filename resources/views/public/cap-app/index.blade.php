@extends('layouts.app')

@section('content')
    {{-- DOWNLOAD APP --}}
    <div class="download_app">
        <div class="container_medium">

            <h1 class="management">GE THE APP</h1>

            <p>Download the free CAP Chartered
               Accountants Finance & Tax App
               Today. This powerful Finance & Tax
               App has been developed by the
               team at CAP Chartered Accountants
               to give you key financial and tax
               information, tools, features and news
               at your fingertips, 24/7. </p>

            <div class="app_buttons">
                <a href="https://appsto.re/za/C2vMhb.i" target="_blank"><img src="{{asset('images/button1.png')}}"
                                                                             alt=""></a>
                <a href="https://play.google.com/store/apps/details?id=uk.co.myfirmsapp.CAP" target="_blank"><img
                            src="{{asset('images/button2.png')}}" alt=""></a>
            </div>
        </div>
    </div>
@endsection