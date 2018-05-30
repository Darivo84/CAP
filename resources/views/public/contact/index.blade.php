@extends('layouts.app')

@section('content')

    <div class="section3" id="contact">
        <h1 class="management">CONTACT US</h1>
        <div class="grid-container w-container">
           
            <div class="map w-widget w-widget-map" data-widget-latlng="-33.876077,18.633892"
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
                        <option value="tax">Tax</option>
                        <option value="tax">Strategic Accounting Services</option>
                        <option value="tax">Audit</option>
                        <option value="tax">Company Secreterial</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection