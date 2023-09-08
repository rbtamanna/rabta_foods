<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.frontHeaderLinks')
	@yield('page_css')
</head>
<body class="page-body">
@include('frontend.frontHeader')
    <div class="page-container container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	    
        @yield('contents')
		

		
    </div>
    
	
    @include('frontend.frontFooter')
    @include('frontend.frontFooterLinks')
    @yield('page_js')
</body>
</html>