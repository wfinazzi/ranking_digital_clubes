
    <div class="container my-5">    
        <input type="hidden" name="clube" id="clube" value="<?=$clube->ID?>"> 
        <input type="hidden" name="municipio" id="municipio" value="<?=$municipio->ID?>"> 
        <input type="hidden" name="divisao" id="divisao" value="<?=$clube->DIVISAO?>"> 
        <input type="hidden" name="base_url" id="base_url" value="<?=base_url();?>">     

        <h3><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt=""> <?=$clube->CLUBE?></h3>
        <hr class="bg-white"> 
        <h4><?=$clube->NOME_COMPLETO?></h4>
        <a href="<?=base_url("Municipio/".$municipio->ID);?>"><h5><?=$municipio->MUNICIPIO?>-SP</h5></a>
        <div class="d-flex">                 
            <?php foreach($redes_sociais as $rede): ?>
                <?php $rede_social = "LINK_".strtoupper($rede->NOME); ?>    
                <?php if($clubes_redes[0][$rede_social] !== ""): ?>
                    <a href="<?=$clubes_redes[0][$rede_social];?>" target="_blank" class="btn btn-outline-primary mr-2"><i class="fa fa-<?=strtolower($rede->NOME)?> fa-2x"></i></a>
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

        <h5 class="mt-5">Redes Sociais do <?=$clube->CLUBE?> por Mês</h5>   
        <hr class="bg-white">      

        <canvas id="canvas"></canvas>
        
        
    
        <a href="<?=base_url("Relatorios/clube_coletas/".$clube->ID)?>" class="btn btn-info btn-sm">Gerar Relatório</a>
        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Coleta</th>   
                    <?php foreach($redes_sociais as $rede): ?>  
                        <th><?=$rede->NOME?> (%)</th>    
                    <?php endforeach;?>                   
                    <th>Acumulado</th>                                 
                </tr>
            </thead>    
            <tbody>                
                <?php foreach($coletas as $coleta): ?>
                <tr class="table-dark">
                    <td><?=$coleta['MES']?></td>
                    <?php foreach($coleta['REDES'] as $rede): ?>
                        <td><?=$rede['VALOR']?> (<?=$rede['PORCENTAGEM']?>%)</td>
                    <?php endforeach;?>
                    <td><?=$coleta['ACUMULADO']?></td>
                </tr>
                <?php endforeach;?>                
            </tbody>      
        </table>

        <h5 class="mt-5">Redes Sociais dos clubes de <?=$municipio->MUNICIPIO?>-SP</h5>   
        <hr class="bg-white"> 
        
        <canvas id="canvas_line"></canvas>
         <!-- Arrumar a exibição das redes sociais -->
        <a href="<?=base_url("Relatorios/clubes_municipio/".$clube->ID)?>" class="btn btn-info btn-sm mt-3">Gerar Relatório</a><br>
        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Clube</th> 
                    <th>Coleta</th>               
                    <?php foreach($redes_sociais as $rede): ?>
                        <th><?php print_r($rede->NOME);?>  (%)</th>
                    <?php endforeach;?>                                   
                    <th>Acumulado</th>                                 
                </tr>
            </thead> 
            <tbody>  
                <?php foreach($clubes_municipio as $club): ?>   
                    <?php foreach($club->COLETAS as $key => $coleta): ?>
                    <tr class="table-dark">
                        <td><img src="<?=base_url("img/escudos/".$club->IMAGEM)?>" alt="" style="width:20px; height:20px;"> <a href="<?=base_url("clubes/clube/".$club->ID)?>"><?=$club->CLUBE?></a></td>                        
                        <td><?=$coleta['MES']?></td>
                        <?php foreach($coleta['REDES'] as $key => $rede): ?>
                            <td><?=$rede['VALOR']?></td>
                        <?php endforeach;?>
                        <td><?=$coleta['ACUMULADO']?></td>                        
                    </tr>
                    <?php endforeach;?>
                <?php endforeach;?> 
            </tbody>   
        </table>

        <h5 class="mt-5">Redes Sociais dos clubes do <?=$divisao->TITULO?></h5>
        <hr class="bg-white"> 

        <canvas id="canvas_divisao"></canvas>

        
        <a href="<?=base_url("Relatorios/clubes_divisao/".$clube->ID)?>" class="btn btn-info btn-sm">Gerar Relatório</a>
        <table class="table table-bordered mt-5 tabela_lista" style="font-size:12px;">
            <thead>
                <tr>   
                    <th>Clube</th> 
                    <th>Divisão</th>
                    <th>Coleta</th>                     
                    <?php foreach($redes_sociais as $rede): ?>
                        <th><?php print_r($rede->NOME);?>  (%)</th>
                    <?php endforeach;?>                                        
                    <th>Acumulado</th>                                 
                </tr>
            </thead> 
            <tbody>  
                <?php foreach($clubes_divisao as $clube): ?>  
                    <?php foreach($clube->COLETAS as $key => $coleta): ?>
                    <tr class="table-dark">
                        <td><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt="" style="width:20px; height:20px;"> <a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>                        
                        <td><?=$clube->DIVISAO->TITULO?></td>
                        <td><?=$coleta['MES']?></td>
                        <?php foreach($coleta['REDES'] as $key => $rede): ?>
                            <td><?=$rede['VALOR']?></td>
                        <?php endforeach;?>
                        <td><?=$coleta['ACUMULADO']?></td>                       
                    </tr>
                    <?php endforeach;?>
                <?php endforeach;?> 
            </tbody>   
        </table>

    </div>    

    
</body>
