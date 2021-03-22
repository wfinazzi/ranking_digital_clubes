    <?=$header?>
    <div class="container">
        <!-- <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#clubesModal">
            Incluir Novo
        </button>  -->

        <form action="<?=base_url("Lista/coleta")?>" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="">Coleta</label><br>                    
                    <select name="coleta" id="" class="form-control form-control-sm mr-2">
                        <?php foreach($coletas as $item): ?>
                            <?php $coleta_selected = ($parametros['coleta'] == $item->ID) ? "selected='selected'" :  "";?>
                            <option value="<?=$item->ID?>" <?=$coleta_selected?>><?=Nome_Do_Mes($item->MES)?> de <?=$item->ANO?></option>
                        <?php endforeach; ?>
                    </select>                                        
                </div>
                <div class="col-4">
                    <label for="">Divisão</label>
                    <select name="divisao" id="" class="form-control form-control-sm">                            
                        <option value="">Todos</option>
                        <?php foreach($divisoes as $item): ?>
                            <?php $divisao_selected = ($parametros['divisao'] === $item->ID) ? "selected='selected'" :  $divisao?>
                            <option value="<?=$item->ID?>" <?=$divisao_selected?>><?=$item->TITULO?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Município</label>
                    <select name="municipio" id="" class="form-control form-control-sm">
                        <option value="">Todos</option>
                        <?php foreach($municipios as $item): ?>
                            <?php $municipio_selected = ($parametros['municipio'] == $item->ID) ? "selected='selected'" :  "";?>
                            <option value="<?=$item->ID?>" <?=$municipio_selected?>><?=$item->MUNICIPIO?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Pesquisar</button>
                </div>                
            </div>
        </form>
        <hr>

        <h1 class="text-center">Coleta - <?=Nome_Do_Mes($coleta->MES)?> de <?=$coleta->ANO?></h1>      
        
        <table class="table table-bordered mt-5 tabela_lista">
            <thead>
                <tr>
                    <th>Clube</th>
                    <?php foreach($redes_sociais as $redesocial): ?>
                        <th><?=$redesocial->NOME?></th>                   
                    <?php endforeach;?>     
                    <th>Acumulado</th>                 
                </tr>
            </thead>            
            <tbody>
                <?php foreach($coletas_clube['coletas'] as $clube): ?>                    
                    <tr>                        
                        <td><a href="<?=base_url("clubes/historia/".$clube['CLUBE_ID'])?>"><?=$clube['CLUBE']?></a></td>
                             <?php foreach($redes_sociais as $redesocial): ?>
                                <td>
                                    <?=$clube['REDES'][$redesocial->ID]?>                                                            
                                </td>                            
                            <?php endforeach; ?> 
                            <td>
                                <?=$clube['ACUMULADO']?>                                                            
                            </td>                        
                        </form>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <hr>
        <table class="table table-bordered mt-5 tabela_lista">
            <thead>
                <tr>
                    <th>Divisão</th>
                    <?php foreach($redes_sociais as $redesocial): ?>
                        <th><?=$redesocial->NOME?></th>                   
                    <?php endforeach;?>     
                    <th>Acumulado</th>                 
                </tr>
            </thead>            
            <tbody>
                <?php foreach($coletas_clube['divisoes'] as $divisao): ?>                    
                    <tr>                        
                        <td><?=$divisao['NOME']?></a></td>
                             <?php foreach($redes_sociais as $redesocial): ?>
                                <td>
                                    <?=$divisao['REDES'][$redesocial->ID]?>                                                            
                                </td>                            
                            <?php endforeach; ?> 
                            <td>
                                <?=$divisao['ACUMULADO']?>                                                            
                            </td>                        
                        </form>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    </div>   
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>