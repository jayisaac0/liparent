
<!-- Move to top button -->

<!-- Login modal -->
	<div class="modal fade apartment-modal" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Login<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<form method="post">
						<input name="email" type="email" class="input-full main-input" placeholder="Email" />
						<input name="password" type="password" class="input-full main-input" placeholder="Your Password" />
						<button type="submit" name="loginbutton"  class="button-primary button-shadow button-full">
							<span>Sing In</span>
							<div class="button-triangle"></div>
							<div class="button-triangle2"></div>
							<div class="button-icon"><i class="fa fa-user"></i></div>
						</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<!-- Register modal -->
	<div class="modal fade apartment-modal" id="register-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Register<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<form method="post">
						<input name="firstname" type="text" class="input-full main-input" placeholder="Frist name" />
						<input name="lastname" type="text" class="input-full main-input" placeholder="Last name" />
						<input name="idnumber" type="number" class="input-full main-input" placeholder="ID number" />
						<input name="email" type="email" class="input-full main-input" placeholder="Email" />
						<input name="phonenumber" type="number" class="input-full main-input" placeholder="Phone number" />
						<input name="password" type="password" class="input-full main-input" placeholder="Password" />
						<input name="repeatpassword" type="password" class="input-full main-input" placeholder="Repeat Password" />
						<button type="submit" name="btn-registration" class="button-primary button-shadow button-full">
							<span>Sing up</span>
							<div class="button-triangle"></div>
							<div class="button-triangle2"></div>
							<div class="button-icon"><i class="fa fa-user"></i></div>
						</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<!-- Forgotten password modal -->
	<div class="modal fade apartment-modal" id="forgot-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Forgot your password<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<p class="negative-margin forgot-info">Instert your account email address.<br/>We will send you a link to reset your password.</p>
					<input name="login" type="email" class="input-full main-input" placeholder="Your email" />
					<a href="my-profile.php" class="button-primary button-shadow button-full">
						<span>Reset password</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<!-- Forgotten password modal -->
	<div class="modal fade apartment-modal" id="property-name-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Add new property<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<p class="negative-margin forgot-info">Provide new property</p>
					<form method="post">
						<input name="propertyname" type="text" class="input-full main-input" placeholder="Your property name" />
						<button type="submit" name="newproperty" class="button-primary button-shadow button-full">
							<span>Add new property</span>
							<div class="button-triangle"></div>
							<div class="button-triangle2"></div>
							<div class="button-icon"><i class="fa fa-user"></i></div>
						</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- Forgotten password modal -->
	<div class="modal fade apartment-modal" id="property-managers-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Make manager<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<p class="negative-margin forgot-info">Select person to make property manager<br/></p>
					<form method="post">
						<select name="public_id" class="input-full main-input">
							<option disabled="disabled">Make selection</option>
							<?php          
							$stmt = $auth_user->runQuery("SELECT * FROM users WHERE public_id != '$public_id' ");
							$stmt->execute(array());
							$managerselect=$stmt->fetch(PDO::FETCH_ASSOC);

							    $num = $stmt->rowCount();
							    if($num > 0) {
							            $stmt = $auth_user->runQuery("SELECT * FROM users ");
							            $stmt->execute(array());
							            $mselect=$stmt->fetchAll(PDO::FETCH_OBJ);
							            foreach ($mselect as $mselect) {
							            	?><option value="<?php echo $mselect->public_id; ?>"><?php echo $mselect->email; ?></option><?php
							            }
							    }else{
							    	?><option disabled="disabled">NO USER FOUND</option><?php
							    }
							?>

						</select><br />

						<select name="property_id" class="input-full main-input">
							<option disabled="disabled">Select property</option>
							<?php          
							$stmt = $auth_user->runQuery("SELECT * FROM properties ");
							$stmt->execute(array());
							$propertyselect=$stmt->fetch(PDO::FETCH_ASSOC);

							    $num = $stmt->rowCount();
							    if($num > 0) {
							            $stmt = $auth_user->runQuery("SELECT * FROM properties ");
							            $stmt->execute(array());
							            $pselect=$stmt->fetchAll(PDO::FETCH_OBJ);
							            foreach ($pselect as $pselect) {
							            	?><option value="<?php echo $pselect->property_id; ?>"><?php echo $pselect->propertyname; ?></option><?php
							            }
							    }else{
							    	?><option disabled="disabled">NO PROPERTY FOUND</option><?php
							    }
							?>

						</select><br />

						<select name="isadmin" class="input-full main-input">
							<option disabled="disabled">Make selection</option>
							<option value="2">Make property manager</option>
						</select><br />
						<button type="submit" name="newmanager" class="button-primary button-shadow button-full">
							<span>Create new property manager</span>
							<div class="button-triangle"></div>
							<div class="button-triangle2"></div>
							<div class="button-icon"><i class="fa fa-user"></i></div>
						</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<!-- jQuery  -->
    <script type="text/javascript" src="js/jQuery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jQuery/jquery-ui.min.js"></script>
	
<!-- Bootstrap-->
    <script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>

<!-- Google Maps -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDfDCV5hXiPamCIT8_vwGXuzimLQ9MF76g&amp;sensor=false&amp;libraries=places"></script>
	
<!-- plugins script -->
	<script type="text/javascript" src="js/plugins.js"></script>

<!-- template scripts -->
	<script type="text/javascript" src="mail/validate.js"></script>
    <script type="text/javascript" src="js/apartment.js"></script>

<!-- google maps initialization -->
	<script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
			function init() {
				mapInit(40.6128,-73.7903,"featured-map1","images/pin-house.png", false);
				mapInit(40.7222,-73.7903,"featured-map2","images/pin-apartment.png", false);
				mapInit(41.0306,-73.7669,"featured-map3","images/pin-land.png", false);
				mapInit(41.3006,-72.9440,"featured-map4","images/pin-commercial.png", false);
				mapInit(42.2418,-74.3626,"featured-map5","images/pin-house.png", false);
				mapInit(38.8974,-77.0365,"featured-map6","images/pin-apartment.png", false);
				mapInit(38.7860,-77.0129,"featured-map7","images/pin-house.png", false);
				
				mapInit(41.2693,-70.0874,"grid-map1","images/pin-house.png", false);
				mapInit(33.7544,-84.3857,"grid-map2","images/pin-apartment.png", false);
				mapInit(33.7337,-84.4443,"grid-map3","images/pin-land.png", false);
				mapInit(33.8588,-84.4858,"grid-map4","images/pin-commercial.png", false);
				mapInit(34.0254,-84.3560,"grid-map5","images/pin-apartment.png", false);
				mapInit(40.6128,-73.9976,"grid-map6","images/pin-house.png", false);
			}
	</script>
	
	</body>

<!-- Mirrored from apartment-html.chart.civ.pl/index2.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 14:08:32 GMT -->
</html>