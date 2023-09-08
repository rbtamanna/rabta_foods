<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="dashboard-1.html" class="logo">
                    
					<img src="{{asset('backend/images/rabta3.jpg')}}" width="180" alt="" class="hidden-xs" />
					<img src="{{asset('backend/images/rbt3.jpg')}}" width="80" alt="" class="visible-xs" />
				</a>
				
			</div>
				
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<a href="#" data-toggle="settings-pane" data-animate="true">
						<i class="linecons-cog"></i>
					</a>
					
					<a href="#" data-toggle="user-info-menu-horizontal">
						<i class="fa-bell-o"></i>
						<span class="badge badge-success">7</span>
					</a>
					
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="#" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
			<!-- main menu -->
					
			<ul class="navbar-nav">
				<li>
					<!-- <a href="dashboard-1.html">
						<i class="linecons-cog"></i>
						<span class="title">Home</span>
					</a> -->
					<!-- <ul>
						<li>
							<a href="dashboard-1.html">
								<span class="title">Dashboard 1</span>
							</a>
						</li>
						<li>
							<a href="dashboard-2.html">
								<span class="title">Dashboard 2</span>
							</a>
						</li>
						<li>
							<a href="dashboard-3.html">
								<span class="title">Dashboard 3</span>
							</a>
						</li>
						<li>
							<a href="dashboard-4.html">
								<span class="title">Dashboard 4</span>
							</a>
						</li>
						<li>
							<a href="skin-generator.html">
								<span class="title">Skin Generator</span>
							</a>
						</li>
					</ul> -->
				</li>
				<!-- <li class="opened active">
					<a href="{{url('customerHome')}}">
						<i class="linecons-desktop"></i>
						<span class="title">Home</span>
					</a>
					<ul>
						<li>
							<a href="layout-variants.html">
								<span class="title">Layout Variants &amp; API</span>
							</a>
						</li>
						<li>
							<a href="layout-collapsed-sidebar.html">
								<span class="title">Collapsed Sidebar</span>
							</a>
						</li>
						<li>
							<a href="layout-static-sidebar.html">
								<span class="title">Static Sidebar</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-menu.html">
								<span class="title">Horizontal Menu</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-plus-sidebar.html">
								<span class="title">Horizontal &amp; Sidebar Menu</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-menu-click-to-open-subs.html">
								<span class="title">Horizontal Open On Click</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-menu-min.html">
								<span class="title">Horizontal Menu Minimal</span>
							</a>
						</li>
						<li>
							<a href="layout-right-sidebar.html">
								<span class="title">Right Sidebar</span>
							</a>
						</li>
						<li>
							<a href="layout-chat-open.html">
								<span class="title">Chat Open</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-sidebar-menu-collapsed-right.html">
								<span class="title">Both Menus &amp; Collapsed</span>
							</a>
						</li>
						<li>
							<a href="layout-boxed.html">
								<span class="title">Boxed Layout</span>
							</a>
						</li>
						<li>
							<a href="layout-boxed-horizontal-menu.html">
								<span class="title">Boxed &amp; Horizontal Menu</span>
							</a>
						</li>
					</ul> -->
				<!-- </li> -->
				<li>
					<a href="{{url('menu')}}">
						<i class="linecons-note"></i>
						<span class="title">Menu</span>
					</a>
					<!-- <ul>
						<li>
							<a href="ui-panels.html">
								<span class="title">Panels</span>
							</a>
						</li>
						<li>
							<a href="ui-buttons.html">
								<span class="title">Buttons</span>
							</a>
						</li>
						<li>
							<a href="ui-tabs-accordions.html">
								<span class="title">Tabs &amp; Accordions</span>
							</a>
						</li>
						<li>
							<a href="ui-modals.html">
								<span class="title">Modals</span>
							</a>
						</li>
						<li>
							<a href="ui-breadcrumbs.html">
								<span class="title">Breadcrumbs</span>
							</a>
						</li>
						<li>
							<a href="ui-blockquotes.html">
								<span class="title">Blockquotes</span>
							</a>
						</li>
						<li>
							<a href="ui-progressbars.html">
								<span class="title">Progress Bars</span>
							</a>
						</li>
						<li>
							<a href="ui-navbars.html">
								<span class="title">Navbars</span>
							</a>
						</li>
						<li>
							<a href="ui-alerts.html">
								<span class="title">Alerts</span>
							</a>
						</li>
						<li>
							<a href="ui-pagination.html">
								<span class="title">Pagination</span>
							</a>
						</li>
						<li>
							<a href="ui-typography.html">
								<span class="title">Typography</span>
							</a>
						</li>
						<li>
							<a href="ui-other-elements.html">
								<span class="title">Other Elements</span>
							</a>
						</li>
					</ul> -->
				</li>
				<li>
					<a href="{{url('about')}}">
						<i class="linecons-params"></i>
						<span class="title">About</span>
					</a>
					<!-- <ul>
						<li>
							<a href="forms-native.html">
								<span class="title">Native Elements</span>
							</a>
						</li>
						<li>
							<a href="forms-advanced.html">
								<span class="title">Advanced Plugins</span>
							</a>
						</li>
						<li>
							<a href="forms-wizard.html">
								<span class="title">Form Wizard</span>
							</a>
						</li>
						<li>
							<a href="forms-validation.html">
								<span class="title">Form Validation</span>
							</a>
						</li>
						<li>
							<a href="forms-input-masks.html">
								<span class="title">Input Masks</span>
							</a>
						</li>
						<li>
							<a href="forms-file-upload.html">
								<span class="title">File Upload</span>
							</a>
						</li>
						<li>
							<a href="forms-editors.html">
								<span class="title">Editors</span>
							</a>
						</li>
						<li>
							<a href="forms-sliders.html">
								<span class="title">Sliders</span>
							</a>
						</li>
					</ul> -->
				</li>
				<li>
					<a href="{{url('contact')}}">
						<i class="fa-phone-square"></i>
						<span class="title">Contact</span>
					</a>
					
				</li>
				<li>
					<a href="{{url('cart')}}">
						<i class="fa-shopping-cart"></i>
						<span class="title">Cart</span>
					</a>
					
				</li>
			</ul>
					
			
			<!-- notifications and other links -->
			<ul class="nav nav-userinfo navbar-right">
				
				<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
			
					<form method="get" action="extra-search.html">
						<input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />
						
						<button type="submit" class="btn btn-link">
							<i class="linecons-search"></i>
						</button>
					</form>
					
				</li>
				
				
				
				
		
				<!-- <li class="dropdown user-profile">
					<a href="#" data-toggle="dropdown">
						<img src="assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							Arlind Nushi
							
						</span>
					</a> -->
					
					<!-- <ul class="dropdown-menu user-profile-menu list-unstyled">
						<li>
							<a href="#edit-profile">
								<i class="fa-edit"></i>
								New Post
							</a>
						</li>
						<li>
							<a href="#settings">
								<i class="fa-wrench"></i>
								Settings
							</a>
						</li>
						<li>
							<a href="#profile">
								<i class="fa-user"></i>
								Profile
							</a>
						</li>
						<li>
							<a href="#help">
								<i class="fa-info"></i>
								Help
							</a>
						</li>
						<li class="last">
							<a href="extra-lockscreen.html">
								<i class="fa-lock"></i>
								Logout
							</a>
						</li>
					</ul> -->
				<!-- </li> -->
				<li>
					<a href="{{url('registration')}}" >
						<i class="fa-plus"></i>
					</a>
				</li>
				<li>
					<a href="{{url('signin')}}" >
						<i class="fa-sign-in"></i>
					</a>
				</li>
				<li>
					<a href="{{url('signout')}}" >
						<i class="fa-sign-out"></i>
					</a>
				</li>
				
			</ul>
	
		</div>
		
	</nav>
