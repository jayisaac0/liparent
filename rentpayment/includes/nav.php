<header class="header2">
<script>
    setTimeout(function() {
        $('#snack-wrap').fadeOut("slow");
    }, 4000); // <-- time in milliseconds
</script>	
<div class="top-bar-wrapper" id="snack-wrap">
	<div class="container top-bar" style="box-shadow: 2px 2px 2px 2px beige;background: #2b9830 !important;text-align: center;align-items: center;">
		<b style="font-size: 20px;"><?php echo @$alert; ?></b>
	</div><!-- /.top-bar -->	
</div><!-- /.Page top-bar-wrapper -->	

<nav class="navbar main-menu-cont">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar icon-bar1"></span>
				<span class="icon-bar icon-bar2"></span>
				<span class="icon-bar icon-bar3"></span>
			</button>
			<a href="index-2.php" title="" class="navbar-brand">
				<img src="images/logo-light.png" alt="Apartment - Premium Real Estate Template" />
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
				</li>
				<li class="dropdown">
					<a href="contact.php" role="button" aria-haspopup="true" aria-expanded="false">Contact us</a>
				</li>
				<li class="dropdown">
					<a href="about.php" role="button" aria-haspopup="true" aria-expanded="false">About us</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
					<ul class="dropdown-menu">
						<?php if($user->is_loggedin()=="") { ?>
						<li><a href="#login-modal" data-toggle="modal">Login</a></li>
						<li><a href="#forgot-modal" data-toggle="modal">Forgotten Password</a></li>
						<?php }else { ?>
							<?php if($userRow['isadmin'] == 1) { ?>
							<li><a href="#register-modal" data-toggle="modal">Register</a></li>
							<?php } ?>
						<li><a href="profile.php">My account - Profile</a></li>
						<?php } ?>
					</ul>
				</li>

				<?php
				if($user->is_loggedin()!="") { ?>
					<?php if($userRow['isadmin'] == 1) { ?>
					<li class="dropdown">
						<a href="#" class="special-color" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property management</a>
						<ul class="dropdown-menu">
							<li><a href="submitproperty.php">Submit property</a></li>
							<li><a href="estates.php">Listings</a></li>
							<hr />
							<li><a href="#property-name-modal" data-toggle="modal">Add new property</a></li>
							<li><a href="#property-managers-modal" data-toggle="modal">Choose property manager</a></li>
						</ul>
					</li>
					<?php } ?>
					<li class="dropdown">
						<a href="logout.php?logout=true" class="special-color"role="button" aria-haspopup="true" aria-expanded="false">Logout</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav><!-- /.mani-menu-cont -->	
</header>