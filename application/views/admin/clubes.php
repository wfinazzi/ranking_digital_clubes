   
    <div class="container">
        <h1 class="text-center">Clubes</h1>
        <hr>
        <?php if($user_data['perfil'] == 1): ?>
            <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#clubesModal">
                <i class="fa fa-plus mr-2"></i>Incluir Novo
            </button> 
        <?php endif; ?>
        <table class="table table-sm table-bordered tabela_lista mt-5" style="font-size:12px;">
            <thead>
                <tr>
                    <th>Clube</th>
                    <th>Nome Completo</th>
                    <th>Divisão</th>
                    <th>Município</th>
                    <th>Facebook</th>
                    <th>Instagram</th>               
                    <th>Twitter</th>
                    <th>Youtube</th>
                    <?php if($user_data['perfil'] == 1): ?>
                        <th>Editar/Excluir</th>    
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>            
                <?php foreach($clubes as $clube): ?>
                    <tr>
                        <td><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" style="width:20px; height:20px;" class="mr-2"><a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>
                        <td><?=$clube->NOME_COMPLETO?></td>
                        <td><?=$clube->DIVISAO?></td>
                        <td><?=$clube->MUNICIPIO?></td>
                        <td class="text-center"><?php if(isset($clube->LINK_FACEBOOK) && $clube->LINK_FACEBOOK !== ""):?><a href="<?=$clube->LINK_FACEBOOK?>" class="btn btn-sm btn-primary" style="font-size:12px;"><i class="fa fa-facebook"></i></a><?php endif;?></td>
                        <td class="text-center"><?php if(isset($clube->LINK_INSTAGRAM) && $clube->LINK_INSTAGRAM !== ""):?><a href="<?=$clube->LINK_INSTAGRAM?>" class="btn btn-sm btn-warning" style="font-size:12px;"><i class="fa fa-instagram"></i></a><?php endif;?></td>
                        <td class="text-center"><?php if(isset($clube->LINK_TWITTER) && $clube->LINK_TWITTER !== "" ):?><a href="<?=$clube->LINK_TWITTER?>" class="btn btn-sm btn-info" style="font-size:12px;"><i class="fa fa-twitter"></i></a><?php endif;?></td>
                        <td class="text-center"><?php if(isset($clube->LINK_YOUTUBE) && $clube->LINK_YOUTUBE !== ""):?><a href="<?=$clube->LINK_YOUTUBE?>" class="btn btn-sm btn-danger" style="font-size:12px;"><i class="fa fa-youtube"></i></a><?php endif;?></td>
                        <?php if($user_data['perfil'] == 1): ?>
                            <td class="text-center">
                                <a data-toggle="modal" data-target="#clubesModal" class="editar_clube btn btn-sm btn-secondary" data-clube="<?=$clube->ID?>"><i class="fa fa-edit"></i></a>  
                                <a href="<?=base_url('admin/clubes/excluir/'.$clube->ID)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>               
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>