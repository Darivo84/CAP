@extends('layouts.app')
@section('content')

    {{-- WELCOME --}}
    <div class="section1" id="home"><img class="imghome"
                                         src="images/depositphotos_21186915-Business-partners-discussing-documents.jpg">
        <div class="divsect1">
            <div>
                <img class="logo" src="images/logo.png" width="291">
                <h1 class="sub">"Improving and protecting <span class="green">your future</span>."</h1>
                <div>
                    <div class="row w-row">
                        <div class="w-col w-col-4">
                            <p class="paragraph_sect1">
                                <span class="experience">CAP</span>
                                is a leading
                                chartered accountancy firm
                                committed to quality,
                                integrity and personal
                                service.Our management team
                                has substantial professional
                                expertise as well as a shared
                                philosophy of providing
                                cost-effective services in a
                                timely fashion.
                            </p>
                        </div>
                        <div class="w-col w-col-4">
                            <p class="paragraph_sect1">
                                The quality of our firm's services is enhanced by the attention
                                given to each client by, not only staff, but also partners. This
                                interaction with clients enables us to act as sounding boards for
                                management and our diverse client base allows us to anticipate
                                opportunities in business and tax planning, to contribute
                                meaningfully to the growth and prosperity of our clients.
                            </p>
                        </div>
                        <div class="w-col w-col-4">
                            <p class="_3 paragraph_sect1">
                                With our integrated accounting, tax and financial services, we
                                are able to deliver a high standard of work that ensures peace
                                of mind.&nbsp;We are committed to lifelong relationships with
                                our clients as unique individuals, we strive to stay abreast
                                with technological advances and we invest in our personnel
                                through continued training and development.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <a class="down w-inline-block" href="#services"><img src="images/down-01.png" width="153">
        </a>
    </div>

    {{-- SERVICES --}}
    <div class="section3" id="services">
        <h1 class="management">SERVICES</h1>
        <div class="">


            <div class="services_block">
                <div class="container" style="text-align: center !important;">

                    @foreach($service_categories_footer as $key => $category)
                        <?php $service_name = strtolower(str_replace(' ', '-', $category->name)); ?>
                        <a href="{{ '/services/'. $service_name . '/' . $slider_link  }}" >
                            <div class="services_single_home {{$colours[ $key]}}">
                                <p>{{ ucwords($category->name)}}</p>
                                @foreach($services_arr[$category->id] as $service)
                                    <div class="gridcontent">• {{ ucwords(strtolower($service->title)) }}</div>
                                @endforeach
                            </div>
                        </a>
                    @endforeach


                </div>
            </div>

           

        </div>
        <a class="down w-inline-block" href="#IND"><img src="images/down-01.png" width="153"> </a>
        <br><br><br>
    </div>

    {{--INDUSTRIES--}}
    <div class="new section4" id="IND">
        <h1 class="ind management">INDUSTRIES</h1>
        <div class="w-container">
            <div class="row3 w-row">
                @foreach($industries_footer as $key => $item)
                
                    <?php 

                        $ind_title = strtolower(str_replace(' ', '-', $item->title));
                        $ind_title = strtolower(str_replace('/', '-', $ind_title));
                        $ind_title = strtolower(str_replace('---', '-', $ind_title));


                     ?>
                    <div class="w-col w-col-3 w-col-medium-6" style="margin-bottom: 14px;">
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
        </div>
        <br><br><br><br><br>
        <a class="down w-inline-block" href="#contact"><img src="images/down2-01.png" width="153">
        </a>
    </div>

    {{--CONTACT FORM--}}
    <div class="section3" id="contact">
        <h1 class="management">CONTACT US</h1>
        <div class="grid-container w-container">
            <div class="map w-widget w-widget-map" data-widget-latlng="-33.8739134,18.6287557"
                 data-widget-style="roadmap" data-widget-zoom="15"></div>
            <div class="row5 w-row">
                <div class="w-col w-col-4">
                    <div class="contactdetails">{{$contact->tel}}</div>
                    {{--                    <div class="contactdetails">0861 777 227</div>--}}
                </div>

                <div class="w-col w-col-4">
                    <div class="contactdetails">{{$contact->address}}</div>
                </div>

                <div class="w-col w-col-4">
                    <div class="contactdetails email">{{$contact->email}}</div>
                </div>
            </div>

            <h1 class="management mess">MESSAGE US</h1>

            <form method="POST" action="{{route('main_contact')}}">
                {!! csrf_field() !!}
                <div class="formcont">
                    <div class="form" style=" @if($errors->has('name')) border-color:red @endif">
                        <input type="text" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="name"
                               placeholder="Name">
                    </div>

                    <div class="_2 form" style=" @if($errors->has('surname')) border-color:red @endif">
                        <input type="text" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="surname"
                               placeholder="Surname">
                    </div>
                </div>

                <div class="formcont w-clearfix">
                    <div class="form longform" style=" @if($errors->has('email')) border-color:red @endif">
                        <input type="email" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="email"
                               placeholder="E-mail">
                    </div>
                </div>

                <div class="formcont w-clearfix">
                    <div class="form longform" style=" @if($errors->has('business')) border-color:red @endif">
                        <input type="text" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="business"
                               placeholder="Your Business Name">
                    </div>
                </div>

                <div class="formcont w-clearfix">
                    <div class="form longform message" style=" @if($errors->has('messages')) border-color:red @endif">
                        <textarea class="formcopy"
                                  style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;padding-top: 15px;"
                                  name="messages" placeholder="Message"></textarea>
                    </div>
                </div>

                <div class="send" data-ix="hover">
                    <button type="submit" class="sendtext" style="background: transparent;">SEND</button>
                </div>

                <div class="formcont w-clearfix">
                    <div class="careers send" data-ix="hover">
                        <a class="linkblock w-inline-block" href="/careers">
                            <div class="sendtext">CAREERS</div>
                        </a>
                    </div>
                </div>

                <div class="formcont w-clearfix">
                    <select class="department" name="department" id="department">
                        <option value="">Department</option>
                        <option value="tax">TAX</option>
                        <option value="tax">Business Services</option>
                        <option value="tax">Audit</option>
                        <option value="tax">Company Secreterial</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection