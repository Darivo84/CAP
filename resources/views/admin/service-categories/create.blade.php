@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Service Categories
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

                    <form action="{{route('post_service_categories_create')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset class="">
                            <legend>New Service Category:</legend>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-input-full"
                                       value="{{old('name')}}">
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
    </section>

    <script>
        $(document).ready(function () {

            // SET NAV
            $("#service-categories").addClass('open');
            $("#service-categories").children('ul').slideDown();
            $("#service-categories_new").addClass('active');
        });
    </script>
@endsection