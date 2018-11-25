<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span></span><br>E-ticaret</h2>
							<p>Fabrikadan Halka</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?=site_url('images/home/iframe1.png')?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?=site_url('images/home/iframe2.png')?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?=site_url('images/home/iframe3.png')?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>			
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?=site_url('images/home/iframe4.png')?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Düzce/TÜRKİYE</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Servisler</h2>
							<ul class="nav nav-pills nav-stacked"> 
								<li><a href="#">İletişime Geç</a></li> 
								<li><a href="#">SSS</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Türler</h2>
							<ul class="nav nav-pills nav-stacked">
								<?php foreach ($types as $type) :?> 
								<li><a href="#"><?=$type->type?></a></li>
							<?php endforeach;?>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Politikalar</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Kullanım Şartları</a></li>
								<li><a href="#">Gizlilik Politikası</a></li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Satıcı Hakkında</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Şirket Bilgisi</a></li> 
								<li><a href="#">Telif Hakkı</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Satıcı Hakkında</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="E-mail adresinizi giriniz" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">© 2018 YAVUZ E-Ticaret A.Ş. Tüm Hakları Saklıdır.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
