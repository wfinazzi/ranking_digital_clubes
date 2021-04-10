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
                    <a class="nav-link" href="<?=base_url('Lista/coleta')?>"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
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
                <?php if($user_data['perfil'] == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?=base_url('admin/Usuarios')?>">Usuários</a>
                            <a class="dropdown-item" href="<?=base_url('admin/Perfis')?>">Perfis</a>
                            <a class="dropdown-item" href="<?=base_url('admin/Status')?>">Status</a>                    
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div>             
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bem Vindo !!! <?=$user_data['first_name']?> <?=$user_data['last_name']?><img src="<?=$user_data['profile_picture']?>" style="width:30px; height:30px;" class="ml-2" alt="">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Email: <?=$user_data['email_address']?></a>                      
                    <a class="dropdown-item" href="#">Perfil: <?=$user_data['perfil_nome']?></a>                  
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
    
    
    