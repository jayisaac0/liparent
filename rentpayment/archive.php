<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php if($userRow['isadmin'] != 1 || $userRow['property_id'] == 0) { ?><?php echo '<script type="text/javascript">window.location = "profile.php"</script>'; ?><?php } ?>
<?php require_once 'includer.php'; ?>
<div id="wrapper" class="wrapper2">

	<?php require_once 'includes/nav.php'; ?>
<?php if (isset($_GET['appartment'])) { $appartment = $_GET['appartment'] ?>
    <section class="section-dark no-padding">

		</div>
    </section>
	<section class="section-light no-bottom-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:40px;:">
							<div class="details-image pull-left hidden-xs">
								<i class="fa fa-home"></i>
							</div>
							<div class="details-title pull-left">
								<h5 class="subtitle-margin">apartment for sale</h5>
								<h3>Welcome to appartment <?php echo $appartment; ?> archives<span class="special-color">.</span></h3>
							</div>
							<div class="clearfix"></div>	
							<div class="title-separator-primary"></div>
								<table>
								  <tr>
								  	<th>First name</th>
								    <th>LAst name</th>
								    <th>Email</th>

								    <th>Appartment</th>
								    <th>Month</th>
								    <th>Ammount</th>
								    <th>Status</th>
								    <th>Time paid</th>
								  </tr>
									<?php
									$stmt = $auth_user->runQuery("SELECT * FROM payments JOIN users ON `payments`.`public_id`=`users`.`public_id` WHERE  `payments`.`appartments_id` = '$appartment' ");
									$stmt->execute(array());
									$payment=$stmt->fetchAll(PDO::FETCH_OBJ);
									foreach ($payment as $payment) { ?>						  
									  <tr>
									  	<td><?php echo $payment->firstname; ?></td>
									  	<td><?php echo $payment->lastname; ?></td>
									  	<td><?php echo $payment->email; ?></td>

									    <td><?php echo $payment->appartments_id; ?></td>
									    <td><?php echo $payment->month; ?></td>
									    <td><?php echo number_format($payment->appartmentprice, 2); ?></td>
									    <td>
									    		<?php 
										    if ($payment->status == 1) {
										    	echo 'PAID';
										    }else{
										    	echo 'PAYMENT PENDING';
										    }
										    ?>		
									    </td>

									    <td><?php echo $payment->timepaid; ?></td>
									  </tr>
									<?php } ?>						  

								</table>

						</div>

				

					</div>
					
					<div class="margin-top-45"></div>
				</div>
			</div>
		</div>
	</section>

<?php } ?>	
</div>	
<?php require_once 'includes/footer.php'; ?>