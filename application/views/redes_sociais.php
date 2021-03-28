
    <div class="container">           
        <table class="table table-bordered mt-5">
            <tr>
                <th>#</th>              
                <th>Divisão</th>                              
            </tr>
            <?php foreach($redes_sociais as $rede): ?>
                <tr>
                    <td><?=$rede->ID?></td>
                    <td><?=$rede->NOME?></td>                      
                </tr>
            <?php endforeach;?>
        </table>
    </div>       
</body>
