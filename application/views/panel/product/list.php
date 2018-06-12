<?php $this->load->view('panel/header')?>


 <link href="<?=site_url('vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=site_url('vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?=site_url('vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=site_url('vendor/datatables-responsive/dataTables.responsive.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=site_url('dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
  <link href="<?=site_url('vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ürünler</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ürün Tablosu
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Fiyatı</th>
                                        <th>Kategorisi</th>
                                        <th>Markası</th>
                                        <th>Açıklama</th>
                                        <th>Ekle/Sil</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) :?> 
                                    <tr class="gradeX">
                                        <td><?=$product->name?></td>
                                        <td><?=$product->price?></td>
                                        <td><?=$product->category?></td>
                                        <td><?=$product->brand?></td>
                                        <td><?=$product->detail?></td>
                                        <td><a href="<?=site_url('adminpanel/update/product/'.$product->id)?>" class="btn btn-success btn-circle"><i class="fa fa-link"></i></a>
                                            <?php if($_SESSION['admin']->level==1):?>
                                        <a onClick="del('product','product',<?=$product->id?>)" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></a>
                                    <?php endif;?>
                                        <td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           </div>



     <script src="<?=site_url('vendor/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=site_url('vendor/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=site_url('vendor/metisMenu/metisMenu.min.js')?>"></script>

     <script src="<?=site_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>

    <script src="<?=site_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>

    <script src="<?=site_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

    <script src="<?=site_url('vendor/raphael/raphael.min.js')?>"></script>

     <script src="<?=site_url('vendor/morrisjs/morris.min.js')?>"></script>

     <script src="<?=site_url('data/morris-data.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=site_url('dist/js/sb-admin-2.js')?>"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    </body>

</html>