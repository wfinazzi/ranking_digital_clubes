
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Signin Template for Bootstrap</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <div class="container">
            <h1 class="h3 mb-3 font-weight-normal">Ranking Digital dos Clubes do Futebol Paulista</h1>
            <form class="form-signin" method="post" action="<?=base_url("login/solicitar_acesso")?>">            
                <h4>Solicitar Acesso</h4>
                <label for="inputName" class="sr-only">Nome Completo</label>
                <input type="text" id="inputName" name="nome" class="form-control form-control-sm mb-2" placeholder="Nome Completo" required autofocus>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" name="email" class="form-control form-control-sm mb-2" placeholder="E-mail" data-validation="email" required>
                <label for="inputEmail" class="sr-only">CPF</label>            
                <button class="btn btn-lg btn-primary btn-block mb-2" type="submit"><i class="fa fa-arrow-right"></i> Solicitar Acesso</button>
                <input type="hidden" name="acao" value="inserir">
            </form>
        </div>
        
  