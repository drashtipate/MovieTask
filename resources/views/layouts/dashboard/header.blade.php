<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if(Auth::guard('admin')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('admin')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav> -->

                <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
                    <!-- close sidebar -->
                    <button class="btn py-0 d-lg-none" id="open-sidebar">
                        <span class="fas fa-bars text-primary h3"></span>
                    </button>
                    <div class="dropdown ml-auto">
                        @if(Auth::guard('admin')->check())
                        <div class="header_dropdown">
                            <div class="admin_content">
                                <div class="admin_data">
                                    <div class="admin_name">
                                        <a href="">
                                            Admin
                                        </a>
                                    </div>
                                    <div class="admin_dropdownicon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="account_dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-70px, 55px); margin-top: 5px; width: 145px;">
                                <div class="account_dropdown_body">
                                    <div class="account_dropdown_item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt">
                                                <span class="account_dropdown_name">Logout</span>
                                            </i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    </div>

                </nav>