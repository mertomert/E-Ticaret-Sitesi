<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ürün Ekle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form action="<?=site_url('adminpanel/update_product/'.$data->id)?>" method="post" enctype="multipart/form-data">    
            <div class="panel-body">
                <div class="form-group">
                    <label>Ürün Adı</label>
                    <input class="form-control" placeholder="Ürün Adı Giriniz" name="name" value="<?=$data->name?>">
                </div>
                <div class="form-group">
                    <label>Ücreti</label>
                    <input class="form-control" placeholder="Ürün Ücreti Giriniz" name="price" value="<?=$data->price?>">
                </div>
                <div class="form-group">
                    <label>Kategori Seçiniz</label>
                    <select name="category_id" class="form-control" value="<?=$data->category_id?>">
                        <?php foreach ($categories as $category):?>
                        <option value="<?=$category->id?>"><?=$category->name?></option> 
                                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Marka Seçiniz</label>
                    <select name="brand_id" class="form-control" value="<?=$data->brand_id?>">
                        <?php foreach ($brands as $brand):?>
                        <option value="<?=$brand->id?>"><?=$brand->name?></option> 
                                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ürün  Acıklaması</label><br/>
                    <textarea class="col-md-12" name="detail"><?=$data->name?></textarea>
                </div>
                <div class="form-group">
                    <label>Ürün  Seçiniz</label>
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </div>
            </div>
                    
        </form> 



<?php $this->load->view('panel/footer')?>