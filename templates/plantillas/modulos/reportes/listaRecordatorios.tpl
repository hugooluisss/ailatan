<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Cliente</th>
					<th>Módulo</th>
					<th>Próximo</th>
					<th>Correo</th>
					<th>Recordatorio</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.cliente}</td>
						<td>{$row.modulo} <small>$ {$row.importe}</small></td>
						<td>{$row.siguientepago}</td>
						<td>{$row.email}</td>
						<td class="text-center">
							<input type="checkbox" class="mail" poliza="{$row.idPoliza}"/>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>