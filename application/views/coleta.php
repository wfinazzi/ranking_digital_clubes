    <?=$header?>
    <div class="container">
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#clubesModal">
            Incluir Novo
        </button> 

        <h1 class="text-center">Coleta - <?=Nome_Do_Mes($coleta->MES)?> de <?=$coleta->ANO?></h1>      
        
        <table class="table table-bordered mt-5">
            <tr>
                <th>Clube</th>
                <?php foreach($redes_sociais as $redesocial): ?>
                    <th><?=$redesocial->NOME?></th>                   
                <?php endforeach;?>    
                
                <th>Confirmar Coleta</th>    
            </tr>
            
            <?php foreach($clubes as $clube): ?>
                <tr>
                    <td><a href="<?=base_url("clubes/historia/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>
                    <form action="<?=base_url("Coletas/incluir_coleta")?>" method="post">
                        <input type="hidden" name="clube" value="<?=$clube->ID?>">
                        <input type="hidden" name="coleta" value="<?=$coleta->ID?>">
                        <?php foreach($redes_sociais as $redesocial): ?>
                            <td>
                                <?php $rede = "LINK_".strtoupper($redesocial->NOME); ?>
                                <div class="d-flex justify-content-between">                                    
                                    <input type="text" class="form-control form-control-sm mr-2 valor" style="font-size:10px;" value="<?=$coletas_clube[$clube->ID][$redesocial->ID]?>" name="rede_<?=$redesocial->ID?>">
                                    <a href="<?=$clube->$rede?>" class="btn btn-sm btn-secondary" style="font-size:10px;" target="_blank">Ir</a>
                                </div>                                 
                            </td>                            
                        <?php endforeach; ?>
                        <td><button type="submit" class="btn btn-sm btn-primary">Confirmar Coleta</button></td>               
                    </form>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <?=$modal?>   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>