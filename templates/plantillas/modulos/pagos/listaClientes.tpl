<div class="box">
	<div class="box-body">
		<table id="tblDatosClientes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Email</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$listaClientes item="row"}
					<tr>
						<td>{$row.idCliente}</td>
						<td>{$row.nombre}</td>
						<td>{$row.app}</td>
						<td>{$row.apm}</td>
						<td>{$row.email}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="setClientes" title="Click o Tap para seleccionar" datos='{$row.json}'><i class="fa fa-hand-pointer-o"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>