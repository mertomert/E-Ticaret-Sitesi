<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?=$content?></h2>
						<?php if($products):?>	
							<?php foreach ($products as $product) :?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products1">
										<div class="productinfo text-center">
											<img src="<?=site_url('images/'.$product->image)?>" width ='200' height ='250' alt="" />
											<h2>₺<?=$product->price?></h2>
											<p><?=$product->name?></p>
											<?php if($_SESSION['user'] != null) :?>
											<a href="<?=site_url('site/add_baskets/'.$product->id).'/1'?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										<?php endif;?>
											<a href="<?=site_url('site/product_detail/'.$product->id)?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detay</a>
										</div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						<?php else: ?>
							Ürün bulunamadı
								<?php endif;?>
					</div><!--features_items-->
				</div>