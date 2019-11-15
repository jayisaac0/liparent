<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php if($userRow['isadmin'] != 1 || $userRow['property_id'] == 0) { ?><?php echo '<script type="text/javascript">window.location = "profile.php"</script>'; ?><?php } ?>
<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">

	<?php require_once 'includes/nav.php'; ?>
<?php if (isset($_GET['tenant'])) { $tenant = $_GET['tenant'] ?>
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM appartments JOIN users ON `appartments`.`property_id`=`users`.`property_id` WHERE `users`.`property_id` = '$tenant' LIMIT 1 ");
	$stmt->execute(array());
	$tenant_val=$stmt->fetchAll(PDO::FETCH_OBJ);
	foreach ($tenant_val as $tenant_val) { ?>
	
    <section class="section-dark no-padding">
		<!-- Slider main container -->
		<div id="swiper-gallery" class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide">
					<div class="slide-bg swiper-lazy" style="background: purple;" data-background="images/slides/1.jpg" data-sub-html="<strong>this is a caption 1</strong><br/>Second line of the caption"></div>
					<!-- Preloader image -->
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated fadeInUp gallery-slide-desc-1">
								<div class="gallery-slide-cont">
									<div class="gallery-slide-cont-inner">	
										<div class="gallery-slide-title pull-right">
											<h5 class="subtitle-margin">apartments for sale</h5>
											<h3><?php echo $tenant_val->geocomplete; ?><span class="special-color">.</span></h3>
										</div>
										<div class="gallery-slide-estate pull-right hidden-xs">
											<i class="fa fa-home"></i>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div class="gallery-slide-desc-price pull-right">
										Ksh <?php echo $tenant_val->appartmentprice; ?>
									</div>	
									<div class="clearfix"></div>
								</div>	
							</div>			
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div class="slide-buttons slide-buttons-center">
				<a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
				<div id="slide-more-cont"></div>
				<a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
			</div>
			
		</div>
    </section>
	<section class="section-light no-bottom-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<div class="details-image pull-left hidden-xs">
								<i class="fa fa-home"></i>
							</div>
							<div class="details-title pull-left">
								<h5 class="subtitle-margin">apartment for sale</h5>
								<h3>Monthly rent tracker for [ <?php echo $tenant_val->firstname.' '.$tenant_val->lastname; ?> ]<span class="special-color">.</span></h3>
							</div>
							<div class="clearfix"></div>	
							<div class="title-separator-primary"></div>
								<table>
								  <tr>
								    <th>Appartment</th>
								    <th>Month</th>
								    <th>Ammount</th>
								    <th>Status</th>
								  </tr>
									<?php
									$stmt = $auth_user->runQuery("SELECT * FROM payments WHERE  public_id = '$tenant' ");
									$stmt->execute(array());
									$payment=$stmt->fetchAll(PDO::FETCH_OBJ);
									foreach ($payment as $payment) { ?>						  
									  <tr>
									    <td><?php echo $payment->appartments_id; ?></td>
									    <td><?php echo $payment->month; ?></td>
									    <td><?php echo number_format($payment->appartmentprice, 2); ?></td>
									    <td style="width: 100px !important;">
											<?php 
										    if ($payment->status == 1) {
										    	echo 'PAID';
										    }else{
										    	echo 'PAYMENT PENDING';
										    }
										    ?>								    	

									    </td>
									  </tr>
									<?php } ?>						  

								</table>

						</div>

						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
							<div class="details-parameters-price">Settings</div>
							<div class="details-parameters" style="padding:5px;margin:5px;">
								<form method="post">
									<div class="details-parameters-cont">
										<input name="appartments_id" value="<?php echo $tenant_val->appartments_id; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
										<div class="clearfix"></div>	
									</div>
									<div class="details-parameters-cont">
										<button type="submit" name="uservacation" class="button-primary button-shadow button-full">
											<span>Vaccate tenant</span>
											<div class="button-triangle"></div>
											<div class="button-triangle2"></div>
											<div class="button-icon"><i class="fa fa-user"></i></div>
										</button>
										<div class="clearfix"></div>	
									</div>
								</form>

								<div class="details-parameters-cont">
									<a href="#offline-pay" data-toggle="modal">
										<button class="button-primary button-shadow button-full" >
											<span>Process pay</span>
											<div class="button-triangle"></div>
											<div class="button-triangle2"></div>
											<div class="button-icon"><i class="fa fa-user"></i></div>
										</button>
							    	</a>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont details-parameters-cont-last">
									<div class="details-parameters-name">Consectetur</div>
									<div class="details-parameters-val">eiusmod</div>
									<div class="clearfix"></div>	
								</div>
							</div>
						</div>

					</div>
					
					<div class="margin-top-45"></div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade apartment-modal" id="offline-pay">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>UPDATE PAYMENT<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>


					<form method="post">
<input name="public_id" type="text" class="input-full main-input" placeholder="public ID" hidden value="<?php echo $tenant; ?>" />
<input name="appartmentprice" type="text" class="input-full main-input" readonly placeholder="Price" value="<?php echo $payment->appartmentprice; ?>" />
<input name="appartments_id" type="text" class="input-full main-input" hidden placeholder="Appartment ID" value="<?php echo $payment->appartments_id; ?>" />
<select name="month" style="width: 100%;">
	<option value="January">January</option>
	<option value="February">February</option>
	<option value="March">March</option>
	<option value="April">April</option>
	<option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
</select>
<input name="status" type="text" class="input-full main-input" placeholder="Status" value="1" hidden />
<select name="pesapal_transaction_tracking_id" style="width: 100%;">
	<option value="Mpesa">Mpesa</option>
	<option value="Bank">Bank</option>
	<option value="March">March</option>
</select>


						<button type="submit" name="makepayupdate"  class="button-primary button-shadow button-full">
							<span>Update online records</span>
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
<?php } ?>	
</div>	
<?php require_once 'includes/footer.php'; ?>