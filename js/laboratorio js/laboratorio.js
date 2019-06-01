	
	$("#fml_post_edf").on("submit",function ( e ) {
		e.preventDefault();
		var formulario= $(this);
		var dataserializada = formulario.serialize();
		console.log(dataserializada);
			$.ajax({
				type: 'POST',
				url : '../../php/servicios/post.updateContra.php?id='+id,
				dataType: 'json',
				data:dataserializada
			})
			.done(function( data ){

				alert("Contraseña Actualizada Corectamente");
				$("#txtUserContraN1").val("");
           $("#txtUserContraN2").val("");
			})
			.fail(function(){
				alert("Error al Actualizar Registro!!!");
			});
			
    });
	
    function EliminarLaboratorio(codigo,urlbase) {
			$.ajax({
				type: 'POST',
				url : urlbase+'del.edificio.php?dbedf_codigo='+codigo,
				dataType: 'json'
			})
			.done(function( data ){
				alert("Registro Eliminado!!!");
			})
			.fail(function(){
				alert("Error al Actualizar Registro!!!");
			});
			
	};