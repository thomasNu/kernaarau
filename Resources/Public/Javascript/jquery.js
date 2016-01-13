$(function(){
/*	$(window).resize(function() {
		$('div#alpha-bottom').each(function() {
			if ($(this).offset().top < $(window).height()) {
				$(this).hide();
			} else {
				$(this).show();
			}  
		});
		$('div.frame').each(function() {
			if ($(this).outerHeight(true) > $(window).height()
					&& $('div.menuleft').offset().top + $('div.menuleft').outerHeight(true) + 72 <= $(window).height()) {
				$('div.header').css({position: 'fixed', top: 0, left: $(this).offset().left});
				$('div.content').css({marginTop: $('div.header').outerHeight(true)});
				$('div.menuleft').css({position: 'fixed', top: $('div.header').outerHeight(true) + 12, left: $(this).offset().left + 20});
			} else {
				$('div.header').removeAttr('style');
				$('div.content').removeAttr('style');
				$('div.menuleft').removeAttr('style');
			}  
		});
    }).resize(); */

	$('div#alpha-bottom').each(function() {
		if ($(this).offset().top < $(window).height()) {
			$(this).hide();
		} else {
			$(this).show();
		}  
	});
	$('div#c15 h2,div#c302 h2,div#c383 h2').css('cursor', 'n-resize');
	$('h2:contains(▾),h2:contains(▸)').click(function(evt) {
		$(this).next().slideToggle();
		$(this).parent('.csc-header').eq(0).nextAll().each(function() {
			$(this).slideToggle();
		});
		var txt = $(this).text();
		$(this).text('');
		if (txt.substr(0, 1) == '▸') {
			$(this).attr('style', 'cursor: n-resize;');
			return txt.replace(/▸/, '▾');
		}	
		else {
			$(this).attr('style', 'cursor: s-resize;');
			return txt.replace(/▾/, '▸');
		}
	});
	$('h2:contains(▾),h2:contains(▸)').click(function(evt) {
		$(this).text(evt.result);
	});
	$('.menuleft .menu > h2:contains(Kern Aktuell)').attr('title', 'Kürzlich aktualisierte Seiten');
	$('.menuleft .menu > h2:contains(Kern Intern)').attr('title', 'Internas von 1819 bis 1991');
	$('.menuleft .menu > h2:contains(Kern Extern)').attr('title', 'Veröffentlichungen von 1819 bis 1991');
	$('.menuleft .menu > h2:contains(Kern Suche)').attr('title', 'Findet Begriffe in allen Seiten und PDFs');
	$('.menuleft a:empty').text('o');
	$('div.follow-on-call').each(function() {
		$('div#c15 h2,div#c383 h2').each(function() {
			var txt = $(this).text();
		 	$(this).text(txt.replace(/▾/, '▸'));
		 	$(this).css('cursor', 's-resize');
			$(this).parent('.csc-header').eq(0).nextAll().each(function() {
				$(this).hide();
			});
		});		
	});		
	
	$('a>b:contains(http://),a:contains(http://)').css({letterSpacing: '0px', fontWeight: 'normal'});
	$('a[target=thePicture]').attr('title', 'Vergrössert anzeigen');
	$('a[title*=internen]').removeAttr('title');
	$('a>b:contains(mailto:),a:contains(mailto:)').attr('title', 'Vergrössert anzeigen');
	
//	$('p, p span, td span').removeAttr('style');
	
	$('table#zebra td').removeAttr('style');
	$('table#zebra td p').removeAttr('style');
	$('table#zebra td span').removeAttr('style');
	$('table#zebra td b').css('font-weight', 'normal');
	$('table#zebra td[align="center"]').attr('align', 'left');
	$('table#zebra tr:first td').css({fontWeight: 'bold', color: '#444444'});
	$('table#zebra tr').each(function(i) {
		if (i % 2 == 1) {
			$(this).css('background-color', '#D2DCF2');
		}
	});
    
//    $('div.csc-default').css('background-color', '#D2DCF2');
 //   .each(function() { .find('li.link-to-top')
        
    $('div.middle').each(function() { 
//    	var $parent = $(this).find('h2').parent('div').html();  alert($parent);
    	$(this).find('h2').each(function() {
            var $header = $(this).html();  alert($header);
//            var $parent = $(this).parent('div').html();  alert($parent);
 //           $(this).replaceWith('<h3>' + $header + '</h3>');
    	});
    });
//	$('div.csc-textpic-imagewrap').findAll('img[width="8"]').css({position: 'absolute', right: '-18px', overflow: 'hidden'});
    $('div.csc-frame-indent6633).each(function() {
        var marginRight = parseInt($(this).prev().find('div.csc-textpic-imagewrap img').outerWidth()) + 2;
		$(this).css('margin-right', marginRight + 'px');
        var hCE = parseInt($(this).prev().outerHeight(true));
        var hI1 = parseInt($(this).prev().find('div.csc-textpic-imagewrap img').outerHeight());
        var hI2 = parseInt($(this).find('div.csc-textpic-imagewrap img').outerHeight());
        var hTx = parseInt($(this).prev().find('div.csc-textpic-text').outerHeight());
        var deltaH = hI1 - hI2 - hTx;
        var marginTop = -(hCE - 29 - hI1 + hI2);
        if (deltaH < 0) {
            marginTop -= deltaH;
        }
        if (marginTop < 0) {
			$(this).css('margin-top', marginTop + 'px');
        }
    });
	$('div#c356 h2.csc-firstHeader').each(function() {
		$(this).html('<gcse:searchresults-only></gcse:searchresults-only>');
	});
	$('div#c356 h2.csc-firstHeader').each(function() {
		var myQuerry = document.URL.match(/\?q=(.+)/);
        var myQuerry = decodeURIComponent(myQuerry[1]).split('&');
		$(this).html('Suche nach <span class="red">' + myQuerry[0].replace(/\+/g, ' ') + '</span> auf dieser Webseite');
	});
	$('div#c15 h2.csc-firstHeader').each(function() {
		var myQuerry = document.URL.match(/\?sw=(.+)/);
        if (myQuerry) {
            var myQuerry = decodeURIComponent(myQuerry[1]).split('&');
    		$(this).html('▸ Suche nach <span class="red">' + myQuerry[0].replace(/\+/g, ' ') + '</span> in Produkten');
        }
	});
	$('div#table-updated').each(function() {
		var lastUpdated = $(this).html();
		$(this).hide();
		$('div#footer-updated').each(function() {
			$(this).find('b').html(lastUpdated);
		});
	});
    
//    $('#gallery').nivoSlider({pauseTime:4000});
//    $('.middle a.light').lightBox();
	$('#logo').mouseover(function() {
		this.src = "fileadmin/images/StudiensammlungAarau.png";
	});
	$('#logo').mouseleave(function() {
		this.src = "fileadmin/images/StudiensammlungKern.png";
	});
});

