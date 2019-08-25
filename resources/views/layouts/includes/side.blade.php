<!-- side.blade.php -->
<aside class="left-side sidebar-offcanvas">
    <section class="sidebar ">
        <div class="page-sidebar  sidebar-nav">
            <div class="nav_icons">
                <ul class="sidebar_threeicons">
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="menu" class="page-sidebar-menu">
                <li class="text-center">
                    <span class="title"><b>START</b></span>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="users" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                        <span class="title">System Users</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="fa fa-angle-double-right"></i> All Users
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-angle-double-right"></i> Admins
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}">
                                <i class="fa fa-angle-double-right"></i> Add User
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-angle-double-right"></i> Teams
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-angle-double-right"></i> Assign User Tasks
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="lock" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                        <span class="title">Roles & Permissions</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="fa fa-angle-double-right"></i> System Roles
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('permissions') }}">
                                <i class="fa fa-angle-double-right"></i> Permissions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('roles.create') }}">
                                <i class="fa fa-angle-double-right"></i> Add Role
                            </a>
                        </li>
                    </ul>
                </li>
                @role(['super-admin','admin','pno','pno_admin'])
                    <li class="text-center">
                        <a href="{{ route('home') }}">
                            <span class="title"><!-- <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>--> <b style="color: #F89A14;">Home</b></span>
                        </a>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin'])
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                            <span class="title">Projects & Tracker</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> On going Projects
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Finished Projects
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> All Projects
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Pattern Tracker
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin'])
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                            <span class="title">My Operations</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Time
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Request For Leave
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.messaging', Auth::user()->id) }}">
                                    <i class="fa fa-angle-double-right"></i> Messaging
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin'])
                    <li class="text-center">
                        <a href="#">
                            <!-- <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i> -->
                            <span class="title"><b style="color: #F89A14;">Principle Nursing Officer</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="calendar" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                            <span class="title">Medics Management</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('leaves.index') }}">
                                    <i class="fa fa-angle-double-right"></i> All Leaves
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('leaves.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Leave Requests
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Log Tracker
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.messaging', Auth::user()->id) }}">
                                    <i class="fa fa-angle-double-right"></i> Messaging
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="users-ban" data-size="18" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                            <span class="title">Medical Configuration</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('teams.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Teams &amp; Tasks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tasks.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Tasks &amp; Projects
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('activities.index') }}">
                                    <i class="fa fa-angle-double-right"></i> All Activities
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="users-add" data-size="18"  data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                            <span class="title">Team Management</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('teams.index') }}">
                                    <i class="fa fa-angle-double-right"></i> View Teams
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teams.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Create Team
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Team Activities
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="table" data-size="18"  data-c="#418bca" data-hc="#418bca" data-size="18" data-loop="true"></i>
                            <span class="title">Disease Cases</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('diseases.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Disease Records
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cases.index') }}">
                                    <i class="fa fa-angle-double-right"></i> All Cases
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cases.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add Case
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tracker') }}">
                                    <i class="fa fa-angle-double-right"></i> Pattern Tracker
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin','specialist','nurse','supervisor','receptionist','client'])
                    <li class="text-center">
                        <a href="#">
                            <!-- <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i> -->
                            <span class="title"><b style="color: #F89A14;">Work Section</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="users" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                            <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('home.profile', Auth::user()->id) }}">
                                    <i class="fa fa-angle-double-right"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('activities.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Active Activity
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Infor
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Your Teams
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects.index') }}">
                                    <i class="fa fa-angle-double-right"></i> My Projects &amp; Tasks
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin','client'])
                    <li class="text-center">
                        <a href="#" onclick="return alert('This feature is still under development!')">
                            <!-- <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i> -->
                            <span class="title"><b style="color: #F89A14;">Mappings</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="map" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                            <span class="title">Tracker (Locator)</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> View Full Map
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Go To Pin
                                </a>
                            </li>
                            @role(['super-admin','admin','specialist','supervisor','nurse'])
                                <li>
                                    <a href="">
                                        <i class="fa fa-angle-double-right"></i> Add User
                                    </a>
                                </li>
                                <li>
                                    <a href="session_timeout.html">
                                        <i class="fa fa-angle-double-right"></i> Teams
                                    </a>
                                </li>
                                <li>
                                    <a href="portlet_draggable.html">
                                        <i class="fa fa-angle-double-right"></i> Assign User tasks
                                    </a>
                                </li>
                            @endrole
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="location" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                            <span class="title">Coverage</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> System Roles
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Permissions
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Add Role
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="text-center">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <span class="title"><i class="livicon" data-name="sign-out" data-s="18"></i> <b>Logout</b> </span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endrole
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </section>
    <!-- /.sidebar -->
</aside>