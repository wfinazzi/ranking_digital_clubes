    
    <div class="container">   
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#divisoesModal">
            Incluir Novo
        </button>  

       

        <table class="table table-bordered table-sm mt-5">
            <tr>
                <th>#</th>              
                <th>Mês</th>   
                <th>Ano</th> 
                <th>Iniciar Coleta</th>       
                <th>Editar/Excluir</th>               
            </tr>
            <?php foreach($coletas as $coleta): ?>
                <tr>
                    <td><?=$coleta->ID?></a></td>
                    <td><?=Nome_Do_Mes($coleta->MES)?></td> 
                    <td><?=$coleta->ANO?></td>
                    <td><a href="<?=base_url("Coletas/coleta/".$coleta->ID)?>"><button class="btn btn-primary btn-sm">Iniciar Coleta</button></a></td> 
                    <td><a data-toggle="modal" data-target="#coletasModal" class="editar_coleta" data-coleta="<?=$coleta->ID?>"> Editar</a> - <a href="<?=base_url('admin/coletas/excluir/'.$coleta->ID)?>">Excluir</a></td>               
                </tr>
            <?php endforeach;?>
        </table>
    </div>       
</body>
