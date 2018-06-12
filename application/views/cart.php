<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Anasayfa | E-Ticaret</title>
    <link href="<?=site_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/prettyPhoto.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/price-range.css')?>" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="<?=site_url('css/animate.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/main.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/responsive.css')?>" rel="stylesheet"> 

      <!-- This is what you need -->
    <script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">
	<link href="<?=site_url('css/responsive.css')?>" rel="stylesheet">
    <script type="text/javascript">
        function del(){
            swal("Hello world!");
        }
    </script> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body> 
	<?php $this->load->view('header')?> 
		
	
	<section>
		<div class="container">
			<?php if(!$info) :?>
                <div class="row">
                <div class="register-req">
                <p>Lütfen fatura adresi oluşturunuz.</p>
            </div><!--/register-req-->
            <?php endif;?>
				<?php $this->load->view('review')?> 
				
				
			</div>
		</div>
	</section>
	
	<?php $this->load->view('footer')?>
  
    <script src="<?=site_url('js/jquery.js')?>"></script>
	<script src="<?=site_url('js/bootstrap.min.js')?>"></script>
	<script src="<?=site_url('js/jquery.scrollUp.min.js')?>"></script>
	<script src="<?=site_url('js/price-range.js')?>"></script>
    <script src="<?=site_url('js/jquery.prettyPhoto.js')?>"></script>
    <script src="<?=site_url('js/main.js')?>"></script>
</body>
</html>