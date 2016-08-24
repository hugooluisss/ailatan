<div class="box">
	<div class="box-header">
		<h3>Configuración del sistema </h3>
	</div>
	<div class="box-body">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtCostoMantenimiento" class="col-lg-2">Nombre de la empresa</label>
				<div class="col-lg-5">
					<input class="form-control" id="txtEmpresa" name="txtEmpresa" value="{$razonSocial}" clave="razonSocial" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2">Dirección</label>
				<div class="col-lg-10">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="{$direccion}" clave="direccion" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtGiro" class="col-lg-2">Giro</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtGiro" name="txtGiro" value="{$giro}" clave="giro" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-lg-2">Teléfono</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="{$telefono}" clave="telefono" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtCIF" class="col-lg-2">CIF</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCIF" name="txtCIF" value="{$cif}" clave="cif" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtWeb" class="col-lg-2">Dirección web</label>
				<div class="col-lg-5">
					<input class="form-control" id="txtWeb" name="txtWeb" value="{$web}" clave="web" />
				</div>
			</div>
		</form>
	</div>
</div>