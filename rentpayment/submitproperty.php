<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php if($userRow['isadmin'] != 1) { ?><?php echo '<script type="text/javascript">window.location = "profile.php"</script>'; ?><?php } ?>
<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">

	<?php require_once 'includes/nav.php'; ?>
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color">add listing</h5>
					<h1 class="second-color">my account</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" method="post" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Listing details<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
								
								<div class="col-xs-12 col-sm-6 margin-top-xs-15">
									<select name="property_id" class="input-full main-input">
										<option>Select property</option>
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
								</div>
								<div class="col-xs-12 col-sm-6">
									<select name="appartment" class="bootstrap-select" title="Property type:">
										<option>Apartment</option>
										<option>House</option>
										<option>Commercial</option>
										<option>Land</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="appartmenttype" type="text" class="input-full main-input" placeholder="eg. bedsitter, single room, ..." />
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="appartmentlocation" type="text" class="input-full main-input" placeholder="Location, eg upperhill" />
								</div>

								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="appartmentprice" min="0" type="number" class="input-full main-input" placeholder="Price" />
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="appartmentarea" type="text" class="input-full main-input" placeholder="Area" />
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="appartmentbedrooms" min="0" type="number" class="input-full main-input" placeholder="Bedrooms" />
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="appartmentbathrooms" min="0" type="number" class="input-full main-input" placeholder="Bathrooms" />
								</div>
							</div>
							<textarea name="message" class="input-full main-input property-textarea" placeholder="Description"></textarea>

						</div>				
					</div>
					<div class="col-xs-12 col-md-6 margin-top-xs-60 margin-top-sm-60">
						<h3 class="title-negative-margin">Localization<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<input id="geocomplete" name="geocomplete" type="text" class="input-full main-input" placeholder="Localization" />
							<p class="negative-margin bold-indent">Or drag the marker to property position<p>
							<div id="submit-property-map" class="submit-property-map"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly" />
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 margin-top-60">
						<h3 class="title-negative-margin">gallery<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
					</div>
					<div class="col-xs-12 margin-top-60">
						<input id="file-upload" name="roomimage" type="file" >
					</div>
					<div class="col-xs-12">
						<div class="center-button-cont margin-top-60">
							<button type="submit" name="submitnewappartment" href="#" class="button-primary button-shadow">
								<span>submit property</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>

</div>	
<?php require_once 'includes/footer.php'; ?>