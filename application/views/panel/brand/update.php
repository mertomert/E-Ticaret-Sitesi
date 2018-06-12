<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Marka Ekle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form action="<?=site_url('adminpanel/update_brand/'.$brand->id)?>" method="post">    
            <div class="panel-body">
                <div class="form-group">
					<label>Marka Adı</label>
					<input class="form-control" placeholder="Marka Adınızı Giriniz" name="name" value="<?=$data->name?>">
                </div>
                <div class="form-group">
					<label>Kategori</label>
					<select name="category_id" class="form-control" value="<?=$data->category_id?>">
                        <?php foreach ($categories as $category) :?>
                        <option value="<?=$category->id?>"><?=$category->name?></option> 
                            <?php endforeach;?>
                    </select>
                </div>
					<button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
          			
        </form> 



<?php $this->load->view('panel/footer')?>