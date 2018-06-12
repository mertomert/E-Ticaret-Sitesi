<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Anasayfa</a></li>
				  <li class="active">Kullanıcı Ayarları</li>
				</ol>
			</div><!--/breadcrums-->

			 
			<?php if($msg) : ?>
			<div class="row">
                <div class="register-req">
                <p><?=$msg?></p>
            </div>
        <?php endif;?>  
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Satıcı Hakkında</p>
							<form method="post" action="<?=site_url('site/user_update')?>">
								<input type="text" name="name" value="<?=$user_info->name?>" placeholder="Display Name">
								<input type="text" name="surname" value="<?=$user_info->surname?>" placeholder="surname">
								<input type="text" name="username" value="<?=$user_info->username?>" placeholder="username">
								<input type="password" name="password" placeholder="Password"> 
								<button class="btn btn-primary" type="submit">Kaydet</button>
							</form> 
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form method="post" action="<?=site_url('site/add_bill')?>">  
									<input type="text" name="address" placeholder="Address 1" value="<?=$user_info->address?>">
									<input type="text" name="code" placeholder="Zip / Postal Code *" value="<?=$user_info->code?>">
							</div>
							<div class="form-two">
								
									
									<select name="country">
										<option>-- Ülke --</option>
										<option value="1">Azerbaycan</option>
										<option value="2">Türkiye</option> 
									</select>
									<select name="state">
										<option>-- Şehir --</option>
										<option value="1">Adana</option>
										<option value="2">Adana</option> 
										<option value="3">Adana</option>
										<option value="4">Adana</option> 
										<option value="5">Adana</option>
										<option value="6">Adana</option> 
										

									</select> 
									<input type="text" name="phone" value="<?=$user_info->phone?>" placeholder="Mobile Phone"> 
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="detail" rows="16"><?=$user_info->detail?></textarea>
							<label><button class="btn btn-primary" type="submit">Kaydet</button></label>
						</div>	
					</div>	
					</form>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
