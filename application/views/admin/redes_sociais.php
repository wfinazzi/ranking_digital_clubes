
    <div class="container my-5">  
        <h1 class="text-center">Redes Sociais</h1>
        <hr class="bg-white">     
        <?php if($user_data['perfil'] == 1): ?>   
            <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#redesModal">
                <i class="fa fa-plus mr-2"></i> Incluir Novo
            </button>   
        <?php endif; ?>        
        <table class="table table-bordered tabela_lista mt-5">
            <thead>
                <tr>
                    <th>#</th>              
                    <th>Divisão</th>  
                    <th>Editar/Excluir</th>                               
                </tr>
            </thead>
            <tbody>
                <?php foreach($redes_sociais as $rede): ?>
                    <tr class="table-dark">
                        <td><?=$rede->ID?></td>
                        <td><?=$rede->NOME?></td>  
                        <?php if($user_data['perfil'] == 1): ?>  
                            <td>
                                <a data-toggle="modal" data-target="#redesModal" class="editar_rede btn btn-sm btn-warning" data-rede="<?=$rede->ID?>"> <i class="fa fa-edit"></i></a> 
                                <a href="<?=base_url('admin/redes_sociais/excluir/'.$rede->ID)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>                                 
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>       
</body>
