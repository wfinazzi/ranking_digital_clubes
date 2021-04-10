<div class="container my-5">
    <h1 class="text-center">Municípios</h1>
    <hr class="bg-white">
    <?php if($user_data['perfil'] == 1): ?>   
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#municipiosModal">
        <i class="fa fa-plus mr-2"></i> Incluir Novo
        </button>   
    <?php endif; ?> 
    <table class="table table-bordered table-sm tabela_lista mt-5">
        <thead>
            <tr>
                <th>#</th>              
                <th>MUNICÍPIO</th> 
                <th>POPULAÇÃO</th>
                <th>IDH</th>              
                <th>PIB</th>
                <?php if($user_data['perfil'] == 1): ?>   
                    <th>Editar/Excluir</th>   
                <?php endif; ?> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($municipios as $municipio): ?>
                <tr class="table-dark">
                    <td><?=$municipio->ID?></td>
                    <td><?=$municipio->MUNICIPIO?></td>       
                    <td><?=$municipio->POPULACAO?></td>
                    <td><?=$municipio->IDH?></td>
                    <td><?=$municipio->PIB?></td>
                    <?php if($user_data['perfil'] == 1): ?>   
                        <td>
                            <a data-toggle="modal" data-target="#municipiosModal" class="editar_municipio btn btn-sm btn-secondary" data-municipio="<?=$municipio->ID?>"><i class="fa fa-edit"></i></a>  
                            <a href="<?=base_url('admin/municipios/excluir/'.$municipio->ID)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>              
                    <?php endif; ?>
                </tr>
            <?php endforeach;?>
        </tbody>
        
    </table>
</div>     
</body>
