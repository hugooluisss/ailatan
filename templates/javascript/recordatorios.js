$(document).ready(function(){
	getLista();
	$(".alert").hide();
	
	$("#btnEnviar").click(function(){
		if ($(".mail:checked").length > 0){
			if (confirm("Enviaremos " + $(".mail:checked").length + " recordatorios, ¿Seguro?")){
				var s = '';
				$(".mail:checked").each(function(i){
					s += $(this).attr("poliza") + ",";
				});
				
				$(".alert").show();
				$("#btnEnviar").prop("disabled", true);
				
				$.post("creportes", {
					"polizas": s,
					"action": "enviarRecordatorio"
				}, function(resp){
					$(".alert").hide();
					$("#btnEnviar").prop("disabled", false);
					if (resp.band == true)
						alert("Se enviaron los correos");
					else
						alert("Ocurrió un problema al enviar los correos");
				}, "json");
			}
		}else
			alert("Selecciona minimamente uno de la lista");
	});
	
	function getLista(){
		$.get("listaRecordatorios", function( data ) {
			$("#dvLista").html(data);
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});