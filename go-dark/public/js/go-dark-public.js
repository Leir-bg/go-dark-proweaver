(function( $ ) {
	'use strict';

	/**
	 * Initialize PHP file wherein the
	 * database functions are found.
	 */

	let filepath = 'wp-content/plugins/go-dark/admin/partials/go-dark-admin-database-functions.php';

	//TRIGGER DARK MODE
	$(document).ready(() => {

		/** 
		 * Get data from database on page load 
		 */

		$.ajax({
			url: filepath,
			type: 'post',
			data: {
				func: 'retrieve'
			},
			success: function(res){

				var data = JSON.parse(res);
				
				var childElem = 'h1, h2, h3, h4, h5, p, li, a, span, small, mark, .intro_txt, .copyright'

				/** 
				 * Checking if darkmode is enabled or not.
				 * This allows other pages to automatically turn to dark mode once loaded
				 */

				checkStatus(localStorage.getItem('status'))

				/**
				 * Initialized dark mode button
				 */
			
				var btn = document.createElement('div')
				btn.className = 'btnDM'
				btn.appendChild(document.createElement('input'))
				btn.appendChild(document.createElement('span'))
				$('footer')[0].append(btn)
			
				$('.btnDM').click(function(){
					if(localStorage.getItem('status') != 1){
						localStorage.setItem('status', 1)
						setDarkNew();
					}else{
						localStorage.setItem('status', 0)
						setDefaultNew()
					}
					$('.btnDM').toggleClass('active');
				})
				
				checkBtnStatus(localStorage.getItem('status'))

				/** 
				 * DARK MODE FUNCTIONS 
				 * 
				 * SET TO DARK MODE 
				 */


				function setDarkNew(){
					$(data.section).each((i, v) => {
						$(v).css('background', data.shade[i])
						$(v).find(childElem).css('color', '#fff')
					})
				}

				// function setDark(){
					
				// 	$('.main_con, .btm1_con, .footer_top_con, .footer_nav').addClass('dm'); //para sa pseudo elements ni siya

				// 	//Applying darkmode css start
				// 	$('.header_con, #nav_area, #main_area, div[id^="bottom"]:nth-of-type(2n), .footer_btm, .footer_nav').css({'background':'#222','color':'#fff'});
				// 	$('.bnr_info, div[id^="bottom"]:nth-of-type(2n+1), .footer_top').css({'background':'#333','color':'#fff'});

				// 	$('*').each(function() {
				// 		if( $(this).css('color') == 'rgb(69, 69, 69)' || $(this).css('color') == 'rgb(26, 26, 26)' || $(this).css('color') == 'rgb(51, 51, 51)' ) {
				// 			$(this).css('color','#fff');
				// 		}
						
				// 		if( $(this).css('background-color') == 'rgb(255, 255, 255)' || $(this).css('background-color') == 'rgb(245, 245, 245)' ) {
				// 			$(this).css('background','#222');
				// 		}
				// 	});
				// 	//Applying darkmode css end

				// 	$('*').find('li, a:not(nav.page_nav ul li a, .footer_nav ul li a), a span').css({'background':'','color':''});
				// }

				/** 
				 * REVERT TO DEFAULT 
				 */

				function setDefaultNew(){
					$(data.section).each((i, v) => {
						$(v).css('background', '')
						$(v).find(childElem).css('color', '')
					})
				}

				// function setDefault(){
				// 	$('.main_con, .btm1_con, .footer_top_con, .footer_nav').removeClass('dm');

				// 	$('header, #nav_area, #main_area, #bottom2').css({'background':'','color':''});
				// 	$('.bnr_info, #bottom1, footer').css({'background':'','color':''});

				// 	$('*').each(function() {
				// 		if($(this).css('color').length > 0 || $(this).css('background').length > 0) {
				// 			$(this).css('color','');
				// 			$(this).css('background','');
				// 		}
				// 	});
				// }

				/**
				 * Checks if darkmode is enabled
				 */
				function checkStatus(status){
					if(status != 1){
						return
					}else{
						setDarkNew();
					}
				}

				function checkBtnStatus(status){ //temporary
					if(status != 1){
						return
					}else{
						$('.btnDM').addClass('active');
					}
				}
			},
			error: function(err){
				console.log(err);
			}
		})

		/** 
		 * DARK MODE FUNCTION - END HERE 
		 * 
		 * DARK MODE END
		 */
	})

})( jQuery );