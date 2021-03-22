<?=$header?>
    <div class="container">
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#municipiosModal">
            Incluir Novo
        </button>    
        <table class="table table-bordered mt-5">
            <tr>
                <th>#</th>              
                <th>MUNICÍPIO</th> 
                <th>POPULAÇÃO</th>
                <th>IDH</th>              
                <th>PIB</th>
                <th>Editar/Excluir</th>    
            </tr>
            <?php foreach($municipios as $municipio): ?>
                <tr>
                    <td><?=$municipio->ID?></td>
                    <td><?=$municipio->MUNICIPIO?></td>       
                    <td><?=$municipio->POPULACAO?></td>
                    <td><?=$municipio->IDH?></td>
                    <td><?=$municipio->PIB?></td>
                    <td><a data-toggle="modal" data-target="#municipiosModal" class="editar_municipio" data-municipio="<?=$municipio->ID?>"> Editar</a> - <a href="<?=base_url('municipios/excluir/'.$rede->ID)?>">Excluir</a></td>              
                </tr>
            <?php endforeach;?>
        </table>
    </div>   
    <?=$modal?>
</body>
