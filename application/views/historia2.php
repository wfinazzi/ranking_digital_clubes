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
                <tr>
                    <td><?=$coleta['MES']?></td>
                    <?php foreach($coleta['REDES'] as $rede): ?>
                        <td><?=$rede['VALOR']?> (<?=$rede['PORCENTAGEM']?>%)</td>
                    <?php endforeach;?>
                    <td><?=$coleta['ACUMULADO']?></td>
                </tr>
                <?php endforeach;?>                
            </tbody>      
        </table>
        
         <!-- Arrumar a exibição das redes sociais -->
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
                <?php foreach($clubes_municipio as $clube): ?>   
                    <?php foreach($clube->COLETAS as $key => $coleta): ?>
                    <tr>
                        <td><img src="<?=base_url("img/escudos/".$clube->IMAGEM)?>" alt="" style="width:20px; height:20px;"> <a href="<?=base_url("clubes/clube/".$clube->ID)?>"><?=$clube->CLUBE?></a></td>                        
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

        <!-- <pre>
            <?php print_r($clubes_divisao);?>            
        </pre> -->

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
                    <tr>
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