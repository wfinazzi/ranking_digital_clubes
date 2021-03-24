    <?=$header?>
    <div class="container">
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#clubesModal">
            Incluir Novo
        </button> 
        <table class="table table-sm table-bordered mt-5" style="font-size:12px;">
            <tr>
                <th>Clube</th>
                <th>Nome Completo</th>
                <th>Divisão</th>
                <th>Município</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Youtube</th>
                <th>Twitter</th>
                <th>Editar/Excluir</th>    
            </tr>
            
            <?php foreach($clubes as $clube): ?>
                <tr>
                    <td><img src="img/escudos/<?=$clube->IMAGEM?>" alt="" style="width:20px; height:20px;"><a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>
                    <td><?=$clube->NOME_COMPLETO?></td>
                    <td><?=$clube->DIVISAO?></td>
                    <td><?=$clube->MUNICIPIO?></td>
                    <td><?php if(isset($clube->LINK_FACEBOOK) && $clube->LINK_FACEBOOK !== ""):?><a href="<?=$clube->LINK_FACEBOOK?>" class="btn btn-sm btn-primary" style="font-size:12px;">Facebook</a><?php endif;?></td>
                    <td><?php if(isset($clube->LINK_INSTAGRAM) && $clube->LINK_INSTAGRAM !== ""):?><a href="<?=$clube->LINK_INSTAGRAM?>" class="btn btn-sm btn-warning" style="font-size:12px;">Instagram</a><?php endif;?></td>
                    <td><?php if(isset($clube->LINK_TWITTER) && $clube->LINK_TWITTER !== "" ):?><a href="<?=$clube->LINK_TWITTER?>" class="btn btn-sm btn-info" style="font-size:12px;">Twitter</a><?php endif;?></td>
                    <td><?php if(isset($clube->LINK_YOUTUBE) && $clube->LINK_YOUTUBE !== ""):?><a href="<?=$clube->LINK_YOUTUBE?>" class="btn btn-sm btn-danger" style="font-size:12px;">Youtube</a><?php endif;?></td>
                    <td><a data-toggle="modal" data-target="#clubesModal" class="editar_clube" data-clube="<?=$clube->ID?>">Editar</a> - <a href="<?=base_url('clubes/excluir/'.$clube->ID)?>">Excluir</a></td>               
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <?=$modal?>   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>