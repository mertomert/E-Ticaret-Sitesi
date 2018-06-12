<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>  <?=TELNO?></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>  <?=EMAIL?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=site_url()?>"><img src="<?=site_url('images/home/logo.png')?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if($_SESSION['user'] !== null) : ?>
								<li><a href="<?=site_url('site/page/settings')?>"><i class="fa fa-user"></i> Üyelik</a></li> 
								<li><a href="<?=site_url('site/page/checkout')?>"><i class="fa fa-crosshairs"></i> Alışverişi Tamamla</a></li>
								<li><a href="<?=site_url('site/page/cart')?>"><i class="fa fa-shopping-cart"></i> Sepet</a></li>
								<?php endif; ?>
								<?php if($_SESSION['user'] == null) : ?>
								<li><a href="<?=site_url('site/page/login')?>"><i class="fa fa-lock"></i> Giriş</a></li>
								<?php endif; ?>
								<?php if($_SESSION['user'] != null) : ?>
								<li><a href="<?=site_url('site/logout')?>"><i class="fa fa-lock"></i> Çıkış</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Navigasyona Geçiş</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?=site_url()?>" class="active">Anasayfa</a></li>
								<li><a href="<?=site_url('site/page/contact')?>">İletişim</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="<?=site_url('site/search')?>" method="post">
						<div class="search_box pull-right">
							<input type="text" name="searchkey" placeholder="Ürün ara"/>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->