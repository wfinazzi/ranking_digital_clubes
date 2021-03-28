    
    <div class="container">        
        <table class="table table-bordered mt-5">
            <tr>
                <th>#</th>              
                <th>Divisão</th>                             
            </tr>
            <?php foreach($divisoes as $divisao): ?>
                <tr>
                    <td><?=$divisao->ID?></a></td>
                    <td><?=$divisao->TITULO?></td>                    
                </tr>
            <?php endforeach;?>
        </table>
    </div>       
</body>
