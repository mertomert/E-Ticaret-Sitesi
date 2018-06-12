<?php $this->load->view('panel/header')?>

       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Siparişler</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                
                <?php foreach ($orders as $order) : ?>
                    <?php if($order->state) :?>
                        <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <?=$order->name?>
                        </div>
                        <div class="panel-body">
                            <p><?=$order->total?> TL</p>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                            <?php else :?>
                                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Sipariş Onaylandı
                        </div>
                        <div class="panel-body">
                            <p></p>
                        </div>
                        <div class="panel-footer">
                           
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                    <?php endif;?>
                    <?php endforeach;?>
           


<?php $this->load->view('panel/footer')?>