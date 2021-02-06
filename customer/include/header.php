
	<!--Bootstrap class for display information at the center for extra attention, also a header-->
	<div class=" jumbotron text-center mb-0 d-none d-sm-block headerImage" >
		<h1>Digital Printing Shop</h1>
		<p>Print Anywhere, Anytime!</p>
	</div>

	<!--Website navigation bar-->
     <nav class="navbar navbar-expand-sm bg-info navbar-dark sticky-top">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand ml-2" href="home.php">MyPrint</a>
			<ul class="navbar-nav ml-auto d-block d-sm-none">
				<li>
					<a class="nav-link" href="checkout.php">Cart</a>
				</li>
			</ul>
			<div class="collapse navbar-collapse ml-auto" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
						<div class="dropdown-menu">
							<!--dropdown menu for products-->
							<a class="dropdown-item" href="product_catalog.php?ID=1">A4</a>
							<a class="dropdown-item" href="product_catalog.php?ID=2">Banner</a>
							<a class="dropdown-item" href="product_catalog.php?ID=3">Brochure</a>
							<a class="dropdown-item" href="product_catalog.php?ID=4">Calendar</a>
							<a class="dropdown-item" href="product_catalog.php?ID=5">Name Card</a>
							<a class="dropdown-item" href="product_catalog.php?ID=6">Poster</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="request_quote.php">Request quote</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about_us.php">About us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact_us.php">Contact us</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="dropdown">
						<?php

						if (session_status() == PHP_SESSION_NONE) {
							session_start();
						}
						if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
							$status = "Login/Register";
							$pressed = "dropdown";
							$toggle = "#";
						} else {
							$status = "Logout";
							$pressed = "";
							$toggle = "../account/logout.php";
						} ?>
						<a class="nav-link" href="<?php echo $toggle; ?>" data-toggle="<?php echo $pressed; ?>"><?php echo $status ?></a>
						<div class="dropdown-menu" style="margin-top: 8px; padding: 20px; padding-bottom: 20px; padding-left: 30px; padding-right: 30px;">
						<form class="form-horizontal" action="../account/login2.php" method="post" accept-charset="UTF-8">
							<input id="username" class="form-control login" type="text" name="username" placeholder="Username.." />
							<input id="password" class="form-control login" type="password" name="password" placeholder="Password.."/>
							<input class="btn btn-info" style="margin-top: 5px;" type="submit" name="submit" value="login" />
						  </form>
							<form class="form-horizontal" action="../account/register.php" method="get">
								<input class="btn btn-info" style="margin-top: 5px;" type="submit" name="submit" value="Register" />
							</form>
						  </div>
					  </li>
					<!--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login</a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
						<form class="form-horizontal"  method="post" accept-charset="UTF-8">
						  <input id="sp_uname" class="form-control login" type="text" name="sp_uname" placeholder="Username.." />
						  <input id="sp_pass" class="form-control login" type="password" name="sp_pass" placeholder="Password.."/>
						  <input class="btn btn-primary" type="submit" name="submit" value="login" />
						</form>
						</div>
					</li>-->
					<li>
						<a class="nav-link d-none d-sm-block" href="checkout.php">Cart</a>
					</li>
				</ul>
			</div>
    </nav>
