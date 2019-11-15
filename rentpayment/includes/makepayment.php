<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
	<div class="details-parameters-price">Ksh <?php echo $tenant_val->appartmentprice; ?></div>
	<form method="post">
	<div class="details-parameters" style="padding:5px;margin:5px;">
		<div class="details-parameters-cont">
			<input name="rentamount" value="<?php echo $tenant_val->appartmentprice; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
			<div class="clearfix"></div>	
		</div>
		<div class="details-parameters-cont">
			<input name="firstname" value="<?php echo $tenant_val->appartmentprice; ?>" readonly type="text" class="input-full main-input" placeholder="Frist name" />
			<div class="clearfix"></div>	
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
		<div class="details-parameters-cont">
			<div class="details-parameters-name">Lorem</div>
			<div class="details-parameters-val">nostrud</div>
			<div class="clearfix"></div>	
		</div>
		<div class="details-parameters-cont">
			<div class="details-parameters-name">Ipsum</div>
			<div class="details-parameters-val">tempor</div>
			<div class="clearfix"></div>	
		</div>
		<div class="details-parameters-cont">
			<button type="submit" name="btn-pay-rent" class="button-primary button-shadow button-full">
				<span>Make payment</span>
				<div class="button-triangle"></div>
				<div class="button-triangle2"></div>
				<div class="button-icon"><i class="fa fa-user"></i></div>
			</button>
			<div class="clearfix"></div>	
		</div>
		<div class="details-parameters-cont details-parameters-cont-last">
			<div class="details-parameters-name">Consectetur</div>
			<div class="details-parameters-val">eiusmod</div>
			<div class="clearfix"></div>	
		</div>
	</div>
	</form>
</div>