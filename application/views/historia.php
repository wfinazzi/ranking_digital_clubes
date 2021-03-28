
    <div class="container">           
        <h3><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt=""> <?=$clube->CLUBE?></h3>
        <h4><?=$clube->NOME_COMPLETO?></h4>
        <a href="<?=base_url("Municipio/".$municipio->ID);?>"><h5><?=$municipio->MUNICIPIO?>-SP</h5></a>
        <div class="d-flex">                 
            <?php foreach($redes_sociais as $rede): ?>
                <?php $rede_social = "LINK_".strtoupper($rede->NOME); ?>    
                <?php if($clubes_redes[0][$rede_social] !== ""): ?>
                    <a href="<?=$clubes_redes[0][$rede_social];?>" class="btn btn-outline-primary mr-2"><i class="fa fa-<?=strtolower($rede->NOME)?> fa-2x"></i></a>
                <?php endif;?>
            <?php endforeach;?>                             
        </div>
        <div id="accordion">
            <div class="card my-5">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Ver História
                    </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <?= $historia->HISTORIA; ?>    
                    </div>
                </div>
            </div>
        </div>        
        
        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Coleta</th>             
                    <?php foreach($coletas as $coleta): ?>
                        <?php foreach($coleta['REDES'] as $rede): ?>
                            <th><?=$rede['NOME']?> (%)</th>
                        <?php endforeach;?>
                    <?php endforeach;?> 
                    <th>Acumulado</th>                                 
                </tr>
            </thead>    
            <tbody>                
                <?php foreach($coletas as $coleta): ?>
                    <td><?=$coleta['MES']?></td>
                    <?php foreach($coleta['REDES'] as $rede): ?>
                        <td><?=$rede['VALOR']?> (<?=$rede['PORCENTAGEM']?>%)</td>
                    <?php endforeach;?>
                <?php endforeach;?>
                <td><?=$coleta['ACUMULADO']?></td>
            </tbody>      
        </table>
        
         <!-- Arrumar a exibição das redes sociais -->
        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Clube</th> 
                    <th>Coleta</th>                  
                    <?php foreach($clubes_municipio[0]->COLETAS as $coleta): ?>
                        <?php foreach($redes_sociais as $rede): ?>
                            <th><?php print_r($rede->NOME);?>  (%)</th>
                        <?php endforeach;?>  
                    <?php endforeach;?>                   
                    <th>Acumulado</th>                                 
                </tr>
            </thead> 
            <tbody>  
                <?php foreach($clubes_municipio as $clube): ?>   
                    <tr>
                        <td><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt="" style="width:20px; height:20px;"> <a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>
                        <?php foreach($clube->COLETAS as $key => $coleta): ?>
                            <td><?=$coleta['MES']?></td>
                            <?php foreach($coleta['REDES'] as $key => $rede): ?>
                                <td><?=$rede['VALOR']?></td>
                            <?php endforeach;?>
                            <td><?=$coleta['ACUMULADO']?></td>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?> 
            </tbody>   
        </table>

        <!-- <pre>
            <?php print_r($clubes_divisao);?>            
        </pre> -->

        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Clube</th> 
                    <th>Divisão</th>
                    <th>Coleta</th>                  
                    <?php foreach($clubes_divisao[0]->COLETAS as $coleta): ?>
                        <?php foreach($redes_sociais as $rede): ?>
                            <th><?php print_r($rede->NOME);?>  (%)</th>
                        <?php endforeach;?>  
                    <?php endforeach;?>                   
                    <th>Acumulado</th>                                 
                </tr>
            </thead> 
            <tbody>  
                <?php foreach($clubes_divisao as $clube): ?>   
                    <tr>
                        <td><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt="" style="width:20px; height:20px;"> <a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>
                        <?php foreach($clube->COLETAS as $key => $coleta): ?>
                            <td><?=$clube->DIVISAO->TITULO?></td>
                            <td><?=$coleta['MES']?></td>
                            <?php foreach($coleta['REDES'] as $key => $rede): ?>
                                <td><?=$rede['VALOR']?></td>
                            <?php endforeach;?>
                            <td><?=$coleta['ACUMULADO']?></td>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?> 
            </tbody>   
        </table>

    </div>    
</body>
