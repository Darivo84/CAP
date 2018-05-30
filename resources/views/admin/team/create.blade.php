@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Management
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Create
            </h2>
        </div>

        <div class="section-content">
            <div class="notification-box">
            <!-- ERRORS -->
                @if ( $errors->count() > 0 )
                    <div id='error'>
                        <p>The following errors have occurred:</p>

                        @foreach( $errors->all() as $message )
                            <div class="alert box">
                                <i class="fa fa-ban"></i> {{ $message }}
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <br class="clear-l">
                    </div>
                @endif
            </div>

            <div class="left-container">
                <div class="form-container">
                    <form action="{{route('post_team_create')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset class="">
                            <legend>New Team Member:</legend>

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-input-full"
                                       value="{{old('first_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-input-full"
                                       value="{{old('last_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="title">Designation:</label>
                                <input type="text" name="title" id="title" class="form-input-full"
                                       value="{{old('title')}}">
                            </div>

                             <div class="form-group">
                                <label for="display_order">Display Order:</label>
                                <input type="text" name="display_order" id="display_order" class="form-input-full"
                                       value="{{old('display_order')}}">
                            </div>

                            <div class="form-group">
                                <label for="profile_picture">Profile Picture:</label>
                                <p><small>Optimal photo dimensions: 200 pixels by 240 pixels portrait</small></p>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-input-full">
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience:</label>
                                <textarea name="experience" id="experience" cols="30" rows="10">{{old('experience')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="qualifications">Qualitifactions:</label>
                                <input type="text" name="qualifications" id="qualifications" class="form-input-full"
                                       value="{{old('qualifications')}}">
                            </div>

                            <div class="form-group">
                                <label for="tel">Office Number:</label>
                                <input type="text" name="tel" id="tel" class="form-input-full"
                                       value="{{old('tel')}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-input-full"
                                       value="{{old('email')}}">
                            </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Create" class="btn-blue  push-right">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="preview-pane">
                <img src="/images/no-preview-big.jpg" alt="" class="upload-preview">
                <h4 style="text-align: left; margin-top: 30px; margin-bottom: 10px;">File Info</h4>
                <ul style="text-align: left;">
                    <li style="margin-bottom: 8px;">Max file size: 2mb.</li>
                    <li style="margin-bottom: 8px;">Supported File Types: jpg,jpeg,tif,png,gif</li>
                </ul>
            </div>
        </div>
    </section>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.upload-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_picture").change(function () {
            readURL(this);
        });

        $(document).ready(function () {
            //Set the active menu state
            CKEDITOR.replace('experience');

            // SET NAV
            $("#management").addClass('open');
            $("#management").children('ul').slideDown();
            $("#management_new").addClass('active');
        });
    </script>
@endsection