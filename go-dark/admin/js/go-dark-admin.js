(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	let filepath = '../wp-content/plugins/go-dark/admin/partials/go-dark-admin-database-functions.php';

	$(window).on('load', function(){

		console.log('window loaded');

		$.ajax({
			url: filepath,
			type: 'post',
			data: {
				func: 'retrieve'
			},
			success: function(res){
				var data = JSON.parse(res);

				$(data).each(function(key, value){
					var id = $(value)[key].id;
					var section = $(value)[key].section;
					var shade = $(value)[key].shade;

					var html = "";

					id.forEach((r, k) => {
						html += "<tr><td>"+section[k]+"</td><td>"+shade[k]+"</td></tr>"
					});

					$('.data_table tbody').append(html);
				});
				
			},
			error: function(err){
				console.log(err);
			}
		})
	})

	$(document).ready(function(){

		console.log('document ready');
		
		$('.submit_form input[type^="submit"]').click(function(e){
			e.preventDefault();

			let secvalue = $('#sections_for_dm').val();
			let shavalue = $('#shade_for_dm').val();

			$.ajax({
				url: filepath,
				type: 'post',
				data: {
					func : 'insert',
					section : secvalue,
					shade : shavalue
				},
				success: function(res){
					window.alert('added');

					location.reload();
				},
				error: function(err){
					console.log(filepath + '|' + err)
				}
			});
		})

		var box = $('.cont .color_box'),
			box_text = $('.cont .color_text');

		$('.cont form select option').click(() => {
			switch ($('#shade_for_dm').val()) {
				case '#000000':
					box.css('background', '#000000')
					box_text.html('#000000');
					break;
				case '#1a1a1a':
					box.css('background', '#1a1a1a')
					box_text.html('#1a1a1a');
					break;
				case '#2e2e2e':
					box.css('background', '#2e2e2e')
					box_text.html('#2e2e2e');
					break;
			}
		})
	})

})( jQuery );