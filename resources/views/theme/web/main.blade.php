<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('theme.web.head')

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		@include('theme.web.header')
		<!-- #header end -->

		@include('theme.web.slider')

		<!-- Content
		============================================= -->
        {{$slot}}
		<!-- #content end -->

		<!-- Footer
		============================================= -->
		@include('theme.web.footer')
        <!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	@include('theme.web.js')
	@yield('custom_js')
</body>
</html>