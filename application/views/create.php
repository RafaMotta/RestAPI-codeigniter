<?php
// var_dump($tasks->nome);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cadastrar Tarefa</title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
	
	
	<div class="d-flex justify-content-center">
		<div class="col-sm-6">
		<form id="form">
			<legend>Cadastrar Tarefa</legend>
			<div class="form-group">
				<label for="cod_categoria">Categoria</label>
				<input type="text" name="cod_categoria" id="cod_categoria" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control" require/>
			</div>
			<div class="form-group">
				<label for="previsao">Previsão</label>
				<input type="number" name="previsao" id="previsao" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="texto">Texto</label>
				<input type="text" name="texto" id="texto" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="valor">Valor</label>
				<input type="number" name="valor" id="valor" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="cod_usuario_c">Usuário C</label>
				<input type="number" name="cod_usuario_c" id="cod_usuario_c" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="data_c">Data C</label>
				<input type="date" name="data_c" id="data_c" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="cod_usuario_a">Usuário A</label>
				<input type="number" name="cod_usuario_a" id="cod_usuario_a" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="data_a">Data A</label>
				<input type="date" name="data_a" id="data_a" class="form-control"/>
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
			<br/>
			<button class="btn btn-primary">
				<a href='<?= base_url('ListTasks') ?>'style="text-decoration:none;color:white">
					Voltar
				</a>
			</button>
		</div>
	</div>	
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>" ></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
<script>
$(document).ready(function() {
	$("#form").submit(function(e){
		e.preventDefault();
		let formSerialize = $(this).serialize();
		$.ajax({
			url: '<?= base_url('ListTasks/insert') ?>',
			data: formSerialize,
			type: 'POST',
			dataType: 'JSON',
			success: function(retorno){
				if(retorno == "ok"){
					alert("Usuario Cadastrador!");		
					$('#form').each (function(){
						this.reset();
					});
				}else{
					alert("Erro! Verifique os dados!");
				}						
			}
		})
	})
   
});
</script>
</body>
</html>
