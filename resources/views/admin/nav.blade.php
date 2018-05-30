<!-- PRIMARY NAV -->
<div id='cssmenu'>
    <ul>
        <li><a href='/dashboard' class="home_dashboard"><img src="/images/logo.png"
                                                             style="width: 200px;padding: 20px 18px 11px 18px;margin-top: 7px;"></a>
        </li>

        <li id="about" class='has-sub'><a href=''><span>About Us</span></a>
            <ul>
                <li id="about_view_all"><a href='{{ route('get_about_us') }}'><span>Edit</span></a></li>
            </ul>
        </li>

        <li id="contact" class='has-sub'><a href='#'><span>Contact Us</span></a>
            <ul>
                <li id="contact_view_all"><a href='{{ route('get_contact_us') }}'><span>Edit</span></a></li>
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="news" class='has-sub'><a href='#'><span>News</span></a>
            <ul>
                <li id="news_view_all"><a href='{{ route('get_news') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="news_new"><a href='{{ route('get_news_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="management" class='has-sub'><a href='#'><span>Management</span></a>
            <ul>
                <li id="management_view_all"><a href='{{ route('get_team') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="management_new"><a href='{{route('get_team_create')}}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="industries" class='has-sub'><a href='#'><span>Industries</span></a>
            <ul>
                <li id="industries_view_all"><a href='{{ route('get_industries') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="industries_new"><a href='{{ route('get_industries_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="services" class='has-sub'><a href='#'><span>Services</span></a>
            <ul>
                <li id="services_view_all"><a href='{{ route('get_services') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="services_new"><a href='{{ route('get_services_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="service-categories" class='has-sub'><a href='#'><span>Service Categories</span></a>
            <ul>
                <li id="service-categories_view_all"><a
                            href='{{ route('get_service_categories') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="service-categories_new"><a
                            href='{{ route('get_service_categories_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="careers" class='has-sub'><a href='#'><span>Careers</span></a>
            <ul>
                <li id="careers_view_all"><a href='{{ route('get_careers') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="careers_new"><a href='{{ route('get_careers_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--@if(in_array('read_news',$user->permissions()))--}}
        <li id="docs" class='has-sub'><a href='#'><span>Useful Documents</span></a>
            <ul>
                <li id="docs_view_all"><a href='{{ route('get_useful_documents') }}'><span>View All</span></a></li>
                {{--  @if(in_array('create_news',$user->permissions()))--}}
                <li id="docs_new"><a href='{{ route('get_useful_documents_create') }}'><span>Add New</span></a></li>
                {{--  @endif--}}
            </ul>
        </li>

        {{--    @endif--}}

        {{-- <li id="profile"><a href='/dashboard/profile'><span>Profile</span></a></li>--}}
        <li class='last'><a href='/logout'><span>Logout</span></a></li>
    </ul>
</div>