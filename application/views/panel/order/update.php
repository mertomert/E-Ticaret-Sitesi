<?php $this->load->view('panel/header')?>

       
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sipariş Oluştur</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

        <form>    
            <div class="panel-body">
                <div class="form-group">
					<label>Ürün No</label>
					<input class="form-control" placeholder="Ürün Numarasını Giriniz">
                </div>
                <div class="form-group">
					<label>Müşteri No</label>
					<input class="form-control" placeholder="Müşteri Numarasını Giriniz">
                </div>
                <div class="form-group">
					<label>Tarih</label>
					<input class="form-control" placeholder="Tarihi Giriniz">
                </div>
                <div class="form-group">
					<label>Adet</label>
					<input class="form-control" placeholder="Adet Giriniz">
                </div>
                <div class="form-group">
					<label>Durum</label>
					<input class="form-control" placeholder="Sipariş Durumunu Giriniz"><br>
					<button type="button" class="btn btn-primary">Siparişi Oluştur</button>
                </div>
            </div>
          			
        </form> 



<?php $this->load->view('panel/footer')?>