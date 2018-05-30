@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>

                <i class="fa fa-angle-right" aria-hidden="true"></i>
                About Us
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Update
            </h2>
        </div>

        <div class="section-content clearfix">
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
                    <form action="{{route('post_about_us')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset>
                            <legend>Update Page:</legend>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description"
                                          style="width: 100%;box-sizing: border-box;font-family: Roboto;font-size: 16px;"
                                          rows="6">{{ $about->description }}</textarea>
                            </div>

                            <div class="form-group clearfix">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Update" class="btn-blue">
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
                $("#about").addClass('open');
                $("#about").children('ul').slideDown();
                $("#about").addClass('active');
            });
            /*CKEDITOR INIT END*/
        </script>
    </section>
@endsection