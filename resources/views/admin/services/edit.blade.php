@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Services
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Update
            </h2>
        </div>

        <div class="section-content">
            <div class="notification-box">
                @if(Session::has('success'))
                    <div class="success_box">
                        <i class="fa fa-check"></i>{{ Session::get('success') }}
                    </div>

                    <script>
                        setTimeout(function () {
                            $(document).ready(function () {
                                $('.success_box').fadeOut(1600);
                            });
                        }, 3000);
                    </script>
                @endif

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

                    <form action="{{'/dashboard/services/update/' . $service->id}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset>
                            <legend>Update Service:</legend>

                            <div class="form-group">
                                <label for="desc-title">Category:</label>
                                <select name="category_id" id="category_id" class="form-input-full">
                                    @if(isset($selected_category))
                                    <option selected value="{{$selected_category->id}}">{{$selected_category->name}}</option>
                                    @endif
                                    @foreach($service_cats as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="news-title">Title:</label>
                                <input type="text" name="title" id="news-title" class="form-input-full"
                                       value="{{$service->title}}">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Title:</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-input-full"
                                       value="{{$service->subtitle}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" cols="30"
                                          rows="10">{{$service->description}}</textarea>
                            </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Update" class="btn-blue  push-right">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            //Set the active menu state
            CKEDITOR.replace('description');
            // SET NAV
            $("#services").addClass('open');
            $("#services").children('ul').slideDown();
            $("#services_view_all").addClass('active');
        });
    </script>
@endsection