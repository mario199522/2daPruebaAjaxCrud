$(document).ready(function() {
	function limpiarFormulario() {
    	document.getElementById("ff").reset();
    }

    function boton_eliminar(registro) {
	$('#id_' + registro).remove();

    }
    function limpiar() {
	$("#descripcion").val('');
	}
	$('#enviar').click(function(e) {
		e.preventDefault();

		var formData = new FormData($('#ff')[0]);
		var token = $('input[name=_token]').val();
		var form = $(this).parents('form');
		var url = form.attr('action');

		var descripcion = $('input[name=descripcion]').val();
		var divSalida = $("#datos");
		var cadena = "";
		cadena = '<tr >\
				      <td>'+descripcion+'</td>\
				    </tr>';
			divSalida.append(cadena);

		limpiarFormulario();
		$.ajax({
			url: url,
			headers: { 'X-CSRF-TOKEN': token },
			type: "POST",
			dataType: "json",
			contentType: false,
			processData: false,
			data: formData,
		})
		.done(function() {

			console.log("success");
		})
		.fail(function() {

			console.log("error");
		})



	})
	$('#enviar1').click(function(e) {
		e.preventDefault();

		var formData = new FormData($('#fff')[0]);
		var token = $('input[name=_token]').val();
		var form = $(this).parents('form');
		var url = form.attr('action');

		var descripcion = $('input[name=descripcion]').val();
		var materia = $('select[name=materia] option:selected').text();
		
		var divSalida = $("#datos1");
		var cadena = "";
		cadena = '<tr >\
				      <td>'+descripcion+'</td>\
				      <td>'+materia+'</td>\
				    </tr>';
			divSalida.append(cadena);

		limpiar();

		$.ajax({
			url: url,
			headers: { 'X-CSRF-TOKEN': token },
			type: "POST",
			dataType: "json",
			contentType: false,
			processData: false,
			data: formData,
		})
		.done(function() {

			console.log("success");
		})
		.fail(function() {

			console.log("error");
		})



	})
});