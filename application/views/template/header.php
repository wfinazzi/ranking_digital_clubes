<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

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
                    <a class="nav-link" href="<?=base_url('Clubes')?>">Clubes</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Coletas')?>">Coletas</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php if($this->session->flashdata('mensagem')){ ?>
        <div class="alert alert-<?= $this->session->flashdata('alert')?>" role="alert">
            <?=$this->session->flashdata('mensagem')?>
        </div>
    <?php } ?>
    
    
    