/**
 * Upload Image in Theme Options
 */
jQuery(document).ready(function ($) {
    var custom_uploader;
    $('.upload_image_button').click(function (e) {
        e.preventDefault();
        var idOfElement = $(this).prev().attr('id'); //get id of textfield before button

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#'+idOfElement).val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();
    });
});


/**
 * Color Picker in Theme Options

jQuery( document ).ready( function ($) {
	if ( $.isFunction( jQuery.fn.wpColorPicker ) ) {
		console.log("colorpickr")
		$( '.mb_theme_ci_farbe_ input' ).wpColorPicker({
			options: {
				clear: false,
			},
			open: function(event, ui) {
	            console.log('Farbwählerfeld geöffnet');
	        },
		});
	}
} ); */

/**
 * Autocolortransform
 */
function autoColor(){
    //Abdunkeln um 20%
    function darkenColor(color) {
        // Convert hex color to RGB
        var r = parseInt(color.substring(1, 3), 16);
        var g = parseInt(color.substring(3, 5), 16);
        var b = parseInt(color.substring(5, 7), 16);
      
        // Calculate new RGB values
        var newR = Math.round(r * 0.65);
        var newG = Math.round(g * 0.65);
        var newB = Math.round(b * 0.65);
      
        // Convert new RGB values back to hex
        var newColor = "#" + componentToHex(newR) + componentToHex(newG) + componentToHex(newB);
        
        return newColor;
    }
    
    //Aufhellen
    function lightenColor(color) {
        // Convert hex color to RGB
        var r = parseInt(color.substring(1, 3), 16);
        var g = parseInt(color.substring(3, 5), 16);
        var b = parseInt(color.substring(5, 7), 16);
      
        // Calculate new RGB values
        var newR = Math.round(r * 1.35);
        var newG = Math.round(g * 1.35);
        var newB = Math.round(b * 1.35);
        
        if(newR >= 255){newR = 255}
        if(newG >= 255){newG = 255}
        if(newB >= 255){newB = 255}

        // Convert new RGB values back to hex
        var newColor = "#" + componentToHex(newR) + componentToHex(newG) + componentToHex(newB);
        
        return newColor;
    }

    
    // Eine Hilfsfunktion, um eine einzelne Farbkomponente in eine 2-stellige Hexzahl umzuwandeln
    function componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }

	// erstelle einen Komplementären Farbwert für Sekundärfarbe
	function hexToHSL(hex) {
		hex = hex.replace(/^#/, '');
		const r = parseInt(hex.slice(0, 2), 16) / 255;
		const g = parseInt(hex.slice(2, 4), 16) / 255;
		const b = parseInt(hex.slice(4, 6), 16) / 255;
		
		const max = Math.max(r, g, b);
		const min = Math.min(r, g, b);
		
		let h, s, l = (max + min) / 2;
		
		if (max === min) {
		h = s = 0; // achromatic
		} else {
		const d = max - min;
		s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
		
		switch (max) {
		  case r:
		    h = (g - b) / d + (g < b ? 6 : 0);
		    break;
		  case g:
		    h = (b - r) / d + 2;
		    break;
		  case b:
		    h = (r - g) / d + 4;
		    break;
		}
		
		h /= 6;
		}
		
		return { h, s, l };
	}
		
	function HSLToHex(hsl) {
		const { h, s, l } = hsl;
		const hueToRgb = (p, q, t) => {
		if (t < 0) t += 1;
		if (t > 1) t -= 1;
		if (t < 1 / 6) return p + (q - p) * 6 * t;
		if (t < 1 / 2) return q;
		if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
		return p;
		};
		
		const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
		const p = 2 * l - q;
		
		const r = hueToRgb(p, q, h + 1 / 3);
		const g = hueToRgb(p, q, h);
		const b = hueToRgb(p, q, h - 1 / 3);
		
		const rHex = Math.round(r * 255).toString(16).padStart(2, '0');
		const gHex = Math.round(g * 255).toString(16).padStart(2, '0');
		const bHex = Math.round(b * 255).toString(16).padStart(2, '0');
		
		return `#${rHex}${gHex}${bHex}`;
	}
		
	function findComplementaryColor(hexColor) {
		const hslColor = hexToHSL(hexColor);
		
		// Ändern Sie den Farbwert (Hue) um 180 Grad, um die Komplementärfarbe zu erhalten
		const complementaryHSL = { ...hslColor };
		complementaryHSL.h = (complementaryHSL.h + 0.5) % 1;
		
		const complementaryHex = HSLToHex(complementaryHSL);
		return complementaryHex;
	}

    //Params
    let $btn        = $('#autocolorgenerator');
    //let $btnPalette = $('#autocolorpalette');
    let $maincolor  = $('#mb_theme_ci_farbe_hauptfarbe');
    let hauptfarbe  = $maincolor.val();
    let activeColor = hauptfarbe;

    if($btn.length){
        //Get Values
        $maincolor.on('change', function(){
            activeColor = $(this).val();
        })
        
        //Set Values
        $btn.on('click',()=>{
	        console.log(findComplementaryColor(activeColor))
            let sekundaer = findComplementaryColor(activeColor);
            let heller  = lightenColor(sekundaer);
            $('#mb_theme_ci_farbe_sekundaerfarbe').val(sekundaer)
            $('#mb_theme_ci_farbe_linkfarbe').val(heller)
        })
    }

    // if($btnPalette.length){
    //     //Get Value
    //     $maincolor.on('change', function(){
    //         activeColor = $(this).val();
    //     })
        
    //     //Set Values
    //     $btnPalette.on('click',()=>{
    //         let neueFarbwerte = generateAnalogousColors(activeColor);
    //         console.log(neueFarbwerte)
    //         $('#mb_theme_ci_farbe_sekundaerfarbe').val(neueFarbwerte[0])
    //         $('#mb_theme_ci_farbe_linkfarbe').val(neueFarbwerte[1])
    //     })
    // }
}

