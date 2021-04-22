
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU ADMIN</li>

            <li>
                <a href="<?= base_url()?>index.php/Administrador_controller/utilizadores_mostrar">
                    <i class="fa fa-users"></i>
                    <span>Utilizadores</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="<?= base_url()?>index.php/Administrador_controller/veiculos_mostrar">
                    <i class="fa fa-car"></i>
                    <span>Veiculos</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="<?= base_url()?>index.php/Administrador_controller/boleias_mostrar">
                    <i class="fa fa-child"></i>
                    <span>Boleias</span>
                    <span class="pull-right-container">
            </span>
                </a>

            </li>
            <li>
                <a href="<?= base_url()?>index.php/Administrador_controller/locais_mostrar">
                    <i class="fa fa-map-marker"></i>
                    <span>Locais</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>


    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Painel
            <small>Estatisticas</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>  <?= $this->db->count_all_results('users');?></h3>
                        <h2>  Utilizadores inscritos</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url()?>index.php/Administrador_controller/utilizadores_mostrar" class="small-box-footer"> Users <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <div class="inner">
                            <h3>  <?= $this->db->count_all_results('veiculos');?></h3>
                            <h2>  Veiculos inseridos</h2>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion fa-automobile"></i>
                    </div>
                    <a href="<?= base_url()?>index.php/Administrador_controller/veiculos_mostrar" class="small-box-footer"> Veiculos <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>  <?= $this->db->count_all_results('boleias');?></h3>
                        <h2>  Boleias inseridos</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-fa-taxi"></i>
                    </div>
                    <a href="<?= base_url()?>index.php/Administrador_controller/boleias_mostrar" class="small-box-footer"> Boleias <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>  <?= $this->db->count_all_results('polos');?></h3>
                        <h2>  Locais inseridos</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-fa-university"></i>
                    </div>
                    <a href="<?= base_url()?>index.php/Administrador_controller/locais_mostrar" class="small-box-footer"> Locais <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

    </section>
    <!-- /.content -->
</div>