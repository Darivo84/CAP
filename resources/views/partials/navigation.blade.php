<div class="mobinav w-nav" data-animation="default" data-collapse="medium" data-contain="1" data-duration="400">
    <div class="w-container">
        <a class="w-nav-brand" href="/"><img class="logonav" src="{{ asset('images/logo.png') }}" width="158">
        </a>
        <nav class="colour w-nav-menu" role="navigation">
            <a class="menunav w-nav-link" href="{{ url('/') }}">Home</a>
            <a class="menunav w-nav-link" href="{{ route('services_home') }}">Services</a>
            <a class="menunav w-nav-link" href="{{ route('industries') }}">Industries</a>
            <a class="menunav w-nav-link nav-dropdown-mobi">Careers</a>
            <div class="subnav-mobi">
                <a class="menunav w-nav-link" href="{{ route('careers-prof') }}">Professional</a>
                <a class="menunav w-nav-link" href="{{ route('careers-student') }}">Student</a>
            </div>
            <a class="menunav w-nav-link" href="{{ route('about-us') }}">About us</a>
            <a class="menunav w-nav-link" href="{{ route('contact') }}">Contact us</a>

        </nav>
        <div class="menu w-nav-button"><img class="navbutton" src="{{ asset('images/mobi.png') }}" width="51">
        </div>
    </div>
</div>
<div class="navbar clearfix">
    <div class="nav2 w-nav" data-animation="default" data-collapse="medium" data-duration="400"><img class="navimgs"
                                                                                                     src="{{ asset('images/sssss-01.png') }}">
        <a class="w-nav-brand" href="/"><img class="leaf" src="{{ asset('images/leaf.png') }}" width="40">
        </a>
        <a class="navlink w-nav-link" href="{{ url('/') }}">Home</a>
        <a class="navlink w-nav-link services_trigger" href="{{ route('services_home') }}">Services</a>
        <a class="navlink w-nav-link" href="{{ route('industries') }}">Industries</a>
        <a class="navlink w-nav-link nav-dropdown">Careers</a>
        <div class="subnav">
            <a class="navlink w-nav-link" href="{{ route('careers-prof') }}">Professional</a>
            <a class="navlink w-nav-link" href="{{ route('careers-student') }}">Student</a>
        </div>
        <a class="navlink w-nav-link" href="{{ route('about-us') }}">About Us</a>
  {{--      <a class="navlink w-nav-link" href="{{ route('news') }}">Articles</a>--}}


        <a class="navlink w-nav-link" href="{{ route('contact') }}">Contact Us</a>

        <a class="navlink w-nav-link" href="{{ route('cap_app') }}">Cap App</a>
        <nav class="navmenu w-nav-menu" role="navigation"></nav>
        <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
        </div>

        <div class="sub_nav">
            <div class="row">
                @foreach($service_categories_footer as $service)
                <?php $service_name = strtolower(str_replace(' ', '-', $service->name)); ?>
                    <div class="col-md-3">
                        <h5>{{ strtoupper($service->name) }}</h5>
                        <ul>
                            @foreach($services_arr[$service->id] as $key => $value)
                                <li class="service_item"><a
                                            href="{{  '/services/'. $service_name . '/' . $key  }}">{{ ucwords(strtolower($value->title))}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('.services_trigger').mouseenter(function () {
                $('.sub_nav').css('display', 'block');
            });

            $('.sub_nav').mouseleave(function () {
                $('.sub_nav').css('display', 'none');
            });

            $('.navlink').not('.services_trigger').mouseenter(function () {
                $('.sub_nav').css('display', 'none');
            });

        });
    </script>
</div>

<script>
    $(document).ready(function () {
        $('.nav-dropdown').click(function () {
            $(this).next().slideToggle();
        });

        $('.nav-dropdown-mobi').click(function () {
            $(this).next().slideToggle();
        });
    });
</script>