<!-- Header -->

<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/index.php" title="HOME"><i class="ion-paper-airplane"></i> syria <span>travel</span></a>
		</div> <!-- /.navbar-header -->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="/index.php">Home</a></li>
				<li><a href="/Global/download.php">Mobile</a></li>
				<li><a href="/Global/about.php">about</a></li>
			</ul> <!-- /.nav -->

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/Auth/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							<div class="row">
								<div class="text-muted col-md-12">
									Login
									<hr class="colorgraph">
									<form class="form" role="form" method="post" action="/Auth/login.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											<label class="sr-only" for="exampleInputEmail2">Email address</label>
											<input type="text" name="username" class="form-control" placeholder="Username" required>
										</div>
										<div class="form-group">
											<label class="sr-only" for="exampleInputPassword2">Password</label>
											<input type="password" name="password" class="form-control" placeholder="Password" required>
											
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Login</button>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="remember"> keep me logged-in
											</label>
										</div>
									</form>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul> <!-- /.nav -->
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>

