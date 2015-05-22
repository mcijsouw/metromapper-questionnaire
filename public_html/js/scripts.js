(function ($) {
	$(function () {
		
		/* Timer variables*/
		var currentTime = 0;
		var incrementTime = 70;
		var totalTimeOffset = 342.58 * 1000; // @todo cookie time?
		var form = $('#question-form');
		var clicks = '';
		var clicksInput = $('#clicks-input');
		var confirmFinishWindowOpen = false;

		$('.point.start, .point.end').click(function (e) {
			e.preventDefault();
		});

		$('.point.intersection').click(function (e) {
			e.preventDefault();
			var _option = $('input[value="' + $(this).attr('data-id') + '"]');
			if ($(this).hasClass('selected')) {

				_option.removeAttr('checked');
				$(this).removeClass('selected');
				registerClick($(this), false);

			} else {

				_option.prop('checked', 'checked');
				$(this).addClass('selected');
				registerClick($(this), true);

			}
		});
		
		var registerClick = function(pointElement, selected) {
			var timeString = currentTime / 1000;
			timeString = timeString.toFixed(2);
			if(clicks != '') {
				clicks += ',';
			}
			clicks += (selected ? 'select' : 'deselect') + "|" + pointElement.attr('data-id') + "|" + timeString;
			clicksInput.val(clicks);
		};
		
		var registerEndClick = function() {
			var timeString = currentTime / 1000;
			timeString = timeString.toFixed(2);
			if(clicks != '') {
				clicks += ',';
			}
			clicks += "end||" + timeString;
			clicksInput.val(clicks);
		};

		/* Timer */
		var timeElement = $('#time');
		var timeInput = $('#time-input');
		var totalTimeElement = $('#total-time');

		$.tmr = $.timer(function () {
			
			if(confirmFinishWindowOpen == false) {
				// Current time
				var timeString = currentTime / 1000;
				timeString = timeString.toFixed(2);
				timeElement.html(timeString);
				timeInput.val(timeString);

				// Total time
				timeString = (totalTimeOffset + currentTime) / 1000;
				timeString = timeString.toFixed(2);
				totalTimeElement.html(timeString);
			}
			
			// Increment time
			currentTime += incrementTime;
			
		}, incrementTime, false);

		/* Resize */
		var points = $('.point');
		var map = $('img.map');
		var orgMapWidth = map.attr('data-orgwidth');
		var orgMapHeight = map.attr('data-orgheight');
		$(window).resize(function () {
			var mapLeft = map.position().left;
			var mapTop = map.position().top;
			var mapWidth = map.width();
			var mapHeight = map.height();
			var scale = (mapWidth / orgMapWidth);
			var transformScale = Math.min(scale + 0.4, 1);
			points.each(function () {
				var x = $(this).attr('data-x');
				var y = $(this).attr('data-y');
				$(this).css('left', (mapLeft + x * scale) + 'px');
				$(this).css('top', (mapTop + y * scale) + 'px');
				$(this).css('transform', 'scale(' + transformScale + ')');
				$(this).css('-webkit-transform', 'scale(' + transformScale + ')');
			});
		});
		
		/* Page leave warning */
		$.enableBeforeUnloadWarning = function() {
			$(window).on('beforeunload', function() {
				return 'Are you sure you want to quit? Your progress will not be saved when you leave at this point!';
			});
		};
		$.disableBeforeUnloadWarning = function() {
			$(window).off('beforeunload');
		};
		$.enableBeforeUnloadWarning();

		
		$('.point.end').click(function (e) {
			confirmFinishWindowOpen = true;
			registerEndClick();
			jConfirm('Are you sure you want to submit this answer?', 'Confirm answer', function(r) {
				if(r) {
					$.tmr.stop();
					$.disableBeforeUnloadWarning();
					form.submit();
				} else {
					confirmFinishWindowOpen = false;
				}
			});
		});
		
		$(window).trigger('resize');
		$(window).load(function () {
			$(window).trigger('resize');
			window.setTimeout(function() {
				$('#loader').fadeOut();
				$.tmr.play();
			}, 1000);
		});

	});
})(jQuery);