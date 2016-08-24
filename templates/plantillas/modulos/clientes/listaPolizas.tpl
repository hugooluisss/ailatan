<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Módulo</th>
					<th>Registrada</th>
					<th>Próximo pago</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idPoliza}</td>
						<td>{$row.modulo}</td>
						<td>{$row.creada}</td>
						<td>{$row.siguientepago}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>