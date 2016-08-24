TModulo = function(){
	var self = this;
	
	this.add = function(id,	nombre, importe, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cmodulos', {
				"id": id,
				"nombre": nombre,
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
		$.post('cmodulos', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el Módulo");
			}
		}, "json");
	};
};