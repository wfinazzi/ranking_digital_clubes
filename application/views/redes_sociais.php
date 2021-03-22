<?=$header?>
    <div class="container">
        <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#redesModal">
            Incluir Novo
        </button>    
        <table class="table table-bordered mt-5">
            <tr>
                <th>#</th>              
                <th>Divisão</th>       
                <th>Editar/Excluir</th>        
            </tr>
            <?php foreach($redes_sociais as $rede): ?>
                <tr>
                    <td><?=$rede->ID?></td>
                    <td><?=$rede->NOME?></td>      
                    <td><a data-toggle="modal" data-target="#redesModal" class="editar_rede" data-rede="<?=$rede->ID?>">Editar</a> - <a href="<?=base_url('redessociais/excluir/'.$rede->ID)?>">Excluir</a></td>              
                </tr>
            <?php endforeach;?>
        </table>
    </div>   
    <?=$modal?>
</body>
