(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
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

	/** TRIGGER DARK MODE */
	$(document).ready(function(){
		checkStatus(localStorage.getItem('status'))
	 
		var btn = document.createElement('div')
		btn.className = 'btnDM'
		btn.appendChild(document.createElement('input'))
		btn.appendChild(document.createElement('span'))
		$('footer')[0].append(btn)
	
		$('.btnDM').click(function(){
			if(localStorage.getItem('status') != 1){
				localStorage.setItem('status', 1)
				setDark();
			}else{
				localStorage.setItem('status', 0)
				setDefault()
			}
			$('.btnDM').toggleClass('active');
		})
		
		checkBtnStatus(localStorage.getItem('status'))
	})

	/** DARK MODE FUNCTIONS */

	/** SET TO DARK MODE */
	function setDark(){
		$('.main_con, .btm1_con, .footer_top_con, .footer_nav').addClass('dm'); //para sa pseudo elements ni siya

		/** Applying darkmode css start */
		$('.header_con, #nav_area, #main_area, div[id^="bottom"]:nth-of-type(2n), .footer_btm, .footer_nav').css({'background':'#222','color':'#fff'});
		$('.bnr_info, div[id^="bottom"]:nth-of-type(2n+1), .footer_top').css({'background':'#333','color':'#fff'});

		$('*').each(function() {
			if( $(this).css('color') == 'rgb(69, 69, 69)' || $(this).css('color') == 'rgb(26, 26, 26)' || $(this).css('color') == 'rgb(51, 51, 51)' ) {
				$(this).css('color','#fff');
			}
			
			if( $(this).css('background-color') == 'rgb(255, 255, 255)' || $(this).css('background-color') == 'rgb(245, 245, 245)' ) {
				$(this).css('background','#222');
			}
		});
		/** Applying darkmode css end */

		$('*').find('li, a:not(nav.page_nav ul li a, .footer_nav ul li a), a span').css({'background':'','color':''});
	}

	/** REVERT TO DEFAULT */
	function setDefault(){
		$('.main_con, .btm1_con, .footer_top_con, .footer_nav').removeClass('dm');

		$('header, #nav_area, #main_area, #bottom2').css({'background':'','color':''});
		$('.bnr_info, #bottom1, footer').css({'background':'','color':''});

		$('*').each(function() {
			if($(this).css('color').length > 0 || $(this).css('background').length > 0) {
				$(this).css('color','');
				$(this).css('background','');
			}
		});
	}

	//mucheck if naka darkmode ang site
	function checkStatus(status){
		if(status != 1){
			return
		}else{
			setDark();
		}
	}

	function checkBtnStatus(status){ //temporary
		if(status != 1){
			return
		}else{
			$('.btnDM').addClass('active');
		}
	}

	// /** DARK MODE FUNCTION - END HERE */
	// /**DARK MODE END */

})( jQuery );