<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Kategori Ekle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form action="<?=site_url('adminpanel/add_category')?>" method="post">    
            <div class="panel-body">
                <div class="form-group">
					<label>Kategori Adı</label>
					<input name="name" class="form-control" placeholder="Kategori Adını Giriniz">
                </div>
                <button type="submit" class="btn btn-primary">Ekle</button>
            </div>
          			
        </form> 



<?php $this->load->view('panel/footer')?>