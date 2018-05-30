@extends('layouts.admin-layout')
@section('content')
    <section>
        <div class="admin-bread-crumbs">
            <h2 class="content-heading" style="margin: 0; color: #fff;">
                <a href="/dashboard" class='breadcrumbs'><i class="fa fa-home"></i></a>

                <i class="fa fa-angle-right" aria-hidden="true"></i>
                Contact Us
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
                    <form action="{{route('post_contact_us')}}" method="post" class="admin-form"
                          enctype="multipart/form-data">
                        <fieldset>
                            <legend>Update Page:</legend>

                            <div class="form-group">
                                <label for="tel">Tel:</label>
                                <input type="text" name="tel" id="tel" class="form-input-full"
                                       value="{{$contact->tel}}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-input-full"
                                       value="{{$contact->address}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-input-full"
                                       value="{{$contact->email}}">
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

                // SET NAV
                $("#contact").addClass('open');
                $("#contact").children('ul').slideDown();
            });
            /*CKEDITOR INIT END*/
        </script>
    </section>
@endsection