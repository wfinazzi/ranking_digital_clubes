    
    <div class="container">   
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#divisoesModal">
            Incluir Novo
        </button>    
        <table class="table table-bordered mt-5">
            <tr>
                <th>#</th>              
                <th>Divisão</th>    
                <th>Editar/Excluir</th>               
            </tr>
            <?php foreach($divisoes as $divisao): ?>
                <tr>
                    <td><?=$divisao->ID?></a></td>
                    <td><?=$divisao->TITULO?></td> 
                    <td><a data-toggle="modal" data-target="#divisoesModal" class="editar_divisao" data-divisao="<?=$divisao->ID?>"> Editar</a> - <a href="<?=base_url('admin/divisoes/excluir/'.$divisao->ID)?>">Excluir</a></td>               
                </tr>
            <?php endforeach;?>
        </table>
    </div>       
</body>
