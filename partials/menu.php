<nav id="nav">
	<ul>
		<li<?=($params['menu_active_item'] == 'home' ? ' class="active"' : '')?>><a href="index.php">Home</a></li>
		<li<?=($params['menu_active_item'] == 'contact' ? ' class="active"' : '')?>><a href="index.php?page=contact">Contact</a></li>
		<li>
			<a href="#" class="icon fa-angle-down">Layouts</a>
			<ul>
				<li><a href="generic.html">Generic</a></li>
				<li><a href="index.php?page=contact">Contact</a></li>
				<li><a href="elements.html">Elements</a></li>
				<li>
					<a href="#">Submenu</a>
					<ul>
						<li><a href="#">Option One</a></li>
						<li><a href="#">Option Two</a></li>
						<li><a href="#">Option Three</a></li>
						<li><a href="#">Option Four</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="#" class="button">Sign Up</a></li>
	</ul>
</nav>