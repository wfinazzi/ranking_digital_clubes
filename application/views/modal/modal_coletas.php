<div class="modal fade" id="divisoesModal" tabindex="-1" role="dialog" aria-labelledby="divisoesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incluir Coletas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url("admin/Coletas/incluir")?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <label for="divisao">Mês</label>
                    <select name="mes" id="mes" class="form-control form-control-sm">
                        <?php foreach($meses as $key => $item): ?>
                            <option value="<?=$key?>"><?=$item?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="divisao">Ano</label>
                    <select name="ano" id="ano" class="form-control form-control-sm">
                        <?php foreach($anos as $key => $item): ?>
                            <option value="<?=$key?>"><?=$item?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>   
        </div>
    </div>
</div>