<div class="container conteudo">
	<?php if($this->session->flashdata('mensagem')){?>
		<div class="alert alert-success mt-2" role="alert">
			<?=$this->session->flashdata('mensagem') ?>
   		</div>
	<?php } ?>
	<?php if($this->session->flashdata('mensagem_erro')){?>
		<div class="alert alert-success mt-2" role="alert">
			<?=$this->session->flashdata('mensagem_erro') ?>
   		</div>
	<?php } ?>
	<h1>Candidatos</h1>
	<table class="table bg-white table-bordered table-sm">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>				
				<th>Perfil</th>					
				<th>Cadastrar</th>	
				<th>Excluir</th>			
			</tr>
		</thead>
		<tbody>
			<?php foreach($candidatos as $candidato): ?>
			<tr>
				<form method="post" action="<?=base_url("Usuarios/usuarioPost")?>">
					<td><?=$candidato->NOME?></td>
					<td><?=$candidato->EMAIL?></td>					
					<td>
                        <select name="perfil" id="perfil" class="form-control form-control-sm">
                            <?php foreach($perfis as $perfil):?>
                                <option value="<?=$perfil->ID?>"><?=$perfil->PERFIL?></option>
                            <?php endforeach;?>                            
                        </select>
                    </td>					
					<input type="hidden" name="id" value="<?=$candidato->ID?>">		
					<input type="hidden" name="acao" value="inserir">
					<td><button type="submit" class="btn btn-sm btn-primary" value="">Cadastrar</button></td>
				</form>		
				<form method="post" action="<?=base_url("Usuarios/excluirCandidato")?>">
					<input type="hidden" name="id" value="<?=$candidato->ID?>">		
					<td><button type="submit" class="btn btn-sm btn-danger">Excluir</button></td>
				</form>		
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>	
	<h1>Usuários</h1>
	<table class="table bg-white table-bordered table-sm">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
                <th>Perfil</th>
				<th>Status</th>				
				<th>Editar/Inativar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario) : ?>
                <tr>
                    <td><?=$usuario->first_name."".$usuario->last_name?></td>
                    <td><?=$usuario->email_address?></td>
                    <td><?=$usuario->PERFIL_NOME?></td>
                    <td><?=$usuario->STATUS_NOME?></td>								
                    <td>
                        <a href="<?=base_url("admin/Usuarios/editar/".$usuario->user_id)?>">
                        <?php if($usuario->STATUS_NOME == "ATIVO"): ?>
                            <a href="<?=base_url("admin/Usuarios/inativar/".$usuario->user_id)?>"><button type="submit" class="btn btn-sm btn-danger">Inativar</button></a>
                        <?php else: ?>					
                            <a href="<?=base_url("admin/Usuarios/ativar/".$usuario->user_id)?>"><button type="submit" class="btn btn-sm btn-success">Ativar</button></a>
                        <?php endif; ?>					
                    </td>
                </tr>
			<?php endforeach; ?>
		</tbody>
	</table>	
</div>
