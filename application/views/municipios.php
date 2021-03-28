<div class="container">       
    <table class="table table-bordered mt-5">
        <tr>
            <th>#</th>              
            <th>MUNICÍPIO</th> 
            <th>POPULAÇÃO</th>
            <th>IDH</th>              
            <th>PIB</th>              
        </tr>
        <?php foreach($municipios as $municipio): ?>
            <tr>
                <td><?=$municipio->ID?></td>
                <td><?=$municipio->MUNICIPIO?></td>       
                <td><?=$municipio->POPULACAO?></td>
                <td><?=$municipio->IDH?></td>
                <td><?=$municipio->PIB?></td>                
            </tr>
        <?php endforeach;?>
    </table>
</div>     
</body>
