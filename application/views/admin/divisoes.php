    
    <div class="container my-5"> 
        <h1 class="text-center">Divisões</h1>
        <hr class="bg-white">
        <?php if($user_data['perfil'] == 1): ?>    
            <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#divisoesModal">
                <i class="fa fa-plus mr-2"></i> Incluir Novo
            </button>    
        <?php endif; ?>
        <table class="table table-bordered tabela_lista mt-5">
            <thead>
                <tr>
                    <th>#</th>              
                    <th>Divisão</th>    
                    <?php if($user_data['perfil'] == 1): ?>   
                        <th>Editar/Excluir</th>   
                    <?php endif; ?>           
                </tr>
            </thead>
            <tbody>
                <?php foreach($divisoes as $divisao): ?>
                    <tr class="table-dark">
                        <td><?=$divisao->ID?></a></td>
                        <td><?=$divisao->TITULO?></td> 
                        <?php if($user_data['perfil'] == 1): ?>   
                            <td>
                                <a data-toggle="modal" data-target="#divisoesModal" class="editar_divisao  btn btn-sm btn-secondary" data-divisao="<?=$divisao->ID?>"><i class="fa fa-edit"></i></a>
                                <a href="<?=base_url('admin/divisoes/excluir/'.$divisao->ID)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>               
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>            
        </table>
    </div>       
</body>
