    
    <div class="container my-5">   
        <h1 class="text-center">Coletas</h1>
        <hr class="bg-white">
        <?php if($user_data['perfil'] == 1): ?>
            <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#divisoesModal">
                <i class="fa fa-plus mr-2"></i> Incluir Novo
            </button>  
        <?php endif; ?>    

       

        <table class="table table-bordered table-sm tabela_lista mt-5">
            <thead>
                <tr>
                    <th>#</th>              
                    <th>Mês</th>   
                    <th>Ano</th> 
                    <th>Iniciar Coleta</th>       
                    <?php if($user_data['perfil'] == 1): ?>   
                        <th>Editar/Excluir</th>   
                    <?php endif; ?>                
                </tr>
            </thead>
            <tbody>
                <?php foreach($coletas as $coleta): ?>
                    <tr class="table-dark">
                        <td><?=$coleta->ID?></a></td>
                        <td><?=Nome_Do_Mes($coleta->MES)?></td> 
                        <td><?=$coleta->ANO?></td>
                        <td><a href="<?=base_url("admin/Coletas/coleta/".$coleta->ID)?>"><button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Iniciar Coleta</button></a></td> 
                        <?php if($user_data['perfil'] == 1): ?>    
                            <td>
                            <a data-toggle="modal" data-target="#coletasModal" class="editar_coleta btn btn-sm btn-secondary" data-coleta="<?=$coleta->ID?>"><i class="fa fa-edit"></i></a>              
                            <a href="<?=base_url('admin/coletas/excluir/'.$coleta->ID)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>               
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>            
        </table>
    </div>       
</body>
