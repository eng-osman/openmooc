<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a class="active" href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard Student</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-laptop"></i>
            <span>Categories</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('student/categories')}}">Our Categories</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-laptop"></i>
            <span>Courses</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('student')}}">Our Courses</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-laptop"></i>
            <span>Subscriptions & Rates</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('student/courses/information')}}">Our Courses</a></li>
            <li><a  href="{{url('student/courses/rates')}}">Rates</a></li>
            <li><a  href="{{url('student/courses/subs')}}">Subscription</a></li>
        </ul>
    </li>
    <!--multi level menu end-->

</ul>