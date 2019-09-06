<!-- header.blade.php -->
<header class="header">
    <a href="{{ url('/') }}" class="logo">
        <img src="{{ asset('app/img/logoo.png') }}" alt="Logo">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                        <span class="label label-success">{{ \App\Models\Chat::where('receiver_id',Auth::user()->id)->count() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages pull-right">
                        <li class="dropdown-title">1 New Messages</li>
                        <li class="unread message">
                            <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                <img src="{{ asset('images/favicon.png') }}" class="img-responsive message-image" alt="icon" />
                                <div class="message-body">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <br>Hello, You will see your messages here!
                                    <br>
                                    <small>{{ Auth::user()->created_at }}</small>
                                </div>
                            </a>
                        </li>
                        <li class="footer">
                            <a href="#">View all</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class=" notifications dropdown-menu">
                        <li class="dropdown-title">1 New Notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                    <a href="#">Your notifications will go here!</a>
                                    <small class="pull-right">
                                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                        {{ Auth::user()->created_at }}
                                    </small>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="{{ Auth::user()->name }}">
                        <div class="riot">
                            <div>
                                {{ Auth::user()->name }}
                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                            <p class="topprofiletext">{{ Auth::user()->name }} <br> <small>{{ Auth::user()->role }}</small></p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="livicon" data-name="user" data-s="18"></i> My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="#" onclick="return alert('Sorry, Feature still under development!')">
                                <i class="livicon" data-name="gears" data-s="18"></i> Account Settings
                            </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('lock', Auth::user()->id) }}">
                                    <i class="livicon" data-name="lock" data-s="18"></i> Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="livicon" data-name="sign-out" data-s="18"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>