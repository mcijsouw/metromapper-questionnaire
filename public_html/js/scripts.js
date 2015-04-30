(function($) {
	$(function() {
		
		$('.point.start, .point.end').click(function(e) {
			e.preventDefault();
		});
		
		$('.point.intersection').click(function(e) {
			e.preventDefault();
			var _option = $('input[value="' + $(this).attr('data-id') + '"]');
			if($(this).hasClass('selected')) {
				
				_option.removeAttr('checked');
				$(this).removeClass('selected');
				console.log('deselect ' + $(this).attr('data-id'), _option);
				
			} else {
				
				_option.prop('checked','checked');
				$(this).addClass('selected');
				console.log('select ' + $(this).attr('data-id'), _option);
				
			}
		});
		
	});
})(jQuery);