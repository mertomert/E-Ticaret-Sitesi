<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>KATEGORİLER</h2> 
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php foreach ($categories as $category) :?>
								<?php if($category->total_brand > 1) :?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?=$category->category_name?>
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<?php foreach ($brands as $brand) :?>
											<?php if($category->id == $brand->category_id) :?>
											<li><a href="<?=site_url('site/filter/brands/'.$brand->id)?>"><?=$brand->name?> </a></li> 
											<?php endif;?>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?=site_url('site/filter/categories/'.$category->id)?>"><?=$category->category_name?></a></h4>
								</div>
							</div>
						<?php endif;?>
							<?php endforeach;?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Markalar</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php foreach ($brands as $brand) :?>
									<li><a href="<?=site_url('site/filter/brands/'.$brand->id)?>"> <?=$brand->name?></a></li> 
								<?php endforeach;?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?=site_url('images/home/shipping.jpg')?>" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>