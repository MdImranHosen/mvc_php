<h2>Welcome to Admin Panel..</h2>
Welcome: <?php if (!empty(Session::get('username'))) {
	echo Session::get('username');
} ?>