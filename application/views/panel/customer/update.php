<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Müşteri Ekle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form method="post" action="<?=site_url('adminpanel/update_customer/'.$data->id)?>">    
            <div class="panel-body">
                <div class="form-group">
					<label>Adı</label>
					<input class="form-control" value="<?=$data->name?>" name="name" placeholder="Adınızı Giriniz">
                </div>
                <div class="form-group">
					<label>Soyadı</label>
					<input class="form-control" value="<?=$data->surname?>" name="surname" placeholder="Soyadınızı Giriniz">
                </div>
                <div class="form-group">
					<label>Şifre</label>
					<input class="form-control" value="<?=$data->password?>" name="password" placeholder="Şifre Giriniz">
                </div>
                <div class="form-group">
					<label>E-mail</label>
					<input class="form-control" value="<?=$data->email?>" name="email" placeholder="E-mail Adresini Giriniz">
                </div>
                <div class="form-group">
					<label>Kullanıcı Adı</label>
					<input class="form-control" value="<?=$data->username?>" name="username" placeholder="Kullanıcı Adını Giriniz"><br>
                </div>
                <div class="form-group">
                    <label>Banla</label>
                    <select class="form-control" value="<?=$data->banned?>" name="banned">
                        <option value="1">Evet</option>
                        <option value="0">Hayır</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
          			
        </form> 



<?php $this->load->view('panel/footer')?>
