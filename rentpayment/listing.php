<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php if($userRow['isadmin'] != 1 || $userRow['property_id'] == 0) { ?><?php echo '<script type="text/javascript">window.location = "profile.php"</script>'; ?><?php } ?>
<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">
<style type="text/css">
.modal-backdrop.fade {
    display: none !important;
}	
</style>
	<?php require_once 'includes/nav.php'; ?>
<?php if (isset($_GET['property'])) {
	$property_id = $_GET['property']; ?>

  	
	<section class="adv-search-section no-padding">
		<div id="offers-map" style="height: 100px !important;"></div>
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM properties JOIN users ON `properties`.`property_id`=`users`.`property_id` WHERE `users`.`property_id` = '$property_id' ");
	$stmt->execute(array());
	$manager=$stmt->fetchAll(PDO::FETCH_OBJ);
	foreach ($manager as $manager) { ?>
		
			<div class="adv-search-cont">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-lg-11 adv-search-icons">
							<!-- Nav tabs -->
							<ul class="nav " >
								<li role="presentation"><a href="#apartments" style="font-size: 20px;font-weight: bold;" id="adv-search-tab1"><i class="fa fa-building"></i> Manager: <?php echo $manager->firstname. ' '; ?><?php echo $manager->lastname; ?></a></li>
								<li role="presentation"><a href="#houses" style="font-size: 20px;font-weight: bold;" id="adv-search-tab2"><i class="fa fa-home"></i> Email: <?php echo $manager->email; ?></a></li>
								<li role="presentation"><a href="#commercials" style="font-size: 20px;font-weight: bold;" id="adv-search-tab3"><i class="fa fa-industry"></i> Contact: <?php echo $manager->phonenumber; ?></a></li>
								<li role="presentation"><a href="#lands" style="font-size: 20px;font-weight: bold;" id="adv-search-tab4"><i class="fa fa-tree"></i> Property: <?php echo $manager->propertyname; ?></a></li>
							</ul>
						</div>
					
					</div>
				</div>
			</div>
<?php }  ?>
		

    </section>

	<section class="section-light section-top-shadow">
		<div class="container">
			<div class="row">

				<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12 col-lg-6">
								<h5 class="subtitle-margin">Appartments for rent</h5>
								<h1>Appartment manager<span class="special-color">.</span></h1>
							</div>
													
							<div class="col-xs-12">
								<div class="title-separator-primary"></div>
							</div>
						</div> 
						<div class="row grid-offer-row">
						<?php
						$stmt = $auth_user->runQuery("SELECT * FROM appartments WHERE property_id = '$property_id' ");
						$stmt->execute(array());
						$apappartments=$stmt->fetchAll(PDO::FETCH_OBJ);
						foreach ($apappartments as $appm) { ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
								<div class="grid-offer">
									<div class="grid-offer-front">
									
										<div class="grid-offer-photo">
											<img src="<?php echo $appm->roomimage; ?>" alt="" />
											<div class="type-container">
												<?php if($appm->public_id == NULL) { ?>
													<a href="#<?php echo $appm->appartments_id; ?>" data-toggle="modal">
													<div class="estate-type">Add ternant</div>
													</a>
												<?php }else{ ?>
													<div class="estate-type">Occupied</div>
													<?php
													$stmt = $auth_user->runQuery("SELECT * FROM users WHERE public_id = '$appm->public_id' ");
													$stmt->execute(array());
													$userval=$stmt->fetchAll(PDO::FETCH_OBJ);
													foreach ($userval as $userval) { ?>
													<a href="tenantmanager.php?tenant=<?php echo $appm->public_id; ?>" data-toggle="modal">
													<div class="transaction-type"><?php echo $userval->firstname.' '; ?><?php echo $userval->lastname; ?></div>
													<?php } ?>
													</a>													
												<?php } ?>
											</div>
										</div>
										<div class="grid-offer-text">
											<i class="fa fa-map-marker grid-offer-localization"></i>
											<div class="grid-offer-h4"><h4 class="grid-offer-title"><?php echo $appm->geocomplete; ?></h4></div>
											<div class="clearfix"></div>
											<p><?php echo substr($appm->message, 0, 200); ?></p>
											<div class="clearfix"></div>
										</div>
										<div class="price-grid-cont">
											<div class="grid-price-label pull-left">Price:</div>
											<div class="grid-price pull-right">
												Ksh <?php echo $appm->appartmentprice; ?>
											</div>
											<div class="clearfix"></div>
										</div>
						
										<div class="grid-offer-params">
											<a href="archive.php?appartment=<?php echo $appm->appartments_id; ?>">
										<button type="submit" name="uservacation" class="button-primary button-shadow button-full">
											<span>View Archives</span>
											<div class="button-triangle"></div>
											<div class="button-triangle2"></div>
											<div class="button-icon"><i class="fa fa-user"></i></div>
										</button>
									</a>
											<div class="grid-area">
												<img src="images/area-icon.png" alt="" /><?php echo $appm->appartmentarea; ?><sup>2</sup>
											</div>
											<div class="grid-rooms">
												<img src="images/rooms-icon.png" alt="" /><?php echo $appm->appartmentbedrooms; ?>
											</div>
											<div class="grid-baths">
												<img src="images/bathrooms-icon.png" alt="" /><?php echo $appm->appartmentbathrooms; ?>
											</div>							
										</div>	
										
									</div>
									<div class="grid-offer-back">
										<div id="grid-map1" class="grid-offer-map"></div>
										<div class="button">	
											<a href="estate-details-right-sidebar.php" class="button-primary">
												<span>read more</span>
												<div class="button-triangle"></div>
												<div class="button-triangle2"></div>
												<div class="button-icon"><i class="fa fa-search"></i></div>
											</a>
										</div>
									</div>
								</div>							
							</div>


	<div class="modal fade apartment-modal" id="<?php echo $appm->appartments_id; ?>" style="z-index: 10001 !important;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Assign appartment to ternant<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<b>
						<p class="negative-margin forgot-info">Appartment ID: <?php echo $appm->appartments_id; ?></p>
					</b>
					<form method="post">
						<input type="text" hidden="hidden" name="appartments_id" value="<?php echo $appm->appartments_id; ?>">
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
						<button type="submit" name="updatetenantoccupancy" class="button-primary button-shadow button-full">
							<span>Assign to tenant</span>
							<div class="button-triangle"></div>
							<div class="button-triangle2"></div>
							<div class="button-icon"><i class="fa fa-user"></i></div>
						</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

						<?php } ?>
				


						</div>
					
				</div>

			</div>
		</div>
	</section>
<?php } ?>
</div>	
<?php require_once 'includes/footer.php'; ?>