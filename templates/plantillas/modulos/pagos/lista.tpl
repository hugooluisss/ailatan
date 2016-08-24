<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]'>
			<thead>
				<tr>
					<th>#</th>
					<th>Poliza</th>
					<th>Cliente</th>
					<th>Importe</th>
					<th>Registro</th>
					<th>Periodo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idPago}</td>
						<td>{$row.idPoliza}</td>
						<td>{$row.cliente}</td>
						<td class="text-right">{$row.importe}</td>
						<td class="text-right">{$row.registro}</td>
						<td>{$row.inicio} / {$row.fin}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idPago}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>