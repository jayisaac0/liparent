<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'includes/header.php'; ?>
<!-- <?php if($userRow['isadmin'] == 1) { ?><?php echo '<script type="text/javascript">window.location = "estates.php"</script>'; ?><?php } ?>
<?php if($userRow['property_id'] != 0) { ?>
	<?php echo '<script type="text/javascript">window.location = "listing.php?property='.$userRow['property_id'].'"</script>'; ?>
<?php } ?> -->
<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM appartments WHERE  public_id = '".$userRow['public_id']."' ");
	$stmt->execute(array());
	$tenant_val=$stmt->fetchAll(PDO::FETCH_OBJ);
	foreach ($tenant_val as $tenant_val) { ?>
	<?php require_once 'includes/nav.php'; ?>
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class=" second-color"></h5>
					<h1 class="second-color"></h1>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-push-3">
					<div class="row">
						<div class="col-xs-12">
							<h5 class="subtitle-margin">edit</h5>
							<h1>Profile<span class="special-color">.</span></h1>
							<div class="title-separator-primary"></div>
						</div>
					</div>	
					<form name="agent-from" method="post" enctype="multipart/form-data">
					<div class="row margin-top-60">
						<div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-3 col-md-4">	
							<div class="agent-photos">
								<img src="<?php echo $userRow['agentphoto']; ?>" id="agent-profile-photo" class="img-responsive" alt="" />
								<div class="change-photo">
									<i class="fa fa-pencil fa-lg"></i>
									<input type="file" name="agentphoto" id="agentphoto" />
								</div>
								<input type="text" disabled="disabled" id="agent-file-name" class="main-input" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-8">
							<div class="labelled-input">
								<label for="first-name">First name</label><input id="firstname" name="firstname" type="text" class="input-full main-input"  value="<?php echo $userRow['firstname']; ?>"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="last-name">Last name</label><input id="lastname" name="lastname" type="text" class="input-full main-input"  value="<?php echo $userRow['lastname']; ?>"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="email">Email</label><input id="email" name="email" type="email" class="input-full main-input" placeholder="" value="<?php echo $userRow['email']; ?>"/>
								<div class="clearfix"></div>
							</div>
							<div class="labelled-input">
								<label for="phone">Phone</label><input id="phone" name="phonenumber" type="tel" class="input-full main-input" enabled placeholder="" value="<?php echo $userRow['phonenumber']; ?>"/>
								<div class="clearfix"></div>
							</div>

							<div class="center-button-cont center-button-cont-border">
								<button type="submit" name="pupdate" class="button-primary button-shadow">
									<span>Update profile</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
								</button>
							</div>
						</div>
					</div>
					<div class="row margin-top-15" style="height: auto;">
						<div class="col-xs-12">
							<div class="labelled-textarea">
								<label for="description">Payment tracker</label>

						<table>
						  <tr>
						    <th>Appartment</th>
						    <th>Month</th>
						    <th>Ammount</th>
						    <th>Status</th>
						  </tr>
							<?php
							$stmt = $auth_user->runQuery("SELECT * FROM payments WHERE  public_id = '".$userRow['public_id']."' ");
							$stmt->execute(array());
							$payment=$stmt->fetchAll(PDO::FETCH_OBJ);
							foreach ($payment as $payment) { ?>						  
							  <tr>
							    <td><?php echo $payment->appartments_id; ?></td>
							    <td><?php echo $payment->month; ?></td>
							    <td><?php echo number_format($payment->appartmentprice, 2); ?></td>
							    <td><?php 
							    if ($payment->status == 1) {
							    	echo 'PAID';
							    }else{
							    	echo 'PAYMENT PENDING';
							    }
							    ?></td>
							  </tr>
							<?php } ?>						  

						</table>

							</div>
						</div>
					</div>
				
				</form>

					<div class="row margin-top-60"></div>
				</div>			
				<div class="col-xs-12 col-md-3 col-md-pull-9">
					<div class="sidebar-left">
						<h3 class="sidebar-title">Welcome back<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="profile-info margin-top-60">
							<div class="profile-info-title negative-margin"><?php echo $tenant_val->geocomplete; ?></div>
							<img src="<?php echo $userRow['agentphoto']; ?>" alt="" class="pull-left" />
							<div class="profile-info-text pull-left">
								<p class="subtitle-margin"><?php echo $tenant_val->appartment; ?></p>
								<p class=""><?php echo $tenant_val->appartmenttype; ?></p>
								
								<a href="logout.php?logout=true" class="logout-link margin-top-30"><i class="fa fa-lg fa-sign-out"></i>Logout</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="center-button-cont margin-top-30">
							


								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
													<div class="details-parameters-price">Ksh <?php echo $tenant_val->appartmentprice; ?></div>
													<form method="post">
													<div class="details-parameters" style="padding:5px;margin:5px;">
														<div class="details-parameters-cont">
															<input name="public_id" value="<?php echo $tenant_val->public_id; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
															<input name="appartmentprice" value="<?php echo $tenant_val->appartmentprice; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
															<input name="appartments_id" value="<?php echo $tenant_val->appartments_id; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
															<div class="clearfix"></div>	appartmenttype
														</div>
														<div class="details-parameters-cont">
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
															<div class="clearfix"></div>	
														</div>

<input hidden type="text" name="amount" value="<?php echo $tenant_val->appartmentprice; ?>" />
<input hidden type="text" name="type" value="MERCHANT" readonly="readonly" />
<input hidden type="text" name="description" value="Rent" />
<input hidden type="text" name="reference" value="<?php echo $userRow['public_id']; ?>" />
<input hidden type="text" name="first_name" value="<?php echo $userRow['firstname']; ?>" />
<input hidden type="text" name="last_name" value="<?php echo $userRow['lastname']; ?>" />


														<div class="details-parameters-cont">
															<button type="submit" name="btn-pay-rent" class="button-primary button-shadow button-full">
																<span>Make payment</span>
																<div class="button-triangle"></div>
																<div class="button-triangle2"></div>
																<div class="button-icon"><i class="fa fa-user"></i></div>
															</button>
															<div class="clearfix"></div>	
														</div>
														
													</div>
													</form>


				<form method="post">
					<div class="row margin-top-30">
						<div class="col-xs-12" style="margin-top: 50px !important;">
							<div class="info-box">
								<p>Fill this fields only if you want to change your password</p>
								<div class="small-triangle"></div>
								<div class="small-icon"><i class="fa fa-info fa-lg"></i></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-15">
						<div class="col-xs-12 col-lg-12">
							<div class="labelled-input-short">
								<label for="first-name">New Password</label>
								<input id="password" name="password" type="password" class="input-full main-input" placeholder="" value=""/>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-12">
							<div class="labelled-input-short">
								<label for="first-name">Repeat Password</label>
								<input id="repeatpassword" name="repeatpassword" type="password" class="input-full main-input" placeholder="" value=""/>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row margin-top-15">
						<div class="col-xs-12">
							<div class="center-button-cont center-button-cont-border">
								<button type="submit" name="passreset" class="button-primary button-shadow">
									<span>Reset password</span>
									<div class="button-triangle"></div>
									<div class="button-triangle2"></div>
									<div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
								</button>
							</div>
						</div>
					</div>
				</form>

												</div>
											</div>
										</div>
									</div>
								</div>




						</div>
						<div class="title-separator-primary"></div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>		
</div>	
<?php require_once 'includes/footer.php'; ?>