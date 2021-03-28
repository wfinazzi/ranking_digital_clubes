<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Ranking de Clubes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('')?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('admin/clubes')?>">Clubes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('admin/Municipios')?>">Municípios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('admin/RedesSociais')?>">Redes Sociais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('admin/Divisoes')?>">Divisões</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('admin/Coletas')?>">Coletas</a>
                </li>
            </ul>
        </div>
        <div>             
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bem Vindo !!! <?=$user_data['first_name']?> <?=$user_data['last_name']?><img src="<?=$user_data['profile_picture']?>" style="width:30px; height:30px;" alt="">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Email: <?=$user_data['email_address']?></a>                    
                    <a class=" btn btn-sm btn-block btn-danger" href="<?=base_url('Google_Login/logout')?>">Logout</a>
                </div>
            </div>       
        </div>
    </nav>
    <?php if($this->session->flashdata('mensagem')){ ?>
        <div class="alert alert-<?= $this->session->flashdata('alert')?>" role="alert">
            <?=$this->session->flashdata('mensagem')?>
            <?php unset($_SESSION['mensagem']); ?>
        </div>
    <?php } ?>
    
    
    