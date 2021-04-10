
    <div class="container my-5">  
        <h1 class="text-center">Redes Sociais</h1>
        <hr class="bg-white">         
        <table class="table table-bordered tabela_lista mt-5">
            <thead>
                <tr>
                    <th>#</th>              
                    <th>Divisão</th>                                               
                </tr>
            </thead>
            <tbody>
                <?php foreach($redes_sociais as $rede): ?>
                    <tr class="table-dark">
                        <td><?=$rede->ID?></td>
                        <td><?=$rede->NOME?></td>                       
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>       
</body>
