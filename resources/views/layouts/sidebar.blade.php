<div class="sidebar-menu toggle-others fixed">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="dashboard-1.html" class="logo-expanded">
                    <img src="{{ asset('backend/images/rabta2.jpg') }}" width="180" alt="" />
                </a>

                <a href="dashboard-1.html" class="logo-collapsed">
                    <img src="{{ asset('backend/images/rbt2.jpg') }}" width="40" alt="" />
                </a>
            </div>

            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>

                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>

            <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
            <div class="settings-icon">
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>
            </div>


        </header>



        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="active opened active">
                <a href="{{url('home')}}">
                    <i class="linecons-cog"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
                
            <li class='active  active'>
                <a href="#">
                        <i class="linecons-user"></i>
                        <span class="title">Users</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('add_user') }}">
                                <span class="title">Add User</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('users') }}">
                                <span class="title">Manage Users</span>
                            </a>
                        </li>
                    </ul>
            </li>

            <li class='active  active'>
                <a href="#">
                        <i class="linecons-food"></i>
                        <span class="title">Products</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('products') }}">
                                <span class="title">Manage Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('add_product') }}">
                                <span class="title">Add Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('category') }}">
                                <span class="title">Manage Category</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ url('addCategory') }}">
                                <span class="title">Add Category</span>
                            </a>
                        </li>
                        
                    </ul>
            </li>
            <li class='active  active'>
                <a href="#">
                        <i class="linecons-note"></i>
                        <span class="title">Frontend</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('about') }}">
                                <span class="title">Existing About</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('manageAbout') }}">
                                <span class="title">Manage About</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('contact') }}">
                                <span class="title">Existing Contact</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('manageContact') }}">
                                <span class="title">Manage Contact</span>
                            </a>
                        </li>
                    </ul>
            </li>
            <li class='active  active'>
                <a href="#">
                        <i class="fa-shopping-cart"></i>
                        <span class="title">Orders</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('manageOrderStatus') }}">
                                <span class="title">Update status</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('history') }}">
                                <span class="title">Order History</span>
                            </a>
                        </li>
                    </ul>
            </li>
        </ul>

    </div>

</div>