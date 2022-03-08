<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="collapse navbar-collapse">
		<a href="/" class="navbar-brand">
			<img src="images/menu.png" alt="" class="d-inline-block align-top" height="30" width="30">
			Restaurant
		</a>
		<div class="navbar-nav">
			<a href="/" class="nav-item nav-link @yield('menu_home')">Home</a>
			<a href="/uc/create" class="nav-item nav-link @yield('menu_register')">Register</a>
			<a href="/contactus" class="nav-item nav-link @yield('menu_contactus')">Contact Us</a>
		</div>
	</div>
</nav>