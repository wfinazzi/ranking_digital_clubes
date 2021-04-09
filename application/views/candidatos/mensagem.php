
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Aguarde</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center d-flex flex-column">
        <?php if($this->session->flashdata('mensagem')){?>
            <p>
                <?=$this->session->flashdata('mensagem') ?>
            </p>
        <?php } ?>
        <p><a href="<?= base_url("login")?>" class="btn btn-primary btn-sm"> Voltar ao Login</a></p>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous">
  </body>
</html>
