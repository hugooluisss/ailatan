TPago = function(){
	var self = this;
	
	this.add = function(id,	poliza, fecha, importe, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpagos', {
				"id": id,
				"poliza": poliza,
				"fecha": fecha,
				"importe": importe,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cpagos', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("Ocurrió un error al eliminar el pago");
			}
		}, "json");
	};
};