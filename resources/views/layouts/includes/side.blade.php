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
                        <a href="{{ route('profile') }}" title="Go to my profile">
                            <i class="livicon" data-name="user" title="Go to my profile" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <ul id="menu" class="page-sidebar-menu">
                <li class="text-center">
                    <span class="title"><b style="color: #fff;"> <i class="fa fa-dashboard"></i> START </b></span>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="home" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                        <span class="title"> START </span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="@if (Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                                {{ route('home.user') }} @else {{ route('home') }} @endif">
                                <i class="fa fa-angle-double-right"></i> Home
                            </a>
                        </li>
                        @role(['super-admin','admin'])
                        <li>
                            <a href="{{ route('admin') }}">
                                <i class="fa fa-angle-double-right"></i> Administrator
                            </a>
                        </li>
                        @endrole
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title"> Settings &amp; Messaging </span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('messages.index','inbox') }}">
                                <i class="fa fa-angle-double-right"></i> Inbox
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="fa fa-angle-double-right"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-angle-double-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
                @role(['super-admin','admin','pno','pno_admin'])
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                            <span class="title">My Operations</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li> <a href=""> <i class="fa fa-angle-double-right"></i> Time </a></li>
                            <li> <a href=""> <i class="fa fa-angle-double-right"></i> Request For Leave </a></li>
                            <li> 
                                <a href="{{ route('messages.index', 'inbox') }}">
                                    <i class="fa fa-angle-double-right"></i> Messaging
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin'])
                    <li class="text-center">
                        <a href="javascript:void(0)">
                            <!-- <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i> -->
                            <span class="title"><b style="color: #F89A14;">SYSTEM</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="livicon" data-name="table" data-size="18"  data-c="#418bca" data-hc="#418bca" data-size="18" data-loop="true"></i>
                            <span class="title">Disease Management</span>
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
                                    <i class="fa fa-angle-double-right"></i> Disease Cases
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tracker.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Pattern Tracker
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
                                <a href="{{ route('projects.index') }}">
                                    <i class="fa fa-angle-double-right"></i> My Projects
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teams.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Medical Teams
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tasks.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Medical Tasks
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
                        </ul>
                    </li>
                @endrole
                @role(['super-admin','admin','pno','pno_admin','specialist','nurse','supervisor','receptionist','client'])
                    <li class="text-center">
                        <a href="#">
                            <!-- <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i> -->
                            <span class="title"><b style="color: #F89A14;">More Sections</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="map" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                            <span class="title"> Map Locator</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> View Full Map
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="users" data-c="#01bc8c" data-hc="#01bc8c" data-size="18" data-loop="true"></i>
                            <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa fa-angle-double-right"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-double-right"></i> Infor
                                </a>
                            </li>
                        </ul>
                    </li>
                    <hr>
                    <li>
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
        </div>
    </section>
</aside>
