
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>CONSEG - Guarulhos</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post" action="Login/efetuarLogin">
            <img class="mb-4" src="public/img/logo.png" style="width:150px; height:150px;">
            <h1 class="h3 mb-3 font-weight-normal">CONSEG<br> Sistema de Demandas  Guarulhos-SP</h1>
            <?php if($this->session->flashdata('mensagem')){?>
		        <div class="alert alert-danger mt-2" role="alert">
			        <?=$this->session->flashdata('mensagem') ?>
   		        </div>
	        <?php } ?>           
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control mb-2" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" name="senha" class="form-control mb-2" placeholder="Senha" required>            
            <a href="<?=base_url("login/solicitar_acesso")?>" >Não sou cadastrado ainda. Cadastrar ?</a><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-arrow-right"></i> Acessar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020 - CONSEG Guarulhos</p>
        </form>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous">
  </body>
</html>
