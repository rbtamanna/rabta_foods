<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.frontHeaderLinks')
	@yield('page_css')
</head>
<body class="page-body">
    @include('frontend.frontHeader')
    @yield('contents')
	
    @include('frontend.frontFooter')
    @include('frontend.frontFooterLinks')
    @yield('page_js')
</body>
</html>