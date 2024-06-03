<!-- <div class="sidebar " id="sidebar-wrapper">
    <div class="list-group list-group-flush sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard')}}" aria-expanded="false">
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item pb-2">
                        <div class="sidebar_header">
                            <div class="sidebar_content">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link-link" href="#movies" data-bs-toggle="collapse" aria-expanded="{{ Request::is('/movies*') ? 'true':'false' }}">
                                    
                                    <span class="hide-menu">
                                        Movie
                                    </span>
                                    <div class="sidebar_dropdownicons" style="padding-left:95px;">
                                        <i class="fa fa-caret-down">
                                        </i>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar_dropdown">
                                <div class="sidebar_dropdown_body">
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/movies')}}">
                                            Create Movie
                                            </i>
                                        </a>
                                    </div>
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="">
                                            Manage Movie
                                            </i>
                                        </a>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="sidebar-item pb-2">
                        <div class="sidebar_header">
                            <div class="sidebar_content">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link-link" href="#casts" data-bs-toggle="collapse">
                                    
                                    <span class="hide-menu">
                                        Casts
                                    </span>
                                    <div class="sidebar_dropdownicons" style="padding-left:100px;">
                                        <i class="fa fa-caret-down">
                                        </i>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar_dropdown">
                                <div class="sidebar_dropdown_body">
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/cast')}}">
                                            Create Cast
                                            </i>
                                        </a>
                                    </div>
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/cast/view')}}">
                                            Manage Casts
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="sidebar-item pb-2">
                        <div class="sidebar_header">
                            <div class="sidebar_content">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link-link" href="#geners" data-bs-toggle="collapse">
                                    
                                    <span class="hide-menu">
                                        Genres
                                    </span>
                                    <div class="sidebar_dropdownicons" style="padding-left:88px;">
                                        <i class="fa fa-caret-down">
                                        </i>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar_dropdown">
                                <div class="sidebar_dropdown_body">
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/genres')}}">
                                            create Genres
                                            </i>
                                        </a>
                                    </div>
                                    <div class="sidebar_dropdown_item">
                                        <a class="sidebar_dropdown_name" href="{{url ('/genres/view')}}">
                                            Mange Genres
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
       
    </div>
</div> -->
            <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
                <h1 class="fas fa-cogs text-primary d-flex my-4 justify-content-center"></h1>
                <div class="my-4 list-group rounded-0">
                    <a href="{{ url('dashboard')}}"
                        class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                        <span class="fas fa-tachometer-alt"></span>
                        <span class="ml-2">Dashboard</span>
                    </a>

                    <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                        data-toggle="collapse" data-target="#movie-collapse">
                        <div>
                            <span class="fas fa-suitcase"></span>
                            <span class="ml-2">Movie</span>
                        </div>
                        <span class="fas fa-chevron-down small"></span>
                    </button>
                    <div class="collapse" id="movie-collapse" data-parent="#sidebar">
                        <div class="list-group">
                            <a href="{{url ('/movies')}}" class="list-group-item list-group-item-action border-0 pl-5">Create Movie</a>
                            <a href="{{url ('/movie/view')}}" class="list-group-item list-group-item-action border-0 pl-5">Manage Movie</a>
                        </div>
                    </div>

                    <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                        data-toggle="collapse" data-target="#cast-collapse">
                        <div>
                            <span class="fas fa-chalkboard"></span>
                            <span class="ml-2">Casts</span>
                        </div>
                        <span class="fas fa-chevron-down small"></span>
                    </button>
                    <div class="collapse" id="cast-collapse" data-parent="#sidebar">
                        <div class="list-group">
                            <a href="{{url ('/cast')}}" class="list-group-item list-group-item-action border-0 pl-5">Create Cast</a>
                            <a href="{{url ('/cast/view')}}" class="list-group-item list-group-item-action border-0 pl-5">Manage Casts</a>
                        </div>
                    </div>

                    <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                        data-toggle="collapse" data-target="#genres-collapse">
                        <div>
                            <span class="fas fa-life-ring"></span>
                            <span class="ml-2">Genres</span>
                        </div>
                        <span class="fas fa-chevron-down small"></span>
                    </button>
                    <div class="collapse" id="genres-collapse" data-parent="#sidebar">
                        <div class="list-group">
                            <a href="{{url ('/genres')}}" class="list-group-item list-group-item-action border-0 pl-5">Create Genres</a>
                            <a href="{{url ('/genres/view')}}" class="list-group-item list-group-item-action border-0 pl-5">Manage Genres</a>
                        </div>
                    </div>
                </div>
            </div>

              <!-- overlay to close sidebar on small screens -->
              <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>