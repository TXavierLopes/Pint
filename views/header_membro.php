<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Membro</title>
	
    <!-- css -->
    <link href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="<?= base_url()?>assets/bootstrap/stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="<?= base_url()?>assets/bootstrap/css/nivo-lightbox.css" rel="stylesheet" />
	<link href="<?= base_url()?>assets/bootstrap/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url()?>assets/bootstrap/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="<?= base_url()?>assets/bootstrap/css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="<?= base_url()?>assets/bootstrap/css/animate.css" rel="stylesheet" />
    <link href="<?= base_url()?>assets/bootstrap/css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
  
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    
        <div class="container navigation">
    
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index">
                    <img src="<?= base_url()?>assets/bootstrap/img/logo.png" alt="" width="200" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url()?>index.php/membro_controller/index">Home</a></li>
        <li><a href="<?= base_url()?>index.php/membro_controller/download">Download</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minhas Boleias <b class="caret"></b></a>
          <ul class="dropdown-menu">          
          <li><a href="<?= base_url()?>index.php/membro_controller/boleiasmembro">Boleias Disponiveis</a></li>
          <li><a href="<?= base_url()?>index.php/membro_controller/boleiasinscritas">Boleias Inscritas</a></li>
          <li><a href="<?= base_url()?>index.php/membro_controller/boleiascriadas">Boleias Criadas</a></li>

          </ul>
        </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil <b class="caret"></b></a>
            <ul class="dropdown-menu">
          
            <li><a href="<?= base_url()?>index.php/membro_controller/perfilmembro">Perfil</a></li>
          <li><a href="<?= base_url()?>index.php/membro_controller/logout">Logout</a></li>
          

          </li>
          </ul>
          </ul>
        </li>
        </ul>
        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
