    <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">No Notification Found</span> 
                                                <!-- <span class="media-content">Your have been Invited ...</span> -->
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="/backend" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="pos" data-toggle="tooltip" data-placement="top" title="POS"><i class="fab fa-stack-overflow"></i></a>
                                    <a class="dropdown-item" href="category" data-toggle="tooltip" data-placement="top" title="Category"><i class="fas fa-align-justify"></i></a>
                                    <a class="dropdown-item" href="brand" data-toggle="tooltip" data-placement="top" title="Brand"><i class="fab fa-bimobject"></i></a>
                                    <a class="dropdown-item" href="product" data-toggle="tooltip" data-placement="top" title="Product"><i class="fas fa-coins"></i></a>
                                    <a class="dropdown-item" href="purchase" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="dropdown-item" href="customer" data-toggle="tooltip" data-placement="top" title="Customer"><i class="fas fa-users"></i></a>
                                    <a class="dropdown-item" href="suplier" data-toggle="tooltip" data-placement="top" title="Supplier"><i class="fas fa-people-carry"></i></a>
                                    <a class="dropdown-item" href="users" data-toggle="tooltip" data-placement="top" title="User"><i class="fas fa-user"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('backend_asset/img/user.jpg')}}" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <!-- <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a> -->
                                   <!--  <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a> -->
                                    <!-- <a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a> -->

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i> 
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
    <div class="page-wrap">        