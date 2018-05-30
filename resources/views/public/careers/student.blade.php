@extends('layouts.app')

@section('content')
    <div class="careerpage section1" id="careers">
        <div class="careercontent student_form">
            <h1 class="blue-head management">CAREERS</h1>
            <p class="paragraph2">At CAP, we make it a priority to provide our interns and entry level professionals
                <br> with mentorship, flexibility, and learning opportunities. Please complete the form
                <br> below and we will be in touch with you:</p>

            {{-- FORM START--}}
            <div class="contactform formcont last">
                <form method="POST" action="{{ route('send_mail_career') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="_2 form margin" style=" @if($errors->has('surname')) border-color:red @endif">
                        <input type="text" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="surname"
                               placeholder="Surname">
                    </div>

                    <div class="form" style=" @if($errors->has('name')) border-color:red @endif">
                        <input type="text" class="formcopy"
                               style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="name"
                               placeholder="Name">
                    </div>

                    <div class="contactform formcont">
                        <div class="form longform margin" style=" @if($errors->has('email')) border-color:red @endif">
                            <input type="email" class="formcopy"
                                   style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;" name="email"
                                   placeholder="E-mail">
                        </div>
                    </div>

                    <div class="contactform formcont">
                        <div class="bot form longform message"
                             style=" @if($errors->has('messages')) border-color:red @endif">
                            <textarea class="formcopy"
                                      style="margin: 0;height: 100%;width: 100%;border: 0;outline: none;padding-top: 15px;"
                                      name="messages"
                                      placeholder="Please share your qualification and tell us why you would like to work for CAP"></textarea>
                        </div>
                    </div>

                    <div class="send sendcareers" data-ix="hover">
                        <button type="submit" class="sendblue sendtext"
                                style="background: transparent;cursor: pointer;">SEND
                        </button>
                    </div>

                    <div class="send_student sendcareers upld_cv" data-ix="hover">
                        <label class="sendblue sendtext" style="background: transparent;cursor: pointer;">Upload CV
                            <input type="file" name="pdf_file" id="pdf_file" value="Upload VC" style="display: none;">
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection