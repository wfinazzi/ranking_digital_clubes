<div class="modal fade" id="clubesModal" tabindex="-1" role="dialog" aria-labelledby="clubesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incluir Clubes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("admin/Clubes/incluir")?>" method="post">          
                <div class="modal-body">  
                    <input type="hidden" name="id" id="id" value="">

                    <label for="clube">Clube</label>
                    <input type="text" name="clube" id="clube" value="" class="form-control form-control-sm mb-2"> 

                    <label for="nome_completo"> Nome Completo</label>
                    <input type="text" name="nome_completo" id="nome_completo"  value="" class="form-control form-control-sm mb-2">  

                    <label for="divisao">Divisão</label>
                    
                    <select type="text" name="divisao" id="divisao" value="" class="form-control form-control-sm mb-2" >
                        <option value="">Selecione</option>
                        <?php foreach($divisoes as $item): ?>
                            <option value="<?=$item->ID?>"><?=$item->TITULO?></option>
                        <?php endforeach; ?>
                    </select> 

                    <label for="municipio">Município</label>
                    <select type="text" name="municipio" id="municipio" value="" class="form-control form-control-sm mb-2">
                        <option value="">Selecione</option>
                        <?php foreach($municipios as $item): ?>
                            <option value="<?=$item->ID?>"><?=$item->MUNICIPIO?></option>
                        <?php endforeach; ?>
                    </select>  
                    
                    <label for="municipio">Escudo</label>
                    <select type="text" name="imagem" id="imagem" value="" class="form-control form-control-sm mb-2">
                        <?php foreach($escudos as $item): ?>
                            <option value="<?=$item?>" style="background-image:img/escudos/<?=$item?>"><?=$item?></option>
                        <?php endforeach; ?>
                    <select>

                    <label for="link_facebook">Facebook - Link</label>
                    <input type="text" name="link_facebook" id="link_facebook" value="" class="form-control form-control-sm mb-2">

                    <label for="link_instagram">Instagram - Link</label>
                    <input type="text" name="link_instagram" id="link_instagram" value="" class="form-control form-control-sm mb-2">

                    <label for="link_youtube">Youtube - Link</label>
                    <input type="text" name="link_youtube" id="link_youtube" value="" class="form-control form-control-sm mb-2">

                    <label for="link_twitter">Twitter - Link</label>
                    <input type="text" name="link_twitter" id="link_twitter" value="" class="form-control form-control-sm mb-2">                                                     
                </div>               
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>   
        </div>
    </div>
</div>