function similarColors(){
	function getAnalogousColors(hexColor) {
	    // Convert hex to RGB
	    let r = parseInt(hexColor.slice(1, 3), 16);
	    let g = parseInt(hexColor.slice(3, 5), 16);
	    let b = parseInt(hexColor.slice(5, 7), 16);
	
	    // Calculate analogous colors
	    let colors = [];
	    for (let i = -1; i <= 1; i++) {
	        let newR = (r + i * 30) % 256;
	        let newG = (g + i * 30) % 256;
	        let newB = (b + i * 30) % 256;
	        colors.push(`#${((1 << 24) + (newR << 16) + (newG << 8) + newB).toString(16).slice(1)}`);
	    }
	
	    return colors;
	}

	//Params
    let $btn        = $('#similarcolorgenerator');
    let $maincolor  = $('#mb_theme_ci_farbe_hauptfarbe');
    let hauptfarbe  = $maincolor.val();
    let activeColor = hauptfarbe;

    if($btn.length){
        //Get Values
        $maincolor.on('change', function(){
            activeColor = $(this).val();
        })
        
        //Set Values
        $btn.on('click',()=>{
            let simColors 	= getAnalogousColors(activeColor)
            let sekundaer 	= simColors[0]
            let linkfarbe  	= simColors[2]
            
            $('#mb_theme_ci_farbe_sekundaerfarbe').val(sekundaer)
            $('#mb_theme_ci_farbe_linkfarbe').val(linkfarbe)
        })
    }
}

function changeFonts(){
    let fontsWrap = '.ci-fonts-selector-wrap';
    
    $(fontsWrap).on('click', function(){
        $(this).find("div").slideToggle()
    })

    $(fontsWrap + '  p').on('click', function(){
        let font = $(this).text();
        let $input= $(this).closest(fontsWrap).find('input');
        $input.val(font);

    })
}

function hideSomeFavicons(){
    if (window.location.href.indexOf("admin.php?page=theme-options-ci&tab=logofavicon") > -1) {
        $('.form-table tr:gt(2)').addClass('hideRow');
        var button = $('<span class="showmore">Weitere Favicon größen</span>');
        $('#zusatzanzeige').append(button);

        // Klick-Ereignis hinzufügen
        button.click(function() {
            $('.form-table tr').removeClass('hideRow');
            $(this).hide()
        });
    }
}

//INIT the Funky Functions
jQuery(document).ready( ()=> {
    autoColor()
    changeFonts()
    similarColors()
    hideSomeFavicons()
})