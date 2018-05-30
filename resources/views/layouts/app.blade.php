<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-wf-page="5799b2096978f1504b9f9caa" data-wf-site="5799b2096978f1504b9f9ca9">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Webflow" name="generator">

    <meta property="og:url" content="http://www.your-domain.com/your-page.html"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="CAP Chartered Accountants Inc."/>
    <meta property="og:description" content="CAP Chartered Accountants Inc."/>
    <meta property="og:image" content="http://www.your-domain.com/path/image.jpg"/>

    <link href="images/fav.png" rel="shortcut icon" type="image/png">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAP Chartered Accountants Inc.</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cap-4a70e6.webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bxslider/jquery.bxslider.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/font-awesome-4.7.0/css/font-awesome.min.css">

    <meta property="og:url" content="http://http://cap.local/"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Cap article title goes here."/>
    <meta property="og:description" content="cap article descirption goes here."/>
    <meta property="og:image" content="cap image path goes here."/>
    <meta property="fb:app_id" content="cap app id goes here"/>

    <!-- Scripts -->
    <script src="{{ asset('js/modernizr.js') }}" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '112920345986066',
            xfbml: true,
            version: 'v2.9'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div id="app">
    {{--<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>--}}

    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.bxslider.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>
<!--[if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-81896661-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
