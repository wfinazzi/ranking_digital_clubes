<div class="modal fade" id="divisoesModal" tabindex="-1" role="dialog" aria-labelledby="divisoesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incluir Divisões</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("Divisoes/incluir")?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <label for="divisao">Divisão</label>
                    <input type="text" name="divisao" id="divisao" value="" class="form-control form-control-sm mb-2">                                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>   
        </div>
    </div>
</div>