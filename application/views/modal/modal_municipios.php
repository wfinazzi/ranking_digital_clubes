<div class="modal fade" id="municipiosModal" tabindex="-1" role="dialog" aria-labelledby="municipiosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incluir Municípios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("admin/Municipios/incluir")?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    
                    <label for="municipio">Município</label>
                    <input type="text" name="municipio" id="municipio" value="" class="form-control form-control-sm mb-2"> 
                    
                    <label for="populacao">População</label>
                    <input type="text" name="populacao" id="populacao" value="" class="form-control form-control-sm mb-2">  
                    
                    <label for="idh">IDH</label>
                    <input type="text" name="idh" id="idh" value="" class="form-control form-control-sm mb-2">  

                    <label for="pib">PIB</label>
                    <input type="text" name="pib" id="pib" value="" class="form-control form-control-sm mb-2">                                                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>   
        </div>
    </div>
</div>