<table id="tblLista" class="table table-bordered table-hover" data-order='[[0, "desc"]]'>
	<thead>
		<tr>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Vendedor</th>
			<th>Total</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$ventas item="row"}
			<tr>
				<td>{$row.folio}</td>
				<td>{$row.cliente}</td>
				<td>{$row.vendor}</td>
				<td>{$row.total}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="ticket" title="Imprimir ticket" datos='{$row.json}'><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>