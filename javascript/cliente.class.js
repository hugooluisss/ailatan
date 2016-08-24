TCliente = function(){
	var self = this;
	
	this.add = function(id,	nombre, app, apm, nacimiento, email, telefono, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cclientes', {
				"id": id,
				"nombre": nombre,
				"app": app,
				"apm": apm,
				"nacimiento": nacimiento,
				"email": email,
				"telefono": telefono,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cclientes', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("Ocurrió un error al eliminar al cliente");
			}
		}, "json");
	};
	
	this.getPolizas = function(cliente, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('listaClientePolizas', {
			"cliente": cliente,
			"json": true,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("Ocurrió un al obtener la lista de pólizas");
			}
		}, "json");
	}
};