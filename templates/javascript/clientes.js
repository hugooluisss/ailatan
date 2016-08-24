$(document).ready(function(){
	getLista();
	$("#txtNacimiento").datepicker();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtApp: "required",
			txtNacimiento: "required",
			txtEmail: {
				required: true,
				email: true,
				remote: {
					url: "cclientes",
					type: "post",
					data: {
						action: "validaEmail",
						id: function(){
							return $("#id").val();
						}
					}
				}
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TCliente;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#txtApp").val(),
				$("#txtApm").val(),
				$("#txtNacimiento").val(),
				$("#txtEmail").val(),
				$("#txtTelefono").val(),
				{
					before: function(){
						$(form).find("[type=submit]").prop("disabled", true);
					},
					after: function(datos){
						$(form).find("[type=submit]").prop("disabled", false);
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... No se pudo guardar al cliente");
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("?mod=listaClientes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCliente;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCliente);
				$("#txtNombre").val(el.nombre);
				$("#txtApp").val(el.app);
				$("#txtApm").val(el.apm);
				$("#txtNacimiento").val(el.nacimiento);
				$("#txtEmail").val(el.email);
				$("#txtTelefono").val(el.telefono);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=polizas]").click(function(){
				$("#winPolizas").modal();
				var el = jQuery.parseJSON($(this).attr("datos"));
				$.post("?mod=listaClientePolizas", {
						"cliente": el.idCliente
					}, function( data ) {
						$("#dvPolizas").html(data);
						
						$("#dvPolizas #tblDatos").DataTable({
							"responsive": true,
							"language": espaniol,
							"paging": true,
							"lengthChange": false,
							"ordering": true,
							"info": true,
							"autoWidth": false
						});
					});
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});