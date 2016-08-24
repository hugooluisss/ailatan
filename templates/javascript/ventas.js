$(document).ready(function(){
	//$('.selectpicker').selectpicker({});
	
	getLista();
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
	function getLista(){
		$.get("listaVentas", function(html){
			$("#dvLista").html(html);
			
			$("#dvLista").find("[action=ticket]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				var btn = $(this);
				btn.prop("disabled", true);
				
				$.post("cventas", {
					"folio": el.folio,
					"iva": $("#selIVA").val(),
					"action": "generarTicket"
				}, function( data ) {
					btn.prop("disabled", false);
					if (data.doc == "")
						alert("Error al generar el ticket");
					else{
						openDocumento(data.doc);
					}
				}, "json");
			});
			
			
			
			$("#tblLista").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	}
	
	
	function openDocumento(documento){
		window.open(documento,'_blank');
		/*
		if (ventana == undefined || ventana == null)
			ventana = window.open(documento,'_blank');
		else{
			try{
				ventana.location.href = documento;
			}catch(er){
				ventana = window.open(documento,'_blank');
			}
			
			
		}
		
		ventana.focus();*/
	}
});