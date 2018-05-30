@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                News
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
                    <form action="{{route('post_news_create')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset class="">
                            <legend>New Article:</legend>

                            <div class="form-group">
                                <label for="news-title">Title:</label>
                                <input type="text" name="title" id="news-title" class="form-input-full"
                                       value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="team_id">Team Member:</label>
                                <select name="team_id" id="team_id" class="form-input-full">
                                    @foreach($team as $member)
                                        <option value="{{$member->id}}">{{$member->first_name . " " . $member->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="team_id">Service:</label>
                                <select name="service_id" id="service_id" class="form-input-full">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Image:</label>
                                <p>
                                    <small>Optimal photo dimensions: 740 pixels by 400 pixels landscape</small>
                                </p>
                                <input type="file" name="cover_image" id="cover_image" class="form-input-full">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" cols="30"
                                          rows="10">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Post" class="btn-blue  push-right">
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

        $("#cover_image").change(function () {
            readURL(this);
        });

        $(document).ready(function () {
            //Set the active menu state
            CKEDITOR.replace('description');

            // SET NAV
            $("#news").addClass('open');
            $("#news").children('ul').slideDown();
            $("#news_new").addClass('active');
        });
    </script>
@endsection