<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yavuz Tic. A.Ş.</title>
     
    <link href="<?=site_url('vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    
      <!-- This is what you need -->
    <script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">
    <!-- MetisMenu CSS -->
    <link href="<?=site_url('vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=site_url('dist/css/sb-admin-2.css')?>" rel="stylesheet">
    
    <link href="<?=site_url('vendor/morrisjs/morris.css')?>" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?=site_url('vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
<script src="<?=site_url('dist/sweetalert-dev.js')?>"></script>
    <link rel="stylesheet" href="<?=site_url('dist/sweetalert.css')?>">
    
<script type="text/javascript">
                                function del(table, page, id){
                                   swal({
                                      title: "Emin misiniz?",
                                      text: "Silinen veriler geri alınamaz!",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "Evet!",
                                      cancelButtonText: "Hayır!",
                                      closeOnConfirm: false,
                                      closeOnCancel: false
                                    },
                                    function(isConfirm){
                                      if (isConfirm) {
                                        $.ajax("<?=site_url('adminpanel/del/')?>" + table + "/" + id, {
                                          success: function(data) {
                                            swal({title:"Silindi!",type:'success'},function(onConfirm){
                                                if(onConfirm){
                                                    window.location.href="<?=site_url('adminpanel/page/')?>" + page + "/list";
                                                }
                                            }); 
                                            
                                          },
                                          error: function(err) {
                                             swal("Hata!", "Veri silinirken bir hata oluştu!", "danger");
                                          }
                                       });
                                      } else {
                                            swal("İptal edildi", "Verileriniz korunuyor :)", "error");
                                      }
                                    });
                        }
                </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">...</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=site_url('adminpanel')?>">Admin Paneli</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
        
                
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a href="<?=site_url('adminpanel/logout')?>"><i class="fa fa-sign-out fa-fw"></i>Çıkış</a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=site_url('adminpanel')?>"><i class="fa fa-dashboard fa-fw"></i>Anasayfa</a>
                        </li> 
                        <?php if($_SESSION['admin']->level ==1):?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Kullanıcı<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/user/list')?>">Kullanıcıları Listele</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('adminpanel/page/user/create')?>">Kullanıcı Ekle</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <?php endif;?>
                         <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Müşteriler<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/customer/list')?>">Müşterileri Listele</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('adminpanel/page/customer/create')?>">Müşteri Ekle</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Ürünler<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/product/list')?>">Ürünleri Listele</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('adminpanel/page/product/create')?>">Ürün Ekle</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Siparişler<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/order/list')?>">Siparişleri Listele</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Kategori<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/category/list')?>">Kategoriler</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('adminpanel/page/category/create')?>">Kategori Ekle</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Markalar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('adminpanel/page/brand/list')?>">Markalar</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('adminpanel/page/brand/create')?>">Marka Ekle</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?=site_url('adminpanel/page/comments/list')?>"><i class="fa fa-sitemap fa-fw"></i>Yorumlar</a>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

     <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">