$(document).ready(function() {
	
	// Dialogo para agregar nuevo usuario
	var dialogo = $('#agregar').dialog({
		autoOpen:false,
		modal:true,
		title:"Agregar usuario",
		buttons:{
			"Crear usuario":function(){
				// ajax
				var datos = $('#formulario').serialize(); //convierte los campos del form en formato array

				$.ajax({
					url:'php/agregar.php',
					type: 'POST',
					data: datos
				}).done(function(){
					window.location.replace('crud.php'); // recarga la página con el mismo index
				});
			},
			Cancel: function(){
				$('#formulario')[0].reset(); // vacía el formulario
				$(this).dialog("close"); // cierra el dialog
			}
		}
	});

	// Dialogo para editar usuario
	var actualizar = $('#editar').dialog({
		autoOpen:false,
		modal:true,
		title:"Editar usuario",
		buttons:{
			"Editar usuario":function(){
				// ajax
				var datos = $('#formulario2').serializeArray(); //pillo los datos del form en forma de array para poder insertarle la id
				var id = $('#user').val(); //pillo la id del usuario del campo oculto del DOM
				datos.push({name:'id', value:id}) //inserto la id al array 

				$.ajax({
					url:'php/actualizar.php',
					type: 'POST',
					data: datos
				}).done(function(){
					window.location.replace('crud.php');
				});
			},
			Cancel: function(){
				$('#formulario2')[0].reset(); // vacía el formulario
				$(this).dialog("close"); // cierra el dialog
			}
		}
	});

	// Dialogo para eliminar usuario
	var confirmar = $('#eliminar').dialog({
		autoOpen:false,
		resizable:false,
		modal:true,
		title:"Eliminar usuario",
		buttons:{
			"Eliminar":function(){
				// ajax
				var id = $('#user').val();

				$.ajax({
					url:'php/eliminar.php',
					type:'POST',
					data:{'id':id}
				}).done(function(){
					window.location.replace('crud.php');
				});
			},
			Cancel: function(){
				$(this).dialog("close"); // cierra el dialog
			}
		}
	});

	// Muestra dialogo al añadir nuevo usuario
	$('#nuevo').button().on("click",function(){
		dialogo.dialog("open");
	});

	// Muestra dialogo al eliminar usuario
	$('.eliminar').click(function(event) {
		$('#user').val($(this).attr("id")); //recojo la id del campo oculto
		confirmar.dialog("open");
	});

	// Muestra dialogo al editar usuario
	$('.editar').click(function(event) {
		
		var id = $(this).attr("id"); //recojo el id del usuario seleccionado
		$('#user').val(id); //guardo la id en el campo oculto

		$.ajax({
			url:'php/editar.php',
			type:'POST',
			dataType:'json', //tipo json porque estoy recogiendo datos del servidor (localhost, tabla usuarios)
			data:{'id':id}
		}).done(function(data){
			$('#usuario').val(data[0].usuario);
			$('#nombre').val(data[0].nombre);
			$('#apellido').val(data[0].apellido);
			$('#telefono').val(data[0].telefono);
			$('#email').val(data[0].email);

			actualizar.dialog("open");
		});

		
	});




});