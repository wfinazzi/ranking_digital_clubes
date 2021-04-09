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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

        <!-- Custom styles for this template -->
        <link href="<?=base_url('css/signin.css');?>" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post" action="<?=base_url("Login/efetuarLogin");?>">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Password" required>                     
            <div class="panel panel-default">
            <?php if(($this->session->userdata('access_token'))){
               //print_r($this->session->userdata());
                $user_data = $this->session->userdata();
            ?>
                <div class="panel-heading">Welcome User</div>
                <div class="panel-body">';
                    <?php echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail"/>'; ?>
                    <?php echo '<h3><b>Name:</b>'.$user_data["first_name"].''.$user_data['last_name'].'</h3>'; ?>
                    <?php echo '<h3><b>Email:</b>'.$user_data["email_address"].'</h3>'; ?>
                    <?php echo "<h3><a href='".base_url()."google_login/logout'>Teste</a></h3>"; ?>
                </div>            
            <?php
                }else{
                    
                }
            ?>
            </div>
            <a href="<?=base_url("login/solicitar_acesso")?>" >Não sou cadastrado ainda. Cadastrar ?</a><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-arrow-right"></i> Acessar</button>
            <a href="<?=$link?>" class="btn btn-lg btn-danger btn-block">Google Login</a>            
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
    </body>
</html>