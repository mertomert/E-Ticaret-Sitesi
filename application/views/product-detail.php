<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yavuz Ticaret</title>
    <link href="<?=site_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/prettyPhoto.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/price-range.css')?>" rel="stylesheet">
    <link href="<?=site_url('css/animate.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/main.css')?>" rel="stylesheet">
	<link href="<?=site_url('css/responsive.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!-- This is what you need -->
    <script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">

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
			<div class="row">
				<?php $this->load->view('category')?>
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                          <a href=""><img src="<?=site_url('images/'.$product->image)?>" alt=""></a> 
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><?=$product->name?></h2>
                                <p>Ürün id: 1089772</p>
                                <img src="images/product-details/rating.png" alt="" />
                                <span>
                                    <span>₺<?=$product->price?></span> 
                                    <?php if($_SESSION['user'] != null) :?>
                                             <a href="<?=site_url('site/add_baskets/'.$product->id).'/1'?>" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Sepete Ekle
                                    </a>
                                        <?php endif;?>
                                   
                                </span>
                                <p><b>Stok durumu:</b> Stokta var </p>
                                <p><b>Sezon:</b> Yeni</p>
                                <p><b>Marka :</b> </p>
                                <a href=""><img src="<?=site_url('images/product-details/share.png')?>" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Detaylar</a></li> 
                                <li class="active"><a href="#reviews" data-toggle="tab">Yorumlar (<?=count($comments)?>)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details" >
                                
                                <div class="col-sm-3">
                                     <?=$product->detail?>
                                </div>
                            </div>
                            
                           
                            
                       
                            
                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <?php foreach ($comments as $comment) :?>
                                        <ul>
                                        <li><a href=""><i class="fa fa-user"></i><?=$comment->name?></a></li> 
                                    </ul>
                                    <p><?=$comment->comment?></p> 
                                        <?php endforeach;?>
                                    <?php if($_SESSION['user']):?>
                                    <p><b>Yorum yapın</b></p>
                                    
                                    <form>
                                        <textarea name="comment" id="comment"></textarea>
                                        <a onClick="pay()" class="btn btn-default pull-right">
                                            Gönder
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div></div>
				
				    <script type="text/javascript">
                    function pay(){
                        var comment = document.getElementById('comment').value;
                        $.ajax("<?=site_url('site/add_comment/')?>" + comment + "/<?=$product->id?>", {
                              success: function(data) {
                                 swal({title:"Yorum yaptığınız için teşekkürler!",type:'success'},function(onConfirm){
                                    if(onConfirm){
                                        window.location.href="<?=site_url('site/product_detail/'.$product->id)?>";
                                    }
                                });
                              },
                              error: function(err) {
                                 //swal("Hata!", "Yorum eklenirken bir hata oluştu!", "danger");
                              }
                           });
                        }
                </script>
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