<footer class="footer_main">


    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-white">Get Connected</h5>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="{{route('news')}}">Articles</a></li>
                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                    <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                    <li>
                        <a href="https://www.facebook.com/CapCharteredAccountants/" target="_blank" class="footer_social"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="https://www.linkedin.com/company-beta/2702124/"
                          target="_blank" class="footer_social"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="text-white">Services</h5>
                <ul>
                    @foreach($service_categories_footer as $service)
                     <?php $service_name = strtolower(str_replace(' ', '-', $service->name)); ?>
                        <li><a href="{{   '/services/'. $service_name . '/' . $slider_link   }}">{{$service->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white">Industries</h5>
                <ul>
                    @foreach($industries_footer as $key => $industry)

                    <?php 

                        $ind_title = strtolower(str_replace(' ', '-', $industry->title));
                        $ind_title = strtolower(str_replace('/', '-', $ind_title));
                        $ind_title = strtolower(str_replace('---', '-', $ind_title));


                     ?>
                        <li><a href="{{  '/industries/'. $ind_title . '/' . $key  }}">{{$industry->title}}</a></li>

                    @endforeach
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="text-white">Careers</h5>
                <ul>
                    <li><a href="{{ route('careers-prof') }}">Professional</a></li>
                    <li><a href="{{ route('careers-student') }}">Student</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
