<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a class="active" href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li>
        <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-users"></i>
            <span>Users Group</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('admin/groups')}}">All Groups</a></li>
            <li><a  href="{{url('admin/groups/create')}}">Add User Group</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-user"></i>
            <span>Users</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('admin/users')}}">All users</a></li>
            <li><a  href="{{url('admin/users/create')}}">Add user</a></li>
            <li><a  href="{{url('admin/getUsersByActive/1')}}">User-Active</a></li>
            <li><a  href="{{url('admin/getUsersByActive/0')}}">User-NotActive</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-bars"></i>
            <span>Categories</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('admin/categories')}}">All Categories</a></li>
            <li><a  href="{{url('admin/categories/create')}}">Add Category</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-laptop"></i>
            <span>Courses</span>
        </a>
        <ul class="sub">
            <li><a  href="{{url('admin/courses')}}">All Courses</a></li>
            <li><a  href="{{url('admin/courses/create')}}">Add Course</a></li>
        </ul>
    </li>
    <!--multi level menu end-->

</ul>