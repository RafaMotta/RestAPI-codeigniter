<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listar Tarefas</title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" />
</head>
<body>

<div class="d-flex justify-content-center">
	<div class="col-sm-10">	
		<div class="col-sm-5">
			<legend>Listagem de Tarefas</legend>
			<button class="btn btn-primary">
				<a href='<?= base_url('ListTasks/create') ?>'style="text-decoration: none;color:white">
					Cadastrar Tarefa
				</a>
			</button>
			<hr/>
		</div>
		<table id="tasks" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Categoria</th>
					<th>Nome</th>
					<th>Previsão.</th>
					<th>Texto</th>
					<th>Valor</th>
					<th>Cód. Usuário A</th>
					<th>Data A</th>
					<th>Cód. Usuário C</th>
					<th>Data C</th>
					<th>Ações</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


<script src="<?= base_url('assets/jquery/jquery.min.js') ?>" ></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
<script src="<?= base_url('assets/datatables/jquery.dataTables.min.js') ?>" ></script>
<script src="<?= base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>" ></script>
<script>
$(document).ready(function() {
    $('#tasks').DataTable({
		"processing": true,
        "serverSide": true,		
		"ajax": '<?= base_url('ListTasks/list') ?>',
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
		},
	});	
});
</script>
</body>
</html>
