<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="{{url('instructor/1')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Add course Link-->
            <li>
                <a href="{{url('courses/create')}}">
                    <i class="fa fa-plus"></i>
                    <span>Add Course</span></a>
            </li>
            <!-- End Add Course -->
            <!-- Add course Link-->
            <li>
                <a href="{{url('instructor/1/courses')}}">
                    <i class="fa fa-book"></i>
                    <span>my courses</span></a>
            </li>
            <!-- End Add Course -->

            <!-- Add my ٍstudents Link-->
            <li>
                <a href="{{url('instructor/1/students')}}">
                    <i class="fa fa-book"></i>
                    <span>my students</span></a>
            </li>
            <!-- End Add students Course -->



            <!--multi level menu start-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-sitemap"></i>
                    <span>Multi level Menu</span>
                </a>
                <ul class="sub">
                    <li><a  href="javascript:;">Menu Item 1</a></li>
                    <li class="sub-menu">
                        <a  href="boxed_page.html">Menu Item 2</a>
                        <ul class="sub">
                            <li><a  href="javascript:;">Menu Item 2.1</a></li>
                            <li class="sub-menu">
                                <a  href="javascript:;">Menu Item 3</a>
                                <ul class="sub">
                                    <li><a  href="javascript:;">Menu Item 3.1</a></li>
                                    <li><a  href="javascript:;">Menu Item 3.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--multi level menu end-->

        </ul>
    </div>
 </aside>