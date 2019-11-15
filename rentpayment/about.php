<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'includes/header.php'; ?>

<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">

	<?php require_once 'includes/nav.php'; ?>
    <section class="no-padding adv-search-section">
		<!-- Slider main container -->
		<div id="swiper2" class="swiper-container">
                  
                    <div class="swiper-wrapper">
				<div class="swiper-slide swiper-lazy" data-background="images/slides/m8.jpg">
					<div class="container">
                        <div class="row">
							<div class="col-xs-8 col-xs-offset-2 animated fadeInDown slide2-desc slide2-desc-1">
								<h1 class="second-color">About US<span class="special-color">.</span></h1>
								<div class="clearfix"></div>									
								<p class="swiper2-text">Lipa Rent is a billing platform for property managers, It is fully automated, accurate and secure. The platform allows property managers to list their properties together with the corresponding tenents. Through Lipa rent, tenants can make monthly remitances through all digital payment platforms which include: M-PESA, AIRTEL MONEY, YU KASH and Bank deposits</p>
								<div class="swiper2-buttons margin-top-45">									
									<a href="#moreread" class="button-primary">
										<span>read more</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="fa fa-search"></i></div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="slider-overlay"></div>
				</div>
		</div>

    </section>
	
    <section class="section-light bottom-padding-45 section-both-shadow" id="moreread">
		<div class="container">
			<div class="row">

<?php
$stmt = $auth_user->runQuery("SELECT * FROM users JOIN properties ON `users`.`property_id`=`properties`.`property_id` WHERE `users`.`property_id` !=0 ");
$stmt->execute(array());
$manager=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($manager as $mn) { ?>
	<div class="col-sm-6 col-lg-4">
		<div class="feature2 wow fadeInLeft" id="feature1">
			<div class="feature2-text" style="text-align: center;align-items: center;">
				<img src="<?php echo $mn->agentphoto; ?>" alt="mg" style="width:100px;height:100px;border-radius: 50px;margin-bottom:20px;"/>
				<h4><?php echo $mn->firstname.' '.$mn->lastname; ?><span class="special-color">.</span></h4>
				
				<p>Appartment manager at <?php echo $mn->propertyname; ?><br />
					<?php echo $mn->email; ?><br />
					<?php echo $mn->phonenumber; ?>
				</p>
			</div>
		</div>
	</div>
<?php } ?>				


				<hr class="col-sm-12 col-lg-12" />		
				<div class="col-sm-12 col-lg-12">
					<div class="feature2 wow fadeInLeft" id="feature4">
						<div class="feature2-text" style="text-align: center;align-items: center;">
							<h2>OFFLINE PAYMENT OPTIONS<span class="special-color">.</span></h2><br />
							
							<h4 style="line-height: 1.5;">
								Mpesa PayBill No: 456798 Account No: Mobile number Bank Remittances Account Name: Louise Manyara Account No : 1150984694 Branch : Gikomba.
							</h4>
						</div>
					</div>
				</div>
				<hr class="col-sm-12 col-lg-12" />	
				<div class="col-sm-6 col-lg-4">
					<div class="feature2 wow fadeInUp" id="feature5">
						<div class="feature2-icon"><i class="fa fa-gears"></i></div>
						<div class="feature2-text">
							<h4>3 BLOG STYLES<span class="special-color">.</span></h4>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
						</div>
					</div>
				</div>			
				<div class="col-sm-6 col-lg-4">
					<div class="feature2 wow fadeInRight" id="feature6">
						<div class="feature2-icon"><i class="fa fa-pie-chart"></i></div>
						<div class="feature2-text">
							<h4>6 HOMEPAGES<span class="special-color">.</span></h4>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
						</div>
					</div>
				</div>			
			</div>
		</div>
    </section>

</div>	
<?php require_once 'includes/footer.php'; ?>