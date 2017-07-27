
 $(function(){
 	$('.registrar').click(function(){
		$('#modalS').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
			
	});

	$('.finalizar').click(function(){
		$('#modalS').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
			
	});

	$('.rechazar').click(function(){
		$('#modalR').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});

	$('.aprobar').click(function(){
		$('#modalA').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});

});
