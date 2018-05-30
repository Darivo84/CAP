@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>

                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Industries
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Create
            </h2>
        </div>

        <div class="section-content clearfix">
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

                    <form action="{{route('post_industries_create')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset class="">
                            <legend>New Industry:</legend>

                            <div class="form-group">
                                <label for="news-title">Title:</label>
                                <input type="text" name="title" id="news-title" class="form-input-full"
                                       value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Upload Icon:</label>
                                <input type="file" name="icon" id="icon" class="form-input-full">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" cols="30"
                                          rows="10">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Create" class="btn-blue  push-right">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <script>
            /*CKEDITOR INIT */
            $(document).ready(function () {
                //Set the active menu state
                CKEDITOR.replace('description');

                // SET NAV
                $("#industries").addClass('open');
                $("#industries").children('ul').slideDown();
                $("#industries_new").addClass('active');
            });
            /*CKEDITOR INIT END*/
        </script>
    </section>
@endsection