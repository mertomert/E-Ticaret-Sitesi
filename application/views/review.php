<script type="text/javascript">
	function del(id){
            swal({
  title: "Emin misiniz?",
  text: "Silindikten sonra veriler geri gelmez!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Evet",
  cancelButtonText: "Hayır",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Silindi!", "Ürün sepetten silindi!", "success");
 	$.ajax({
	  url: "<?=site_url('site/del_cart/')?>" + id,
	  context: document.body
	}).done(function() {
	  window.location.href = '<?=site_url("site/page/cart")?>';
	});
  } else {
        swal("İptal edildi", "", "error");
  }
})
            
 
      
}
</script>
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ürün</td>
							<td class="description"></td>
							<td class="price">Fiyat</td>
							<td class="quantity">Adet</td>
							 
							<td></td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($baskets as $basket) :?> 
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?=site_url('images/'.$basket->image)?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$basket->product_name?></a></h4>
								<p>Ürün: 1089772</p>
							</td>
							<td class="cart_price">
								<p>₺<?=$basket->price?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
								</div>
							</td>
							 
							<td class="cart_delete">
								<a class="cart_quantity_delete" onClick="del(<?=$basket->id?>)"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						 <?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->