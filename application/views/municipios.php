<div class="container my-5">
    <h1 class="text-center">Municípios</h1>
    <hr class="bg-white">    
    <table class="table table-bordered table-sm tabela_lista mt-5">
        <thead>
            <tr>
                <th>#</th>              
                <th>MUNICÍPIO</th> 
                <th>POPULAÇÃO</th>
                <th>IDH</th>              
                <th>PIB</th>              
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
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>     
</body>
