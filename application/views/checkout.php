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
    <link href="<?=site_url('css/animate.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/main.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/responsive.css')?>" rel="stylesheet">
     <script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
      <!-- This is what you need -->
    <script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">
   
</head><!--/head-->

<body> 
	<?php $this->load->view('header')?> 
	
	
	<section>
		<div class="container">
			<div class="row">  
				<?php $this->load->view('review')?> 
<div class="container">
  <form class="form-horizontal" role="form">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
    </fieldset>
  </form>
</div>
                <script type="text/javascript">
                    function pay(order_id){
                        url = "<?=site_url('site/pay/')?>" + order_id;
                        $.ajax({
                          url: url,
                          context: document.body
                        }).done(function() {
                          swal({title:"Ödeme yapıldı!",type:'success'},function(onConfirm){
                            if(onConfirm){
                                window.location.href="<?=site_url()?>";
                            }
                        });
                        });
                        }
                </script>
				<div style="float:right;margin-bottom: 10px"><a class="btn btn-primary" onClick="pay(<?=$_SESSION['order']?>)">Alışverişi tamamla</a></div>
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