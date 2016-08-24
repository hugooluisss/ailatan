$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$(".btnClientes").click(function(){
		$("#winClientes").modal();
	});
	
	$("#txtFecha").datepicker();
	
	$("#tblDatosClientes").find("[action=setClientes]").click(function(){
		var el = jQuery.parseJSON($(this).attr("datos"));
		$("#txtCliente").val(el.nombre + ' ' + el.app + ' ' + el.apm);
		$("#txtCliente").attr("identificador", el.idCliente);
		
		$("#winClientes").modal("hide");
		
		var objCliente = new TCliente;
		objCliente.getPolizas(el.idCliente, {
			before: function(){
				$("#selPoliza").empty();
				$("#mensajeFecha").html("");
			}, after: function(resp){
				$.each(resp, function(e, poliza){
					$("#selPoliza").append('<option value="' + poliza.idPoliza + '" importe="' + poliza.importe + '" ultimopago="' + poliza.ultimopago + '" siguientepago="' + poliza.siguientepago + '">' + poliza.modulo + '</option>');
				});
				
				$("#txtImporte").val($("#selPoliza option:selected").attr("importe"));
				var ultimopago = $("#selPoliza option:selected").attr("ultimopago");
				var siguientepago = $("#selPoliza option:selected").attr("siguientepago");
				$(".mensajeFecha").html("El último pago fue el " + (ultimopago == '' || ultimopago == "null"?"nunca":ultimopago) + " el cual vence el " + siguientepago);
				
				$("#txtFecha").val(siguientepago);
			}
		});
	});
	
	$("#selPoliza").change(function(){
		$("#txtImporte").val($("#selPoliza option:selected").attr("importe"));
		
		var ultimopago = $("#selPoliza option:selected").attr("ultimopago");
		var siguientepago = $("#selPoliza option:selected").attr("siguientepago");
		$(".mensajeFecha").html("El último pago fue el " + (ultimopago == '' || ultimopago == "null"?"nunca":ultimopago) + " el cual vence el " + siguientepago);
		
		$("#txtFecha").val(siguientepago);
	});
	
	$("#tblDatosClientes").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": true,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			selPoliza: "required",
			txtCliente: "required",
			txtImporte: {
				required: true,
				number: true,
				min: 1
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TPago;
			obj.add(
				$("#id").val(), 
				$("#selPoliza").val(), 
				$("#txtFecha").val(), 
				$("#txtImporte").val(),
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
							
							$("#selPoliza").empty();
							$("#mensajeFecha").html(" ");
							$("#txtMonto").val('');
						}else{
							alert("Upps... No se pudo guardar el pago");
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("?mod=listaPagos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPago;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							if (data.band)
								getLista();
							else
								alert("Ups... no se pudo borrar el registro");
						}
					});
				}
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