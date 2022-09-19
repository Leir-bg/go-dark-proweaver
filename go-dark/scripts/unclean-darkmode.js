/** TRIGGER DARK MODE */
jQuery(document).ready(function(){
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
		//console.log(localStorage.getItem('status'))
	})
	
	checkBtnStatus(localStorage.getItem('status'))
})

/** DARK MODE FUNCTIONS */
// const defaultExcluded = 'html *:not(script, style, noscript, figure, img, #banner, #banner *:not(.bnr_info, .bnr_info *), .wrapper, .btnDM, .toggle_holder, .toggle_holder *, .toggle_nav_close, .toggle_right_nav.toggle_right_cont, .toggle_right_nav, .toggle_right_cont'

//mga elementes nga dili nimo ipaapil ug dark mode
// var exemptElem = '#popupVSButton *, #popupVSChat *, .serv_list ul li a, .modal, .main_btn, .bnr_info a, .testimonial_holder a, .btm2_left ul li, .btm2_left ul li *'

//"call to" functions
/** SET TO DARK MODE */
function setDark(){
	// $(defaultExcluded+','+exemptElem+')').each(function(){
	// 	$(this).css('background', '#222')
	// 	$(this).css('color', '#fff')
	// })

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

    // $('header, #nav_area, #main_area, #bottom2, .footer_btm').find('*').css({'background':'#222','color':'#fff'});
    // $('.bnr_info, #bottom1, .footer_top').find('*').css({'background':'#333','color':'#fff'});

}

/** REVERT TO DEFAULT */
function setDefault(){
	// $('html *:not('+exemptElem+')').each(function(){
	// 	$(this).css('background', '')
	// 	$(this).css('color', '')
	// })
    $('.main_con, .btm1_con, .footer_top_con, .footer_nav').removeClass('dm');

    $('header, #nav_area, #main_area, #bottom2').css({'background':'','color':''});
    $('.bnr_info, #bottom1, footer').css({'background':'','color':''});

    $('*').each(function() {
        if($(this).css('color').length > 0 || $(this).css('background').length > 0) {
            $(this).css('color','');
            $(this).css('background','');
        }
    });

    // $('header, #nav_area, #main_area, #bottom2').find('*').css({'background':'','color':''});
    // $('.bnr_info, #bottom1, footer').find('*').css({'background':'','color':''});
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


/** ------------------------------------------------------------------------------------------ */
/** ------- BASURA NANI MGA GI COMMENT SA UBOS BUT WALA LANG GI DELETE FOR REFERENCE -------*/




// var elemsWPseudoClass = ['.main_con', '.btm1_con', '.footer_top_con'] //temporary

// elemsWPseudoClass.forEach((elem) => {
//   //console.log(elem);
//   var el = document.querySelector(elem)
//   var after = window.getComputedStyle(el, '::after');
//   var before = window.getComputedStyle(el, '::before');

//   if(after['content'] != 'none' || before['content'] != 'none'){
// 	  $(elem+'::after').css('display', 'none');
// 	  console.log(elem+'::after')
	  
// 	  $(elem+'::before').css('display', 'none');
// 	  console.log(elem+'::before')
//   }
//   if(before['content'] != 'none'){
// 	  $(elem+'::before').css('display', 'none');
// 	  console.log(elem+'::before')
//   }
//   if(after['content'] != 'none'){
// 	  $(elem+'::after').css('display', 'none');
// 	  console.log(elem+'::after')
//   }
  
// })

// /**DARK MODE START */
// $(document).ready(function(){
// 	var dm = document.createElement('a')
// 	dm.className = 'btnDM'
// 	$('footer')[0].append(dm)

// 	$('.btnDM').click(function(){
// 		if(localStorage.getItem('status') != 1){
// 			darkModeSwitch(localStorage.setItem('status', 1));
// 		}else{
// 			darkModeSwitch(localStorage.setItem('status', 0));
// 		}
// 		location.reload();
// 		console.log(localStorage.getItem('status'))
// 	})
// // })


// /** APPLY DARK MODE - START */
// //localStorage.setItem('status', 0) //1 = darkmode-on
// function darkModeSwitch(status){
// 	if(status != 1){
// 		return
// 	}else{
// 		localStorage.setItem('status', 1)
// 		var link = document.createElement('link')
// 		link.rel = 'stylesheet'
// 		link.type = 'text/css'
// 		link.href = 'wp-content/themes/bestvaluehealthcare/darkstyle.css'
// 		link.media = 'all'
// 		link.id = 'darkStyle'

// 		var head = document.getElementsByTagName('head')[0];
// 		head.append(link);
// 	}
// 	console.log(localStorage.getItem('status'))
// }darkModeSwitch(localStorage.getItem('status'))
// /** APPLY DARK MODE - END*/



// /** DARK MODE FUNCTION - TEST ONLY */

// function getAllColors() {
// 	// regex via http://stackoverflow.com/a/7543829/149636
// 	var rgbRegex = /^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/;

// 	var allColors = [];

// 	var elems = document.getElementsByTagName('*');
// 	var total = elems.length;

// 	var x,y,elemStyles,styleName,styleValue,rgbVal;

// 	for(x = 0; x < total; x++) {
// 		elemStyles = window.getComputedStyle(elems[x]);

// 		for(y = 0; y < elemStyles.length; y++) {
// 			styleName = elemStyles[y];
// 			styleValue = elemStyles[styleName];
// 			if(!styleValue) {
// 				continue;
// 			}

// 			// convert to string to avoid match exceptions
// 			styleValue += "";
			
// 			rgbVal = styleValue.match(rgbRegex);
// 			if(!rgbVal) { // property does not contain a color
// 				continue;
// 			}

// 			if(allColors.indexOf(rgbVal.input) == -1) { // avoid duplicate entries
// 				allColors.push(rgbVal.input);
// 				//console.log(rgbVal)
// 			}
// 		}
// 	}return allColors;
// }
// //console.log(getAllColors().join('\n'))
// //console.log(getAllColors())

// function getAllElements(){
	
// }

// function matchElementsToColors(colorArray){
// 	var colorVal = colorArray;
// 	for(var i = 0; i < colorVal.length; i++){
// 		console.log(colorVal[i])
// 	}
// }matchElementsToColors(getAllColors())

// /** DARK MODE FUNCTION - END HERE */
// /**DARK MODE END */