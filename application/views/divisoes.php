    
    <div class="container my-5"> 
        <h1 class="text-center">Divisões</h1>
        <hr class="bg-white">    
        <table class="table table-bordered tabela_lista mt-5" style="color:#ffffff;">
            <thead>
                <tr>
                    <th>#</th>              
                    <th>Divisão</th>                             
                </tr>
            </thead>
            <tbody >
                <?php foreach($divisoes as $divisao): ?>
                    <tr class="table-dark">
                        <td><?=$divisao->ID?></a></td>
                        <td><?=$divisao->TITULO?></td>                    
                    </tr>
                <?php endforeach;?>
            </tbody>      
        </table>
    </div>       
</body>


