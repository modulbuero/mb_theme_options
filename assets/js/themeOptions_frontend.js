/**
 *	Manage Transparent-Header	
*/
function transparentHeader(){
	if($("body.mb-transp-header").length){
		const setColor	= "set-bgcolor"
		let headerheight= getComputedStyle(document.documentElement).getPropertyValue('--headerHeight');
		let $headerWrap = $("body.mb-transp-header header")
	
		function bgColorHeader(){
			headerheight = parseInt(headerheight, 10)
	
			if ( $(this).scrollTop() >= headerheight ) {
				$headerWrap.addClass(setColor);
		    }else{
			    $headerWrap.removeClass(setColor);
		    }
		}
	
		/*invertier deine Farbe und mache sie transparent*/	
		function invertAndAmplifyColorWithOpacity() {
			const amplificationFactor = 1.5
			const color = getComputedStyle(document.documentElement).getPropertyValue('--colorMenuItem');
	
		    // Parse the color string to get RGB values
		    const r = parseInt(color.slice(1, 3), 16);
		    const g = parseInt(color.slice(3, 5), 16);
		    const b = parseInt(color.slice(5, 7), 16);
		
		    // Invert the RGB values
		    const invertedR = 255 - r;
		    const invertedG = 255 - g;
		    const invertedB = 255 - b;
		
		    // Amplify the inverted values
		    const amplifiedR = Math.min(255, invertedR * amplificationFactor);
		    const amplifiedG = Math.min(255, invertedG * amplificationFactor);
		    const amplifiedB = Math.min(255, invertedB * amplificationFactor);
		
		    // Convert the amplified RGB values back to hexadecimal color representation
		    const invertedAmplifiedColor = `#${amplifiedR.toString(16).padStart(2, '0')}${amplifiedG.toString(16).padStart(2, '0')}${amplifiedB.toString(16).padStart(2, '0')}`;
		
		    // Add opacity (30%)
		    const invertedAmplifiedColorWithOpacity = `${invertedAmplifiedColor}70`; // 70 corresponds to 40% opacity in hexadecimal
			
			$("body").get(0).style.setProperty("--backgroundHeader", invertedAmplifiedColorWithOpacity);
		}
	
		invertAndAmplifyColorWithOpacity()
		
		$(window).on("scroll", bgColorHeader)
		$(window).on("resize", bgColorHeader)
	}
}

function menuSlideTo(){
	//Menü mit Slide-To muss angepasst werden
	if($('body.home').length){
		function entferneTextVorHashtag(text) {
			const index = text.indexOf('#');
			if (index !== -1) {
				return text.slice(index);
			} else {
				return text;
			}
		}
		
		//Für die Startseite die URL entfernen
		let menuLink = '#menu-hauptmenue li a'
		$(menuLink).each(function(){
			let link = $(this).attr("href")
			let url  = entferneTextVorHashtag(link)
			$(this).attr("href", url)
		})
		
		//Für MobileMenü, nach click Menü schließen
		if($(window).width() <= 1024 ){
			setTimeout(function(){
				$(menuLink).on('click',function(){
					$('.close-menu').click()
				})
			}, 1500)
		}	
	}
}


//INIT the Funky Functions
jQuery(document).ready( ()=> {
	menuSlideTo()
	transparentHeader()
})