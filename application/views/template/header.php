<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubes</title>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?=base_url("css/datatable.css")?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fa fa-futbol-o"></i> Ranking de Clubes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('')?>"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('clubes')?>">Clubes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Municipios')?>">Municípios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('RedesSociais')?>">Redes Sociais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Divisoes')?>">Divisões</a>
                </li>                
            </ul>
        </div> 
        <div>             
            <a class="btn btn-primary" href="<?=base_url('Google_Login/Login')?>">Administrar</a>
        </div>       
    </nav>
    <?php if($this->session->flashdata('mensagem')){ ?>
        <div class="alert alert-<?= $this->session->flashdata('alert')?>" role="alert">
            <?=$this->session->flashdata('mensagem')?>
            <?php unset($_SESSION['mensagem']); ?>
        </div>
    <?php } ?>
    
    
    