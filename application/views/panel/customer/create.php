<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Müşteri Ekle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form action="<?=site_url('adminpanel/create_customer')?>" method="post">    
            <div class="panel-body">
                <div class="form-group">
					<label>Adı</label>
					<input class="form-control" name="name" placeholder="Adınızı Giriniz">
                </div>
                <div class="form-group">
					<label>Soyadı</label>
					<input class="form-control" name="surname" placeholder="Soyadınızı Giriniz">
                </div>
                <div class="form-group">
					<label>Şifre</label>
					<input class="form-control" name="password" placeholder="Şifre Giriniz">
                </div>
                <div class="form-group">
					<label>E-mail</label>
					<input class="form-control" name="email" placeholder="E-mail Adresini Giriniz">
                </div>
                <div class="form-group">
					<label>Kullanıcı Adı</label>
					<input class="form-control" name="username" placeholder="Kullanıcı Adını Giriniz"><br>
					<button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
          			
        </form> 



<?php $this->load->view('panel/footer')?>
